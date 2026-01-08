<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Complaint; // Sesuaikan dengan nama model complaints Anda
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 testimoni terbaru yang sudah disetujui
        $testimonials = Testimonial::approved()
            ->latestFirst()
            ->take(3)
            ->get();
        
        // Hitung total complaints (sesuaikan dengan model Anda)
        $totalComplaints = Complaint::count();
        
        // Hitung total siswa unik yang membuat complaint
        $totalStudents = Complaint::distinct('student_email')->count();
        
        return view('home', [
            'testimonials' => $testimonials,
            'totalComplaints' => $totalComplaints,
            'totalStudents' => $totalStudents,
        ]);
    }
}