@extends('layouts.guest')

@section('title', 'Bantuan & FAQ - CINTA')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-purple-600 via-purple-500 to-indigo-600">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3 1.343 3 3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z" fill="%239C92AC" fill-opacity="0.05" fill-rule="evenodd"/%3E%3C/svg%3E')] opacity-10"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-10 w-32 h-32 bg-white/5 rounded-full animate-float-slow"></div>
        <div class="absolute bottom-1/3 right-10 w-40 h-40 bg-purple-400/10 rounded-full animate-float-slower"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-pink-400/5 rounded-full animate-pulse"></div>
    </div>
    
    <!-- Main Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-lg px-6 py-3 rounded-full mb-6 border border-white/30 animate-slide-down">
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
            <span class="text-white font-semibold text-sm">Pusat Bantuan & Dukungan</span>
        </div>
        
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
            <span class="text-white block mb-2">Butuh</span>
            <span class="relative inline-block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-pink-300 to-white animate-gradient-x">
                    Bantuan?
                </span>
                <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-yellow-300 to-pink-300 rounded-full scale-x-0 animate-expand-width"></span>
            </span>
        </h1>
        
        <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed font-medium">
            Temukan jawaban untuk pertanyaanmu atau hubungi tim support kami
        </p>
        
        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-8">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" 
                       id="faq-search"
                       class="w-full pl-12 pr-4 py-4 bg-white/20 backdrop-blur-lg border border-white/30 rounded-2xl text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all duration-300"
                       placeholder="Cari pertanyaan atau topik bantuan...">
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                    <button onclick="searchFAQ()" class="text-white hover:text-yellow-300 transition-colors">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-3xl mx-auto">
            <div class="text-center p-4 bg-white/10 backdrop-blur-lg rounded-xl border border-white/20">
                <div class="text-2xl font-bold text-white mb-1">24/7</div>
                <div class="text-sm text-white/80">Support Online</div>
            </div>
            <div class="text-center p-4 bg-white/10 backdrop-blur-lg rounded-xl border border-white/20">
                <div class="text-2xl font-bold text-white mb-1">< 1 jam</div>
                <div class="text-sm text-white/80">Respon Cepat</div>
            </div>
            <div class="text-center p-4 bg-white/10 backdrop-blur-lg rounded-xl border border-white/20">
                <div class="text-2xl font-bold text-white mb-1">100+</div>
                <div class="text-sm text-white/80">FAQ Tersedia</div>
            </div>
            <div class="text-center p-4 bg-white/10 backdrop-blur-lg rounded-xl border border-white/20">
                <div class="text-2xl font-bold text-white mb-1">4.8/5</div>
                <div class="text-sm text-white/80">Rating Bantuan</div>
            </div>
        </div>
    </div>
</section>

<!-- Main Help Content -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Navigation Tabs -->
        <div class="flex flex-wrap gap-2 mb-12 justify-center">
            <button onclick="showCategory('all')" 
                    class="help-tab active px-6 py-3 rounded-full font-medium transition-all duration-300 bg-purple-100 text-purple-700 border border-purple-200 hover:bg-purple-200">
                <i class="fas fa-th-large mr-2"></i>Semua Kategori
            </button>
            <button onclick="showCategory('general')" 
                    class="help-tab px-6 py-3 rounded-full font-medium transition-all duration-300 bg-gray-100 text-gray-700 border border-gray-200 hover:bg-gray-200">
                <i class="fas fa-question-circle mr-2"></i>Umum
            </button>
            <button onclick="showCategory('privacy')" 
                    class="help-tab px-6 py-3 rounded-full font-medium transition-all duration-300 bg-blue-100 text-blue-700 border border-blue-200 hover:bg-blue-200">
                <i class="fas fa-shield-alt mr-2"></i>Privasi & Keamanan
            </button>
            <button onclick="showCategory('technical')" 
                    class="help-tab px-6 py-3 rounded-full font-medium transition-all duration-300 bg-green-100 text-green-700 border border-green-200 hover:bg-green-200">
                <i class="fas fa-cogs mr-2"></i>Teknis
            </button>
            <button onclick="showCategory('counseling')" 
                    class="help-tab px-6 py-3 rounded-full font-medium transition-all duration-300 bg-pink-100 text-pink-700 border border-pink-200 hover:bg-pink-200">
                <i class="fas fa-comments mr-2"></i>Konseling
            </button>
        </div>

        <!-- FAQ Section -->
        <div class="mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10 text-center">
                Pertanyaan yang
                <span class="relative">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">Sering Ditanyakan</span>
                    <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full"></span>
                </span>
            </h2>

            
                @endphp

                @foreach($faqs as $index => $faq)
                <div class="faq-item group" data-category="{{ $faq['category'] }}">
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 hover:shadow-xl transition-all duration-300 hover:border-{{ $faq['color'] }}-300 cursor-pointer">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-{{ $faq['color'] }}-50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-{{ $faq['icon'] }} text-{{ $faq['color'] }}-600 text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-{{ $faq['color'] }}-600 transition-colors">
                                    {{ $faq['question'] }}
                                </h3>
                                <div class="faq-answer text-gray-600 leading-relaxed overflow-hidden max-h-0 transition-all duration-500">
                                    {{ $faq['answer'] }}
                                </div>
                                <div class="flex items-center justify-between mt-4">
                                    <span class="inline-flex items-center gap-1 text-xs px-3 py-1 bg-{{ $faq['color'] }}-50 text-{{ $faq['color'] }}-700 rounded-full">
                                        <i class="fas fa-tag text-xs"></i>
                                        <span class="capitalize">{{ $faq['category'] }}</span>
                                    </span>
                                    <button class="faq-toggle text-{{ $faq['color'] }}-600 hover:text-{{ $faq['color'] }}-700">
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

       

<!-- Guide Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-6 py-2 bg-blue-50 rounded-full mb-6">
                <i class="fas fa-book-open text-blue-500"></i>
                <span class="text-sm font-semibold text-blue-600">Panduan Lengkap</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Cara Menggunakan
                <span class="relative">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-600">Platform CINTA</span>
                    <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-full"></span>
                </span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Ikuti panduan langkah demi langkah untuk pengalaman konseling yang optimal
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Guide 1 -->
            <div class="bg-white rounded-3xl p-8 border-2 border-gray-100 hover:border-blue-200 hover:shadow-2xl transition-all duration-500 group">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-100 to-cyan-100 rounded-2xl flex items-center justify-center mx-auto transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">
                        <i class="fas fa-user-edit text-blue-600 text-2xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-10 h-10 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-lg">
                        1
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Registrasi & Login</h3>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Gunakan email sekolahmu</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Pilih nama samaran</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Verifikasi email sekali</span>
                    </li>
                </ul>
                <a href="{{ route('register') }}" class="block text-center text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                    <i class="fas fa-arrow-right mr-2"></i>Mulai Registrasi
                </a>
            </div>

            <!-- Guide 2 -->
            <div class="bg-white rounded-3xl p-8 border-2 border-gray-100 hover:border-purple-200 hover:shadow-2xl transition-all duration-500 group">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl flex items-center justify-center mx-auto transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">
                        <i class="fas fa-comment-medical text-purple-600 text-2xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold text-lg">
                        2
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Buat Laporan</h3>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Jelaskan masalah dengan jujur</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Pilih kategori yang sesuai</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Simpan kode tracking</span>
                    </li>
                </ul>
                <a href="{{ route('complaint.create') }}" class="block text-center text-purple-600 font-semibold hover:text-purple-700 transition-colors">
                    <i class="fas fa-arrow-right mr-2"></i>Buat Laporan Baru
                </a>
            </div>

            <!-- Guide 3 -->
            <div class="bg-white rounded-3xl p-8 border-2 border-gray-100 hover:border-green-200 hover:shadow-2xl transition-all duration-500 group">
                <div class="relative mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-100 to-emerald-100 rounded-2xl flex items-center justify-center mx-auto transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">
                        <i class="fas fa-tasks text-green-600 text-2xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center font-bold text-lg">
                        3
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4 text-center">Pantau & Follow-up</h3>
                <ul class="space-y-3 mb-6">
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Lacak status laporan</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Baca respon dari BK</span>
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <i class="fas fa-check text-green-500"></i>
                        <span>Lakukan follow-up jika perlu</span>
                    </li>
                </ul>
                <a href="{{ route('complaint.track') }}" class="block text-center text-green-600 font-semibold hover:text-green-700 transition-colors">
                    <i class="fas fa-arrow-right mr-2"></i>Lacak Laporan
                </a>
            </div>
        </div>
    </div>
</section>


<!-- Live Chat Widget -->
<div id="live-chat-widget" class="fixed bottom-6 right-6 z-50 hidden">
    <div class="bg-white rounded-2xl shadow-2xl w-80 border border-gray-200 overflow-hidden">
        <!-- Chat Header -->
        <div class="bg-gradient-to-r from-purple-600 to-pink-600 p-4 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div>
                        <h4 class="font-bold">Live Chat Support</h4>
                        <p class="text-xs text-white/80">Online • Respon cepat</p>
                    </div>
                </div>
                <button onclick="closeLiveChat()" class="text-white/80 hover:text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        
        <!-- Chat Body -->
        <div class="p-4 h-64 overflow-y-auto">
            <div class="space-y-4">
                <!-- Bot Message -->
                <div class="flex gap-3">
                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-robot text-purple-600 text-sm"></i>
                    </div>
                    <div class="bg-gray-100 rounded-2xl rounded-tl-none p-3 max-w-[70%]">
                        <p class="text-sm">Halo! Saya Asisten CINTA. Ada yang bisa saya bantu?</p>
                        <p class="text-xs text-gray-500 mt-1">Just now</p>
                    </div>
                </div>
                
                <!-- Quick Options -->
                <div class="space-y-2">
                    <p class="text-xs text-gray-500 text-center">Pilih pertanyaan cepat:</p>
                    <button onclick="selectQuickQuestion('tracking')" 
                            class="w-full text-left text-sm bg-gray-50 hover:bg-gray-100 rounded-lg p-3 border border-gray-200 transition-colors">
                        Saya lupa kode tracking
                    </button>
                    <button onclick="selectQuickQuestion('emergency')" 
                            class="w-full text-left text-sm bg-gray-50 hover:bg-gray-100 rounded-lg p-3 border border-gray-200 transition-colors">
                        Butuh bantuan darurat
                    </button>
                    <button onclick="selectQuickQuestion('technical')" 
                            class="w-full text-left text-sm bg-gray-50 hover:bg-gray-100 rounded-lg p-3 border border-gray-200 transition-colors">
                        Masalah teknis dengan platform
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Chat Input -->
        <div class="p-4 border-t border-gray-200">
            <div class="flex gap-2">
                <input type="text" 
                       id="chat-input"
                       placeholder="Ketik pesanmu..."
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm">
                <button onclick="sendChatMessage()" 
                        class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-full flex items-center justify-center hover:shadow-lg transition-shadow">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    /* FAQ Toggle Animation */
    .faq-item.active .faq-answer {
        max-height: 500px;
        margin-top: 1rem;
    }
    
    .faq-item.active .faq-toggle i {
        transform: rotate(180deg);
    }
    
    /* Active Tab Style */
    .help-tab.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-color: #764ba2;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .help-tab {
            width: 100%;
            text-align: center;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ Toggle Functionality
        document.querySelectorAll('.faq-toggle').forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                const faqItem = this.closest('.faq-item');
                const answer = faqItem.querySelector('.faq-answer');
                
                // Close all other FAQs
                document.querySelectorAll('.faq-item').forEach(item => {
                    if (item !== faqItem) {
                        item.classList.remove('active');
                        item.querySelector('.faq-answer').style.maxHeight = '0';
                        item.querySelector('.faq-toggle i').style.transform = 'rotate(0deg)';
                    }
                });
                
                // Toggle current FAQ
                if (faqItem.classList.contains('active')) {
                    faqItem.classList.remove('active');
                    answer.style.maxHeight = '0';
                    this.querySelector('i').style.transform = 'rotate(0deg)';
                } else {
                    faqItem.classList.add('active');
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    this.querySelector('i').style.transform = 'rotate(180deg)';
                    
                    // Scroll to FAQ if it's not fully visible
                    faqItem.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            });
        });
        
        // FAQ click on whole item
        document.querySelectorAll('.faq-item').forEach(item => {
            item.addEventListener('click', function(e) {
                if (!e.target.closest('.faq-toggle')) {
                    const toggleBtn = this.querySelector('.faq-toggle');
                    toggleBtn.click();
                }
            });
        });
        
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: true,
                offset: 100
            });
        }
    });
    
    // FAQ Category Filter
    function showCategory(category) {
        // Update active tab
        document.querySelectorAll('.help-tab').forEach(tab => {
            tab.classList.remove('active');
            if (tab.textContent.toLowerCase().includes(category)) {
                tab.classList.add('active');
            }
        });
        
        // Show/hide FAQ items
        document.querySelectorAll('.faq-item').forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 10);
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
    }
    
    // FAQ Search Function
    function searchFAQ() {
        const searchTerm = document.getElementById('faq-search').value.toLowerCase();
        
        document.querySelectorAll('.faq-item').forEach(item => {
            const question = item.querySelector('h3').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
                
                // Highlight matching text
                if (searchTerm) {
                    const regex = new RegExp(searchTerm, 'gi');
                    const highlightedQuestion = question.replace(regex, match => `<mark class="bg-yellow-200">${match}</mark>`);
                    const highlightedAnswer = answer.replace(regex, match => `<mark class="bg-yellow-200">${match}</mark>`);
                    
                    item.querySelector('h3').innerHTML = item.querySelector('h3').textContent.replace(regex, match => `<mark class="bg-yellow-200">${match}</mark>`);
                    item.querySelector('.faq-answer').innerHTML = item.querySelector('.faq-answer').textContent.replace(regex, match => `<mark class="bg-yellow-200">${match}</mark>`);
                    
                    // Auto-open matching FAQ
                    item.classList.add('active');
                    item.querySelector('.faq-answer').style.maxHeight = item.querySelector('.faq-answer').scrollHeight + 'px';
                    item.querySelector('.faq-toggle i').style.transform = 'rotate(180deg)';
                }
            } else {
                item.style.opacity = '0';
                item.style.transform = 'translateY(10px)';
                setTimeout(() => {
                    item.style.display = 'none';
                }, 300);
            }
        });
    }
    
    // Live Chat Functions
    function openLiveChat() {
        const widget = document.getElementById('live-chat-widget');
        widget.classList.remove('hidden');
        widget.classList.add('animate-fadeInUp');
        
        // Add floating button animation
        const chatBtn = document.querySelector('[onclick="openLiveChat()"]');
        chatBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Membuka Chat...';
        chatBtn.disabled = true;
        
        setTimeout(() => {
            chatBtn.innerHTML = '<i class="fas fa-comment-dots mr-2"></i>Live Chat Aktif';
            chatBtn.disabled = false;
        }, 1000);
    }
    
    function closeLiveChat() {
        const widget = document.getElementById('live-chat-widget');
        widget.style.opacity = '0';
        widget.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            widget.classList.add('hidden');
            widget.style.opacity = '1';
            widget.style.transform = 'translateY(0)';
        }, 300);
    }
    
    function selectQuickQuestion(type) {
        const input = document.getElementById('chat-input');
        const messages = {
            'tracking': 'Saya lupa kode tracking laporan saya',
            'emergency': 'Saya butuh bantuan darurat segera',
            'technical': 'Ada masalah teknis dengan platform'
        };
        
        input.value = messages[type];
        input.focus();
        
        // Show typing indicator
        const chatBody = document.querySelector('#live-chat-widget .overflow-y-auto');
        const typingIndicator = document.createElement('div');
        typingIndicator.className = 'flex gap-3 justify-end';
        typingIndicator.innerHTML = `
            <div class="bg-purple-100 rounded-2xl rounded-tr-none p-3 max-w-[70%]">
                <div class="flex gap-1">
                    <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></div>
                    <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                    <div class="w-2 h-2 bg-purple-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                </div>
            </div>
            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white">
                <i class="fas fa-user text-sm"></i>
            </div>
        `;
        
        chatBody.appendChild(typingIndicator);
        chatBody.scrollTop = chatBody.scrollHeight;
        
        // Simulate bot response
        setTimeout(() => {
            typingIndicator.remove();
            
            const botResponse = document.createElement('div');
            botResponse.className = 'flex gap-3';
            botResponse.innerHTML = `
                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-robot text-purple-600 text-sm"></i>
                </div>
                <div class="bg-gray-100 rounded-2xl rounded-tl-none p-3 max-w-[70%]">
                    <p class="text-sm">Terima kasih atas pertanyaanmu. Tim support akan segera membalas pesan ini. Untuk sementara, kamu bisa cek jawaban di FAQ atau hubungi kami melalui email.</p>
                    <p class="text-xs text-gray-500 mt-1">Just now</p>
                </div>
            `;
            
            chatBody.appendChild(botResponse);
            chatBody.scrollTop = chatBody.scrollHeight;
        }, 1500);
    }
    
    function sendChatMessage() {
        const input = document.getElementById('chat-input');
        const message = input.value.trim();
        
        if (!message) return;
        
        const chatBody = document.querySelector('#live-chat-widget .overflow-y-auto');
        
        // Add user message
        const userMessage = document.createElement('div');
        userMessage.className = 'flex gap-3 justify-end';
        userMessage.innerHTML = `
            <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-2xl rounded-tr-none p-3 max-w-[70%]">
                <p class="text-sm">${message}</p>
                <p class="text-xs text-white/80 mt-1">Just now</p>
            </div>
            <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white">
                <i class="fas fa-user text-sm"></i>
            </div>
        `;
        
        chatBody.appendChild(userMessage);
        input.value = '';
        chatBody.scrollTop = chatBody.scrollHeight;
        
        // Simulate bot response
        setTimeout(() => {
            const botResponse = document.createElement('div');
            botResponse.className = 'flex gap-3';
            botResponse.innerHTML = `
                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-robot text-purple-600 text-sm"></i>
                </div>
                <div class="bg-gray-100 rounded-2xl rounded-tl-none p-3 max-w-[70%]">
                    <p class="text-sm">Pesanmu sudah diterima. Tim support akan membalas dalam beberapa menit. Sementara menunggu, kamu bisa cek FAQ untuk jawaban instan.</p>
                    <p class="text-xs text-gray-500 mt-1">Just now</p>
                </div>
            `;
            
            chatBody.appendChild(botResponse);
            chatBody.scrollTop = chatBody.scrollHeight;
        }, 1000);
    }
    
    // Download Resource Function
    function downloadResource(resourceName) {
        const resources = {
            'anti-bullying': {
                name: 'Panduan_Anti_Bullying_CINTA.pdf',
                url: '/downloads/anti-bullying-guide.pdf'
            },
            'stress-management': {
                name: 'Video_Manajemen_Stress_CINTA.mp4',
                url: '/downloads/stress-management-video.mp4'
            },
            'mental-health-checklist': {
                name: 'Checklist_Kesehatan_Mental_CINTA.pdf',
                url: '/downloads/mental-health-checklist.pdf'
            }
        };
        
        const resource = resources[resourceName];
        if (!resource) return;
        
        // Show download notification
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fadeInUp';
        notification.innerHTML = `
            <div class="flex items-center gap-3">
                <i class="fas fa-download text-xl"></i>
                <div>
                    <p class="font-semibold">Download Dimulai!</p>
                    <p class="text-sm opacity-90">${resource.name}</p>
                </div>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(20px)';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
        
        // Simulate download (in real app, this would be actual download)
        console.log(`Downloading: ${resource.name} from ${resource.url}`);
    }
    
    // Keyboard Shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + F for FAQ search
        if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
            e.preventDefault();
            document.getElementById('faq-search').focus();
        }
        
        // Escape to close live chat
        if (e.key === 'Escape') {
            closeLiveChat();
        }
        
        // Enter to send chat message
        if (e.key === 'Enter' && document.activeElement.id === 'chat-input') {
            sendChatMessage();
        }
    });
</script>
@endsection