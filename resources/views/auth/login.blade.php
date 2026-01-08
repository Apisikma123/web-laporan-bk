@extends('layouts.login')

@section('title', 'Login Guru - CINTA')

@section('content')
<form method="POST" action="{{ route('login') }}" class="space-y-4 sm:space-y-6">
    @csrf

    <!-- Email Field - Responsive -->
    <div class="space-y-2 sm:space-y-3">
        <label for="email" class="block text-sm font-semibold text-gray-700 mobile-text">
            Email Sekolah
        </label>
        <div class="relative">
            <div class="icon-inset">
                <i class="fas fa-envelope text-gray-400 text-base sm:text-lg"></i>
            </div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="form-input-custom w-full pl-10 sm:pl-12 py-3 sm:py-3.5 border border-gray-300 rounded-lg sm:rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 text-gray-700 placeholder-gray-400 text-sm sm:text-base"
                   placeholder="nama@sekolah.sch.id">
        </div>
        <p class="text-xs text-gray-500 mt-1 mobile-text">
            Gunakan email sekolah yang terdaftar di sistem
        </p>
    </div>

    <!-- Password Field - Responsive -->
    <div class="space-y-2 sm:space-y-3">
        <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-semibold text-gray-700 mobile-text">
                Password
            </label>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" 
               class="text-xs sm:text-sm font-medium text-purple-600 hover:text-purple-800 transition duration-200 mobile-text">
                Lupa Password?
            </a>
            @endif
        </div>
        <div class="relative">
            <div class="icon-inset">
                <i class="fas fa-lock text-gray-400 text-base sm:text-lg"></i>
            </div>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="form-input-custom w-full pl-10 sm:pl-12 py-3 sm:py-3.5 border border-gray-300 rounded-lg sm:rounded-xl bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 text-gray-700 placeholder-gray-400 text-sm sm:text-base"
                   placeholder="Masukkan password Anda">
            <button type="button" onclick="togglePassword()" 
                    class="password-toggle text-gray-400 hover:text-purple-600 transition duration-200">
                <i id="toggleIcon" class="fas fa-eye text-base sm:text-lg"></i>
            </button>
        </div>
        <div class="flex items-center mt-3 sm:mt-4">
            <input id="remember_me" name="remember" type="checkbox" 
                   class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded cursor-pointer">
            <label for="remember_me" class="ml-2 text-xs sm:text-sm text-gray-700 cursor-pointer mobile-text">
                Ingat perangkat ini
            </label>
        </div>
    </div>

    <!-- Submit Button - Responsive -->
    <div class="pt-3 sm:pt-4">
        <button type="submit" 
                class="group relative w-full flex justify-center py-3 sm:py-3.5 px-4 border border-transparent text-sm sm:text-base font-bold rounded-lg sm:rounded-xl text-white bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3 sm:pl-4">
                <svg class="h-4 w-4 sm:h-5 sm:w-5 text-purple-300 group-hover:text-purple-200 transform group-hover:scale-110 transition duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
            </span>
            <span id="button-text" class="mobile-text">Masuk ke Dashboard</span>
            <span id="loading-spinner" class="hidden ml-2">
                <svg class="animate-spin h-4 w-4 sm:h-5 sm:w-5 text-white" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </span>
        </button>
    </div>

    <!-- Register Link - Responsive -->
    <div class="pt-4 sm:pt-6 border-t border-gray-200 text-center">
        <p class="text-xs sm:text-sm text-gray-600 mb-3 sm:mb-4 mobile-text">
            Belum memiliki akun guru?
        </p>
        <a href="{{ route('request.otp.form') }}" 
           class="inline-flex items-center justify-center px-4 sm:px-5 py-2 sm:py-2.5 border-2 border-purple-600 text-purple-600 font-semibold rounded-lg sm:rounded-xl hover:bg-purple-50 transition duration-200 w-full text-sm sm:text-base mobile-text">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
            Daftar Akun Baru dengan OTP
        </a>
    </div>
</form>

<style>
    /* Custom breakpoints for ultra-small devices */
    @media (max-width: 320px) {
        .mobile-text {
            font-size: 0.75rem !important;
        }
        
        .mobile-padding {
            padding-left: 0.5rem !important;
            padding-right: 0.5rem !important;
        }
    }
    
    /* Custom breakpoint for extra small screens */
    @media (max-width: 375px) {
        .mobile-text {
            font-size: 0.8125rem !important;
        }
    }
    
    /* Show/hide text based on screen size */
    @media (min-width: 375px) {
        .xs\:inline {
            display: inline !important;
        }
        
        .xs\:hidden {
            display: none !important;
        }
    }
</style>
@endsection