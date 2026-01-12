<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Registrasi Guru - CINTA')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        .gradient-bg {
            background: linear-gradient(-45deg, #8b5cf6, #7c3aed, #ec4899, #f43f5e);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        
        /* Custom utilities for mobile */
        @media (max-width: 640px) {
            .mobile-text-sm {
                font-size: 0.875rem !important;
            }
            
            .mobile-py-3 {
                padding-top: 0.75rem !important;
                padding-bottom: 0.75rem !important;
            }
            
            .mobile-px-4 {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
            
            .mobile-rounded-lg {
                border-radius: 0.5rem !important;
            }
        }
        
        /* Progress steps responsive */
        .step-circle {
            width: 3rem;
            height: 3rem;
        }
        
        .step-connector {
            width: 2rem;
            height: 2px;
        }
        
        @media (min-width: 640px) {
            .step-circle {
                width: 4rem;
                height: 4rem;
            }
            
            .step-connector {
                width: 4rem;
            }
        }
        
        @media (min-width: 768px) {
            .step-circle {
                width: 4rem;
                height: 4rem;
            }
            
            .step-connector {
                width: 6rem;
            }
        }
        
        /* Container responsive */
        .registration-container {
            max-width: 100%;
            width: 100%;
            margin: 0 auto;
        }
        
        @media (min-width: 640px) {
            .registration-container {
                max-width: 640px;
            }
        }
        
        @media (min-width: 768px) {
            .registration-container {
                max-width: 768px;
            }
        }
        
        @media (min-width: 1024px) {
            .registration-container {
                max-width: 1024px;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Background Elements - Responsive -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-40 h-40 sm:-top-40 sm:-right-40 sm:w-80 sm:h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl sm:blur-3xl opacity-20 animate-float"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 sm:-bottom-40 sm:-left-40 sm:w-80 sm:h-80 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl sm:blur-3xl opacity-20 animate-float" style="animation-delay: 1.5s;"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center py-4 sm:py-8 px-3 sm:px-4 lg:px-8">
        <div class="registration-container">
            <!-- Header - Responsive -->
            <div class="text-center mb-6 sm:mb-8 md:mb-10 px-2">
                <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-white-600 to-white-800 rounded-2xl sm:rounded-3xl shadow-xl sm:shadow-2xl mb-4 sm:mb-6 transform hover:scale-105 transition duration-300 animate-float">
                    <img src="{{ asset('img/icon.png') }}" alt="CINTA Logo" class="w-10 h-10 sm:w-12 sm:h-12 object-contain">
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-2 sm:mb-3">
                    Sistem <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">CINTA</span>
                </h1>
                <p class="text-gray-600 text-sm sm:text-base">
                    Complaint and Improvement Tracking Application
                </p>
            </div>

            <!-- Main Container - Responsive -->
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-2xl overflow-hidden mx-2 sm:mx-0">
                <!-- Top Header with Progress - Responsive -->
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-4 sm:px-6 md:px-8 py-6 sm:py-8">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 sm:gap-0">
                        <div>
                            <h2 class="text-xl sm:text-2xl font-bold text-white mb-1">@yield('step-title')</h2>
                            <p class="text-purple-200 text-sm sm:text-base">@yield('step-description')</p>
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-lg sm:rounded-xl px-4 sm:px-5 py-2.5 sm:py-3">
                            <div class="flex items-center space-x-1 sm:space-x-2">
                                <span class="text-white font-bold text-sm sm:text-base">Step</span>
                                <span class="text-xl sm:text-2xl font-bold text-white">@yield('step-number', '1')</span>
                                <span class="text-white text-sm sm:text-base">/ 3</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Steps - Responsive -->
                <div class="px-4 sm:px-6 md:px-8 pt-6 sm:pt-8">
                    <div class="flex items-center justify-center mb-6 sm:mb-8 md:mb-10 overflow-x-auto pb-2">
                        @php
                            $currentStep = (int) (request()->route()->getName() === 'request.otp.form' ? 1 : 
                                            (request()->route()->getName() === 'verify.otp.form' ? 2 : 3));
                        @endphp
                        
                        @foreach(['Request OTP', 'Verifikasi', 'Data Diri'] as $index => $step)
                            @php $stepNumber = $index + 1; @endphp
                            
                            <div class="flex items-center flex-shrink-0">
                                <!-- Step Circle -->
                                <div class="relative">
                                    <div class="step-circle rounded-full flex items-center justify-center 
                                        @if($stepNumber < $currentStep) 
                                            bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-md sm:shadow-lg
                                        @elseif($stepNumber === $currentStep)
                                            bg-gradient-to-r from-purple-600 to-purple-700 text-white shadow-md sm:shadow-lg ring-2 sm:ring-4 ring-purple-200
                                        @else
                                            bg-gray-100 text-gray-400
                                        @endif">
                                        @if($stepNumber < $currentStep)
                                            <!-- Check icon for completed steps -->
                                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        @else
                                            <span class="text-base sm:text-lg font-bold">{{ $stepNumber }}</span>
                                        @endif
                                    </div>
                                    <!-- Step Label -->
                                    <div class="absolute -bottom-6 sm:-bottom-8 left-1/2 transform -translate-x-1/2 whitespace-nowrap">
                                        <span class="text-xs sm:text-sm font-semibold 
                                            @if($stepNumber <= $currentStep) 
                                                text-purple-700 
                                            @else 
                                                text-gray-400 
                                            @endif">
                                            {{ $step }}
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Connector Line (except last step) -->
                                @if($stepNumber < 3)
                                    <div class="step-connector mx-2 sm:mx-4 
                                        @if($stepNumber < $currentStep) 
                                            bg-gradient-to-r from-green-500 to-emerald-600 
                                        @elseif($stepNumber === $currentStep)
                                            bg-gradient-to-r from-purple-500 to-purple-300 
                                        @else 
                                            bg-gray-200 
                                        @endif">
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Content Area - Responsive -->
                <div class="px-4 sm:px-6 md:px-8 pb-8 sm:pb-10">
                    <!-- Dynamic Content -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl sm:rounded-2xl border border-gray-100 p-4 sm:p-6 md:p-8 shadow-inner">
                        @if(session('success'))
                            <div class="mb-4 sm:mb-6 md:mb-8 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-emerald-500 p-4 rounded-lg sm:rounded-xl animate-pulse">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-emerald-100 p-2 rounded-md sm:rounded-lg">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3 sm:ml-4">
                                        <h3 class="text-base sm:text-lg font-semibold text-emerald-900">Berhasil!</h3>
                                        <p class="text-emerald-700 mt-1 text-sm sm:text-base">{!! session('success') !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-4 sm:mb-6 md:mb-8 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-4 rounded-lg sm:rounded-xl animate-pulse">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-red-100 p-2 rounded-md sm:rounded-lg">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3 sm:ml-4">
                                        <h3 class="text-base sm:text-lg font-semibold text-red-900">Perhatian!</h3>
                                        <p class="text-red-700 mt-1 text-sm sm:text-base">{{ session('error') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="mb-4 sm:mb-6 md:mb-8 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-4 rounded-lg sm:rounded-xl">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-red-100 p-2 rounded-md sm:rounded-lg">
                                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3 sm:ml-4">
                                        <h3 class="text-base sm:text-lg font-semibold text-red-900">Terjadi Kesalahan</h3>
                                        <ul class="mt-2 text-red-700 space-y-1 text-sm sm:text-base">
                                            @foreach($errors->all() as $error)
                                                <li class="flex items-start">
                                                    <span class="inline-block w-1.5 h-1.5 bg-red-500 rounded-full mt-1.5 mr-2 flex-shrink-0"></span>
                                                    {{ $error }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @yield('content')
                    </div>

                    <!-- Navigation - Responsive -->
                    <div class="mt-6 sm:mt-8 md:mt-10 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 sm:gap-0">
                        <div>
                            @hasSection('back-button')
                                @yield('back-button')
                            @else
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center text-gray-600 hover:text-gray-900 font-medium group transition duration-200 text-sm sm:text-base">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    Kembali ke Login
                                </a>
                            @endif
                        </div>
                        
                        <div class="text-xs sm:text-sm text-gray-500">
                            @yield('step-info')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer - Responsive -->
            <div class="mt-6 sm:mt-8 md:mt-10 text-center px-2">
                <p class="text-xs sm:text-sm text-gray-500">
                    &copy; {{ date('Y') }} CINTA - Sistem Pengaduan Siswa
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    Hanya untuk penggunaan internal sekolah
                </p>
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>