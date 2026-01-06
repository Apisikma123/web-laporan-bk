<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sistem Konseling')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f5f3ff;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #c4b5fd;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #a78bfa;
        }
        
        /* Toast animations */
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    </style>

    @stack('styles')
</head>
<body class="bg-purple-50 text-gray-800">
    <!-- Toast Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="flash-message success">
            <div class="flex items-center space-x-2">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="ml-4">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="flash-message error">
            <div class="flex items-center space-x-2">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="ml-4">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Main Layout -->
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b border-purple-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-purple-600">
                                <i class="fas fa-heartbeat mr-2"></i>
                                <span class="hidden md:inline">Sistem Konseling</span>
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-4">
                            @auth
                                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700' }} px-3 py-2 text-sm font-medium border-b-2 transition">
                                    <i class="fas fa-home mr-2"></i> Dashboard
                                </a>
                                <a href="{{ route('classes.index') }}" class="{{ request()->routeIs('classes.*') ? 'border-purple-500 text-purple-600' : 'border-transparent text-gray-500 hover:text-gray-700' }} px-3 py-2 text-sm font-medium border-b-2 transition">
                                    <i class="fas fa-chalkboard-teacher mr-2"></i> Kelas
                                </a>
                            @endauth
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="flex items-center">
                        @auth
                            <!-- User Dropdown -->
                            <div class="relative ml-3" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center space-x-2 text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                    <div class="h-8 w-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <span class="hidden md:inline font-medium">{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </button>

                                <!-- Dropdown menu -->
                                <div x-show="open" @click.away="open = false" 
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95"
                                     class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user mr-2"></i> Profile
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-cog mr-2"></i> Settings
                                    </a>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                       class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </a>
                                </div>
                            </div>
                        @else
                            <!-- Login/Register Links -->
                            <a href="{{ route('login') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm font-medium">
                                Login
                            </a>
                            <a href="{{ route('register') }}" class="ml-4 bg-purple-600 text-white hover:bg-purple-700 px-4 py-2 rounded-md text-sm font-medium transition">
                                Register
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Custom Scripts -->
    <script>
        // Auto hide flash messages
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const flashMessages = document.querySelectorAll('.flash-message');
                flashMessages.forEach(msg => {
                    msg.style.opacity = '0';
                    msg.style.transition = 'opacity 0.5s';
                    setTimeout(() => msg.remove(), 500);
                });
            }, 5000);
        });

        // Toast function
        function showToast(type, message, duration = 3000) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            const icons = {
                success: 'fa-check-circle',
                error: 'fa-exclamation-circle',
                warning: 'fa-exclamation-triangle',
                info: 'fa-info-circle'
            };
            const colors = {
                success: 'bg-green-50 text-green-800 border-green-200',
                error: 'bg-red-50 text-red-800 border-red-200',
                warning: 'bg-yellow-50 text-yellow-800 border-yellow-200',
                info: 'bg-blue-50 text-blue-800 border-blue-200'
            };

            toast.className = `toast ${colors[type]} border rounded-lg shadow-lg p-4 max-w-sm transform transition-all duration-300 animate-slideIn`;
            toast.innerHTML = `
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <i class="fas ${icons[type]} text-lg ${type === 'success' ? 'text-green-500' : type === 'error' ? 'text-red-500' : type === 'warning' ? 'text-yellow-500' : 'text-blue-500'}"></i>
                        <div>
                            <p class="font-medium">${message}</p>
                        </div>
                    </div>
                    <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;

            container.appendChild(toast);

            // Auto remove after duration
            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }

        // Confirm delete function
        function confirmDelete(name, url) {
            if (confirm(`Apakah Anda yakin ingin menghapus kelas "${name}"?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;
                form.innerHTML = `
                    @csrf
                    @method('DELETE')
                `;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

    @stack('scripts')
</body>
</html>

<style>
    .flash-message {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 16px 20px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-width: 300px;
        max-width: 400px;
        z-index: 9999;
        animation: slideIn 0.3s ease-out;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .flash-message.success {
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        color: white;
        border-left: 4px solid #6d28d9;
    }
    
    .flash-message.error {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
        border-left: 4px solid #b91c1c;
    }
    
    .flash-message button {
        background: none;
        border: none;
        color: rgba(255, 255, 255, 0.7);
        cursor: pointer;
        padding: 4px;
    }
    
    .flash-message button:hover {
        color: white;
    }
    
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    .animate-slideIn {
        animation: slideIn 0.3s ease-out;
    }
</style>