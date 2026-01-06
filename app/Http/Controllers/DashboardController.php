<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data statistik untuk dashboard
        $totalComplaints = Complaint::count();
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalClasses = ClassModel::count();
        $recentComplaints = Complaint::latest()->take(5)->get();
        
        return view('dashboard', [
            'total' => $totalComplaints, // atau $totalTeachers terg kebutuhan
            'totalComplaints' => $totalComplaints,
            'totalTeachers' => $totalTeachers,
            'totalClasses' => $totalClasses,
            'recentComplaints' => $recentComplaints,
        ]);
    }
}