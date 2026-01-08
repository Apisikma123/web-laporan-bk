<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINTA BK | {{ $title ?? 'Konseling Online' }}</title>
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#8b5cf6">
    <meta name="msapplication-TileColor" content="#8b5cf6">
    <meta name="theme-color" content="#8b5cf6">
    
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Nunito:wght@400;500;600&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background: #f8fafc;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Poppins', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            transition: all 0.3s ease;
        }
        
        .btn-secondary {
            background: #4f46e5;
            transition: all 0.3s ease;
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid #8b5cf6;
            color: #8b5cf6;
            transition: all 0.3s ease;
        }
        
        .btn-outline:hover {
            background: #8b5cf6;
            color: white;
        }
        
        .btn-primary:hover,
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.3);
        }
        
        .hover-lift {
            transition: transform 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #8b5cf6, #ec4899);
            border-radius: 4px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .mobile-text-sm {
                font-size: 0.875rem !important;
            }
            
            .mobile-px-3 {
                padding-left: 0.75rem !important;
                padding-right: 0.75rem !important;
            }
            
            .mobile-py-2 {
                padding-top: 0.5rem !important;
                padding-bottom: 0.5rem !important;
            }
        }
        
        @media (max-width: 768px) {
            .tablet-hidden {
                display: none !important;
            }
        }
        
        @media (min-width: 769px) {
            .desktop-only {
                display: block !important;
            }
        }
        
        /* Touch-friendly buttons */
        @media (max-width: 768px) {
            button, 
            a[role="button"] {
                min-height: 44px;
                min-width: 44px;
            }
            
            input, 
            textarea {
                font-size: 16px !important; /* Prevents zoom on iOS */
            }
        }
        
        /* Improved mobile navigation */
        @media (max-width: 640px) {
            .nav-logo-text {
                font-size: 1.125rem !important;
            }
            
            .nav-logo-sub {
                font-size: 0.625rem !important;
            }
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-3 sm:px-4 lg:px-8">
            <div class="flex justify-between items-center h-14 sm:h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-2 sm:space-x-3">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 gradient-bg rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-heart text-white text-sm sm:text-base"></i>
                    </div>
                    <div>
                        <h1 class="nav-logo-text text-lg sm:text-xl font-bold text-gray-800">CINTA<span class="gradient-text">BK</span></h1>
                        <p class="nav-logo-sub text-xs text-gray-500 hidden xs:block">Konseling Online</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-4 lg:space-x-6">
                    <a href="{{ route('complaint.create') }}" 
                       class="text-gray-700 hover:text-purple-600 font-medium text-sm lg:text-base">
                        <i class="fas fa-comment-medical mr-1 lg:mr-2"></i>
                        <span class="hidden sm:inline">Konseling</span>
                    </a>
                    <a href="{{ route('complaint.track') }}" 
                       class="text-gray-700 hover:text-purple-600 font-medium text-sm lg:text-base">
                        <i class="fas fa-search mr-1 lg:mr-2"></i>
                        <span class="hidden sm:inline">Cek Status</span>
                    </a>
                    
                    <!-- Tombol Guru terpisah -->
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('login') }}" 
                           class="btn-outline px-4 py-2 rounded-lg font-medium text-sm lg:text-base flex items-center">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Guru
                        </a>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700 p-2">
                    <i class="fas fa-bars text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden bg-white border-t px-4 py-4 hidden animate-slideDown">
            <div class="space-y-2">
                <a href="{{ route('complaint.create') }}" 
                   class="flex items-center py-3 px-3 text-gray-700 font-medium hover:bg-purple-50 rounded-lg transition-colors">
                    <i class="fas fa-comment-medical w-5 mr-3 text-center"></i>
                    <span>Mulai Konseling</span>
                </a>
                <a href="{{ route('complaint.track') }}" 
                   class="flex items-center py-3 px-3 text-gray-700 font-medium hover:bg-purple-50 rounded-lg transition-colors">
                    <i class="fas fa-search w-5 mr-3 text-center"></i>
                    <span>Cek Status Konseling</span>
                </a>
                
                <!-- Hanya tombol Guru di mobile -->
                <a href="{{ route('login') }}" 
                   class="flex items-center justify-center py-3 btn-outline rounded-lg font-medium mt-2">
                    <i class="fas fa-user-tie mr-2"></i>
                    Login Guru
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-[calc(100vh-200px)]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <!-- Brand -->
                <div class="text-center sm:text-left">
                    <div class="flex items-center justify-center sm:justify-start space-x-3 mb-4">
                        <div class="w-10 h-10 gradient-bg rounded-lg flex items-center justify-center">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                        <h2 class="text-xl font-bold">CINTA<span class="text-pink-300">BK</span></h2>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Platform konseling online untuk siswa. Aman, mudah, dan gratis.
                    </p>
                </div>

                <!-- Links -->
                <div class="text-center sm:text-left">
                    <h3 class="font-bold mb-3 text-lg">Menu</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <a href="/" class="hover:text-white transition-colors flex items-center justify-center sm:justify-start">
                                <i class="fas fa-home mr-2 w-4 text-center"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('complaint.create') }}" class="hover:text-white transition-colors flex items-center justify-center sm:justify-start">
                                <i class="fas fa-comment-medical mr-2 w-4 text-center"></i>
                                Buat Konseling
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('complaint.track') }}" class="hover:text-white transition-colors flex items-center justify-center sm:justify-start">
                                <i class="fas fa-search mr-2 w-4 text-center"></i>
                                Cek Status
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Info -->
                <div class="text-center sm:text-left">
                    <h3 class="font-bold mb-3 text-lg">Informasi</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <a href="{{ route('terms') }}" class="hover:text-white transition-colors flex items-center justify-center sm:justify-start">
                                <i class="fas fa-file-contract mr-2 w-4 text-center"></i>
                                Syarat Layanan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('privacy') }}" class="hover:text-white transition-colors flex items-center justify-center sm:justify-start">
                                <i class="fas fa-shield-alt mr-2 w-4 text-center"></i>
                                Kebijakan Privasi
                            </a>
                        </li>
                        <li class="flex items-center justify-center sm:justify-start">
                            <i class="fas fa-user-tie mr-2 w-4 text-center"></i>
                            <a href="{{ route('login') }}" class="hover:text-white transition-colors">Login Guru</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-6 sm:mt-8 pt-6 text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} CINTA BK - Platform Konseling Online</p>
                <p class="mt-1 text-xs">Untuk penggunaan internal sekolah</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle with animation
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const icon = this.querySelector('i');
            
            if (menu.classList.contains('hidden')) {
                // Show menu
                menu.classList.remove('hidden');
                menu.classList.add('animate-slideDown');
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                // Hide menu
                menu.classList.add('hidden');
                menu.classList.remove('animate-slideDown');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const button = document.getElementById('mobile-menu-button');
            
            if (!menu.classList.contains('hidden') && 
                !menu.contains(event.target) && 
                !button.contains(event.target)) {
                menu.classList.add('hidden');
                button.querySelector('i').classList.remove('fa-times');
                button.querySelector('i').classList.add('fa-bars');
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ 
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add animation for slide down
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideDown {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate-slideDown {
                animation: slideDown 0.3s ease-out;
            }
            
            /* Hide logo subtitle on very small screens */
            @media (max-width: 360px) {
                .nav-logo-sub {
                    display: none !important;
                }
            }
            
            /* Better spacing for mobile */
            @media (max-width: 768px) {
                main {
                    min-height: calc(100vh - 180px);
                }
            }
            
            /* Touch improvements */
            @media (hover: none) and (pointer: coarse) {
                .btn-primary:hover,
                .btn-secondary:hover,
                .btn-outline:hover,
                .hover-lift:hover {
                    transform: none;
                }
                
                a:hover {
                    opacity: 0.9;
                }
            }
        `;
        document.head.appendChild(style);

        // Handle keyboard navigation for mobile menu
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const menu = document.getElementById('mobile-menu');
                const button = document.getElementById('mobile-menu-button');
                
                if (!menu.classList.contains('hidden')) {
                    menu.classList.add('hidden');
                    button.querySelector('i').classList.remove('fa-times');
                    button.querySelector('i').classList.add('fa-bars');
                }
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>