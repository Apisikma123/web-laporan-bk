<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\OtpController;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

// ==================== PUBLIC ROUTES (UNTUK SISWA) ====================
// Homepage untuk siswa
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Form konseling untuk siswa (tanpa login)
Route::prefix('konseling')->name('complaint.')->group(function () {
    Route::get('/buat', [ComplaintController::class, 'create'])->name('create');
    Route::post('/buat', [ComplaintController::class, 'store'])->name('store');
    Route::get('/cek', [ComplaintController::class, 'track'])->name('track');
    Route::post('/cek', [ComplaintController::class, 'check'])->name('check');
    Route::get('/detail/{code}', [ComplaintController::class, 'show'])->name('show');
});

// ==================== PROTECTED ROUTES (UNTUK GURU) ====================
Route::middleware(['auth'])->group(function () {
    // Cek role guru
    Route::middleware(['check.role:teacher'])->group(function () {
        
        // Dashboard guru
        Route::get('/dashboard', function () {
            // ==================== DATA STATISTIK UTAMA ====================
            $total = Complaint::count();
            $pending = Complaint::where('status', 'pending')->count();
            $processed = Complaint::where('status', 'processed')->count();
            $resolved = Complaint::where('status', 'resolved')->count();
            
            // ==================== LAPORAN TERBARU ====================
            $recentComplaints = Complaint::latest()
                ->take(10)
                ->get();
            
            // ==================== STATISTIK PRIORITAS ====================
            $priorityStats = ['high' => 0, 'medium' => 0, 'low' => 0];
            
            if (Schema::hasColumn('complaints', 'priority_level')) {
                $priorityStats = [
                    'high' => Complaint::where('priority_level', 'high')->count(),
                    'medium' => Complaint::where('priority_level', 'medium')->count(),
                    'low' => Complaint::where('priority_level', 'low')->count(),
                ];
            }
            
            // ==================== STATISTIK JENIS MASALAH ====================
            $typeStats = collect([]);
            
            if (Schema::hasColumn('complaints', 'counseling_type')) {
                $typeStats = Complaint::selectRaw('counseling_type, COUNT(*) as total')
                    ->groupBy('counseling_type')
                    ->orderBy('total', 'desc')
                    ->get();
            }
            
            return view('dashboard', compact(
                'total', 'pending', 'processed', 'resolved',
                'recentComplaints', 'priorityStats', 'typeStats'
            ));
        })->name('dashboard');
        
        // ==================== MANAJEMEN LAPORAN (GURU) ====================
        Route::prefix('laporan')->name('complaints.')->group(function () {
            Route::get('/', [ComplaintController::class, 'index'])->name('index');
            // Route untuk detail, update status, dll bisa ditambahkan di sini
            Route::get('/{id}', [ComplaintController::class, 'showReport'])->name('show'); // Untuk guru
            Route::put('/{id}/status', [ComplaintController::class, 'updateStatus'])->name('update.status');
        });
        
        // ==================== MANAJEMEN KELAS (GURU) ====================
        Route::prefix('kelas')->name('classes.')->group(function () {
            Route::get('/', [ClassController::class, 'index'])->name('index');
            Route::get('/tambah', [ClassController::class, 'create'])->name('create');
            Route::post('/', [ClassController::class, 'store'])->name('store');
            Route::get('/{id}', [ClassController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [ClassController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ClassController::class, 'update'])->name('update');
            Route::delete('/{id}', [ClassController::class, 'destroy'])->name('destroy');
        });
        
        // ==================== MANAJEMEN GURU (ADMIN) ====================
        // Route::resource('teachers', TeacherController::class);
    });
});

// ==================== AUTH ROUTES ====================
// Routes untuk OTP dan registrasi guru
Route::middleware('guest')->group(function () {
    // Request OTP
    Route::get('/register/teacher/request-otp', [OtpController::class, 'showRequestOtpForm'])->name('request.otp.form');
    Route::post('/register/teacher/send-otp', [OtpController::class, 'sendOtp'])->name('send.otp');
    
    // Verify OTP
    Route::get('/register/teacher/verify-otp', [OtpController::class, 'showVerifyOtpForm'])->name('verify.otp.form');
    Route::post('/register/teacher/verify-otp', [OtpController::class, 'verifyOtp'])->name('verify.otp');
    
    // Register Teacher
    Route::get('/register/teacher', [OtpController::class, 'showRegisterTeacherForm'])->name('register.teacher.form');
    Route::post('/register/teacher', [OtpController::class, 'registerTeacher'])->name('register.teacher');
});

// Routes untuk pages publik
Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');

// Auth routes dari Breeze
require __DIR__.'/auth.php';