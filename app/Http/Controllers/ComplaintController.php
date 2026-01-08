<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function create()
    {
        // Ambil data kelas dari database - kolomnya 'nama_kelas'
        $classes = DB::table('classes')
            ->select('id', 'nama_kelas')
            ->orderBy('nama_kelas')
            ->get();
        
        return view('students.complaints.create', compact('classes'));
    }
    
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
    
    // Generate unique code
    $uniqueCode = 'CINTA-' . strtoupper(substr(md5(uniqid()), 0, 6));
    
    // Tentukan priority
    $priority = $this->determinePriority($validated['jenis']);
    
    // Simpan ke database
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
    
    // Jika AJAX request
    if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Cerita berhasil dikirim!',
            'unique_code' => $uniqueCode,
            'redirect' => route('complaint.track')
        ]);
    }
    
    // Redirect biasa
    return redirect()->route('complaint.track')
        ->with('success', 'Ceritamu berhasil dikirim! Kode rahasiamu: ' . $uniqueCode)
        ->with('code', $uniqueCode);
}

private function determinePriority($jenis)
{
    return match($jenis) {
        'darurat' => 'urgent',
        'pribadi' => 'high',
        default => 'medium'
    };
}
    
    public function track()
    {
        return view('students.complaints.track');
    }
    
    // app/Http/Controllers/ComplaintController.php

    public function check(Request $request)
    {
        $request->validate([
            'kode' => 'required|string',
        ]);
        
        // Gunakan 'unique_code' bukan 'kode'
        $complaint = Complaint::where('unique_code', $request->kode)->first();
        
        if (!$complaint) {
            return back()->with('error', 'Kode tidak ditemukan. Silakan cek kembali.');
        }
        
        return view('students.complaints.result', compact('complaint'));
    }

        public function adminIndex()
    {
        // Ambil semua laporan dengan pagination
        $complaints = Complaint::latest()->paginate(20);
        
        return view('Teacher.complaints.index', compact('complaints'));
    }

    // app/Http/Controllers/ComplaintController.php



public function adminShow($id)
{
    // Ambil data complaint berdasarkan ID
    $complaint = Complaint::findOrFail($id);
    
    // Tampilkan view detail untuk admin/guru
    return view('Teacher.complaints.show', compact('complaint'));
}
public function show($id)
    {
        // Ambil data complaint berdasarkan ID
        $complaint = Complaint::findOrFail($id);
        
        // Tampilkan view detail untuk admin/guru
        return view('Teacher.complaints.show', compact('complaint'));
    }
}