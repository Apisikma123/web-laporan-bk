@extends('layouts.otp-registration')

@section('title', 'Request OTP - CINTA')
@section('step-title', 'Verifikasi Email')
@section('step-description', 'Masukkan email sekolah untuk memulai registrasi')
@section('step-number', '1')
@section('step-info', 'Step 1 dari 3: Verifikasi email')

@section('content')
<form method="POST" action="{{ route('send.otp') }}" class="space-y-8">
    @csrf

    <!-- Email Input -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-3 flex items-center">
            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Email Sekolah Resmi
        </label>
        <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400 group-hover:text-purple-500 transition duration-200" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
            </div>
            <input id="email" name="email" type="email" required autofocus
                   class="block w-full pl-12 pr-4 py-4 text-lg border-2 border-gray-200 rounded-xl 
                          bg-white focus:border-purple-500 focus:ring-4 focus:ring-purple-100 
                          focus:outline-none transition duration-200 placeholder-gray-400
                          hover:border-purple-300"
                   placeholder="nama@sekolahanda.sch.id"
                   value="{{ old('email') }}">
        </div>
        <p class="mt-3 text-sm text-gray-500 flex items-center">
            <svg class="w-4 h-4 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
            Gunakan email resmi sekolah (domain .sch.id)
        </p>
    </div>

    <!-- Info Card -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl border border-blue-100 p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0 bg-blue-100 p-3 rounded-xl">
                <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div class="ml-5">
                <h3 class="text-lg font-semibold text-blue-900">Proses Registrasi</h3>
                <div class="mt-3 space-y-3">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-xs font-bold text-blue-600">1</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-blue-800">Masukkan Email</p>
                            <p class="text-sm text-blue-600">Masukkan email sekolah Anda untuk verifikasi</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-6 h-6 rounded-full bg-purple-100 flex items-center justify-center">
                                <span class="text-xs font-bold text-purple-600">2</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-purple-800">Verifikasi OTP</p>
                            <p class="text-sm text-purple-600">Kode OTP akan ditampilkan di halaman selanjutnya</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 mt-1">
                            <div class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center">
                                <span class="text-xs font-bold text-gray-600">3</span>
                            </div>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-800">Lengkapi Data</p>
                            <p class="text-sm text-gray-600">Isi data diri dan buat password akun</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="pt-4">
        <button type="submit"
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
            Lanjutkan ke Verifikasi OTP
            <svg class="ml-3 h-5 w-5 group-hover:translate-x-2 transition-transform duration-200" 
                 fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </button>
    </div>
</form>
@endsection

@section('back-button')
<a href="{{ route('login') }}" 
   class="inline-flex items-center text-gray-600 hover:text-gray-900 font-medium group transition duration-200">
    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" 
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
    Kembali ke Login
</a>
@endsection