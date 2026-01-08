<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Public view untuk siswa
    public function index()
    {
        $testimonials = Testimonial::where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        
        return view('testimonials.index', compact('testimonials'));
    }
    
    // Store testimonial dari siswa
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_class' => 'nullable|string|max:50',
            'message' => 'required|string|min:20|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        
        Testimonial::create([
            'student_name' => $request->student_name,
            'student_class' => $request->student_class,
            'message' => $request->message,
            'rating' => $request->rating,
            'is_approved' => false, // Menunggu persetujuan admin
            'show_in_homepage' => true,
        ]);
        
        return redirect()->back()
            ->with('success', 'Terima kasih! Testimoni Anda telah dikirim dan menunggu persetujuan admin.');
    }
    
    // Admin methods
    public function adminIndex()
    {
        $testimonials = Testimonial::latest()->paginate(20);
        return view('admin.testimonials.index', compact('testimonials'));
    }
    
    public function create()
    {
        return view('admin.testimonials.create');
    }
    
    public function adminStore(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_class' => 'nullable|string|max:50',
            'message' => 'required|string|min:20|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        
        Testimonial::create([
            'student_name' => $request->student_name,
            'student_class' => $request->student_class,
            'message' => $request->message,
            'rating' => $request->rating,
            'is_approved' => $request->has('is_approved'),
            'show_in_homepage' => $request->has('show_in_homepage'),
        ]);
        
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }
    
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $request->validate([
            'student_name' => 'required|string|max:255',
            'student_class' => 'nullable|string|max:50',
            'message' => 'required|string|min:20|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);
        
        $testimonial->update([
            'student_name' => $request->student_name,
            'student_class' => $request->student_class,
            'message' => $request->message,
            'rating' => $request->rating,
            'is_approved' => $request->has('is_approved'),
            'show_in_homepage' => $request->has('show_in_homepage'),
        ]);
        
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial berhasil dihapus.');
    }
    
    public function toggleApproval($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update([
            'is_approved' => !$testimonial->is_approved,
        ]);
        
        $status = $testimonial->is_approved ? 'disetujui' : 'tidak disetujui';
        return redirect()->back()
            ->with('success', "Testimonial berhasil $status.");
    }
    
    public function toggleHomepage($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update([
            'show_in_homepage' => !$testimonial->show_in_homepage,
        ]);
        
        $status = $testimonial->show_in_homepage ? 'ditampilkan' : 'disembunyikan';
        return redirect()->back()
            ->with('success', "Testimonial berhasil $status di homepage.");
    }
}