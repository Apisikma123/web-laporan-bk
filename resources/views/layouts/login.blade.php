<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Login Guru - CINTA')</title>

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
        
        /* Custom utilities */
        .login-container {
            max-width: 100%;
            width: 100%;
            margin: 0 auto;
        }
        
        @media (min-width: 640px) {
            .login-container {
                max-width: 480px;
            }
        }
        
        @media (min-width: 768px) {
            .login-container {
                max-width: 480px;
            }
        }
        
        @media (min-width: 1024px) {
            .login-container {
                max-width: 480px;
            }
        }
        
        .form-input-custom {
            padding-left: 3.5rem !important;
            padding-right: 3.5rem !important;
        }
        
        @media (max-width: 640px) {
            .form-input-custom {
                padding-left: 3rem !important;
                padding-right: 3rem !important;
            }
        }
        
        .icon-inset {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }
        
        @media (max-width: 640px) {
            .icon-inset {
                left: 0.75rem;
            }
        }
        
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        
        @media (max-width: 640px) {
            .password-toggle {
                right: 0.75rem;
            }
        }
        
        .back-button {
            position: fixed;
            top: 1rem;
            left: 1rem;
            z-index: 50;
        }
        
        @media (min-width: 640px) {
            .back-button {
                top: 1.5rem;
                left: 1.5rem;
            }
        }
        
        @media (min-width: 1024px) {
            .back-button {
                top: 2rem;
                left: 2rem;
            }
        }
        
        /* Responsive adjustments for small screens */
        @media (max-width: 375px) {
            .mobile-padding {
                padding-left: 0.75rem !important;
                padding-right: 0.75rem !important;
            }
            
            .mobile-text {
                font-size: 0.875rem !important;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Tombol Kembali ke Welcome -->
    <div class="back-button">
        <a href="{{ url('/') }}" 
           class="inline-flex items-center px-3 py-2 sm:px-4 sm:py-2.5 bg-white/90 backdrop-blur-sm border border-gray-200 text-gray-700 font-medium rounded-lg sm:rounded-xl hover:bg-white hover:border-purple-300 hover:text-purple-700 hover:shadow-md transition-all duration-200 group text-sm sm:text-base">
            <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-1.5 sm:mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span class="hidden xs:inline">Kembali</span>
            <span class="xs:hidden">Back</span>
        </a>
    </div>

    <!-- Background Elements - Responsive -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-20 -right-20 w-40 h-40 sm:-top-40 sm:-right-40 sm:w-80 sm:h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl sm:blur-3xl opacity-20 animate-float"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 sm:-bottom-40 sm:-left-40 sm:w-80 sm:h-80 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl sm:blur-3xl opacity-20 animate-float" style="animation-delay: 1.5s;"></div>
    </div>

    <div class="min-h-screen flex items-center justify-center py-4 sm:py-8 px-3 sm:px-4 lg:px-8">
        <div class="login-container">
            <!-- Header - Responsive -->
            <div class="text-center mb-6 sm:mb-8 md:mb-10 px-2">
                <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-purple-600 to-purple-800 rounded-2xl sm:rounded-3xl shadow-xl sm:shadow-2xl mb-4 sm:mb-6 transform hover:scale-105 transition duration-300 animate-float">
                    <span class="text-2xl sm:text-3xl font-bold text-white">C</span>
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-2 sm:mb-3">
                    Sistem <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">CINTA</span>
                </h1>
                <p class="text-gray-600 text-sm sm:text-base">
                    Complaint and Improvement Tracking Application
                </p>
            </div>

            <!-- Main Container -->
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-lg sm:shadow-2xl overflow-hidden mx-2 sm:mx-0">
                <!-- Top Header - Responsive -->
                <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-4 sm:px-6 md:px-8 py-6 sm:py-8">
                    <div class="text-center">
                        <h2 class="text-xl sm:text-2xl font-bold text-white mb-1 sm:mb-2">Login Akun Guru</h2>
                        <p class="text-purple-200 text-sm sm:text-base">Masuk untuk mengelola pengaduan siswa</p>
                    </div>
                </div>

                <!-- Content Area - Responsive -->
                <div class="px-4 sm:px-6 md:px-8 py-6 sm:py-8">
                    <!-- Messages - Responsive -->
                    @if(session('success'))
                        <div class="mb-4 sm:mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-emerald-500 p-3 sm:p-4 rounded-lg sm:rounded-xl animate-pulse">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-emerald-100 p-1.5 sm:p-2 rounded-md sm:rounded-lg">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-2 sm:ml-3">
                                    <p class="text-emerald-700 text-xs sm:text-sm">{!! session('success') !!}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 sm:mb-6 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-3 sm:p-4 rounded-lg sm:rounded-xl animate-pulse">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-red-100 p-1.5 sm:p-2 rounded-md sm:rounded-lg">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-2 sm:ml-3">
                                    <p class="text-red-700 text-xs sm:text-sm">{{ session('error') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="mb-4 sm:mb-6 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-3 sm:p-4 rounded-lg sm:rounded-xl">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-red-100 p-1.5 sm:p-2 rounded-md sm:rounded-lg">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-2 sm:ml-3">
                                    <h3 class="text-xs sm:text-sm font-semibold text-red-900">Terjadi Kesalahan</h3>
                                    <ul class="mt-1 text-red-700 text-xs sm:text-sm space-y-0.5 sm:space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li class="flex items-start">
                                                <span class="inline-block w-1.5 h-1.5 bg-red-500 rounded-full mt-0.5 sm:mt-1 mr-1.5 sm:mr-2 flex-shrink-0"></span>
                                                <span class="flex-1">{{ $error }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Dynamic Content -->
                    @yield('content')
                </div>
            </div>

            <!-- Footer - Responsive -->
            <div class="mt-6 sm:mt-8 text-center px-2">
                <p class="text-xs sm:text-sm text-gray-500">
                    &copy; {{ date('Y') }} CINTA - Sistem Pengaduan Siswa
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    Hanya untuk penggunaan internal sekolah
                </p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Form submission
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.querySelector('form');
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    const submitButton = this.querySelector('button[type="submit"]');
                    const buttonText = submitButton.querySelector('#button-text');
                    const loadingSpinner = submitButton.querySelector('#loading-spinner');
                    
                    if (buttonText && loadingSpinner) {
                        buttonText.classList.add('hidden');
                        loadingSpinner.classList.remove('hidden');
                        submitButton.disabled = true;
                    }
                });
            }
            
            // Adjust layout for very small screens
            function adjustForSmallScreen() {
                const width = window.innerWidth;
                if (width < 375) {
                    document.body.classList.add('mobile-padding');
                    document.querySelectorAll('.mobile-text').forEach(el => {
                        el.classList.add('text-sm');
                    });
                }
            }
            
            // Initial adjustment
            adjustForSmallScreen();
            
            // Adjust on resize
            window.addEventListener('resize', adjustForSmallScreen);
        });
    </script>
</body>
</html>