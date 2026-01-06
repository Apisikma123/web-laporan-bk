<x-app-layout>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-purple-600 via-purple-700 to-purple-800 text-white py-20 md:py-32">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48Y2lyY2xlIGN4PSIzIiBjeT0iMyIgcj0iMyIvPjwvZz48L2c+PC9zdmc+')] opacity-10"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    <span class="block">Butuh Tempat</span>
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-yellow-400">Curhat yang Aman?</span>
                </h1>
                <p class="text-xl md:text-2xl text-purple-100 mb-10 max-w-3xl mx-auto">
                    CINTA BK siap mendengarkan ceritamu. 
                    <span class="block mt-2">Platform konseling online untuk siswa SMP & SMA.</span>
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('complaint.create') }}" 
                       class="group relative px-8 py-4 bg-white text-purple-700 rounded-2xl font-bold text-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                        <span class="relative z-10">✍️ Mulai Konseling Sekarang</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-white to-purple-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </a>
                    <a href="#features" 
                       class="px-8 py-4 border-2 border-white/30 text-white rounded-2xl font-bold text-lg hover:bg-white/10 transition duration-300">
                        🔍 Pelajari Lebih Lanjut
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 max-w-2xl mx-auto">
                    <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl">
                        <div class="text-3xl font-bold">100%</div>
                        <div class="text-sm text-purple-200">Rahasia</div>
                    </div>
                    <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl">
                        <div class="text-3xl font-bold">24/7</div>
                        <div class="text-sm text-purple-200">Buka</div>
                    </div>
                    <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl">
                        <div class="text-3xl font-bold">500+</div>
                        <div class="text-sm text-purple-200">Siswa Terbantu</div>
                    </div>
                    <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl">
                        <div class="text-3xl font-bold">1-3</div>
                        <div class="text-sm text-purple-200">Hari Respon</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Wave Divider -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" class="w-full h-auto">
                <path fill="#ffffff" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Kenapa Memilih CINTA BK?
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Platform konseling yang dirancang khusus untuk kebutuhan siswa zaman now
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group p-8 border-2 border-purple-100 rounded-2xl hover:border-purple-300 hover:shadow-2xl transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <span class="text-2xl">🔒</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">100% Rahasia</h3>
                    <p class="text-gray-600">
                        Ceritamu dijamin aman. Hanya tim BK yang bisa akses. Identitasmu terlindungi.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="group p-8 border-2 border-purple-100 rounded-2xl hover:border-purple-300 hover:shadow-2xl transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <span class="text-2xl">⚡</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Respon Cepat</h3>
                    <p class="text-gray-600">
                        Tim BK merespon dalam 1-3 hari kerja. Prioritas untuk kasus darurat.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="group p-8 border-2 border-purple-100 rounded-2xl hover:border-purple-300 hover:shadow-2xl transition-all duration-300">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <span class="text-2xl">📱</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Akses Mudah</h3>
                    <p class="text-gray-600">
                        Cukup dari smartphone atau laptop. Tanpa ribet, tanpa tatap muka langsung.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-20 bg-gradient-to-br from-purple-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Gimana Caranya? Gampang Banget!
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    4 langkah sederhana untuk dapat bantuan
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="relative">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                            1
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Isi Form</h3>
                        <p class="text-gray-600 text-sm">
                            Ceritakan masalahmu dengan jujur dan detail
                        </p>
                    </div>
                    <div class="hidden md:block absolute top-10 left-full w-full h-0.5 bg-gradient-to-r from-purple-300 to-transparent -translate-x-1/2"></div>
                </div>
                
                <!-- Step 2 -->
                <div class="relative">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-cyan-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                            2
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Dapat Kode</h3>
                        <p class="text-gray-600 text-sm">
                            Simpan kode rahasia untuk tracking
                        </p>
                    </div>
                    <div class="hidden md:block absolute top-10 left-full w-full h-0.5 bg-gradient-to-r from-blue-300 to-transparent -translate-x-1/2"></div>
                </div>
                
                <!-- Step 3 -->
                <div class="relative">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-emerald-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                            3
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Review BK</h3>
                        <p class="text-gray-600 text-sm">
                            Tim BK review dan siapkan solusi
                        </p>
                    </div>
                    <div class="hidden md:block absolute top-10 left-full w-full h-0.5 bg-gradient-to-r from-green-300 to-transparent -translate-x-1/2"></div>
                </div>
                
                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-600 to-orange-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                        4
                    </div>
                    <h3 class="font-bold text-gray-800 mb-2">Dapat Solusi</h3>
                    <p class="text-gray-600 text-sm">
                        Terima bantuan dan follow-up berkala
                    </p>
                </div>
            </div>
            
            <!-- CTA -->
            <div class="text-center mt-16">
                <a href="{{ route('complaint.create') }}" 
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-2xl font-bold text-lg hover:shadow-2xl hover:scale-105 transition duration-300">
                    <span>🚀 Mulai Sekarang Juga!</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                <p class="text-gray-500 mt-4 text-sm">
                    Gratis 100% untuk semua siswa SMP & SMA
                </p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Kata Mereka yang Sudah Terbantu
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Cerita dari teman-teman yang sudah menggunakan CINTA BK
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl border border-purple-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold">
                            S
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Siswa, 9A</h4>
                            <p class="text-sm text-gray-500">SMP</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Awalnya takut curhat online, tapi ternyata aman banget. Guru BK responnya cepat dan membantu banget!"
                    </p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-2xl border border-blue-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center text-white font-bold">
                            A
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Anonim, 11 IPA</h4>
                            <p class="text-sm text-gray-500">SMA</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Masalah akademik gue beres berkat saran dari BK. Sekarang nilai matematika naik drastis!"
                    </p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-2xl border border-green-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold">
                            R
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-800">Rara, 8B</h4>
                            <p class="text-sm text-gray-500">SMP</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">
                        "Waktu ada masalah pertemanan, CINTA BK jadi tempat curhat yang nyaman. Sekarang udah baikan sama temen!"
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="relative py-20 bg-gradient-to-r from-purple-600 via-pink-600 to-purple-600 text-white overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PGNpcmNsZSBjeD0iMyIgY3k9IjMiIHI9IjMiLz48L2c+PC9nPjwvc3Zn')]"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Masih Ragu untuk Curhat?
            </h2>
            <p class="text-xl text-purple-100 mb-10 max-w-2xl mx-auto">
                Jangan simpan masalah sendirian. Ribuan siswa sudah terbantu, sekarang giliran kamu!
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('complaint.create') }}" 
                   class="group relative px-8 py-4 bg-white text-purple-700 rounded-2xl font-bold text-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                    <span class="relative z-10">🌟 Yuk, Cerita Sekarang!</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-white to-purple-100 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                <a href="{{ route('complaint.track') }}" 
                   class="px-8 py-4 border-2 border-white/30 text-white rounded-2xl font-bold text-lg hover:bg-white/10 transition duration-300">
                    🔍 Cek Status Laporan
                </a>
            </div>
            
            <div class="mt-12 grid grid-cols-2 md:grid-cols-3 gap-6 text-left">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <span>✅</span>
                    </div>
                    <span class="text-sm">Tanpa Biaya</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <span>✅</span>
                    </div>
                    <span class="text-sm">Identitas Aman</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                        <span>✅</span>
                    </div>
                    <span class="text-sm">Respon Cepat</span>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>