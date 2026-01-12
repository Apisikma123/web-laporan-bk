@extends('layouts.guest')

@section('title', 'home Konseling - CINTA ')
@push('styles')
    <!-- Override favicon langsung di halaman ini -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#8b5cf6">
    <meta name="msapplication-TileColor" content="#8b5cf6">
    <meta name="theme-color" content="#8b5cf6">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
@endpush
@section('content')

    <!-- Hero Section - Enhanced for teens -->
    <section class="hero-section fixed-bg relative min-h-[90vh] flex items-center justify-center overflow-hidden">
        <!-- Animated Particles Background -->
        <div class="absolute inset-0" id="particles-js"></div>
        
        <!-- Floating Shapes -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white/5 rounded-full animate-float-slow"></div>
            <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-purple-400/10 rounded-full animate-float-slower"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-pink-400/5 rounded-full animate-pulse"></div>
        </div>
        
        <!-- Main Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in-up">
            <!-- Tagline Badge -->
            <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-lg px-6 py-3 rounded-full mb-8 border border-white/30 animate-slide-down">
                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                <span class="text-white font-semibold text-sm">Platform Terpercaya untuk Konseling Remaja</span>
            </div>
            
            <!-- Main Title -->
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-6 leading-tight">
                <span class="text-white block mb-2">Butuh Tempat</span>
                <span class="relative inline-block">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-pink-300 to-purple-300 animate-gradient-x">
                        Curhat Aman?
                    </span>
                    <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-yellow-300 to-pink-300 rounded-full scale-x-0 animate-expand-width"></span>
                </span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-xl md:text-2xl text-white/90 mb-12 max-w-3xl mx-auto leading-relaxed font-medium">
                <span class="inline-flex items-center gap-2 bg-white/10 px-4 py-2 rounded-lg">
                    <i class="fas fa-heart text-pink-300 animate-heartbeat"></i>
                    CINTA - Ruang cerita rahasia untuk remaja Indonesia
                </span>
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16 animate-stagger-children">
                <a href="{{ route('complaint.create') }}" 
                   class="group relative px-8 py-5 rounded-2xl font-bold text-lg transition-all duration-500 hover:scale-105 transform-gpu">
                    <!-- Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-pink-500 rounded-2xl blur-xl opacity-70 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <!-- Button Content -->
                    <div class="relative bg-white text-gray-900 px-8 py-5 rounded-2xl font-bold text-lg flex items-center justify-center gap-3 hover:shadow-2xl transition-all duration-300">
                        <i class="fas fa-comment-medical text-xl group-hover:animate-bounce"></i>
                        <span>Mulai Konseling Gratis</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                    </div>
                </a>
                
                <a href="#how-it-works" 
                   class="group px-8 py-5 rounded-2xl font-bold text-lg border-3 border-white/50 text-white hover:bg-white/10 backdrop-blur-sm transition-all duration-300 flex items-center justify-center gap-3 hover:border-white">
                    <i class="fas fa-play text-sm group-hover:animate-spin"></i>
                    <span>Lihat Demo</span>
                </a>
            </div>
            
            <!-- Stats Cards - PERBAIKAN: Semua card sama tinggi dan sejajar -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto">
                @php
                    $stats = [
                        ['icon' => 'user-friends', 'value' => $totalStudents ?? 0, 'label' => 'Siswa Bergabung', 'color' => 'from-blue-500 to-blue-600', 'suffix' => '+'],
                        ['icon' => 'check-double', 'value' => $totalComplaints ?? 0, 'label' => 'Laporan Diterima', 'color' => 'from-green-500 to-green-600', 'suffix' => '+'],
                        ['icon' => 'shield-alt', 'value' => '100%', 'label' => 'Privasi Terjaga', 'color' => 'from-purple-500 to-purple-600', 'suffix' => ''],
                        ['icon' => 'headset', 'value' => '24/7', 'label' => 'Support Online', 'color' => 'from-pink-500 to-pink-600', 'suffix' => ''],
                    ];
                @endphp
                
                @foreach($stats as $stat)
                <div class="group cursor-pointer transform transition-all duration-300 hover:-translate-y-2 animate-slide-up" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <div class="stats-card bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 hover:border-white/40 transition-all duration-300">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br {{ $stat['color'] }} rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-{{ $stat['icon'] }} text-white text-lg"></i>
                            </div>
                            <div class="text-left flex-1">
                                <div class="stats-value text-white mb-1">
                                    @if(is_numeric(str_replace('+', '', $stat['value'])) && str_replace('+', '', $stat['value']) > 0)
                                    <span class="counter" data-target="{{ str_replace('+', '', $stat['value']) }}">0</span>{{ $stat['suffix'] }}
                                    @else
                                    {{ $stat['value'] }}{{ $stat['suffix'] }}
                                    @endif
                                </div>
                                <div class="stats-label text-white/80">{{ $stat['label'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Features Section - Interactive Cards -->
    <section id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <div class="inline-flex items-center gap-2 px-6 py-2 bg-purple-50 rounded-full mb-6">
                    <i class="fas fa-star text-purple-500"></i>
                    <span class="text-sm font-semibold text-purple-600">Kenapa Pilih CINTA?</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Dibuat Khusus untuk 
                    <span class="relative">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600">Generasi Z</span>
                        <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full"></span>
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Platform yang ngerti bahasa dan kebutuhan remaja masa kini
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $features = [
                        [
                            'icon' => 'user-shield',
                            'fa_icon' => 'lock',
                            'color' => 'purple',
                            'title' => 'Super Private',
                            'desc' => 'Cerita kamu cuma antara kamu dan BK. Ga ada yang tahu!',
                            'points' => ['Nama samaran oke', 'Data dienkripsi', 'Hanya BK yang baca'],
                            'hover_text' => 'Rahasia Terjaga!'
                        ],
                        [
                            'icon' => 'bolt',
                            'fa_icon' => 'bolt',
                            'color' => 'blue',
                            'title' => 'Respon Cepat',
                            'desc' => 'Kasus urgent diprioritaskan. Biasanya dibales dalam 24 jam.',
                            'points' => ['Monitoring 24/7', 'Prioritas darurat', 'Notif real-time'],
                            'hover_text' => 'Speed Matters!'
                        ],
                        [
                            'icon' => 'gamepad',
                            'fa_icon' => 'gamepad',
                            'color' => 'pink',
                            'title' => 'Seru & Easy',
                            'desc' => 'Desain kekinian yang gampang dipake dan nyaman di mata.',
                            'points' => ['UI/UX remaja banget', 'Warna cerah & fresh', 'Navigasi simpel'],
                            'hover_text' => 'Gaming Vibes!'
                        ]
                    ];
                @endphp
                
                @foreach($features as $index => $feature)
                <div class="group cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative h-full">
                        <!-- Main Card -->
                        <div class="relative bg-white p-8 rounded-3xl border-2 border-gray-100 h-full transform transition-all duration-500 group-hover:-translate-y-4 group-hover:border-{{ $feature['color'] }}-200 group-hover:shadow-2xl">
                            <!-- Corner Icon -->
                            <div class="absolute -top-3 -right-3 text-2xl transform group-hover:scale-125 group-hover:rotate-12 transition-transform duration-500">
                                <i class="fas fa-{{ $feature['fa_icon'] }} text-{{ $feature['color'] }}-500"></i>
                            </div>
                            
                            <!-- Icon -->
                            <div class="relative w-20 h-20 bg-gradient-to-br from-{{ $feature['color'] }}-50 to-{{ $feature['color'] }}-100 rounded-2xl flex items-center justify-center mb-6 mx-auto transform group-hover:scale-110 transition-transform duration-500">
                                <i class="fas fa-{{ $feature['icon'] }} text-{{ $feature['color'] }}-600 text-2xl"></i>
                                <div class="absolute -inset-4 bg-{{ $feature['color'] }}-100 rounded-full opacity-0 group-hover:opacity-30 blur-xl transition-opacity duration-500"></div>
                            </div>
                            
                            <!-- Content -->
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 text-center">{{ $feature['title'] }}</h3>
                            <p class="text-gray-600 mb-6 text-center">{{ $feature['desc'] }}</p>
                            
                            <!-- Points -->
                            <ul class="space-y-3 mb-6">
                                @foreach($feature['points'] as $point)
                                <li class="flex items-center text-gray-700 group/item">
                                    <div class="w-2 h-2 bg-{{ $feature['color'] }}-400 rounded-full mr-3 group-hover/item:animate-pulse"></div>
                                    <span>{{ $point }}</span>
                                </li>
                                @endforeach
                            </ul>
                            
                            <!-- Hover Reveal -->
                            <div class="absolute inset-0 bg-gradient-to-br from-{{ $feature['color'] }}-50 to-white/80 rounded-3xl opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center">
                                <div class="text-center p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <div class="text-3xl mb-3 text-{{ $feature['color'] }}-600">
                                        <i class="fas fa-{{ $index == 0 ? 'shield-alt' : ($index == 1 ? 'rocket' : 'magic') }}"></i>
                                    </div>
                                    <div class="font-bold text-gray-900 text-lg">{{ $feature['hover_text'] }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating Badge -->
                        <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-{{ $feature['color'] }}-500 to-{{ $feature['color'] }}-600 text-white px-4 py-1.5 rounded-full text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <i class="fas fa-thumbs-up mr-1"></i> Recommended
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How It Works - Interactive Timeline -->
    <section id="how-it-works" class="py-24 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-2 bg-blue-50 rounded-full mb-6">
                    <i class="fas fa-play-circle text-blue-500"></i>
                    <span class="text-sm font-semibold text-blue-600">Gampang Banget!</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    4 Langkah ke 
                    <span class="relative">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-600">Hati Lebih Lega</span>
                        <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-blue-600 to-cyan-600 rounded-full"></span>
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Cukup 10 menit, tim BK profesional siap membantumu
                </p>
            </div>
            
            <!-- Interactive Timeline -->
            <div class="relative" data-aos="fade-up" data-aos-delay="200">
                <!-- Connection Line -->
                <div class="hidden lg:block absolute top-1/2 left-0 right-0 h-2 bg-gradient-to-r from-blue-200 via-purple-200 to-pink-200 transform -translate-y-1/2 rounded-full"></div>
                <div class="hidden lg:block absolute top-1/2 left-0 right-0 h-2 bg-gradient-to-r from-blue-400 via-purple-400 to-pink-400 transform -translate-y-1/2 rounded-full animate-progress" style="width: 0%"></div>
                
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 lg:gap-4">
                    @php
                        $steps = [
                            [
                                'num' => '01', 
                                'title' => 'Curhat Online', 
                                'desc' => 'Isi form dengan jujur apa yang kamu rasakan', 
                                'icon' => 'edit', 
                                'fa_icon' => 'comment-dots',
                                'color' => 'blue', 
                                'time' => '2 menit',
                                'tip' => 'Jujur = Solusi tepat!'
                            ],
                            [
                                'num' => '02', 
                                'title' => 'Dapat Kode Rahasia', 
                                'desc' => 'Simpan kode tracking untuk pantau progress', 
                                'icon' => 'key', 
                                'fa_icon' => 'key',
                                'color' => 'purple', 
                                'time' => 'Instan',
                                'tip' => 'Jangan sampai hilang!'
                            ],
                            [
                                'num' => '03', 
                                'title' => 'Diproses BK', 
                                'desc' => 'Tim BK analisa dan siapkan solusi terbaik', 
                                'icon' => 'search', 
                                'fa_icon' => 'user-tie',
                                'color' => 'pink', 
                                'time' => '1-2 hari',
                                'tip' => 'Profesional handal!'
                            ],
                            [
                                'num' => '04', 
                                'title' => 'Solusi Siap!', 
                                'desc' => 'Dapat bantuan & follow-up berkala', 
                                'icon' => 'heart', 
                                'fa_icon' => 'sparkles',
                                'color' => 'green', 
                                'time' => 'Follow-up',
                                'tip' => 'Kamu nggak sendiri!'
                            ],
                        ];
                    @endphp
                    
                    @foreach($steps as $index => $step)
                    <div class="group relative z-10" data-step="{{ $index + 1 }}">
                        <!-- Step Connector (Mobile) -->
                        @if(!$loop->first)
                        <div class="lg:hidden absolute top-0 left-1/2 w-0.5 h-8 -translate-y-full -translate-x-1/2 bg-gradient-to-b from-gray-200 to-{{ $step['color'] }}-200"></div>
                        @endif
                        
                        <!-- Step Card -->
                        <div class="bg-white p-8 rounded-3xl border-2 border-gray-100 transform transition-all duration-500 group-hover:scale-105 group-hover:border-{{ $step['color'] }}-200 group-hover:shadow-2xl relative overflow-hidden">
                            <!-- Step Number Background -->
                            <div class="absolute -top-4 -right-4 text-7xl font-black text-{{ $step['color'] }}-50">{{ $step['num'] }}</div>
                            
                            <!-- Icon Badge -->
                            <div class="absolute -top-3 -left-3 text-xl bg-white p-2 rounded-xl shadow-lg transform group-hover:rotate-12 transition-transform text-{{ $step['color'] }}-600">
                                <i class="fas fa-{{ $step['fa_icon'] }}"></i>
                            </div>
                            
                            <!-- Main Content -->
                            <div class="relative">
                                <div class="w-16 h-16 bg-gradient-to-br from-{{ $step['color'] }}-100 to-{{ $step['color'] }}-300 rounded-2xl flex items-center justify-center mx-auto mb-6 transform group-hover:scale-110 group-hover:rotate-12 transition-all duration-500">
                                    <i class="fas fa-{{ $step['icon'] }} text-{{ $step['color'] }}-600 text-xl"></i>
                                </div>
                                
                                <h3 class="text-xl font-bold text-gray-900 mb-3 text-center">{{ $step['title'] }}</h3>
                                <p class="text-gray-600 text-center mb-4 text-sm">{{ $step['desc'] }}</p>
                                
                                <!-- Time Badge -->
                                <div class="flex items-center justify-center gap-2 mb-4">
                                    <i class="fas fa-clock text-{{ $step['color'] }}-500"></i>
                                    <span class="text-sm font-medium text-{{ $step['color'] }}-600">{{ $step['time'] }}</span>
                                </div>
                                
                                <!-- Tooltip on Hover -->
                                <div class="absolute inset-x-0 bottom-0 transform translate-y-full opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <div class="bg-{{ $step['color'] }}-50 border border-{{ $step['color'] }}-200 rounded-lg p-3 mt-2">
                                        <div class="flex items-center gap-2">
                                            <i class="fas fa-lightbulb text-{{ $step['color'] }}-500"></i>
                                            <span class="text-sm font-medium text-{{ $step['color'] }}-700">{{ $step['tip'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Progress Dot -->
                            <div class="absolute top-1/2 -right-3 w-6 h-6 bg-white border-4 border-{{ $step['color'] }}-400 rounded-full transform -translate-y-1/2 group-hover:scale-150 group-hover:shadow-lg transition-all duration-300"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Interactive CTA -->
                <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ route('complaint.create') }}" 
                       class="group inline-flex items-center gap-4 px-10 py-5 rounded-2xl font-bold text-lg text-white transition-all duration-500 hover:scale-105 hover:shadow-2xl shadow-lg"
                       style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <div class="relative">
                            <i class="fas fa-play text-xl"></i>
                            <div class="absolute inset-0 animate-ping opacity-20"><i class="fas fa-play"></i></div>
                        </div>
                        <span>Mulai Sekarang - Gratis!</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                    </a>
                    <p class="text-gray-500 text-sm mt-4 flex items-center justify-center gap-2">
                        <i class="fas fa-smile-wink text-yellow-500"></i>
                        <span>100% aman, gratis, dan tanpa iklan</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials - Interactive Carousel -->
    <section class="py-24 bg-gradient-to-b from-white to-purple-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-2 bg-pink-50 rounded-full mb-6">
                    <i class="fas fa-comment-alt text-pink-500"></i>
                    <span class="text-sm font-semibold text-pink-600">Dari Teman-teman Sebaya</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Mereka yang Sudah 
                    <span class="relative">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-600">Merasa Lebih Baik</span>
                        <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-pink-600 to-rose-600 rounded-full"></span>
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Pengalaman nyata dari remaja yang menggunakan CINTA
                </p>
            </div>
            
            @if($testimonials->count() > 0)
            <!-- Testimonials Grid with Hover Effects -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach($testimonials as $testimonial)
                <div class="group testimonial-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <!-- Card -->
                    <div class="relative bg-white p-6 rounded-3xl border border-gray-200 h-full transform transition-all duration-500 group-hover:-translate-y-3 group-hover:shadow-2xl overflow-hidden">
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 opacity-5">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-purple-300 rounded-full -translate-y-16 translate-x-16"></div>
                            <div class="absolute bottom-0 left-0 w-24 h-24 bg-pink-300 rounded-full translate-y-12 -translate-x-12"></div>
                        </div>
                        
                        <!-- Quote Icon -->
                        <div class="absolute top-4 right-4 text-5xl text-purple-100">
                            <i class="fas fa-quote-right"></i>
                        </div>
                        
                        <!-- Rating -->
                        <div class="flex items-center gap-1 mb-4">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star text-{{ $i <= $testimonial->rating ? 'yellow-400' : 'gray-200' }} {{ $i <= $testimonial->rating ? 'animate-pulse' : '' }}" 
                                   style="animation-delay: {{ $i * 0.1 }}s"></i>
                            @endfor
                            <span class="ml-2 text-sm text-gray-500">{{ $testimonial->rating }}/5</span>
                        </div>
                        
                        <!-- Testimonial Text -->
                        <p class="text-gray-700 mb-6 relative z-10 italic">
                            "{{ Str::limit($testimonial->message, 100) }}"
                        </p>
                        
                        <!-- Author Info -->
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-100 to-pink-100 rounded-xl flex items-center justify-center text-lg font-bold text-purple-600 transform group-hover:scale-110 transition-transform">
                                    {{ substr($testimonial->name, 0, 1) }}
                                </div>
                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-400 rounded-full flex items-center justify-center border-2 border-white">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-gray-900 truncate">{{ $testimonial->name }}</h4>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <span>{{ $testimonial->class ?? 'Siswa' }}</span>
                                    @if($testimonial->counseling_type)
                                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                    <span class="text-purple-600 font-medium">{{ $testimonial->counseling_type }}</span>
                                    @endif
                                </div>
                                <div class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                                    <i class="far fa-clock"></i>
                                   {{ optional($testimonial->created_at)->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                        
                        <!-- Hover Effect -->
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    
                    <!-- Reflection Shadow -->
                    <div class="absolute inset-x-0 bottom-0 h-4 bg-gradient-to-t from-gray-200/50 to-transparent rounded-b-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10"></div>
                </div>
                @endforeach
            </div>
            
            <!-- Interactive Stats -->
            <div class="bg-white rounded-3xl p-8 border border-gray-200 shadow-lg" data-aos="fade-up">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl border border-purple-100 transform hover:scale-105 transition-transform duration-300">
                        <div class="text-4xl font-bold text-purple-600 mb-2">{{ $totalComplaints ?? 0 }}</div>
                        <div class="text-sm text-gray-600 font-medium">Konseling Selesai</div>
                        <div class="h-1 w-16 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mx-auto mt-3"></div>
                    </div>
                    <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl border border-blue-100 transform hover:scale-105 transition-transform duration-300">
                        <div class="text-4xl font-bold text-blue-600 mb-2">{{ $totalStudents ?? 0 }}</div>
                        <div class="text-sm text-gray-600 font-medium">Siswa Terbantu</div>
                        <div class="h-1 w-16 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-full mx-auto mt-3"></div>
                    </div>
                    <div class="text-center p-6 bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl border border-green-100 transform hover:scale-105 transition-transform duration-300">
                        <div class="text-4xl font-bold text-green-600 mb-2">{{ $testimonials->count() }}</div>
                        <div class="text-sm text-gray-600 font-medium">Testimoni Positif</div>
                        <div class="h-1 w-16 bg-gradient-to-r from-green-400 to-emerald-400 rounded-full mx-auto mt-3"></div>
                    </div>
                </div>
            </div>
            
            @else
            <!-- Empty State with Animation -->
            <div class="text-center py-16" data-aos="fade-up">
                <div class="inline-block relative mb-8">
                    <div class="w-32 h-32 bg-gradient-to-br from-purple-100 to-pink-100 rounded-3xl flex items-center justify-center mx-auto transform hover:rotate-12 transition-transform duration-500">
                        <i class="fas fa-comment-dots text-purple-500 text-4xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-10 h-10 bg-yellow-400 rounded-full flex items-center justify-center animate-bounce">
                        <i class="fas fa-exclamation text-white text-sm"></i>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum Ada Testimoni</h3>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                    Jadilah yang pertama berbagi pengalaman dan bantu teman-teman lainnya!
                </p>
                <a href="{{ route('complaint.create') }}" 
                   class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-2xl font-semibold hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-pen-fancy"></i>
                    <span>Tulis Pengalamanmu</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                </a>
            </div>
            @endif
        </div>
    </section>

    <!-- Problem Types - Data Visualization -->
    <section class="py-24 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-6 py-2 bg-indigo-50 rounded-full mb-6">
                    <i class="fas fa-chart-pie text-indigo-500"></i>
                    <span class="text-sm font-semibold text-indigo-600">Data & Fakta</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Masalah yang 
                    <span class="relative">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-600">Sering Dihadapi</span>
                        <span class="absolute -bottom-2 left-0 w-full h-1.5 bg-gradient-to-r from-indigo-600 to-blue-600 rounded-full"></span>
                    </span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Berdasarkan analisis {{ $totalComplaints ?? 0 }} konseling di platform CINTA
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Interactive Progress Bars -->
                <div class="space-y-8" data-aos="fade-right">
                    @php
                        $problemTypes = [
                            ['type' => 'Masalah Akademik', 'percent' => 35, 'color' => 'blue', 'icon' => 'book', 'fa_icon' => 'book'],
                            ['type' => 'Konflik Pertemanan', 'percent' => 25, 'color' => 'purple', 'icon' => 'users', 'fa_icon' => 'user-friends'],
                            ['type' => 'Keluarga & Orang Tua', 'percent' => 20, 'color' => 'pink', 'icon' => 'home', 'fa_icon' => 'home'],
                            ['type' => 'Kecemasan & Stress', 'percent' => 15, 'color' => 'orange', 'icon' => 'brain', 'fa_icon' => 'brain'],
                            ['type' => 'Percaya Diri', 'percent' => 5, 'color' => 'green', 'icon' => 'star', 'fa_icon' => 'star'],
                        ];
                    @endphp
                    
                    @foreach($problemTypes as $problem)
                    <div class="group" data-percent="{{ $problem['percent'] }}">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 bg-{{ $problem['color'] }}-50 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i class="fas fa-{{ $problem['fa_icon'] }} text-{{ $problem['color'] }}-600"></i>
                                    </div>
                                </div>
                                <span class="font-semibold text-gray-900">{{ $problem['type'] }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-2xl font-bold text-{{ $problem['color'] }}-600">{{ $problem['percent'] }}%</span>
                                <i class="fas fa-chevron-right text-{{ $problem['color'] }}-400 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                        <div class="h-3 bg-gray-100 rounded-full overflow-hidden relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-{{ $problem['color'] }}-100 to-{{ $problem['color'] }}-200 rounded-full"></div>
                            <div class="h-full bg-gradient-to-r from-{{ $problem['color'] }}-400 to-{{ $problem['color'] }}-600 rounded-full transform origin-left scale-x-0 transition-transform duration-1000 ease-out progress-bar"
                                 data-target="{{ $problem['percent'] }}"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Info Card with Animation -->
                <div data-aos="fade-left" data-aos-delay="200">
                    <div class="relative group">
                        <div class="bg-gradient-to-br from-indigo-500 to-blue-600 rounded-3xl p-10 text-white transform hover:scale-[1.02] transition-all duration-500 overflow-hidden">
                            <!-- Animated Background -->
                            <div class="absolute inset-0">
                                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-32 translate-x-32"></div>
                                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-24 -translate-x-24"></div>
                            </div>
                            
                            <!-- Content -->
                            <div class="relative z-10">
                                <div class="text-4xl mb-6 transform group-hover:scale-110 transition-transform duration-500 inline-block">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h3 class="text-2xl font-bold mb-4">Fakta Menarik</h3>
                                <p class="text-blue-100 mb-8 leading-relaxed">
                                    <span class="text-yellow-300 font-semibold">{{ $totalComplaints ?? 0 }} siswa</span> telah menemukan solusi melalui platform CINTA. 
                                    Rata-rata waktu respons untuk kasus darurat adalah <span class="text-yellow-300 font-semibold">kurang dari 24 jam</span>.
                                </p>
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-5 text-center transform hover:scale-105 transition-transform duration-300">
                                        <div class="text-3xl font-bold mb-1">{{ $totalComplaints ?? 0 }}+</div>
                                        <div class="text-sm text-blue-200">Total Konseling</div>
                                    </div>
                                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-5 text-center transform hover:scale-105 transition-transform duration-300">
                                        <div class="text-3xl font-bold mb-1"><24 jam</div>
                                        <div class="text-sm text-blue-200">Respons Cepat</div>
                                    </div>
                                </div>
                                
                                <!-- Callout -->
                                <div class="mt-8 p-4 bg-white/10 rounded-2xl border border-white/20">
                                    <div class="flex items-center gap-3">
                                        <i class="fas fa-lightbulb text-yellow-300 text-xl"></i>
                                        <div>
                                            <div class="font-semibold">Tips dari BK:</div>
                                            <div class="text-sm text-blue-200">Jangan ragu untuk curhat sejak dini!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-3 -right-3 w-6 h-6 bg-yellow-400 rounded-full animate-ping opacity-70"></div>
                        <div class="absolute -bottom-3 -left-3 w-4 h-4 bg-pink-400 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA - Interactive -->
    <section class="relative py-24 overflow-hidden bg-gradient-to-br from-purple-900 via-pink-900 to-rose-900">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-full h-full bg-[url('data:image/svg+xml,%3Csvg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3 1.343 3 3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z" fill="%239C92AC" fill-opacity="0.05" fill-rule="evenodd"/%3E%3C/svg%3E')] opacity-10"></div>
        </div>
        
        <!-- Interactive Stars -->
        <div class="absolute inset-0" id="stars-container"></div>
        
        <!-- Main Content -->
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <!-- Animated Badge -->
            <div class="inline-flex items-center gap-3 bg-gradient-to-r from-yellow-400/20 to-pink-400/20 backdrop-blur-lg px-8 py-4 rounded-full mb-10 border border-white/30 animate-pulse-slow">
                <div class="w-3 h-3 bg-green-400 rounded-full animate-ping"></div>
                <span class="text-white font-bold text-lg">#JanganTahanSendiri</span>
                <i class="fas fa-hands-helping text-yellow-300 animate-bounce"></i>
            </div>
            
            <!-- Main Message -->
            <h2 class="text-5xl md:text-7xl font-bold text-white mb-10 leading-tight">
                <span class="block mb-6">Siap Legakan Hati?</span>
                <span class="relative inline-block">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 via-pink-300 to-white animate-gradient-x">
                        Curhat itu Sehat!
                    </span>
                    <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 w-48 h-2 bg-gradient-to-r from-yellow-300 to-pink-300 rounded-full blur-md opacity-70"></div>
                </span>
            </h2>
            
            <p class="text-xl text-white/90 mb-12 max-w-2xl mx-auto leading-relaxed font-medium">
                Setiap masalah punya solusi. Yuk, temukan jalan keluar terbaik bersama tim BK profesional yang peduli!
            </p>
            
            <!-- Interactive CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16 animate-stagger-children">
                <a href="{{ route('complaint.create') }}" 
                   id="main-cta"
                   class="group relative px-12 py-6 rounded-2xl font-bold text-xl text-purple-900 transition-all duration-500 hover:scale-105 transform-gpu">
                    <!-- Animated Border -->
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400 via-pink-400 to-purple-400 rounded-2xl animate-gradient-x p-0.5">
                        <div class="absolute inset-0 bg-white rounded-2xl blur-sm opacity-70 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    
                    <!-- Button Content -->
                    <div class="relative bg-gradient-to-r from-white to-gray-50 px-12 py-6 rounded-2xl font-bold text-xl flex items-center justify-center gap-4 group-hover:shadow-2xl transition-all duration-300">
                        <i class="fas fa-comment-medical text-2xl group-hover:animate-bounce"></i>
                        <span>Mulai Curhat Sekarang</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-3 transition-transform duration-300"></i>
                    </div>
                    
                    <!-- Sparkle Effect -->
                    <div class="absolute -top-2 -right-2 text-yellow-300 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-spin-slow">
                        <i class="fas fa-sparkle"></i>
                    </div>
                </a>
                
                <a href="{{ route('complaint.track') }}" 
                   class="group px-10 py-5 rounded-2xl font-bold text-lg border-3 border-white/40 text-white hover:bg-white/10 backdrop-blur-sm transition-all duration-300 flex items-center justify-center gap-3 hover:border-white/60">
                    <i class="fas fa-search group-hover:animate-pulse"></i>
                    <span>Lacak Laporan</span>
                    <i class="fas fa-external-link-alt text-sm group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            
            <!-- Trust Badges with Animation -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-2xl mx-auto">
                <div class="flex items-center justify-center gap-3 text-white/80 bg-white/5 backdrop-blur-sm px-6 py-4 rounded-2xl border border-white/10 hover:bg-white/10 transition-all duration-300 group">
                    <i class="fas fa-shield-alt text-green-300 group-hover:animate-bounce"></i>
                    <div class="text-left">
                        <div class="font-semibold">100% Aman</div>
                        <div class="text-xs text-white/60">Data terenkripsi</div>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-3 text-white/80 bg-white/5 backdrop-blur-sm px-6 py-4 rounded-2xl border border-white/10 hover:bg-white/10 transition-all duration-300 group">
                    <i class="fas fa-user-secret text-purple-300 group-hover:animate-pulse"></i>
                    <div class="text-left">
                        <div class="font-semibold">Identitas Rahasia</div>
                        <div class="text-xs text-white/60">Nama samaran</div>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-3 text-white/80 bg-white/5 backdrop-blur-sm px-6 py-4 rounded-2xl border border-white/10 hover:bg-white/10 transition-all duration-300 group">
                    <i class="fas fa-clock text-cyan-300 group-hover:animate-spin"></i>
                    <div class="text-left">
                        <div class="font-semibold">Respon 24/7</div>
                        <div class="text-xs text-white/60">Tim selalu siap</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Floating Chat Bubble -->
<div class="absolute bottom-8 right-8 animate-float">
    <a href="{{ route('help') }}" class="block">
        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-4 border border-white/20 max-w-xs hover:bg-white/20 transition-all duration-300">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center">
                    <i class="fas fa-comment text-white"></i>
                </div>
                <div class="text-white text-sm">
                    <div class="font-semibold">Butuh bantuan?</div>
                    <div class="text-white/70">Klik untuk FAQ & Support</div>
                </div>
            </div>
        </div>
    </a>
</div>

    <!-- Custom CSS Animations -->
    <style>
        /* Background Ungu Fixed untuk Hero Section */
        .hero-section.fixed-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            overflow: hidden;
        }
        
        /* Fix untuk stats cards */
        .stats-card {
            min-height: 120px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .stats-value {
            font-size: 1.875rem;
            font-weight: 700;
            line-height: 2.25rem;
            margin-bottom: 0.25rem;
        }
        
        .stats-label {
            font-size: 0.875rem;
            font-weight: 500;
            line-height: 1.25rem;
        }
        
        /* Keyframe Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        @keyframes float-slow {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-40px) scale(1.1); }
        }
        
        @keyframes float-slower {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-60px) scale(1.2); }
        }
        
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        @keyframes heartbeat {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        @keyframes expand-width {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }
        
        @keyframes slide-down {
            from { 
                opacity: 0;
                transform: translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slide-up {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes progress {
            from { width: 0%; }
            to { width: 100%; }
        }
        
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        /* Animation Classes */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-float-slow {
            animation: float-slow 8s ease-in-out infinite;
        }
        
        .animate-float-slower {
            animation: float-slower 10s ease-in-out infinite;
        }
        
        .animate-pulse-slow {
            animation: pulse-slow 2s ease-in-out infinite;
        }
        
        .animate-heartbeat {
            animation: heartbeat 1.5s ease-in-out infinite;
        }
        
        .animate-gradient-x {
            background-size: 200% auto;
            animation: gradient-x 3s ease infinite;
        }
        
        .animate-expand-width {
            animation: expand-width 1s ease-out forwards;
            animation-delay: 0.5s;
        }
        
        .animate-slide-down {
            animation: slide-down 0.8s ease-out;
        }
        
        .animate-slide-up {
            animation: slide-up 0.6s ease-out forwards;
            opacity: 0;
        }
        
        .animate-fade-in {
            animation: fade-in 1s ease-out;
        }
        
        .animate-fade-in-up {
            animation: slide-up 1s ease-out;
        }
        
        .animate-progress {
            animation: progress 2s ease-out forwards;
        }
        
        .animate-spin-slow {
            animation: spin-slow 3s linear infinite;
        }
        
        /* Stagger Children Animation */
        .animate-stagger-children > * {
            opacity: 0;
            animation: slide-up 0.6s ease-out forwards;
        }
        
        .animate-stagger-children > *:nth-child(1) { animation-delay: 0.1s; }
        .animate-stagger-children > *:nth-child(2) { animation-delay: 0.2s; }
        .animate-stagger-children > *:nth-child(3) { animation-delay: 0.3s; }
        .animate-stagger-children > *:nth-child(4) { animation-delay: 0.4s; }
        
        .animate-stagger-children-delayed > * {
            opacity: 0;
            animation: slide-up 0.6s ease-out forwards;
        }
        
        .animate-stagger-children-delayed > *:nth-child(1) { animation-delay: 0.5s; }
        .animate-stagger-children-delayed > *:nth-child(2) { animation-delay: 0.6s; }
        .animate-stagger-children-delayed > *:nth-child(3) { animation-delay: 0.7s; }
        .animate-stagger-children-delayed > *:nth-child(4) { animation-delay: 0.8s; }
        
        /* Hover Effects */
        .transform-gpu {
            transform: translateZ(0);
        }
        
        .group:hover .group-hover\:border-\[\#color\]-200 {
            border-color: inherit;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #667eea, #764ba2);
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #764ba2, #667eea);
        }
        
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Selection Color */
        ::selection {
            background: rgba(102, 126, 234, 0.3);
            color: #fff;
        }
        
        /* Focus Styles */
        a:focus, button:focus {
            outline: 2px solid #667eea;
            outline-offset: 2px;
        }
        
        /* Loading States */
        .loading {
            position: relative;
            overflow: hidden;
        }
        
        .loading::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: loading 1.5s infinite;
        }
        
        @keyframes loading {
            from { left: -100%; }
            to { left: 100%; }
        }
    </style>

    <!-- JavaScript for Interactive Elements -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS (Animate On Scroll)
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    once: true,
                    offset: 100
                });
            }
            
            // Animated Counters untuk stats cards
            const counters = document.querySelectorAll('.counter');
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px 0px -100px 0px'
            };
            
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = +counter.getAttribute('data-target');
                        const duration = 2000; // 2 seconds
                        const step = target / (duration / 16); // 60fps
                        let current = 0;
                        
                        const updateCounter = () => {
                            current += step;
                            if (current < target) {
                                counter.textContent = Math.floor(current);
                                requestAnimationFrame(updateCounter);
                            } else {
                                counter.textContent = target;
                            }
                        };
                        
                        updateCounter();
                        counterObserver.unobserve(counter);
                    }
                });
            }, observerOptions);
            
            counters.forEach(counter => counterObserver.observe(counter));
            
            // Progress Bars for Problem Types
            const problemProgressBars = document.querySelectorAll('.progress-bar[data-target]');
            const problemProgressBarObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bar = entry.target;
                        const target = bar.getAttribute('data-target');
                        bar.style.transform = `scaleX(${target / 100})`;
                        problemProgressBarObserver.unobserve(bar);
                    }
                });
            }, {
                threshold: 0.5,
                rootMargin: '0px 0px -50px 0px'
            });

            problemProgressBars.forEach(bar => problemProgressBarObserver.observe(bar));
            
            // Interactive Timeline Progress
            const timelineSteps = document.querySelectorAll('[data-step]');
            const progressLine = document.querySelector('.animate-progress');
            
            if (progressLine) {
                let currentStep = 0;
                
                const updateProgress = () => {
                    const width = (currentStep / timelineSteps.length) * 100;
                    progressLine.style.width = `${width}%`;
                };
                
                // Animate steps on scroll
                const stepObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const step = parseInt(entry.target.getAttribute('data-step'));
                            if (step > currentStep) {
                                currentStep = step;
                                updateProgress();
                            }
                        }
                    });
                }, {
                    threshold: 0.5,
                    rootMargin: '0px 0px -50px 0px'
                });
                
                timelineSteps.forEach(step => stepObserver.observe(step));
            }
            
            // Interactive CTA Button
            const mainCTA = document.getElementById('main-cta');
            if (mainCTA) {
                mainCTA.addEventListener('mouseenter', function() {
                    const sparkle = this.querySelector('.fa-sparkle');
                    if (sparkle) {
                        sparkle.style.animation = 'spin-slow 1s linear';
                    }
                });
                
                mainCTA.addEventListener('mouseleave', function() {
                    const sparkle = this.querySelector('.fa-sparkle');
                    if (sparkle) {
                        sparkle.style.animation = 'spin-slow 3s linear infinite';
                    }
                });
            }
            
            // Create Floating Stars in CTA Section
            const starsContainer = document.getElementById('stars-container');
            if (starsContainer) {
                for (let i = 0; i < 50; i++) {
                    const star = document.createElement('div');
                    star.className = 'absolute bg-white rounded-full';
                    star.style.width = `${Math.random() * 3 + 1}px`;
                    star.style.height = star.style.width;
                    star.style.left = `${Math.random() * 100}%`;
                    star.style.top = `${Math.random() * 100}%`;
                    star.style.opacity = `${Math.random() * 0.5 + 0.1}`;
                    star.style.animation = `float ${Math.random() * 10 + 5}s ease-in-out infinite`;
                    star.style.animationDelay = `${Math.random() * 5}s`;
                    starsContainer.appendChild(star);
                }
            }
            
            // Interactive Problem Type Bars
            const problemGroups = document.querySelectorAll('[data-percent]');
            problemGroups.forEach(group => {
                group.addEventListener('mouseenter', function() {
                    const bar = this.querySelector('[data-target]');
                    if (bar) {
                        bar.style.transition = 'transform 0.3s ease-out';
                        bar.style.transform = `scaleX(${parseInt(this.getAttribute('data-percent')) / 100})`;
                    }
                });
            });
            
            // Smooth Scroll for Anchor Links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Add Ripple Effect to Buttons
            const buttons = document.querySelectorAll('a[href*="complaint"]');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(255, 255, 255, 0.7);
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        width: ${size}px;
                        height: ${size}px;
                        top: ${y}px;
                        left: ${x}px;
                        pointer-events: none;
                    `;
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                });
            });
            
            // Add CSS for Ripple
            const style = document.createElement('style');
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(4);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
            
            // Initialize Particles.js if available
            if (typeof particlesJS !== 'undefined') {
                particlesJS('particles-js', {
                    particles: {
                        number: { value: 80, density: { enable: true, value_area: 800 } },
                        color: { value: "#ffffff" },
                        shape: { type: "circle" },
                        opacity: { value: 0.3, random: true },
                        size: { value: 3, random: true },
                        line_linked: {
                            enable: true,
                            distance: 150,
                            color: "#ffffff",
                            opacity: 0.1,
                            width: 1
                        },
                        move: {
                            enable: true,
                            speed: 1,
                            direction: "none",
                            random: true,
                            straight: false,
                            out_mode: "out",
                            bounce: false
                        }
                    },
                    interactivity: {
                        detect_on: "canvas",
                        events: {
                            onhover: { enable: true, mode: "repulse" },
                            onclick: { enable: true, mode: "push" }
                        }
                    }
                });
            }
        });
        
        // Add loading state to form submission
        document.addEventListener('submit', function(e) {
            const form = e.target;
            if (form.method === 'post') {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.classList.add('loading');
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Memproses...';
                    submitBtn.disabled = true;
                }
            }
        });
        
        // Add keyboard navigation
        document.addEventListener('keydown', function(e) {
            // Focus trap for accessibility
            if (e.key === 'Tab') {
                const focusable = document.querySelectorAll('a[href], button, input, textarea, select');
                const first = focusable[0];
                const last = focusable[focusable.length - 1];
                
                if (e.shiftKey) {
                    if (document.activeElement === first) {
                        last.focus();
                        e.preventDefault();
                    }
                } else {
                    if (document.activeElement === last) {
                        first.focus();
                        e.preventDefault();
                    }
                }
            }
            
            // Space/Enter to activate buttons
            if ((e.key === 'Enter' || e.key === ' ') && e.target.tagName === 'BUTTON') {
                e.preventDefault();
                e.target.click();
            }
        });
    </script>

    <!-- External Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
@endsection