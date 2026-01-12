<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Resend;

class OtpController extends Controller
{
    public function showRequestOtpForm()
    {
        return view('auth.request-otp');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        if (User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'Email ini sudah terdaftar.']);
        }

        try {
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $expiresAt = now()->addMinutes(3);

            OtpCode::updateOrCreate(
                ['email' => $request->email],
                [
                    'otp_code' => Hash::make($otp),
                    'expires_at' => $expiresAt,
                    'is_used' => false,
                ]
            );

            $this->sendOtpEmail($request->email, $otp);

            session([
                'otp_email' => $request->email,
                'otp_sent_at' => now()->timestamp,
            ]);

            return redirect()->route('verify.otp.form')
                ->with('show_cooldown', true);
        } catch (\Exception $e) {
            Log::error('OTP Send Error: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Gagal mengirim OTP.']);
        }
    }

    public function showVerifyOtpForm()
    {
        if (!session('otp_email')) {
            return redirect()->route('request.otp.form');
        }

        return view('auth.verify-otp', [
            'email' => session('otp_email'),
            'show_cooldown' => session('show_cooldown', false),
        ]);
    }

    public function verifyOtp(Request $request)
{
    $request->validate(['otp' => 'required|digits:6']);
    
    $email = session('otp_email');
    $otpRecord = OtpCode::where('email', $email)
        ->where('is_used', false)
        ->where('expires_at', '>', now())
        ->first();
    
    if (!$otpRecord || !Hash::check($request->otp, $otpRecord->otp_code)) {
        return back()->withErrors(['otp' => 'Kode OTP salah atau kadaluarsa.']);
    }
    
    $otpRecord->update(['is_used' => true]);
    session(['verified_email' => $email]);
    session()->forget(['otp_email', 'show_cooldown']);
    
    return redirect()->route('register.teacher.form');
}

    public function resendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        if (User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'Email sudah terdaftar.']);
        }

        $sentAt = session('otp_sent_at');
        if ($sentAt && (now()->timestamp - $sentAt) < 60) {
            return back()->withErrors(['email' => 'Tunggu 1 menit sebelum kirim ulang.']);
        }

        try {
            $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $expiresAt = now()->addMinutes(3);

            OtpCode::updateOrCreate(
                ['email' => $request->email],
                [
                    'otp_code' => Hash::make($otp),
                    'expires_at' => $expiresAt,
                    'is_used' => false,
                ]
            );

            $this->sendOtpEmail($request->email, $otp);

            session([
                'otp_email' => $request->email,
                'otp_sent_at' => now()->timestamp,
            ]);

            return redirect()->route('verify.otp.form')
                ->with('show_cooldown', true);
        } catch (\Exception $e) {
            Log::error('Resend OTP Error: ' . $e->getMessage());
            return back()->withErrors(['email' => 'Gagal mengirim ulang OTP.']);
        }
    }

    private function sendOtpEmail(string $email, string $otp)
    {
        $resend = Resend::client(env('RESEND_API_KEY'));
        $resend->emails->send([
            'from' => env('RESEND_FROM_EMAIL'),
            'to' => $email,
            'subject' => '🔐 Kode Verifikasi OTP - CINTA',
            'html' => view('emails.otp', compact('otp'))->render(),
        ]);
    }

    public function showRegisterTeacherForm()
    {
        if (!session('verified_email')) {
            return redirect()->route('request.otp.form');
        }
        return view('auth.register-teacher', ['email' => session('verified_email')]);
    }

    public function registerTeacher(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'teacher_id' => 'required|string|unique:users,teacher_id',
            'subject' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => session('verified_email'),
            'password' => Hash::make($request->password),
            'teacher_id' => $request->teacher_id,
            'subject' => $request->subject,
            'role' => 'teacher',
        ]);

        auth()->login($user);
        session()->forget(['verified_email']);

        return redirect()->route('dashboard');
    }
}