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
// PERBAIKI web.php jadi seperti ini:

Route::prefix('konseling')->name('complaint.')->group(function () {
    Route::get('/buat', [ComplaintController::class, 'create'])->name('create');
    Route::post('/buat', [ComplaintController::class, 'store'])->name('store');
    Route::get('/cek', [ComplaintController::class, 'track'])->name('track'); 
    Route::post('/cek', [ComplaintController::class, 'check'])->name('check');
    // Route ini sudah ada di check method, tidak perlu route terpisah
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
    Route::post('/resend-otp', [OtpController::class, 'resendOtp'])->name('resend.otp');
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
// Route untuk testimoni
Route::get('/testimoni/{code}', [TestimonialController::class, 'create'])
    ->name('testimoni.create');

// Atau jika ingin sesuai dengan struktur folder:
Route::get('/Students/complaints/testimonial/{code}', [TestimonialController::class, 'create'])
    ->name('Students.complaints.testimonial');

    // routes/web.php

// Tambahkan route ini:
Route::post('/testimoni/store', [TestimonialController::class, 'store'])
    ->name('testimoni.store');


// routes/web.php
Route::get('/help', function () {
    return view('help');
})->name('help');

// ==================== EMAIL TESTING ROUTES ====================
Route::prefix('test')->group(function () {
    
    // Test Resend connection
    Route::get('/resend-connection', function() {
        try {
            $resend = new \Resend(env('RESEND_API_KEY'));
            $result = $resend->apiKeys->list();
            
            return response()->json([
                'success' => true,
                'message' => 'Resend connection successful',
                'api_key_status' => 'valid',
                'account_info' => 'Connected to Resend API'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Resend connection failed',
                'error' => $e->getMessage()
            ], 500);
        }
    });
    
    // Test send email to student
    Route::get('/email-student', function() {
        try {
            // Create dummy complaint
            $complaint = new \stdClass();
            $complaint->student_name = 'John Doe';
            $complaint->unique_code = 'CINTA-TEST123';
            $complaint->counseling_type = 'lainnya';
            $complaint->created_at = now();
            $complaint->tracking_link = route('complaint.track') . '?code=CINTA-TEST123';
            $complaint->student_email = env('RESEND_TEST_EMAIL', 'test@gmail.com');
            
            // Send email
            \Illuminate\Support\Facades\Mail::send('emails.student-confirmation', [
                'student_name' => $complaint->student_name,
                'unique_code' => $complaint->unique_code,
                'problem_type' => ucfirst($complaint->counseling_type),
                'submission_date' => $complaint->created_at->format('d F Y, H:i'),
                'tracking_link' => $complaint->tracking_link,
                'estimated_response' => '1-3 hari kerja',
                'counseling_type_detail' => 'Masalah lain yang tidak termasuk dalam kategori di atas',
            ], function($message) use ($complaint) {
                $message->to($complaint->student_email)
                        ->subject('✅ TEST: Konseling Diterima - ' . $complaint->unique_code);
            });
            
            return "✅ Test email to STUDENT sent! Check: " . $complaint->student_email;
            
        } catch (\Exception $e) {
            return "❌ Error: " . $e->getMessage() . "<br><pre>" . $e->getTraceAsString() . "</pre>";
        }
    });
    
    // Test send email to teacher
    Route::get('/email-teacher', function() {
        try {
            // Create dummy complaint
            $complaint = \App\Models\Complaint::first();
            
            if (!$complaint) {
                $complaint = \App\Models\Complaint::create([
                    'unique_code' => 'CINTA-TEST' . time(),
                    'student_name' => 'Test Student',
                    'student_email' => 'student@test.com',
                    'student_class' => 'XII IPA 1',
                    'phone_number' => '081234567890',
                    'counseling_type' => 'lainnya',
                    'description' => 'Ini adalah test email untuk kategori LAINNYA. Masalah yang dibahas adalah tentang spiritual dan ekonomi keluarga.',
                    'status' => 'pending',
                    'priority_level' => 'medium',
                    'urgency_level' => 3,
                ]);
            }
            
            // Send to test email
            \Illuminate\Support\Facades\Mail::send('emails.teacher-notification', [
                'complaint' => $complaint,
                'priority_badge' => '📋 LAINNYA',
                'urgency_level' => $complaint->urgency_level,
                'short_description' => \Illuminate\Support\Str::limit($complaint->description, 200),
                'student_contact' => $complaint->phone_number ? 'WA: ' . $complaint->phone_number : 'Hanya email',
                'action_link' => route('complaints.show', $complaint->id),
                'submission_time' => $complaint->created_at->diffForHumans(),
            ], function($message) use ($complaint) {
                $message->to(env('RESEND_TEST_EMAIL', 'test@gmail.com'))
                        ->subject('📋 TEST: Konsultasi Baru (Lainnya) - ' . $complaint->student_name);
            });
            
            return "✅ Test email to TEACHER sent! Check: " . env('RESEND_TEST_EMAIL');
            
        } catch (\Exception $e) {
            return "❌ Error: " . $e->getMessage();
        }
    });
    
    // Full system test
    Route::get('/full-system', function() {
        \Log::info('=== FULL SYSTEM TEST START ===');
        
        try {
            // Test 1: Database connection
            \DB::connection()->getPdo();
            echo "✅ Database: Connected<br>";
            
            // Test 2: Resend API
            $apiKey = env('RESEND_API_KEY');
            echo "✅ Resend API Key: " . (strlen($apiKey) > 10 ? 'Set' : 'Missing') . "<br>";
            
            // Test 3: Send test email
            Mail::raw('System test email at ' . now(), function($message) {
                $message->to(env('RESEND_TEST_EMAIL', 'test@gmail.com'))
                        ->subject('🔄 System Test - ' . now()->format('H:i:s'));
            });
            
            echo "✅ Test email: Sent<br>";
            
            // Test 4: Check complaint categories
            $types = ['akademik', 'sosial', 'karir', 'pribadi', 'darurat', 'lainnya'];
            echo "✅ Complaint types: " . implode(', ', $types) . "<br>";
            
            \Log::info('=== FULL SYSTEM TEST PASSED ===');
            
            return "<br>✅ All tests passed! System ready.";
            
        } catch (\Exception $e) {
            \Log::error('System test failed: ' . $e->getMessage());
            return "❌ System test failed: " . $e->getMessage();
        }
    });
});

// Kirim ulang OTP
Route::post('/register/otp/resend', [OtpController::class, 'resendOtp'])
    ->name('request.otp.resend');


