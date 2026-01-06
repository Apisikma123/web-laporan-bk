@extends('layouts.otp-registration')

@section('title', 'Verifikasi OTP - CINTA')
@section('step-title', 'Verifikasi Kode OTP')
@section('step-description', 'Masukkan 6 digit kode verifikasi')
@section('step-number', '2')
@section('step-info', 'Step 2 dari 3: Verifikasi kode')

@php
    $debugOtp = session('otp_code_debug');
@endphp

@section('content')
<form method="POST" action="{{ route('verify.otp') }}" class="space-y-8">
    @csrf

    <!-- Email Info -->
    <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl border border-purple-100 p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-100 to-pink-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm text-gray-600">Email Terdaftar</p>
                <p class="text-lg font-semibold text-gray-900">{{ session('otp_email') }}</p>
            </div>
        </div>
    </div>

    <!-- Debug OTP Display (for testing) -->
    @if($debugOtp)
    <div class="bg-gradient-to-r from-emerald-50 to-green-50 rounded-2xl border border-emerald-200 p-6 animate-pulse">
        <div class="flex items-center">
            <div class="flex-shrink-0 bg-emerald-100 p-3 rounded-xl">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-semibold text-emerald-900">Kode OTP untuk Testing</h3>
                <div class="mt-3">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-emerald-700 tracking-widest mb-2">
                            {{ $debugOtp }}
                        </div>
                        <p class="text-sm text-emerald-600">Gunakan kode di atas untuk melanjutkan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- OTP Input -->
    <div>
        <label for="otp" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
            </svg>
            6 Digit Kode OTP
        </label>
        
        <div class="flex justify-center space-x-4">
            @for($i = 0; $i < 6; $i++)
            <input type="text" 
                   name="otp[]" 
                   maxlength="1" 
                   data-index="{{ $i }}"
                   class="otp-input w-16 h-16 text-3xl text-center font-bold 
                          border-2 border-gray-300 rounded-xl 
                          focus:border-purple-500 focus:ring-4 focus:ring-purple-100 
                          focus:outline-none transition duration-200
                          hover:border-purple-300 bg-white"
                   oninput="moveToNext(this)"
                   onkeydown="handleBackspace(this, event)">
            @endfor
        </div>
        
        <!-- Hidden field for complete OTP -->
        <input type="hidden" name="otp_complete" id="otpComplete">
        
        <p class="mt-4 text-sm text-gray-500 text-center">
            <svg class="w-4 h-4 inline-block mr-1 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
            </svg>
            Kode OTP berlaku 15 menit
        </p>
    </div>

    <!-- Timer Display -->
    <div class="text-center">
        <div class="inline-flex items-center bg-gradient-to-r from-amber-50 to-yellow-50 px-6 py-3 rounded-xl">
            <svg class="w-5 h-5 text-amber-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span id="timer" class="text-lg font-bold text-amber-700">15:00</span>
            <span class="ml-2 text-amber-600">detik tersisa</span>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="pt-4">
        <button type="submit" onclick="collectOTP()"
                class="group relative w-full flex justify-center items-center py-5 px-6 
                       text-lg font-bold text-white bg-gradient-to-r from-purple-600 to-purple-700 
                       hover:from-purple-700 hover:to-purple-800 rounded-xl
                       focus:outline-none focus:ring-4 focus:ring-purple-300 
                       shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                       transition-all duration-300">
            <span class="absolute left-0 inset-y-0 flex items-center pl-6">
                <svg class="h-6 w-6 text-purple-200 group-hover:text-white transition duration-200" 
                     fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            </span>
            Verifikasi & Lanjutkan
            <svg class="ml-3 h-5 w-5 group-hover:translate-x-2 transition-transform duration-200" 
                 fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div>
</form>

{{-- Di bagian setelah form --}}
<script>
// Auto-fill OTP jika ada OTP debug
document.addEventListener('DOMContentLoaded', function() {
    const debugOtp = "{{ session('otp_code_debug') }}";
    
    if (debugOtp && debugOtp.length === 6) {
        // Auto-fill OTP inputs
        for (let i = 0; i < 6; i++) {
            const input = document.querySelector(`.otp-input[data-index="${i}"]`);
            if (input) {
                input.value = debugOtp[i];
            }
        }
        
        // Auto-submit setelah 1 detik
        setTimeout(() => {
            collectOTP();
            document.querySelector('button[type="submit"]').click();
        }, 1000);
    }
});

// Function untuk collect OTP dari input boxes
function collectOTP() {
    const otpInputs = document.querySelectorAll('.otp-input');
    let otp = '';
    otpInputs.forEach(input => {
        otp += input.value;
    });
    
    // Update hidden input
    document.getElementById('otpComplete').value = otp;
    
    // Log untuk debugging
    console.log('OTP Collected:', otp);
    
    return otp;
}

// Update form submission
document.querySelector('form').addEventListener('submit', function(e) {
    const otp = collectOTP();
    
    if (otp.length !== 6) {
        e.preventDefault();
        alert('Harap masukkan 6 digit OTP');
        return false;
    }
    
    // Tambahkan hidden input untuk otp_complete
    if (!document.getElementById('otpComplete')) {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'otp_complete';
        hiddenInput.id = 'otpComplete';
        hiddenInput.value = otp;
        this.appendChild(hiddenInput);
    }
});
</script>

<!-- OTP JavaScript -->
<script>
let timeLeft = 15 * 60; // 15 minutes in seconds
const timerElement = document.getElementById('timer');

function updateTimer() {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    
    if (timeLeft > 0) {
        timeLeft--;
        setTimeout(updateTimer, 1000);
    } else {
        timerElement.textContent = "00:00";
        timerElement.parentElement.classList.remove('from-amber-50', 'to-yellow-50');
        timerElement.parentElement.classList.add('from-red-50', 'to-pink-50');
        timerElement.classList.remove('text-amber-700');
        timerElement.classList.add('text-red-700');
    }
}

function moveToNext(input) {
    const value = input.value;
    if (value.length === 1) {
        const nextIndex = parseInt(input.dataset.index) + 1;
        const nextInput = document.querySelector(`.otp-input[data-index="${nextIndex}"]`);
        if (nextInput) {
            nextInput.focus();
        }
    }
    collectOTP();
}

function handleBackspace(input, event) {
    if (event.key === 'Backspace' && input.value === '') {
        const prevIndex = parseInt(input.dataset.index) - 1;
        const prevInput = document.querySelector(`.otp-input[data-index="${prevIndex}"]`);
        if (prevInput) {
            prevInput.focus();
        }
    }
}

function collectOTP() {
    const otpInputs = document.querySelectorAll('.otp-input');
    let otp = '';
    otpInputs.forEach(input => {
        otp += input.value;
    });
    document.getElementById('otpComplete').value = otp;
    
    // Auto-submit when OTP is complete
    if (otp.length === 6) {
        document.querySelector('button[type="submit"]').click();
    }
}

// Initialize timer
updateTimer();

// Auto-focus first OTP input
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.otp-input[data-index="0"]').focus();
});
</script>
@endsection

@section('back-button')
<a href="{{ route('request.otp.form') }}" 
   class="inline-flex items-center text-gray-600 hover:text-gray-900 font-medium group transition duration-200">
    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" 
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
    Kembali ke Request OTP
</a>
@endsection