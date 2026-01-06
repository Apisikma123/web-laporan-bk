<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class OtpController extends Controller
{
    // Tampilkan form request OTP
    public function showRequestOtpForm()
    {
        return view('auth.request-otp');
    }

    // Generate dan kirim OTP
public function sendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users,email'
    ]);

    try {
        // Generate OTP 6 digit
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiresAt = now()->addMinutes(15);

        // Hapus OTP lama
        OtpCode::where('email', $request->email)->delete();

        // Simpan OTP baru
        OtpCode::create([
            'email' => $request->email,
            'otp_code' => Hash::make($otp),
            'expires_at' => $expiresAt,
            'is_used' => false
        ]);

        // KIRIM EMAIL DENGAN MAILPIT
        try {
            Mail::to($request->email)->send(new \App\Mail\SendOtpMail($otp));
            
            // Simpan session
            session([
                'otp_email' => $request->email,
                'otp_expires_at' => $expiresAt
            ]);

            return redirect()->route('verify.otp.form')
                ->with('success', 'Kode OTP telah dikirim ke email Anda!')
                ->with('mail_info', 'Cek Mailpit di: http://localhost:8025');

        } catch (\Exception $e) {
            // Jika email gagal, gunakan mode debug
            \Log::error('Email error: ' . $e->getMessage());
            
            session([
                'otp_email' => $request->email,
                'otp_code_debug' => $otp,
                'otp_expires_at' => $expiresAt
            ]);

            return redirect()->route('verify.otp.form')
                ->with('warning', 'Email sedang bermasalah. Gunakan OTP ini: ' . $otp)
                ->with('otp_debug', $otp);
        }

    } catch (\Exception $e) {
        \Log::error('OTP Error: ' . $e->getMessage());
        return back()->withErrors(['email' => 'Terjadi kesalahan. Silakan coba lagi.']);
    }
}

    // Tampilkan form verifikasi OTP
    public function showVerifyOtpForm()
    {
        if (!session('otp_email')) {
            return redirect()->route('request.otp.form')
                ->with('error', 'Silakan request OTP terlebih dahulu.');
        }

        return view('auth.verify-otp', [
            'email' => session('otp_email'),
            'otp_debug' => session('otp_code_debug'),
            'expires_at' => session('otp_expires_at')
        ]);
    }

    // Verifikasi OTP dan buat akun
    public function verifyOtp(Request $request)
{
    // Jika pakai input array (dari 6 kotak)
    if ($request->has('otp') && is_array($request->otp)) {
        $otpCode = implode('', $request->otp);
    } else {
        $otpCode = $request->otp;
    }

    $request->merge(['otp' => $otpCode]);

    $request->validate([
        'otp' => 'required|digits:6'
    ]);

    $email = session('otp_email');
    
    if (!$email) {
        return redirect()->route('request.otp.form')
            ->with('error', 'Sesi telah berakhir. Silakan request OTP lagi.');
    }

    // CARI OTP YANG BENAR
    $otpRecord = OtpCode::where('email', $email)
        ->where('is_used', false)
        ->where('expires_at', '>', now())
        ->first();

    if (!$otpRecord) {
        return back()->withErrors(['otp' => 'OTP tidak ditemukan atau sudah kadaluarsa.']);
    }

    // VERIFIKASI OTP (Hash::check)
    if (!Hash::check($request->otp, $otpRecord->otp_code)) {
        // Coba juga dengan OTP debug dari session (jika ada)
        $debugOtp = session('otp_code_debug');
        
        if ($debugOtp && $request->otp === $debugOtp) {
            // Jika OTP debug cocok, lanjutkan
            $otpRecord->update(['is_used' => true]);
            session(['verified_email' => $email]);
            return redirect()->route('register.teacher.form');
        }
        
        return back()->withErrors(['otp' => 'Kode OTP salah.']);
    }

    // OTP valid
    $otpRecord->update(['is_used' => true]);
    session(['verified_email' => $email]);

    return redirect()->route('register.teacher.form')
        ->with('success', 'OTP berhasil diverifikasi!');
}

    // Tampilkan form registrasi guru setelah OTP verified
    public function showRegisterTeacherForm()
    {
        if (!session('verified_email')) {
            return redirect()->route('request.otp.form')
                ->with('error', 'Silakan verifikasi OTP terlebih dahulu.');
        }

        return view('auth.register-teacher', [
            'email' => session('verified_email')
        ]);
    }

    // Proses registrasi guru
    public function registerTeacher(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'teacher_id' => 'required|string|unique:users,teacher_id',
            'subject' => 'required|string'
        ]);

        try {
            // Buat user guru
            $user = User::create([
                'name' => $request->name,
                'email' => session('verified_email'),
                'password' => Hash::make($request->password),
                'teacher_id' => $request->teacher_id,
                'subject' => $request->subject,
                'role' => 'teacher',
            ]);

            // Hapus session
            session()->forget(['otp_email', 'verified_email', 'otp_code_debug', 'otp_expires_at']);

            // Login otomatis
            auth()->login($user);

            return redirect()->route('dashboard')
                ->with('success', 'Registrasi berhasil! Selamat datang di dashboard CINTA.');

        } catch (\Exception $e) {
            Log::error('Registration Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Registrasi gagal. Silakan coba lagi.']);
        }
    }
}