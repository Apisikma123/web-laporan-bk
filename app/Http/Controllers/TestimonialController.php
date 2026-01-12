<?php
// app/Http\Controllers/TestimonialController.php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function create($code)
    {
        // Cari complaint berdasarkan kode dan pastikan status completed
        $complaint = Complaint::where('unique_code', $code)
            ->where('status', 'completed')
            ->firstOrFail();
        
        // PERBAIKAN INI: Ganti 'admin.testimonials.create' dengan 'Students.complaints.testimoni'
        return view('Students.complaints.testimonial', compact('complaint'));
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'complaint_id' => 'required|exists:complaints,id',
            'rating' => 'required|integer|min:1|max:5',
            'testimonial' => 'required|string|min:10|max:1000',
            'is_anonymous' => 'boolean',
        ]);
        
        // Cari complaint untuk mendapatkan data student
        $complaint = Complaint::findOrFail($validated['complaint_id']);
        
        // Simpan testimoni
        $testimonial = Testimonial::create([
            'complaint_id' => $validated['complaint_id'],
            'unique_code' => 'TESTI-' . strtoupper(substr(md5(uniqid()), 0, 8)),
            'student_name' => $validated['is_anonymous'] ? 'Anonim' : $complaint->student_name,
            'student_class' => $complaint->student_class,
            'rating' => $validated['rating'],
            'testimonial' => $validated['testimonial'],
            'is_approved' => false,
            'is_anonymous' => $validated['is_anonymous'] ?? false,
        ]);
        
        return redirect()->route('Students.complaint.track')
            ->with('success', 'Testimoni berhasil dikirim! Terima kasih atas masukan Anda.');
    }
}