{{-- resources/views/students/complaints/result.blade.php --}}
@extends('layouts.guest')

@section('title', 'Status Laporan - CINTA BK')

@section('content')
@php
    // Debug sementara
    // dd($complaint);
@endphp

<div class="min-h-screen bg-gradient-to-br from-blue-50 via-cyan-50 to-purple-50 py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Background Animations -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-20 left-1/2 transform -translate-x-1/2 w-96 h-96 bg-cyan-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    
    <div class="max-w-6xl mx-auto relative z-10">
        <!-- Header -->
        <div class="text-center mb-10 animate-fadeIn">
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-100 to-pink-100 px-4 py-2 rounded-full mb-4">
                <i class="fas fa-file-alt text-purple-500"></i>
                <span class="text-sm font-medium text-purple-700">Detail Laporan</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Status Laporan Kamu
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Pantau perkembangan laporan dan respon dari tim BK
            </p>
        </div>
        
        <!-- Status Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 mb-8 animate-fadeIn delay-100">
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 mb-3">Status Laporan</h2>
                        <div class="flex items-center gap-4">
                            @php
                                $status = strtolower($complaint->status);
                                $statusConfig = [
                                    'pending' => [
                                        'color' => 'bg-gradient-to-r from-yellow-100 to-orange-100',
                                        'text' => 'text-yellow-800',
                                        'border' => 'border-yellow-200',
                                        'icon' => 'fas fa-clock',
                                        'label' => 'Menunggu'
                                    ],
                                    'in_progress' => [
                                        'color' => 'bg-gradient-to-r from-blue-100 to-cyan-100',
                                        'text' => 'text-blue-800',
                                        'border' => 'border-blue-200',
                                        'icon' => 'fas fa-spinner fa-spin',
                                        'label' => 'Diproses'
                                    ],
                                    'completed' => [
                                        'color' => 'bg-gradient-to-r from-green-100 to-emerald-100',
                                        'text' => 'text-green-800',
                                        'border' => 'border-green-200',
                                        'icon' => 'fas fa-check-circle',
                                        'label' => 'Selesai'
                                    ],
                                    'cancelled' => [
                                        'color' => 'bg-gradient-to-r from-red-100 to-pink-100',
                                        'text' => 'text-red-800',
                                        'border' => 'border-red-200',
                                        'icon' => 'fas fa-times-circle',
                                        'label' => 'Dibatalkan'
                                    ]
                                ];
                                
                                $config = $statusConfig[$status] ?? $statusConfig['pending'];
                            @endphp
                            
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium {{ $config['color'] }} {{ $config['text'] }} border {{ $config['border'] }}">
                                <i class="{{ $config['icon'] }} mr-2"></i> 
                                {{ $config['label'] }}
                            </span>
                            
                            <span class="text-sm text-gray-500 flex items-center">
                                <i class="fas fa-calendar-alt mr-1"></i>
                                {{ $complaint->created_at->format('d M Y') }}
                            </span>
                            
                            @if($complaint->completed_at && $status === 'completed')
                            <span class="text-sm text-green-600 flex items-center">
                                <i class="fas fa-calendar-check mr-1"></i>
                                Selesai: {{ $complaint->completed_at->format('d M Y') }}
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-2xl font-bold text-purple-600 mb-1 font-mono">#{{ $complaint->unique_code }}</div>
                        <div class="text-sm text-gray-500">Kode Rahasia</div>
                    </div>
                </div>
            </div>
            
            <!-- Progress Bar -->
            <div class="p-6">
                <div class="mb-6">
                    <div class="flex justify-between text-sm text-gray-600 mb-3">
                        <span class="font-medium">Proses Laporan</span>
                        <span>
                            @php
                                $progress = match($status) {
                                    'pending' => 25,
                                    'in_progress' => 60,
                                    'completed' => 100,
                                    'cancelled' => 100,
                                    default => 0
                                };
                            @endphp
                            {{ $progress }}%
                        </span>
                    </div>
                    <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-500 to-purple-500 rounded-full" 
                             style="width: {{ $progress }}%"></div>
                    </div>
                </div>
                
                <!-- Timeline -->
                <div class="mt-8 space-y-6">
                    <h3 class="font-medium text-gray-700 mb-4">Timeline Proses:</h3>
                    
                    @foreach([
                        [
                            'status' => 'pending',
                            'icon' => 'fas fa-paper-plane',
                            'label' => 'Laporan Diterima',
                            'description' => 'Laporan kamu sudah kami terima',
                            'date' => $complaint->created_at->format('d M Y, H:i'),
                            'active' => true,
                            'completed' => true
                        ],
                        [
                            'status' => 'in_progress',
                            'icon' => 'fas fa-user-tie',
                            'label' => 'Sedang Diproses',
                            'description' => 'Tim BK sedang menangani laporan',
                            'date' => in_array($status, ['in_progress', 'completed', 'cancelled']) 
                                ? ($complaint->updated_at->format('d M Y, H:i') ?? 'Sedang berlangsung')
                                : 'Menunggu',
                            'active' => in_array($status, ['in_progress', 'completed', 'cancelled']),
                            'completed' => in_array($status, ['completed', 'cancelled'])
                        ],
                        [
                            'status' => 'completed',
                            'icon' => 'fas fa-check-double',
                            'label' => 'Selesai Ditangani',
                            'description' => 'Laporan telah ditanggapi',
                            'date' => $status === 'completed' 
                                ? ($complaint->completed_at?->format('d M Y, H:i') ?? $complaint->updated_at->format('d M Y, H:i'))
                                : ($status === 'cancelled' ? 'Dibatalkan' : 'Estimasi: ' . $complaint->created_at->addDays(3)->format('d M')),
                            'active' => $status === 'completed',
                            'completed' => $status === 'completed'
                        ]
                    ] as $index => $item)
                    <div class="flex items-start">
                        <div class="flex-shrink-0 relative">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center 
                                        {{ $item['completed'] ? 'bg-gradient-to-r from-green-500 to-emerald-500 text-white' : 
                                          ($item['active'] ? 'bg-gradient-to-r from-blue-500 to-cyan-500 text-white' : 'bg-gray-200 text-gray-500') }}">
                                <i class="{{ $item['icon'] }} text-sm"></i>
                            </div>
                            
                            @if($index < 2)
                            <div class="absolute left-1/2 transform -translate-x-1/2 top-10 w-0.5 h-8 
                                        {{ $item['completed'] ? 'bg-gradient-to-b from-green-500 to-emerald-500' : 
                                          ($item['active'] ? 'bg-gradient-to-b from-blue-500 to-cyan-500' : 'bg-gray-300') }}">
                            </div>
                            @endif
                        </div>
                        
                        <div class="ml-4 flex-1">
                            <div class="flex flex-col md:flex-row md:items-center justify-between">
                                <div>
                                    <h4 class="font-medium {{ $item['active'] ? 'text-gray-800' : 'text-gray-500' }}">
                                        {{ $item['label'] }}
                                    </h4>
                                    <p class="text-sm {{ $item['active'] ? 'text-gray-600' : 'text-gray-400' }} mt-1">
                                        {{ $item['description'] }}
                                    </p>
                                    @if($item['active'] && $item['status'] == 'in_progress' && $complaint->counselor_name)
                                    <div class="mt-2 text-sm text-blue-600">
                                        <i class="fas fa-user-tie mr-1"></i> 
                                        Ditangani oleh: {{ $complaint->counselor_name }}
                                    </div>
                                    @endif
                                </div>
                                <div class="mt-2 md:mt-0">
                                    <span class="text-sm {{ $item['active'] ? 'text-gray-600' : 'text-gray-400' }}">
                                        {{ $item['date'] }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Complaint Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Complaint Details Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 animate-fadeIn delay-200">
                    <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-cyan-50">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-file-medical text-blue-500 mr-3"></i>
                            Detail Laporan
                        </h2>
                    </div>
                    
                    <div class="p-6 space-y-6">
                        <!-- Basic Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Jenis Masalah</label>
                                    <div class="flex items-center">
                                        @php
                                            $typeIcons = [
                                                'akademik' => ['icon' => 'fas fa-book-open', 'color' => 'text-blue-500', 'bg' => 'bg-blue-50'],
                                                'sosial' => ['icon' => 'fas fa-users', 'color' => 'text-green-500', 'bg' => 'bg-green-50'],
                                                'karir' => ['icon' => 'fas fa-graduation-cap', 'color' => 'text-yellow-500', 'bg' => 'bg-yellow-50'],
                                                'pribadi' => ['icon' => 'fas fa-brain', 'color' => 'text-pink-500', 'bg' => 'bg-pink-50'],
                                                'darurat' => ['icon' => 'fas fa-exclamation-triangle', 'color' => 'text-red-500', 'bg' => 'bg-red-50'],
                                                'lainnya' => ['icon' => 'fas fa-question-circle', 'color' => 'text-gray-500', 'bg' => 'bg-gray-50']
                                            ];
                                            $typeConfig = $typeIcons[$complaint->counseling_type] ?? $typeIcons['lainnya'];
                                        @endphp
                                        <div class="w-12 h-12 rounded-xl {{ $typeConfig['bg'] }} flex items-center justify-center mr-3">
                                            <i class="{{ $typeConfig['icon'] }} {{ $typeConfig['color'] }} text-lg"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-800">
                                                {{ ucfirst($complaint->counseling_type) }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                @php
                                                    $typeLabels = [
                                                        'akademik' => 'Masalah belajar/nilai',
                                                        'sosial' => 'Teman/keluarga/bullying',
                                                        'karir' => 'Masa depan/jurusan',
                                                        'pribadi' => 'Emosi/percaya diri',
                                                        'darurat' => 'Butuh bantuan segera',
                                                        'lainnya' => 'Masalah lainnya'
                                                    ];
                                                @endphp
                                                {{ $typeLabels[$complaint->counseling_type] ?? 'Lainnya' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Prioritas</label>
                                    @php
                                        $priorityConfig = [
                                            'low' => ['color' => 'bg-green-100 text-green-800', 'icon' => 'fas fa-arrow-down', 'label' => 'Rendah'],
                                            'medium' => ['color' => 'bg-yellow-100 text-yellow-800', 'icon' => 'fas fa-minus', 'label' => 'Sedang'],
                                            'high' => ['color' => 'bg-orange-100 text-orange-800', 'icon' => 'fas fa-arrow-up', 'label' => 'Tinggi'],
                                            'urgent' => ['color' => 'bg-red-100 text-red-800', 'icon' => 'fas fa-exclamation', 'label' => 'Darurat']
                                        ];
                                        $priority = $priorityConfig[$complaint->priority_level] ?? $priorityConfig['medium'];
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $priority['color'] }}">
                                        <i class="{{ $priority['icon'] }} mr-1"></i> {{ $priority['label'] }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Data Diri</label>
                                    <div class="space-y-3">
                                        <div class="flex items-center text-gray-700">
                                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-2">
                                                <i class="fas fa-user text-gray-500"></i>
                                            </div>
                                            <span>{{ $complaint->student_name }}</span>
                                        </div>
                                        <div class="flex items-center text-gray-700">
                                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-2">
                                                <i class="fas fa-school text-gray-500"></i>
                                            </div>
                                            <span>Kelas {{ $complaint->student_class }}</span>
                                        </div>
                                        @if($complaint->phone_number)
                                        <div class="flex items-center text-gray-700">
                                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-2">
                                                <i class="fab fa-whatsapp text-green-500"></i>
                                            </div>
                                            <span>{{ $complaint->phone_number }}</span>
                                        </div>
                                        @endif
                                        <div class="flex items-center text-gray-700">
                                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-2">
                                                <i class="fas fa-envelope text-blue-500"></i>
                                            </div>
                                            <span>{{ $complaint->student_email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-3">Cerita Kamu</label>
                            <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                                <div class="prose max-w-none">
                                    <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $complaint->description }}</p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-gray-200 flex items-center justify-between text-sm text-gray-500">
                                    <span>
                                        <i class="fas fa-clock mr-1"></i>
                                        Diceritakan pada {{ $complaint->created_at->format('d F Y, H:i') }}
                                    </span>
                                    <span>
                                        <i class="fas fa-ruler mr-1"></i>
                                        {{ str_word_count($complaint->description) }} kata
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Counselor Response -->
                @if($status === 'completed')
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 animate-fadeIn delay-300">
                    <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-comment-medical text-green-500 mr-3"></i>
                            Respon dari Tim BK
                        </h2>
                    </div>
                    
                    <div class="p-6">
                        @if($complaint->counselor_name)
                        <div class="flex items-start mb-6 p-4 bg-green-50 rounded-xl">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg">
                                    <i class="fas fa-user-tie text-white text-xl"></i>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="font-bold text-gray-800 text-lg">{{ $complaint->counselor_name }}</h3>
                                <p class="text-gray-600">Bimbingan dan Konseling Sekolah</p>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-calendar-check mr-1"></i>
                                    Ditanggapi: {{ $complaint->updated_at->format('d F Y, H:i') }}
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        @if($complaint->counselor_response)
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-comment-dots text-blue-500 mr-2"></i>
                                Tanggapan
                            </h4>
                            <div class="bg-blue-50 rounded-xl p-5 border border-blue-200">
                                <p class="text-gray-700 whitespace-pre-line leading-relaxed">
                                    {{ $complaint->counselor_response }}
                                </p>
                            </div>
                        </div>
                        @endif
                        
                        @if($complaint->follow_up_plan)
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-tasks text-purple-500 mr-2"></i>
                                Rencana Tindak Lanjut
                            </h4>
                            <div class="bg-purple-50 rounded-xl p-5 border border-purple-200">
                                <p class="text-gray-700 whitespace-pre-line leading-relaxed">
                                    {{ $complaint->follow_up_plan }}
                                </p>
                            </div>
                        </div>
                        @endif
                        
                        @if($complaint->session_date)
                        <div>
                            <h4 class="font-bold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-calendar-star text-orange-500 mr-2"></i>
                                Jadwal Sesi Lanjutan
                            </h4>
                            <div class="bg-gradient-to-r from-orange-50 to-yellow-50 rounded-xl p-5 border border-orange-200">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <div class="w-16 h-16 bg-gradient-to-r from-orange-400 to-yellow-500 rounded-xl flex items-center justify-center text-white shadow-lg">
                                            <i class="fas fa-calendar-alt text-2xl"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="font-bold text-gray-800 text-lg">
                                            {{ \Carbon\Carbon::parse($complaint->session_date)->translatedFormat('l, d F Y') }}
                                        </div>
                                        <div class="text-gray-600">
                                            <i class="fas fa-clock mr-1"></i>
                                            Pukul {{ \Carbon\Carbon::parse($complaint->session_date)->format('H:i') }}
                                        </div>
                                        @if($complaint->session_location)
                                        <div class="text-gray-600 mt-1">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            {{ $complaint->session_location }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Right Column: Actions & Info -->
            <div class="space-y-8">
                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 animate-fadeIn delay-300">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-gray-800">Aksi Cepat</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <a href="{{ route('complaint.create') }}" 
                           class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border border-purple-200 hover:border-purple-300 transition-all duration-300 group hover:shadow-md">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-white mr-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-800 group-hover:text-purple-600">Laporan Baru</div>
                                    <div class="text-sm text-gray-500">Buat laporan lainnya</div>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-purple-500 group-hover:translate-x-1 transition-all"></i>
                        </a>
                        
                        <button onclick="copyToClipboard('{{ $complaint->unique_code }}')" 
                                class="w-full flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl border border-blue-200 hover:border-blue-300 transition-all duration-300 group hover:shadow-md">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center text-white mr-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-copy"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-800 group-hover:text-blue-600">Salin Kode</div>
                                    <div class="text-sm text-gray-500">Simpan untuk cek ulang</div>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-500 group-hover:translate-x-1 transition-all"></i>
                        </button>
                        
                        <a href="{{ route('complaint.track') }}" 
                           class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200 hover:border-green-300 transition-all duration-300 group hover:shadow-md">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center text-white mr-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-800 group-hover:text-green-600">Cek Status</div>
                                    <div class="text-sm text-gray-500">Pantau laporan lain</div>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-500 group-hover:translate-x-1 transition-all"></i>
                        </a>
                        
                        <!-- Link ke Halaman Testimoni -->
                        @if($status === 'completed')
                        <a href="{{ route('Students.complaints.testimoni', ['code' => $complaint->unique_code]) }}" 
                           class="flex items-center justify-between p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl border border-yellow-200 hover:border-orange-300 transition-all duration-300 group hover:shadow-md">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center text-white mr-3 group-hover:scale-110 transition-transform">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-800 group-hover:text-orange-600">Beri Testimoni</div>
                                    <div class="text-sm text-gray-500">Bagikan pengalamanmu</div>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-orange-500 group-hover:translate-x-1 transition-all"></i>
                        </a>
                        @endif
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 animate-fadeIn delay-400">
                    <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-orange-50 to-yellow-50">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-headset text-orange-500 mr-3"></i>
                            Butuh Bantuan?
                        </h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-5">
                            <div class="flex items-start p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-user-tie text-blue-500"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="font-medium text-gray-800">Konselor BK</div>
                                    <div class="text-sm text-gray-600">Siap membantu 24/7</div>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-phone text-green-500"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="font-medium text-gray-800">Hotline Darurat</div>
                                    <div class="text-sm text-gray-600">(021) 1234-5678</div>
                                </div>
                            </div>
                            
                            <div class="flex items-start p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-envelope text-purple-500"></i>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <div class="font-medium text-gray-800">Email</div>
                                    <div class="text-sm text-gray-600">bk@sekolah.sch.id</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="flex items-center text-sm text-gray-600 bg-yellow-50 p-3 rounded-lg">
                                <i class="fas fa-exclamation-triangle text-yellow-500 mr-2"></i>
                                <span>Untuk kasus darurat, langsung hubungi hotline atau datang ke ruang BK</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial Prompt -->
                @if($status === 'completed')
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl shadow-xl overflow-hidden border border-purple-200 animate-fadeIn delay-500">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                            <i class="fas fa-star text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Bagaimana pelayanan kami?</h3>
                        <p class="text-gray-600 text-sm mb-6">
                            Bantu kami menjadi lebih baik dengan berikan testimoni
                        </p>
                        <a href="{{ route('Students.complaints.testimonial', ['code' => $complaint->unique_code]) }}" 
                           class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold hover:opacity-90 transition duration-200 group shadow-md hover:shadow-lg">
                            <i class="fas fa-comment-medical mr-2"></i>
                            Beri Testimoni
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Navigation -->
        <div class="mt-10 flex flex-col sm:flex-row justify-between gap-4">
            <a href="{{ route('complaint.track') }}" 
               class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-bold transition duration-200 flex items-center justify-center gap-2 hover:bg-gray-50 hover:border-gray-400 hover:shadow-md">
                <i class="fas fa-arrow-left"></i> Kembali ke Cek Status
            </a>
            <div class="flex flex-col sm:flex-row gap-4">
                <button onclick="window.print()" 
                        class="px-6 py-3 border-2 border-blue-300 text-blue-600 rounded-xl font-bold transition duration-200 flex items-center justify-center gap-2 hover:bg-blue-50 hover:shadow-md">
                    <i class="fas fa-print"></i> Cetak Halaman
                </button>
                <button onclick="shareReport()" 
                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl font-bold transition duration-200 flex items-center justify-center gap-2 hover:opacity-90 hover:shadow-lg">
                    <i class="fas fa-share-alt"></i> Bagikan Status
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Copy to clipboard
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Kode berhasil disalin: ' + text, 'success');
        }).catch(err => {
            showToast('Gagal menyalin kode', 'error');
        });
    }
    
    // Share report
    function shareReport() {
        if (navigator.share) {
            navigator.share({
                title: 'Status Laporan CINTA BK',
                text: 'Lihat status laporan saya di CINTA BK - Kode: {{ $complaint->unique_code }}',
                url: window.location.href
            }).then(() => {
                showToast('Berhasil membagikan laporan', 'success');
            }).catch(err => {
                showToast('Gagal membagikan', 'error');
            });
        } else {
            copyToClipboard(window.location.href);
        }
    }
    
    // Toast notification
    function showToast(message, type = 'info') {
        const colors = {
            success: 'from-green-500 to-emerald-500',
            error: 'from-red-500 to-pink-500',
            info: 'from-blue-500 to-cyan-500'
        };
        
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-4 right-4 z-50 animate-slideInRight';
        toast.innerHTML = `
            <div class="bg-gradient-to-r ${colors[type]} text-white rounded-xl shadow-xl p-4 max-w-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0 mr-3">
                        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-triangle' : 'info-circle'}"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm">${message}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.parentElement.remove()" class="ml-2 text-white opacity-70 hover:opacity-100">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        `;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.add('animate-slideOutRight');
            setTimeout(() => toast.remove(), 500);
        }, 5000);
    }
    
    // Initialize animations
    document.addEventListener('DOMContentLoaded', function() {
        // Add print styles
        const style = document.createElement('style');
        style.textContent = `
            @media print {
                .bg-gradient-to-br, .absolute, button, a, .flex.justify-between, .bg-gradient-to-r.from-purple-50 {
                    display: none !important;
                }
                
                body {
                    background: white !important;
                }
                
                .bg-white {
                    background: white !important;
                    box-shadow: none !important;
                    border: 1px solid #ccc !important;
                }
                
                .max-w-6xl {
                    max-width: 100% !important;
                }
            }
        `;
        document.head.appendChild(style);
    });
</script>

<style>
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
    
    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
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
    
    .animate-slideInRight {
        animation: slideInRight 0.3s ease-out;
    }
    
    .animate-slideOutRight {
        animation: slideOutRight 0.3s ease-out;
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.5s ease-out;
    }
    
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }
    
    /* Blob animations */
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
    
    .animate-blob {
        animation: blob 7s infinite;
    }
    
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    
    /* Smooth transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
</style>
@endpush
@endsection