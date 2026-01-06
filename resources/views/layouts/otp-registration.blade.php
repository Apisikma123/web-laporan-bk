<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Registrasi Guru - CINTA')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 1.5s;"></div>
        <div class="absolute top-1/2 left-1/4 w-60 h-60 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-float" style="animation-delay: 2.5s;"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl w-full mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-purple-600 to-purple-800 rounded-3xl shadow-2xl mb-8 transform hover:scale-105 transition duration-300 animate-float">
                    <span class="text-3xl font-bold text-white">C</span>
                </div>
                <h1 class="text-5xl font-bold text-gray-900 mb-4">
                    Sistem <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">CINTA</span>
                </h1>
                <p class="text-gray-600 text-lg">
                    Complaint and Improvement Tracking Application
                </p>
            </div>

            <!-- Main Container -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                <!-- Top Progress Bar -->
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-white">@yield('step-title')</h2>
                            <p class="text-purple-200">@yield('step-description')</p>
                        </div>
                        <div class="bg-white/20 backdrop-blur-sm rounded-xl px-5 py-3">
                            <div class="flex items-center space-x-1">
                                <span class="text-white font-bold">Step</span>
                                <span class="text-2xl font-bold text-white">@yield('step-number', '1')</span>
                                <span class="text-white">/ 3</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Steps -->
                <div class="px-8 pt-8">
                    <div class="flex items-center justify-center mb-10">
                        @php
                            $currentStep = (int) (request()->route()->getName() === 'request.otp.form' ? 1 : 
                                            (request()->route()->getName() === 'verify.otp.form' ? 2 : 3));
                        @endphp
                        
                        @foreach(['Request OTP', 'Verifikasi', 'Data Diri'] as $index => $step)
                            @php $stepNumber = $index + 1; @endphp
                            
                            <div class="flex items-center">
                                <!-- Step Circle -->
                                <div class="relative">
                                    <div class="w-16 h-16 rounded-full flex items-center justify-center 
                                        @if($stepNumber < $currentStep) 
                                            bg-gradient-to-r from-green-500 to-emerald-600 text-white shadow-lg
                                        @elseif($stepNumber === $currentStep)
                                            bg-gradient-to-r from-purple-600 to-purple-700 text-white shadow-lg ring-4 ring-purple-200
                                        @else
                                            bg-gray-100 text-gray-400
                                        @endif">
                                        @if($stepNumber < $currentStep)
                                            <!-- Check icon for completed steps -->
                                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        @else
                                            <span class="text-xl font-bold">{{ $stepNumber }}</span>
                                        @endif
                                    </div>
                                    <!-- Step Label -->
                                    <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 whitespace-nowrap">
                                        <span class="text-sm font-semibold 
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
                                    <div class="w-32 h-1 mx-4 
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

                <!-- Content Area -->
                <div class="px-8 pb-10">
                    <!-- Dynamic Content -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl border border-gray-100 p-8 shadow-inner">
                        @if(session('success'))
                            <div class="mb-8 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-emerald-500 p-5 rounded-xl animate-pulse">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-emerald-100 p-2 rounded-lg">
                                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-emerald-900">Berhasil!</h3>
                                        <p class="text-emerald-700 mt-1">{!! session('success') !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-8 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-5 rounded-xl animate-pulse">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-red-100 p-2 rounded-lg">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-red-900">Perhatian!</h3>
                                        <p class="text-red-700 mt-1">{{ session('error') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="mb-8 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-5 rounded-xl">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-red-100 p-2 rounded-lg">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-red-900">Terjadi Kesalahan</h3>
                                        <ul class="mt-2 text-red-700 space-y-1">
                                            @foreach($errors->all() as $error)
                                                <li class="flex items-start">
                                                    <span class="inline-block w-1.5 h-1.5 bg-red-500 rounded-full mt-1.5 mr-2"></span>
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

                    <!-- Navigation -->
                    <div class="mt-10 flex justify-between items-center">
                        <div>
                            @hasSection('back-button')
                                @yield('back-button')
                            @else
                                <a href="{{ route('login') }}" 
                                   class="inline-flex items-center text-gray-600 hover:text-gray-900 font-medium group transition duration-200">
                                    <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    Kembali ke Login
                                </a>
                            @endif
                        </div>
                        
                        <div class="text-sm text-gray-500">
                            @yield('step-info')
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-10 text-center">
                <p class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} CINTA - Sistem Pengaduan Siswa
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    Hanya untuk penggunaan internal sekolah
                </p>
            </div>
        </div>
    </div>
</body>
</html>