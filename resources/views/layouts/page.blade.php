<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'CINTA') - Sistem Pengaduan Siswa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4edf5 100%);
        }
        
        .content-section {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        
        .highlight {
            background: linear-gradient(120deg, #8b5cf6 0%, #7c3aed 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-purple-800 rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-lg">C</span>
                        </div>
                        <span class="text-xl font-bold text-gray-900">CINTA</span>
                    </a>
                </div>
                
                <div class="flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-purple-600 font-medium transition duration-200">
                        Beranda
                    </a>
                    <a href="{{ route('complaint.create') }}" class="text-gray-600 hover:text-purple-600 font-medium transition duration-200">
                        Buat Pengaduan
                    </a>
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-purple-600 font-medium transition duration-200">
                        Login Guru
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-purple-600 to-purple-800 rounded-2xl shadow-xl mb-6">
                    @yield('icon')
                </div>
                <h1 class="text-4xl font-bold text-gray-900 mb-4">
                    @yield('page-title')
                </h1>
                <p class="text-gray-600 text-lg">
                    @yield('page-description')
                </p>
            </div>

            <!-- Content -->
            <div class="content-section p-8 md:p-12">
                <div class="prose prose-lg max-w-none">
                    @yield('content')
                </div>
                
                <!-- Action Buttons -->
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                        <div class="text-sm text-gray-500">
                            Terakhir diperbarui: @yield('last-updated')
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{ route('home') }}" 
                               class="px-6 py-3 border border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 font-medium transition duration-200">
                                Kembali ke Beranda
                            </a>
                            @hasSection('accept-button')
                                <a href="{{ route('register.teacher.form') }}"
                                   class="px-6 py-3 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-xl hover:from-purple-700 hover:to-purple-800 font-medium transition duration-200">
                                   Saya Setuju & Lanjutkan
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 mt-16">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-600 to-purple-800 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold">C</span>
                        </div>
                        <span class="text-lg font-bold text-gray-900">CINTA</span>
                    </div>
                    <p class="text-gray-500 text-sm mt-2">
                        Sistem Pengaduan Siswa Berbasis Web
                    </p>
                </div>
                
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('terms') }}" class="text-gray-600 hover:text-purple-600 text-sm transition duration-200">
                        Syarat & Ketentuan
                    </a>
                    <a href="{{ route('privacy') }}" class="text-gray-600 hover:text-purple-600 text-sm transition duration-200">
                        Kebijakan Privasi
                    </a>
                    <a href="#" class="text-gray-600 hover:text-purple-600 text-sm transition duration-200">
                        Kontak
                    </a>
                    <a href="#" class="text-gray-600 hover:text-purple-600 text-sm transition duration-200">
                        Bantuan
                    </a>
                </div>
            </div>
            
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} CINTA - Complaint and Improvement Tracking Application.
                    Seluruh hak cipta dilindungi undang-undang.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>