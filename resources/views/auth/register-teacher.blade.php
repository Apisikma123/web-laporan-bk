@extends('layouts.otp-registration')

@section('title', 'Lengkapi Data - CINTA')
@section('step-title', 'Data Diri Guru')
@section('step-description', 'Lengkapi informasi akun Anda')
@section('step-number', '3')
@section('step-info', 'Step 3 dari 3: Lengkapi data')

@php
    $email = session('verified_email');
@endphp

@section('content')
<form method="POST" action="{{ route('register.teacher') }}" class="space-y-4 sm:space-y-6 md:space-y-8">
    @csrf

    <!-- Email Verified Info - Responsive -->
    <div class="bg-gradient-to-r from-emerald-50 to-green-50 rounded-xl sm:rounded-2xl border border-emerald-200 p-4 sm:p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full bg-gradient-to-r from-emerald-100 to-green-100 flex items-center justify-center">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="ml-3 sm:ml-4">
                <p class="text-xs sm:text-sm text-gray-600">Email Terverifikasi</p>
                <p class="text-base sm:text-lg font-semibold text-gray-900 break-all">{{ $email }}</p>
            </div>
        </div>
    </div>

    <!-- Form Grid - Responsive -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        <!-- Left Column -->
        <div class="space-y-4 sm:space-y-6">
            <!-- Nama Lengkap -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Nama Lengkap
                </label>
                <div class="relative group">
                    <input id="name" name="name" type="text" required
                           class="block w-full pl-10 sm:pl-12 pr-4 py-3 sm:py-4 text-sm sm:text-base border-2 border-gray-200 rounded-lg sm:rounded-xl 
                                  bg-white focus:border-purple-500 focus:ring-2 sm:focus:ring-4 focus:ring-purple-100 
                                  focus:outline-none transition duration-200 placeholder-gray-400
                                  hover:border-purple-300"
                           placeholder="Nama sesuai ijazah"
                           value="{{ old('name') }}">
                    <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400 group-hover:text-purple-500 transition duration-200" 
                             fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- NIP / ID Guru -->
            <div>
                <label for="teacher_id" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                    </svg>
                    NIP / ID Guru
                </label>
                <div class="relative group">
                    <input id="teacher_id" name="teacher_id" type="text" required
                           class="block w-full pl-10 sm:pl-12 pr-4 py-3 sm:py-4 text-sm sm:text-base border-2 border-gray-200 rounded-lg sm:rounded-xl 
                                  bg-white focus:border-purple-500 focus:ring-2 sm:focus:ring-4 focus:ring-purple-100 
                                  focus:outline-none transition duration-200 placeholder-gray-400
                                  hover:border-purple-300"
                           placeholder="Contoh: 1987654321"
                           value="{{ old('teacher_id') }}">
                    <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400 group-hover:text-purple-500 transition duration-200" 
                             fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <p class="mt-2 text-xs sm:text-sm text-gray-500">Gunakan NIP resmi atau ID sekolah</p>
            </div>

            <!-- Mata Pelajaran -->
            <div>
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Mata Pelajaran
                </label>
                <div class="relative group">
                    <input id="subject" name="subject" type="text" required
                           class="block w-full pl-10 sm:pl-12 pr-4 py-3 sm:py-4 text-sm sm:text-base border-2 border-gray-200 rounded-lg sm:rounded-xl 
                                  bg-white focus:border-purple-500 focus:ring-2 sm:focus:ring-4 focus:ring-purple-100 
                                  focus:outline-none transition duration-200 placeholder-gray-400
                                  hover:border-purple-300"
                           placeholder="Contoh: Matematika"
                           value="{{ old('subject') }}">
                    <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400 group-hover:text-purple-500 transition duration-200" 
                             fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-4 sm:space-y-6">
            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    Password
                </label>
                <div class="relative group">
                    <input id="password" name="password" type="password" required
                           class="block w-full pl-10 sm:pl-12 pr-10 sm:pr-12 py-3 sm:py-4 text-sm sm:text-base border-2 border-gray-200 rounded-lg sm:rounded-xl 
                                  bg-white focus:border-purple-500 focus:ring-2 sm:focus:ring-4 focus:ring-purple-100 
                                  focus:outline-none transition duration-200 placeholder-gray-400
                                  hover:border-purple-300"
                           placeholder="Minimal 8 karakter">
                    <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400 group-hover:text-purple-500 transition duration-200" 
                             fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="absolute inset-y-0 right-0 pr-3 sm:pr-4 flex items-center">
                        <button type="button" onclick="togglePassword('password')" 
                                class="text-gray-400 hover:text-purple-500 transition duration-200">
                            <svg id="eye-password" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-3 space-y-1 sm:space-y-2">
                    <div class="flex items-center">
                        <div id="length-check" class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-gray-200 mr-2"></div>
                        <span class="text-xs text-gray-500">Minimal 8 karakter</span>
                    </div>
                </div>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Konfirmasi Password
                </label>
                <div class="relative group">
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                           class="block w-full pl-10 sm:pl-12 pr-10 sm:pr-12 py-3 sm:py-4 text-sm sm:text-base border-2 border-gray-200 rounded-lg sm:rounded-xl 
                                  bg-white focus:border-purple-500 focus:ring-2 sm:focus:ring-4 focus:ring-purple-100 
                                  focus:outline-none transition duration-200 placeholder-gray-400
                                  hover:border-purple-300"
                           placeholder="Ulangi password">
                    <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400 group-hover:text-purple-500 transition duration-200" 
                             fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="absolute inset-y-0 right-0 pr-3 sm:pr-4 flex items-center">
                        <button type="button" onclick="togglePassword('password_confirmation')" 
                                class="text-gray-400 hover:text-purple-500 transition duration-200">
                            <svg id="eye-password_confirmation" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="flex items-center">
                        <div id="match-check" class="w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-gray-200 mr-2"></div>
                        <span class="text-xs text-gray-500">Password harus sama</span>
                    </div>
                </div>
            </div>

            <!-- Terms Agreement - Responsive -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg sm:rounded-xl border border-blue-100 p-4 sm:p-5 mt-4 sm:mt-6">
                <div class="flex items-start">
                    <input id="terms" name="terms" type="checkbox" required
                           class="h-4 w-4 sm:h-5 sm:w-5 text-purple-600 focus:ring-purple-500 border-gray-300 rounded mt-0.5 flex-shrink-0">
                    <label for="terms" class="ml-2 sm:ml-3 text-xs sm:text-sm text-gray-700">
                        Saya menyetujui 
                        <a href="{{ route('terms') }}" target="_blank" 
                           class="text-purple-600 hover:text-purple-800 font-medium hover:underline">
                            Syarat & Ketentuan
                        </a> 
                        dan 
                        <a href="{{ route('privacy') }}" target="_blank" 
                           class="text-purple-600 hover:text-purple-800 font-medium hover:underline">
                            Kebijakan Privasi
                        </a> 
                        CINTA
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button - Responsive -->
    <div class="pt-4 sm:pt-6 md:pt-8">
        <button type="submit"
                class="group relative w-full flex justify-center items-center py-3 sm:py-4 md:py-5 px-4 sm:px-6 
                       text-sm sm:text-base md:text-lg font-bold text-white bg-gradient-to-r from-purple-600 to-purple-700 
                       hover:from-purple-700 hover:to-purple-800 rounded-lg sm:rounded-xl
                       focus:outline-none focus:ring-2 sm:focus:ring-4 focus:ring-purple-300 
                       shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                       transition-all duration-300">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3 sm:pl-4 md:pl-6">
                <svg class="h-4 w-4 sm:h-5 sm:w-5 md:h-6 md:w-6 text-purple-200 group-hover:text-white transition duration-200" 
                     fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            </span>
            <span class="mobile-text">Selesaikan Registrasi</span>
            <svg class="ml-2 sm:ml-3 h-4 w-4 sm:h-5 sm:w-5 group-hover:translate-x-1 sm:group-hover:translate-x-2 transition-transform duration-200" 
                 fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div>
</form>

<!-- JavaScript - Responsive -->
<script>
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const eyeIcon = document.getElementById(`eye-${fieldId}`);
    
    if (field.type === 'password') {
        field.type = 'text';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L6.59 6.59m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
        `;
    } else {
        field.type = 'password';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        `;
    }
}

// Password validation
document.getElementById('password').addEventListener('input', function(e) {
    const password = e.target.value;
    const lengthCheck = document.getElementById('length-check');
    
    if (password.length >= 8) {
        lengthCheck.classList.remove('bg-gray-200');
        lengthCheck.classList.add('bg-green-500');
    } else {
        lengthCheck.classList.remove('bg-green-500');
        lengthCheck.classList.add('bg-gray-200');
    }
    
    checkPasswordMatch();
});

document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);

function checkPasswordMatch() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;
    const matchCheck = document.getElementById('match-check');
    
    if (confirmPassword === '') {
        matchCheck.classList.remove('bg-green-500', 'bg-red-500');
        matchCheck.classList.add('bg-gray-200');
        return;
    }
    
    if (password === confirmPassword) {
        matchCheck.classList.remove('bg-gray-200', 'bg-red-500');
        matchCheck.classList.add('bg-green-500');
    } else {
        matchCheck.classList.remove('bg-gray-200', 'bg-green-500');
        matchCheck.classList.add('bg-red-500');
    }
}

// Mobile adjustments
document.addEventListener('DOMContentLoaded', function() {
    // Adjust for very small screens
    const width = window.innerWidth;
    if (width < 375) {
        // Add mobile text class to button text
        document.querySelectorAll('.mobile-text').forEach(el => {
            el.classList.add('text-xs');
        });
    }
});
</script>

<style>
    @media (max-width: 375px) {
        .mobile-text {
            font-size: 0.75rem !important;
        }
    }
</style>
@endsection

@section('back-button')
<a href="{{ route('verify.otp.form') }}" 
   class="inline-flex items-center text-gray-600 hover:text-gray-900 font-medium group transition duration-200 text-sm sm:text-base">
    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" 
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
    Kembali ke Verifikasi OTP
</a>
@endsection