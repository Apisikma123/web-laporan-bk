<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINTA BK | {{ $title ?? 'Konseling Online' }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/icon.png') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
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
            color: white;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3);
        }
        
        .btn-outline {
            border: 2px solid #8b5cf6;
            color: #8b5cf6;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-outline:hover {
            background: #8b5cf6;
            color: white;
        }
        
        /* Smooth hover effects */
        .hover-lift {
            transition: transform 0.3s;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
        }
        
        /* Mobile menu animation */
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
        
        /* Back to top button */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
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
        
        /* Touch-friendly for mobile */
        @media (max-width: 768px) {
            button, a.button {
                min-height: 44px;
                min-width: 44px;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center space-x-3 hover:opacity-80 transition-opacity">
                    <img src="{{ asset('img/icon.png') }}" 
                         alt="CINTA BK Logo" 
                         class="h-10 w-auto rounded-lg">
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">CINTA<span class="gradient-text">BK</span></h1>
                        <p class="text-xs text-gray-500">Konseling Online</p>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('complaint.create') }}" 
                       class="text-gray-700 hover:text-purple-600 font-medium flex items-center">
                        <i class="fas fa-comment-medical mr-2"></i>
                        Buat Konseling
                    </a>
                    
                    <a href="{{ route('complaint.track') }}" 
                       class="text-gray-700 hover:text-purple-600 font-medium flex items-center">
                        <i class="fas fa-search mr-2"></i>
                        Cek Status
                    </a>
                    
                    <a href="{{ route('login') }}" 
                       class="btn-outline px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-user-tie mr-2"></i>
                        Guru
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700 p-2">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden bg-white border-t px-4 py-4 hidden animate-slideDown">
            <div class="space-y-3">
                <a href="{{ route('complaint.create') }}" 
                   class="flex items-center py-3 px-4 text-gray-700 hover:bg-purple-50 rounded-lg">
                    <i class="fas fa-comment-medical w-6 mr-3 text-center text-purple-500"></i>
                    <span class="font-medium">Buat Konseling</span>
                </a>
                
                <a href="{{ route('complaint.track') }}" 
                   class="flex items-center py-3 px-4 text-gray-700 hover:bg-blue-50 rounded-lg">
                    <i class="fas fa-search w-6 mr-3 text-center text-blue-500"></i>
                    <span class="font-medium">Cek Status</span>
                </a>
                
                <a href="{{ route('login') }}" 
                   class="flex items-center justify-center py-3 btn-outline rounded-lg font-medium mt-2">
                    <i class="fas fa-user-tie mr-2"></i>
                    Login Guru
                </a>
                
                <a href="{{ url('/') }}" 
                   class="flex items-center py-3 px-4 text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-home w-6 mr-3 text-center text-gray-500"></i>
                    <span class="font-medium">Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-[calc(100vh-200px)]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Brand -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="{{ asset('img/icon.png') }}" 
                             alt="CINTA BK Logo" 
                             class="h-12 w-auto rounded-lg">
                        <div>
                            <h2 class="text-xl font-bold">CINTA<span class="text-pink-300">BK</span></h2>
                            <p class="text-gray-400 text-sm">Konseling Online</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm">
                        Platform konseling online untuk siswa. Aman, mudah, dan gratis.
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="font-bold mb-4 text-lg">Menu</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>
                            <a href="{{ url('/') }}" class="hover:text-white transition-colors">
                                <i class="fas fa-home mr-2"></i>Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('complaint.create') }}" class="hover:text-white transition-colors">
                                <i class="fas fa-comment-medical mr-2"></i>Buat Konseling
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('complaint.track') }}" class="hover:text-white transition-colors">
                                <i class="fas fa-search mr-2"></i>Cek Status
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h3 class="font-bold mb-4 text-lg">Kontak</h3>
                    <div class="space-y-3 text-gray-400">
                        <div class="flex items-center">
                            <i class="fas fa-phone mr-2 text-green-400"></i>
                            <span>021-1234-5678</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-blue-400"></i>
                            <span>bk@sekolah.sch.id</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-user-tie mr-2 text-yellow-400"></i>
                            <a href="{{ route('login') }}" class="hover:text-white transition-colors">Login Guru</a>
                        </div>
                    </div>
                    
                   


            <!-- Copyright -->
            <div class="border-t border-gray-700 mt-8 pt-6 text-center text-gray-500">
                <p>&copy; {{ date('Y') }} CINTA BK - Platform Konseling Online</p>
                <p class="text-xs mt-1">Untuk penggunaan internal sekolah</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" 
            class="fixed bottom-6 right-6 w-12 h-12 gradient-bg text-white rounded-full shadow-lg hover:shadow-xl transition-all hidden animate-fadeIn"
            onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            const icon = this.querySelector('i');
            
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                icon.classList.replace('fa-bars', 'fa-times');
            } else {
                menu.classList.add('hidden');
                icon.classList.replace('fa-times', 'fa-bars');
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
                button.querySelector('i').classList.replace('fa-times', 'fa-bars');
            }
        });

        // Back to top button
        window.addEventListener('scroll', function() {
            const button = document.getElementById('back-to-top');
            if (window.pageYOffset > 300) {
                button.classList.remove('hidden');
            } else {
                button.classList.add('hidden');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Handle form submissions (show loading)
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = this.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
                }
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>