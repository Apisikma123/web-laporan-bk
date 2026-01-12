@extends('layouts.guest')

@section('title', 'Buat Konseling - CINTA ')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-blue-50 to-pink-50 py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Background Decorations -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
    <div class="absolute top-0 right-0 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    
    <!-- Notification Character -->
    <div id="notification" class="hidden fixed top-4 right-4 z-50 animate-slideInRight">
        <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-xl shadow-2xl p-4 max-w-sm border-2 border-white">
            <div class="flex items-start">
                <div class="flex-shrink-0 mr-3 relative">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center animate-pulse">
                        <i class="fas fa-robot text-purple-600 text-2xl"></i>
                    </div>
                    <div class="absolute -top-1 -right-1 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center">
                        <i class="fas fa-comment text-xs text-purple-700"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-lg mb-1">Hai, Sobat CINTA!</h4>
                    <p id="notification-message" class="text-sm"></p>
                </div>
                <button onclick="hideNotification()" class="ml-2 text-white hover:text-yellow-200 transition">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95" id="modalContent">
            <div class="p-8 text-center">
                <div class="w-20 h-20 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce">
                    <i class="fas fa-check text-white text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Cerita Berhasil Dikirim!</h3>
                <div class="flex items-center justify-center mb-4">
                    <i class="fas fa-trophy text-yellow-500 text-2xl mr-2"></i>
                    <span class="text-gray-600">Kamu hebat sudah berani cerita!</span>
                </div>
                <p class="text-gray-600 mb-6">
                    <span id="successCode" class="font-bold text-purple-600 text-xl"></span><br>
                    Simpan kode ini untuk cek perkembangan ya!
                </p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    <button onclick="copyCode()" 
                            class="px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-xl font-bold hover:scale-105 transition duration-200 flex items-center justify-center gap-2">
                        <i class="fas fa-copy"></i> Salin Kode
                    </button>
                    <a href="{{ route('complaint.track') }}" 
                       class="px-6 py-3 border-2 border-purple-300 text-purple-600 rounded-xl font-bold hover:bg-purple-50 transition duration-200 flex items-center justify-center gap-2">
                        <i class="fas fa-search"></i> Cek Status
                    </a>
                </div>
                <p class="text-sm text-gray-500 mt-6">
                    <i class="fas fa-envelope mr-1"></i>
                    Cek email kamu untuk konfirmasi
                </p>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="text-center">
            <div class="w-24 h-24 border-4 border-purple-200 border-t-purple-600 rounded-full animate-spin mx-auto mb-6"></div>
            <p class="text-white text-xl font-bold animate-pulse">Mengirim ceritamu...</p>
            <p class="text-purple-200 text-sm mt-2">Tunggu sebentar</p>
        </div>
    </div>

    <div class="max-w-4xl mx-auto relative z-10">
        <!-- Progress Bar -->
        <div class="mb-10">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                        1
                    </div>
                    <div class="ml-3">
                        <p class="font-bold text-gray-800">Isi Form</p>
                        <p class="text-sm text-gray-500">Langkah pertama</p>
                    </div>
                </div>
                <div class="hidden md:block h-1 flex-grow mx-6 bg-gradient-to-r from-purple-300 via-blue-300 to-pink-300 rounded-full"></div>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
                        2
                    </div>
                    <div class="ml-3">
                        <p class="font-medium text-gray-600">Dapat Kode</p>
                        <p class="text-sm text-gray-400">Langkah kedua</p>
                    </div>
                </div>
                <div class="hidden md:block h-1 flex-grow mx-6 bg-gray-200 rounded-full"></div>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
                        3
                    </div>
                    <div class="ml-3">
                        <p class="font-medium text-gray-600">Tunggu Respon</p>
                        <p class="text-sm text-gray-400">Langkah terakhir</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-100 to-pink-100 px-4 py-2 rounded-full mb-4">
                <i class="fas fa-heart text-pink-500"></i>
                <span class="text-sm font-medium text-purple-700">100% Rahasia & Gratis</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Ceritakan Masalahmu di Sini
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Kami siap mendengarkan. Semua cerita dijamin <span class="font-bold text-purple-600">100% rahasia</span>.
            </p>
        </div>

        <!-- Form Container -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-purple-100 hover:shadow-2xl transition-shadow duration-300">
            <form action="{{ route('complaint.store') }}" method="POST" id="counselingForm" class="space-y-0">
                @csrf
                
                <!-- Section 1: Identitas -->
                <div class="p-8 border-b border-purple-100">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg flex items-center justify-center text-white font-bold mr-4 shadow-md">
                            1
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Data Diri Kamu</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama -->
                        <div class="relative">
                            <label class="block text-gray-700 mb-2 font-medium">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-purple-400"></i>
                                </div>
                                <input type="text" name="nama_lengkap" required
                                       value="{{ old('nama_lengkap') }}"
                                       class="w-full pl-10 pr-4 py-3 border-2 border-purple-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 hover:border-purple-300"
                                       placeholder="Masukkan nama lengkap"
                                       onfocus="showNotification('Jangan lupa pakai nama asli ya, biar kami tahu memanggilmu siapa')">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Nama asli kamu</p>
                        </div>
                        
                        <!-- Email -->
                        <div class="relative">
                            <label class="block text-gray-700 mb-2 font-medium">
                                Email Aktif <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-purple-400"></i>
                                </div>
                                <input type="email" name="email" required
                                       value="{{ old('email') }}"
                                       class="w-full pl-10 pr-4 py-3 border-2 border-purple-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 hover:border-purple-300"
                                       placeholder="email@sekolah.sch.id"
                                       onfocus="showNotification('Pastikan email aktif ya, biar dapat notifikasi perkembangan ceritamu')">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Untuk notifikasi perkembangan</p>
                        </div>
                        
                        <!-- Kelas -->
                        <div class="relative">
                            <label class="block text-gray-700 mb-2 font-medium">
                                Kelas <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-school text-purple-400"></i>
                                </div>
                                <select name="kelas" required
                                        class="w-full pl-10 pr-10 py-3 border-2 border-purple-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 hover:border-purple-300 appearance-none bg-white">
                                    <option value="">Pilih kelas...</option>
                                    @if(isset($classes) && $classes->count() > 0)
                                        @foreach($classes as $class)
                                            <option value="{{ $class->nama_kelas }}" {{ old('kelas') == $class->nama_kelas ? 'selected' : '' }}>
                                                {{ $class->nama_kelas }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="" disabled>Data kelas tidak tersedia</option>
                                    @endif
                                </select>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Pilih kelas kamu</p>
                        </div>
                        
                        <!-- Nomor WA (optional) -->
                        <div class="relative">
                            <label class="block text-gray-700 mb-2 font-medium">
                                Nomor WhatsApp
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fab fa-whatsapp text-green-400"></i>
                                </div>
                                <input type="tel" name="no_wa"
                                       value="{{ old('no_wa') }}"
                                       class="w-full pl-10 pr-4 py-3 border-2 border-green-200 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition duration-200 hover:border-green-300"
                                       placeholder="0812-3456-7890"
                                       onfocus="showNotification('Kalau ada WhatsApp, tim BK bisa kontak kamu lebih cepat lho')">
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Untuk komunikasi langsung (opsional)</p>
                        </div>
                    </div>
                </div>
                
                <!-- Section 2: Jenis Masalah -->
                <div class="p-8 border-b border-purple-100">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-pink-500 to-red-500 rounded-lg flex items-center justify-center text-white font-bold mr-4 shadow-md">
                            2
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Jenis Permasalahan</h2>
                    </div>
                    
                    <p class="text-gray-600 mb-6">Pilih yang paling sesuai dengan kondisi kamu:</p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4" id="problemTypeContainer">
                        @php
                            $problemTypes = [
                                'akademik' => ['icon' => 'fas fa-book-open', 'title' => 'Akademik', 'desc' => 'Masalah belajar, nilai', 'color' => 'from-blue-500 to-cyan-500'],
                                'sosial' => ['icon' => 'fas fa-users', 'title' => 'Sosial', 'desc' => 'Teman, keluarga, bullying', 'color' => 'from-green-500 to-emerald-500'],
                                'karir' => ['icon' => 'fas fa-graduation-cap', 'title' => 'Karir', 'desc' => 'Masa depan, jurusan', 'color' => 'from-yellow-500 to-orange-500'],
                                'pribadi' => ['icon' => 'fas fa-brain', 'title' => 'Pribadi', 'desc' => 'Emosi, percaya diri', 'color' => 'from-pink-500 to-rose-500'],
                                'darurat' => ['icon' => 'fas fa-exclamation-triangle', 'title' => 'Darurat', 'desc' => 'Butuh bantuan segera', 'color' => 'from-red-500 to-pink-500'],
                                'lainnya' => ['icon' => 'fas fa-question-circle', 'title' => 'Lainnya', 'desc' => 'Masalah lainnya', 'color' => 'from-gray-500 to-slate-500'],
                            ];
                        @endphp
                        
                        @foreach($problemTypes as $key => $type)
                        <label class="problem-option relative">
                            <input type="radio" name="jenis" value="{{ $key }}" 
                                   class="absolute opacity-0" required
                                   {{ old('jenis') == $key ? 'checked' : '' }}
                                   onclick="showTypeNotification('{{ $key }}')">
                            <div class="problem-card p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-purple-300 hover:bg-purple-50 transition-all duration-300 h-full group">
                                <div class="flex items-center mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-r {{ $type['color'] }} flex items-center justify-center text-white group-hover:scale-110 transition-transform duration-300">
                                        <i class="{{ $type['icon'] }}"></i>
                                    </div>
                                    <div class="ml-3">
                                        <div class="font-bold text-gray-800">{{ $type['title'] }}</div>
                                        <div class="text-xs text-gray-500">{{ $type['desc'] }}</div>
                                    </div>
                                </div>
                                <div class="w-6 h-6 border-2 border-gray-300 rounded-full absolute top-3 right-3 flex items-center justify-center group-hover:border-purple-400 transition-colors duration-200">
                                    <div class="checkmark w-3 h-3 bg-gradient-to-r {{ $type['color'] }} rounded-full {{ old('jenis') == $key ? 'block' : 'hidden' }}"></div>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>
                </div>
                
                <!-- Section 3: Cerita -->
                <div class="p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center text-white font-bold mr-4 shadow-md">
                            3
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Ceritakan Detailnya</h2>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 mb-3 font-medium">
                            Deskripsi Lengkap <span class="text-red-500">*</span>
                            <span class="text-sm font-normal text-gray-500">(minimal 100 karakter)</span>
                        </label>
                        
                        <div class="mb-4 bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-xl border border-blue-200 hover:border-blue-300 transition duration-200">
                            <p class="text-sm text-gray-700 mb-2">
                                <span class="font-bold text-purple-600">
                                    <i class="fas fa-lightbulb mr-1"></i>Tips cerita yang baik:
                                </span>
                            </p>
                            <ul class="text-xs text-gray-600 space-y-1">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                                    <span>Apa masalahnya dan kapan mulai terjadi?</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                                    <span>Bagaimana perasaan kamu tentang hal ini?</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                                    <span>Sudah coba apa untuk mengatasinya?</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mr-2 mt-0.5"></i>
                                    <span>Apa yang kamu harapkan dari kami?</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="relative">
                            <div class="absolute top-3 left-3 text-blue-400">
                                <i class="fas fa-comment-dots"></i>
                            </div>
                            <textarea name="deskripsi" rows="8" required
                                      class="w-full pl-10 pr-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-none hover:border-blue-300"
                                      placeholder="Mulai tulis ceritamu di sini... 

Contoh: 'Sudah 2 minggu ini aku merasa sangat cemas karena nilai ulangan yang terus turun. Setiap mau belajar, pikiran langsung blank. Sudah coba belajar kelompok tapi tetap susah fokus. Aku takut tidak lulus ujian nanti...'"
                                      oninput="updateCharCount(this)"
                                      onfocus="showNotification('Jangan takut cerita detail ya, makin detail makin bisa kami bantu')">{{ old('deskripsi') }}</textarea>
                        </div>
                        
                        <div class="flex justify-between items-center mt-3">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full flex items-center justify-center bg-gradient-to-r from-blue-100 to-cyan-100">
                                    <i class="fas fa-text-height text-blue-500 text-xs"></i>
                                </div>
                                <div>
                                    <span id="charCount" class="text-sm font-bold text-gray-500">0</span>
                                    <span class="text-sm text-gray-500">/500 karakter</span>
                                </div>
                                <div id="charStatus" class="text-xs font-medium px-2 py-0.5 rounded-full"></div>
                            </div>
                            <div class="flex items-center text-sm text-blue-600 font-medium bg-blue-50 px-3 py-1 rounded-full">
                                <i class="fas fa-lock mr-2"></i>
                                <span>100% Rahasia</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Submit Section -->
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-8 border-t border-green-200">
                    <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg mb-2">Siap mengirim cerita?</h3>
                            <p class="text-gray-600 text-sm max-w-md">
                                Setelah submit, kamu akan dapat <span class="font-bold text-purple-600">Kode Rahasia</span> 
                                untuk melacak perkembangan konselingmu.
                            </p>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('complaint.track') }}" 
                               class="px-6 py-3 border-2 border-purple-300 text-purple-600 rounded-xl font-bold hover:bg-purple-50 transition duration-200 text-center flex items-center justify-center gap-2 hover:scale-105 transform">
                                <i class="fas fa-search"></i> Cek Status
                            </a>
                            <button type="submit" id="submitBtn"
                                    class="px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold hover:scale-105 transition duration-200 shadow-lg hover:shadow-xl flex items-center justify-center gap-2 relative overflow-hidden group">
                                <span class="relative z-10 flex items-center gap-2">
                                    <i class="fas fa-paper-plane"></i> Kirim Cerita Saya
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-pink-600 to-purple-600 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500"></div>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Privacy Notice -->
                    <div class="mt-6 pt-6 border-t border-green-200">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-shield-alt text-green-500"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-gray-700">
                                    <span class="font-bold">Privasi Terjamin:</span> 
                                    Data dan cerita kamu hanya dapat diakses oleh tim BK sekolah. 
                                    Tidak akan disebarkan ke pihak manapun.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Additional Info -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl p-6 border border-yellow-200 hover:shadow-lg transition duration-200">
                <h3 class="font-bold text-gray-800 mb-3 flex items-center">
                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-2">
                        <i class="fas fa-info-circle text-yellow-600"></i>
                    </div>
                    Penting untuk Diketahui
                </h3>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center mr-2 mt-0.5 flex-shrink-0">
                            <i class="fas fa-check text-green-500 text-xs"></i>
                        </div>
                        <span>Respon tim BK: 1-3 hari kerja</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center mr-2 mt-0.5 flex-shrink-0">
                            <i class="fas fa-check text-green-500 text-xs"></i>
                        </div>
                        <span>Kasus darurat diprioritaskan</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center mr-2 mt-0.5 flex-shrink-0">
                            <i class="fas fa-check text-green-500 text-xs"></i>
                        </div>
                        <span>Konseling bersifat gratis</span>
                    </li>
                    <li class="flex items-start">
                        <div class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center mr-2 mt-0.5 flex-shrink-0">
                            <i class="fas fa-check text-green-500 text-xs"></i>
                        </div>
                        <span>Follow-up berkala hingga tuntas</span>
                    </li>
                </ul>
            </div>
            
            <div class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl p-6 border border-purple-200 hover:shadow-lg transition duration-200">
                <h3 class="font-bold text-gray-800 mb-3 flex items-center">
                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-2">
                        <i class="fas fa-list-ol text-purple-600"></i>
                    </div>
                    Apa Selanjutnya?
                </h3>
                <ol class="text-sm text-gray-700 space-y-3">
                    <li class="flex items-center">
                        <span class="w-7 h-7 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-700 rounded-full flex items-center justify-center text-xs font-bold mr-3 flex-shrink-0">1</span>
                        Simpan <strong>Kode Rahasia</strong> yang diberikan
                    </li>
                    <li class="flex items-center">
                        <span class="w-7 h-7 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-700 rounded-full flex items-center justify-center text-xs font-bold mr-3 flex-shrink-0">2</span>
                        Cek email untuk konfirmasi
                    </li>
                    <li class="flex items-center">
                        <span class="w-7 h-7 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-700 rounded-full flex items-center justify-center text-xs font-bold mr-3 flex-shrink-0">3</span>
                        Gunakan kode untuk cek perkembangan
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // FUNGSI UTAMA - Letakkan di ATAS
    // ============================================
    
    // Character counter dengan warna dan status
    function updateCharCount(textarea) {
        const count = textarea.value.length;
        const charCount = document.getElementById('charCount');
        const charStatus = document.getElementById('charStatus');
        
        charCount.textContent = count;
        
        if (count === 0) {
            charCount.className = 'text-sm font-bold text-gray-500';
            charStatus.innerHTML = '';
        } else if (count < 100) {
            charCount.className = 'text-sm font-bold text-red-500';
            charStatus.innerHTML = '<span class="text-red-500 bg-red-50 px-2 py-0.5 rounded-full">Kurang ' + (100 - count) + ' karakter</span>';
        } else if (count < 300) {
            charCount.className = 'text-sm font-bold text-yellow-500';
            charStatus.innerHTML = '<span class="text-yellow-500 bg-yellow-50 px-2 py-0.5 rounded-full">Sudah cukup!</span>';
        } else {
            charCount.className = 'text-sm font-bold text-green-500';
            charStatus.innerHTML = '<span class="text-green-500 bg-green-50 px-2 py-0.5 rounded-full">Lengkap!</span>';
        }
    }
    
    // Notifikasi karakter
    function showNotification(message) {
        const notification = document.getElementById('notification');
        const messageEl = document.getElementById('notification-message');
        
        messageEl.textContent = message;
        notification.classList.remove('hidden');
        notification.classList.add('animate-slideInRight');
        
        // Auto hide setelah 5 detik
        setTimeout(() => {
            hideNotification();
        }, 5000);
    }
    
    function hideNotification() {
        const notification = document.getElementById('notification');
        notification.classList.add('hidden');
        notification.classList.remove('animate-slideInRight');
    }
    
    // Notifikasi berdasarkan jenis masalah
    function showTypeNotification(type) {
        const messages = {
            'akademik': 'Jangan khawatir soal nilai, kita bisa cari cara belajar yang cocok buat kamu!',
            'sosial': 'Masalah pertemanan itu wajar, yuk cerita biar kita cari solusinya!',
            'karir': 'Pilih jurusan memang bikin bingung, kita eksplor minat kamu yuk!',
            'pribadi': 'Perasaanmu valid, cerita aja biar lebih lega!',
            'darurat': 'Kamu kuat! Tim BK akan bantu secepat mungkin!',
            'lainnya': 'Apapun masalahnya, kami siap mendengarkan!'
        };
        
        showNotification(messages[type] || 'Terima kasih sudah memilih jenis masalahmu!');
    }
    
    // Show success modal
    function showSuccessModal(code) {
        document.getElementById('successCode').textContent = code;
        const modal = document.getElementById('successModal');
        const modalContent = document.getElementById('modalContent');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }, 10);
        
        // Store code for copy
        window.lastSuccessCode = code;
    }
    
    // Copy code to clipboard
    function copyCode() {
        if (window.lastSuccessCode) {
            navigator.clipboard.writeText(window.lastSuccessCode).then(() => {
                showNotification('Kode berhasil disalin ke clipboard!');
            });
        }
    }
    
    // ============================================
    // EVENT HANDLERS DAN INISIALISASI
    // ============================================
    
    // Problem type selection
    document.querySelectorAll('.problem-option').forEach(option => {
        const input = option.querySelector('input[type="radio"]');
        const card = option.querySelector('.problem-card');
        const checkmark = option.querySelector('.checkmark');
        
        option.addEventListener('click', function() {
            // Remove selection from all options
            document.querySelectorAll('.problem-option').forEach(opt => {
                opt.querySelector('.problem-card').classList.remove('border-purple-500', 'bg-purple-50', 'ring-2', 'ring-purple-200');
                opt.querySelector('.checkmark').classList.add('hidden');
            });
            
            // Add selection to clicked option
            card.classList.add('border-purple-500', 'bg-purple-50', 'ring-2', 'ring-purple-200');
            checkmark.classList.remove('hidden');
            input.checked = true;
        });
        
        // Check if this option is selected by default (from old input)
        if (input.checked) {
            card.classList.add('border-purple-500', 'bg-purple-50', 'ring-2', 'ring-purple-200');
            checkmark.classList.remove('hidden');
        }
    });
    
    // Form submission dengan animasi
    document.getElementById('counselingForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const description = this.querySelector('textarea[name="deskripsi"]');
        const problemType = this.querySelector('input[name="jenis"]:checked');
        const submitBtn = document.getElementById('submitBtn');
        const loadingOverlay = document.getElementById('loadingOverlay');
        
        // Validasi
        if (!problemType) {
            showNotification('Pilih jenis permasalahan dulu ya, biar kami tahu cara bantu kamu!');
            
            // Shake animation pada container
            const container = document.getElementById('problemTypeContainer');
            container.classList.add('animate-shake');
            setTimeout(() => {
                container.classList.remove('animate-shake');
            }, 500);
            
            return;
        }
        
        if (description.value.length < 100) {
            showNotification('Ceritamu masih pendek nih, coba tambah detail lagi ya! (minimal 100 karakter)');
            
            // Highlight textarea
            description.classList.add('animate-pulse', 'border-red-400');
            setTimeout(() => {
                description.classList.remove('animate-pulse', 'border-red-400');
            }, 1000);
            
            description.focus();
            return;
        }
        
        // Show loading animation
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...';
        loadingOverlay.classList.remove('hidden');
        
        try {
            // Ambil CSRF token
            const csrfMeta = document.querySelector('meta[name="csrf-token"]');
            const csrfToken = csrfMeta ? csrfMeta.content : '';
            
            // Kirim form secara asynchronous
            const formData = new FormData(this);
            
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });
            
            const result = await response.json();
            
            if (response.ok) {
                // Show success modal
                showSuccessModal(result.unique_code || result.kode);
            } else {
                // Show error
                throw new Error(result.message || 'Terjadi kesalahan');
            }
        } catch (error) {
            // Show error notification
            showNotification('Oops! Ada masalah nih: ' + error.message + ' Coba lagi ya!');
            
            // Reset button
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-paper-plane mr-2"></i> Kirim Cerita Saya';
        } finally {
            // Hide loading
            loadingOverlay.classList.add('hidden');
        }
    });
    
    // Initialize character count with old value
    document.addEventListener('DOMContentLoaded', function() {
        const textarea = document.querySelector('textarea[name="deskripsi"]');
        if (textarea) {
            updateCharCount(textarea);
        }
        
        // Welcome notification
        setTimeout(() => {
            showNotification('Hai! Isi form ini dengan cerita kamu ya, kami siap mendengarkan!');
        }, 1000);
    });
</script>

<style>
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }
        33% {
            transform: translate(30px, -50px) scale(1.1);
        }
        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }
    
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    
    .animate-blob {
        animation: blob 7s infinite;
    }
    
    .animate-slideInRight {
        animation: slideInRight 0.5s ease-out;
    }
    
    .animate-shake {
        animation: shake 0.5s ease-in-out;
    }
    
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    
    .problem-option input:checked + .problem-card {
        border-color: #a855f7;
        background-color: #faf5ff;
        box-shadow: 0 0 0 2px rgba(168, 85, 247, 0.2);
        transform: translateY(-2px);
    }
    
    .problem-option input:checked + .problem-card .checkmark {
        display: block !important;
    }
    
    select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.75rem center;
        background-repeat: no-repeat;
        background-size: 1.25em 1.25em;
        padding-right: 2.75rem;
    }
    
    .problem-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .problem-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    textarea {
        min-height: 200px;
        transition: all 0.3s ease;
    }
    
    textarea:focus {
        box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.1);
    }
    
    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }
    
    /* Custom scrollbar */
    textarea::-webkit-scrollbar {
        width: 8px;
    }
    
    textarea::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    textarea::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #a855f7, #ec4899);
        border-radius: 4px;
    }
    
    textarea::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #9333ea, #db2777);
    }
    
    /* Success modal icon animation */
    .fa-trophy {
        animation: bounce 2s infinite;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
</style>
@endpush
@endsection