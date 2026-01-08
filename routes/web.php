<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestimonialController;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;


// ==================== PUBLIC ROUTES (UNTUK SISWA) ====================
// Homepage untuk siswa dengan testimonial - GUNAKAN index() BUKAN welcome()
Route::get('/', [HomeController::class, 'index'])->name('home');

// Form konseling untuk siswa (tanpa login) - HARUS DI ATAS
Route::prefix('konseling')->name('complaint.')->group(function () {
    Route::get('/buat', [ComplaintController::class, 'create'])->name('create');
    Route::post('/buat', [ComplaintController::class, 'store'])->name('store');
    Route::get('/cek', [ComplaintController::class, 'track'])->name('track'); 
    Route::post('/cek', [ComplaintController::class, 'check'])->name('check');
    Route::get('/hasil/{code}', [ComplaintController::class, 'showResult'])->name('result'); // TAMBAH INI
});

// Testimonial routes
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

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
    
    // Login routes
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
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
    
    // Login routes
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
});

Route::middleware(['auth'])->group(function () {
    
    // Dashboard guru
    Route::get('/dashboard', function () {
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Akses hanya untuk guru!');
        }
        
        $total = Complaint::count();
        $pending = Complaint::where('status', 'pending')->count();
        $in_progress = Complaint::where('status', 'in_progress')->count();
        $completed = Complaint::where('status', 'completed')->count();
        $cancelled = Complaint::where('status', 'cancelled')->count();
        
        $recentComplaints = Complaint::latest()->take(10)->get();
        
        $typeStats = Complaint::selectRaw('counseling_type, COUNT(*) as total')
            ->groupBy('counseling_type')
            ->orderBy('total', 'desc')
            ->get();
        
        $classStats = Complaint::selectRaw('student_class as kelas, COUNT(*) as total')
            ->groupBy('student_class')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();
        
        $monthlyStats = Complaint::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        
        return view('Teacher.dashboard.index', compact(
            'total', 'pending', 'in_progress', 'completed', 'cancelled',
            'recentComplaints', 'typeStats', 'classStats', 'monthlyStats'
        ));
    })->name('dashboard');
    
    // ==================== MANAJEMEN LAPORAN (GURU) ====================
    Route::prefix('laporan')->name('complaints.')->group(function () {
        Route::get('/', [ComplaintController::class, 'adminIndex'])->name('index');
        
        // PERBAIKAN: Tambahkan constraint angka
        Route::get('/{id}', [ComplaintController::class, 'show'])->name('show')->where('id', '[0-9]+');
        Route::put('/{id}/status', [ComplaintController::class, 'updateStatus'])->name('update.status')->where('id', '[0-9]+');
        Route::post('/{id}/note', [ComplaintController::class, 'addNote'])->name('add.note')->where('id', '[0-9]+');
        Route::delete('/{id}', [ComplaintController::class, 'destroy'])->name('destroy')->where('id', '[0-9]+');
    });
    
    // ==================== MANAJEMEN KELAS (GURU) ====================
    Route::prefix('kelas')->name('classes.')->group(function () {
        Route::get('/', [ClassController::class, 'index'])->name('index');
        Route::get('/tambah', [ClassController::class, 'create'])->name('create');
        Route::post('/', [ClassController::class, 'store'])->name('store');
        
        // Route yang lebih spesifik harus di atas route yang umum
        Route::get('/{id}/edit', [ClassController::class, 'edit'])->name('edit')->where('id', '[0-9]+');
        Route::get('/{id}', [ClassController::class, 'show'])->name('show')->where('id', '[0-9]+');
        Route::put('/{id}', [ClassController::class, 'update'])->name('update')->where('id', '[0-9]+');
        Route::delete('/{id}', [ClassController::class, 'destroy'])->name('destroy')->where('id', '[0-9]+');
    });
    
    // ==================== MANAJEMEN TESTIMONIAL (GURU) ====================
    Route::prefix('testimonials')->name('admin.testimonials.')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::get('/create', [TestimonialController::class, 'create'])->name('create');
        Route::post('/', [TestimonialController::class, 'adminStore'])->name('store');
        Route::get('/{id}/edit', [TestimonialController::class, 'edit'])->name('edit')->where('id', '[0-9]+');
        Route::put('/{id}', [TestimonialController::class, 'update'])->name('update')->where('id', '[0-9]+');
        Route::delete('/{id}', [TestimonialController::class, 'destroy'])->name('destroy')->where('id', '[0-9]+');
        Route::put('/{id}/toggle-approval', [TestimonialController::class, 'toggleApproval'])->name('toggle.approval')->where('id', '[0-9]+');
        Route::put('/{id}/toggle-homepage', [TestimonialController::class, 'toggleHomepage'])->name('toggle.homepage')->where('id', '[0-9]+');
    });
    
    // ==================== PROFIL GURU ====================
    Route::get('/profile', function () {
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Akses hanya untuk guru!');
        }
        
        $user = auth()->user();
        $assignedComplaints = Complaint::where('assigned_to', $user->id)
            ->orWhere('counselor_id', $user->id)
            ->latest()
            ->take(10)
            ->get();
            
        return view('profile.index', compact('user', 'assignedComplaints'));
    })->name('profile');
    
    // ==================== LOGOUT ====================
    Route::post('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});

// ==================== PAGES PUBLIK ====================
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/about', 'pages.about')->name('about');

// ==================== ERROR PAGES ====================
Route::fallback(function () {
    return view('errors.404');
});

// Auth routes dari Breeze (jika ada)
if (file_exists(__DIR__.'/auth.php')) {
    require __DIR__.'/auth.php';
}