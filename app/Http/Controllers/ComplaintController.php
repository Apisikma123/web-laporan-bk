<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Kelas; // Ganti SchoolClass dengan Kelas
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    // ==================== UNTUK SISWA (PUBLIC) ====================
    
    /**
     * Form buat laporan konseling (untuk siswa)
     */
    public function create()
    {
        // Ambil data kelas untuk dropdown
        $classes = Kelas::orderBy('nama_kelas')->get();
        
        return view('complaints.create', compact('classes'));
    }

    /**
     * Simpan laporan konseling (untuk siswa)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:100',
            'student_email' => 'required|email|max:100',
            'student_class' => 'required|string|max:20',
            'complaint_type' => 'required|string|max:50',
            'description' => 'required|string|min:100|max:2000',
        ]);

        $priority = $this->determinePriority($validated['complaint_type']);
        
        $complaint = Complaint::create([
            'unique_code' => 'BK-' . Str::upper(Str::random(8)),
            'student_name' => $validated['student_name'],
            'student_email' => $validated['student_email'],
            'student_class' => $validated['student_class'],
            'counseling_type' => $validated['complaint_type'],
            'description' => $validated['description'],
            'status' => 'pending',
            'priority_level' => $priority,
        ]);

        return redirect()->route('complaint.show', $complaint->unique_code)
            ->with('success', 'Laporan konseling berhasil dikirim! Kode tracking: ' . $complaint->unique_code);
    }

    /**
     * Cek status laporan (untuk siswa)
     */
    public function track()
    {
        return view('complaints.track');
    }

    public function check(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:11|regex:/^BK-[A-Z0-9]{8}$/',
        ]);
        
        $complaint = Complaint::where('unique_code', $request->code)->first();
        
        if (!$complaint) {
            return back()->with('error', 'Kode tidak ditemukan. Periksa kembali kode Anda.');
        }
        
        return redirect()->route('complaint.show', $complaint->unique_code);
    }

    /**
     * Lihat detail laporan (untuk siswa)
     */
    public function show($code)
    {
        $complaint = Complaint::where('unique_code', $code)->firstOrFail();
        
        return view('complaints.show-public', compact('complaint'));
    }

    // ==================== UNTUK GURU (PROTECTED) ====================
    
    /**
     * Daftar semua laporan (untuk guru)
     */
    public function index()
    {
        $complaints = Complaint::latest()->paginate(15);
        
        return view('complaints.index', compact('complaints'));
    }

    /**
     * Lihat detail laporan lengkap (untuk guru)
     */
    public function showReport($id)
    {
        $complaint = Complaint::findOrFail($id);
        
        return view('complaints.show-teacher', compact('complaint'));
    }

    /**
     * Update status laporan (untuk guru)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processed,resolved',
            'notes' => 'nullable|string|max:1000',
        ]);
        
        $complaint = Complaint::findOrFail($id);
        $complaint->update([
            'status' => $request->status,
            'admin_notes' => $request->notes,
            'processed_by' => auth()->id(),
            'processed_at' => now(),
        ]);
        
        return back()->with('success', 'Status laporan berhasil diperbarui!');
    }

    // ==================== HELPER FUNCTION ====================
    
    private function determinePriority($type)
    {
        $highPriority = ['darurat', 'bullying', 'kecemasan_berat'];
        $mediumPriority = ['keluarga', 'kecemasan', 'pertemanan'];
        
        if (in_array($type, $highPriority)) return 'high';
        if (in_array($type, $mediumPriority)) return 'medium';
        return 'low';
    }
}