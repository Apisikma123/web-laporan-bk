<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    /**
     * Tampilkan form buat laporan (untuk siswa)
     */
    public function create()
    {
        $classes = DB::table('classes')
            ->select('id', 'nama_kelas')
            ->orderBy('nama_kelas')
            ->get();
        
        // Jenis masalah untuk UI
        $problemTypes = [
            'akademik' => ['title' => 'Akademik', 'desc' => 'Nilai turun, tugas susah?', 'color' => 'from-blue-500 to-cyan-500'],
            'sosial' => ['title' => 'Sosial', 'desc' => 'Masalah teman atau keluarga?', 'color' => 'from-green-500 to-emerald-500'],
            'karir' => ['title' => 'Karir', 'desc' => 'Bingung mau jadi apa?', 'color' => 'from-yellow-500 to-orange-500'],
            'pribadi' => ['title' => 'Pribadi', 'desc' => 'Stres atau kurang PD?', 'color' => 'from-pink-500 to-rose-500'],
            'darurat' => ['title' => 'Darurat', 'desc' => 'Butuh bantuan SEGERA?', 'color' => 'from-red-500 to-pink-500'],
            'lainnya' => ['title' => 'Lainnya', 'desc' => 'Ada masalah lain?', 'color' => 'from-gray-500 to-slate-500'],
        ];
        
        return view('students.complaints.create', compact('classes', 'problemTypes'));
    }

    /**
     * Simpan laporan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'kelas' => 'required|string|max:100',
            'jenis' => 'required|in:akademik,sosial,karir,pribadi,darurat,lainnya',
            'deskripsi' => 'required|string|min:100|max:5000',
            'no_wa' => 'nullable|string|max:20',
        ]);

        $uniqueCode = 'CINTA-' . strtoupper(Str::random(8));
        $priority = $this->determinePriority($validated['jenis']);

        $complaint = Complaint::create([
            'unique_code' => $uniqueCode,
            'student_name' => $validated['nama_lengkap'],
            'student_email' => $validated['email'],
            'student_class' => $validated['kelas'],
            'phone_number' => $validated['no_wa'] ?? null,
            'counseling_type' => $validated['jenis'],
            'description' => $validated['deskripsi'],
            'status' => 'pending',
            'priority_level' => $priority,
        ]);

        // Kirim notifikasi
        $this->sendStudentConfirmation($complaint);
        $this->sendAdminNotification($complaint); // ke emailmu sendiri

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Ceritamu sudah kami terima! Cek email 📩',
                'unique_code' => $uniqueCode,
                'redirect' => route('complaint.track')
            ]);
        }

        return redirect()->route('complaint.track')
            ->with('success', 'Ceritamu berhasil dikirim! Kode rahasiamu: ' . $uniqueCode)
            ->with('code', $uniqueCode);
    }

    /**
     * Tentukan prioritas berdasarkan jenis
     */
    private function determinePriority($jenis)
    {
        return match($jenis) {
            'darurat' => 'urgent',
            'pribadi' => 'high',
            default => 'medium'
        };
    }

    /**
     * Halaman cek status (form input kode)
     */
    public function track()
    {
        return view('students.complaints.track');
    }

    /**
     * Proses pengecekan kode
     */
    public function check(Request $request)
    {
        $request->validate(['kode' => 'required|string']);
        
        $complaint = Complaint::where('unique_code', $request->kode)->first();
        
        if (!$complaint) {
            return back()->with('error', 'Kode tidak ditemukan. Silakan cek kembali.');
        }
        
        return view('students.complaints.result', compact('complaint'));
    }

    // =============== DASHBOARD GURU / ADMIN ===============

    /**
     * Daftar semua laporan (untuk guru/admin)
     */
    public function adminIndex()
    {
        $complaints = Complaint::latest()->paginate(20);
        return view('Teacher.complaints.index', compact('complaints'));
    }

    /**
     * Detail laporan (guru & publik)
     */
    public function adminShow($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('Teacher.complaints.show', compact('complaint'));
    }

    // Alias untuk kompatibilitas
    public function show($id)
    {
        return $this->adminShow($id);
    }

    /**
     * Update status laporan (dari halaman detail guru)
     */
    public function updateStatus(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->update(['status' => $request->status]);

        // Kirim notifikasi ke siswa
        $this->sendStatusUpdate($complaint);

        return back()->with('success', 'Status laporan berhasil diperbarui!');
    }

    // =============== NOTIFIKASI EMAIL ===============

    /**
     * Kirim konfirmasi ke siswa
     */
    private function sendStudentConfirmation($complaint)
    {
        try {
            Mail::send('emails.student', [
                'student_name' => $complaint->student_name,
                'unique_code' => $complaint->unique_code,
                'tracking_url' => route('complaint.track', ['code' => $complaint->unique_code]),
            ], function ($message) use ($complaint) {
                $message->to($complaint->student_email)
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                        ->subject('✨ Ceritamu Sudah Kami Terima!');
            });
        } catch (\Exception $e) {
            Log::error("Gagal kirim ke siswa: " . $e->getMessage());
        }
    }

    /**
     * Kirim notifikasi ke admin (email pribadimu)
     */
    private function sendAdminNotification($complaint)
    {
        try {
            // Ganti dengan emailmu yang sudah diverifikasi di Resend
            $adminEmail = env('ADMIN_EMAIL', 'rapelidemon@gmail.com');

            Mail::send('emails.admin-alert', [
                'complaint' => $complaint,
                'detail_url' => url('/admin/keluhan/' . $complaint->id),
            ], function ($message) use ($adminEmail, $complaint) {
                $message->to($adminEmail)
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                        ->subject('🚨 Laporan Baru: ' . $complaint->student_name);
            });
        } catch (\Exception $e) {
            Log::error("Gagal kirim ke admin: " . $e->getMessage());
        }
    }

    /**
     * Kirim notifikasi saat status berubah
     */
    private function sendStatusUpdate($complaint)
    {
        try {
            $statusText = match($complaint->status) {
                'completed' => 'Selesai ✅',
                'in_progress' => 'Sedang Diproses 🔄',
                'cancelled' => 'Dibatalkan ❌',
                default => ucfirst($complaint->status),
            };

            Mail::send('emails.status-update', [
                'student_name' => $complaint->student_name,
                'status_text' => $statusText,
                'unique_code' => $complaint->unique_code,
            ], function ($message) use ($complaint) {
                $message->to($complaint->student_email)
                        ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                        ->subject("🔄 Status Laporanmu: {$statusText}");
            });
        } catch (\Exception $e) {
            Log::error("Gagal kirim update status: " . $e->getMessage());
        }
    }
}