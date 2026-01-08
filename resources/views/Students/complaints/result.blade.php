{{-- resources/views/students/complaints/result.blade.php --}}
@extends('layouts.guest')

@section('title', 'Status Laporan - CINTA BK')

@section('content')
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
        
        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column: Complaint Details -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Status Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 animate-fadeIn delay-100">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-gray-800 mb-2">Status Laporan</h2>
                                <div class="flex items-center gap-2">
                                    @php
                                        $statusConfig = [
                                            'pending' => ['color' => 'bg-yellow-100 text-yellow-800', 'icon' => 'fas fa-clock', 'label' => 'Menunggu'],
                                            'in_progress' => ['color' => 'bg-blue-100 text-blue-800', 'icon' => 'fas fa-spinner fa-spin', 'label' => 'Diproses'],
                                            'completed' => ['color' => 'bg-green-100 text-green-800', 'icon' => 'fas fa-check-circle', 'label' => 'Selesai'],
                                            'cancelled' => ['color' => 'bg-red-100 text-red-800', 'icon' => 'fas fa-times-circle', 'label' => 'Dibatalkan']
                                        ];
                                        $config = $statusConfig[$complaint->status] ?? $statusConfig['pending'];
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $config['color'] }}">
                                        <i class="{{ $config['icon'] }} mr-1"></i> {{ $config['label'] }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        <i class="fas fa-calendar-alt mr-1"></i>
                                        {{ $complaint->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-purple-600 mb-1">#{{ $complaint->unique_code }}</div>
                                <div class="text-sm text-gray-500">Kode Rahasia</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="p-6">
                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-600 mb-2">
                                <span>Proses Laporan</span>
                                <span>
                                    @php
                                        $progress = match($complaint->status) {
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
                                <div class="h-full bg-gradient-to-r from-blue-500 to-purple-500 rounded-full transition-all duration-1000 ease-out" 
                                     style="width: {{ $progress }}%"></div>
                            </div>
                        </div>
                        
                        <!-- Timeline -->
                        <div class="mt-6 space-y-4">
                            @foreach([
                                ['status' => 'pending', 'label' => 'Laporan Diterima', 'date' => $complaint->created_at->format('d M'), 'active' => true],
                                ['status' => 'in_progress', 'label' => 'Sedang Diproses', 'date' => $complaint->status == 'in_progress' || $complaint->status == 'completed' ? 'Sedang berlangsung' : 'Menunggu', 'active' => in_array($complaint->status, ['in_progress', 'completed'])],
                                ['status' => 'completed', 'label' => 'Selesai', 'date' => $complaint->status == 'completed' ? 'Selesai' : 'Estimasi: ' . $complaint->created_at->addDays(3)->format('d M'), 'active' => $complaint->status == 'completed']
                            ] as $item)
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center 
                                            {{ $item['active'] ? 'bg-gradient-to-r from-blue-500 to-purple-500 text-white' : 'bg-gray-200 text-gray-500' }}">
                                    <i class="fas fa-{{ $item['status'] == 'pending' ? 'paper-plane' : ($item['status'] == 'in_progress' ? 'spinner' : 'check') }} text-xs"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between">
                                        <span class="font-medium {{ $item['active'] ? 'text-gray-800' : 'text-gray-500' }}">
                                            {{ $item['label'] }}
                                        </span>
                                        <span class="text-sm {{ $item['active'] ? 'text-gray-600' : 'text-gray-400' }}">
                                            {{ $item['date'] }}
                                        </span>
                                    </div>
                                    @if($item['active'] && $item['status'] == 'in_progress')
                                    <div class="mt-1 text-sm text-blue-600">
                                        <i class="fas fa-user-tie mr-1"></i> Sedang ditangani oleh: {{ $complaint->counselor_name ?? 'Tim BK' }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Complaint Details -->
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
                                                'akademik' => ['icon' => 'fas fa-book-open', 'color' => 'text-blue-500'],
                                                'sosial' => ['icon' => 'fas fa-users', 'color' => 'text-green-500'],
                                                'karir' => ['icon' => 'fas fa-graduation-cap', 'color' => 'text-yellow-500'],
                                                'pribadi' => ['icon' => 'fas fa-brain', 'color' => 'text-pink-500'],
                                                'darurat' => ['icon' => 'fas fa-exclamation-triangle', 'color' => 'text-red-500'],
                                                'lainnya' => ['icon' => 'fas fa-question-circle', 'color' => 'text-gray-500']
                                            ];
                                            $typeConfig = $typeIcons[$complaint->counseling_type] ?? $typeIcons['lainnya'];
                                        @endphp
                                        <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center mr-3">
                                            <i class="{{ $typeConfig['icon'] }} {{ $typeConfig['color'] }}"></i>
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
                                    <div class="space-y-2">
                                        <div class="flex items-center text-gray-700">
                                            <i class="fas fa-user text-gray-400 w-5 mr-2"></i>
                                            <span>{{ $complaint->student_name }}</span>
                                        </div>
                                        <div class="flex items-center text-gray-700">
                                            <i class="fas fa-school text-gray-400 w-5 mr-2"></i>
                                            <span>Kelas {{ $complaint->student_class }}</span>
                                        </div>
                                        @if($complaint->phone_number)
                                        <div class="flex items-center text-gray-700">
                                            <i class="fab fa-whatsapp text-green-400 w-5 mr-2"></i>
                                            <span>{{ $complaint->phone_number }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-3">Cerita Kamu</label>
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <div class="prose max-w-none">
                                    <p class="text-gray-700 whitespace-pre-line">{{ $complaint->description }}</p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-gray-200 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-clock mr-1"></i>
                                    Diceritakan pada {{ $complaint->created_at->format('H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Counselor Response -->
                @if($complaint->status == 'completed' && ($complaint->counselor_response || $complaint->counselor_name))
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 animate-fadeIn delay-300">
                    <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
                        <h2 class="text-xl font-bold text-gray-800 flex items-center">
                            <i class="fas fa-comment-medical text-green-500 mr-3"></i>
                            Respon dari Tim BK
                        </h2>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-start mb-6">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-tie text-white"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="font-bold text-gray-800">{{ $complaint->counselor_name ?? 'Konselor BK' }}</h3>
                                <p class="text-sm text-gray-500">Bimbingan dan Konseling</p>
                            </div>
                            <div class="ml-auto text-sm text-gray-500">
                                {{ $complaint->updated_at->format('d M Y') }}
                            </div>
                        </div>
                        
                        @if($complaint->counselor_response)
                        <div class="bg-green-50 rounded-xl p-4 border border-green-200">
                            <p class="text-gray-700 whitespace-pre-line">{{ $complaint->counselor_response }}</p>
                        </div>
                        @endif
                        
                        @if($complaint->follow_up_plan)
                        <div class="mt-6">
                            <h4 class="font-bold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-calendar-check text-blue-500 mr-2"></i>
                                Rencana Tindak Lanjut
                            </h4>
                            <div class="bg-blue-50 rounded-xl p-4 border border-blue-200">
                                <p class="text-gray-700 whitespace-pre-line">{{ $complaint->follow_up_plan }}</p>
                            </div>
                        </div>
                        @endif
                        
                        @if($complaint->session_date)
                        <div class="mt-6">
                            <h4 class="font-bold text-gray-700 mb-3 flex items-center">
                                <i class="fas fa-calendar-alt text-purple-500 mr-2"></i>
                                Jadwal Sesi
                            </h4>
                            <div class="flex items-center bg-purple-50 rounded-xl p-4 border border-purple-200">
                                <i class="fas fa-clock text-purple-500 text-xl mr-3"></i>
                                <div>
                                    <div class="font-medium text-gray-800">
                                        {{ \Carbon\Carbon::parse($complaint->session_date)->format('l, d F Y') }}
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        Pukul {{ \Carbon\Carbon::parse($complaint->session_date)->format('H:i') }}
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
                           class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border border-purple-200 hover:border-purple-300 transition duration-200 group">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center text-white mr-3">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-800 group-hover:text-purple-600">Laporan Baru</div>
                                    <div class="text-sm text-gray-500">Buat laporan lainnya</div>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-purple-500"></i>
                        </a>
                        
                        <button onclick="copyToClipboard('{{ $complaint->unique_code }}')" 
                                class="w-full flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl border border-blue-200 hover:border-blue-300 transition duration-200 group">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center text-white mr-3">
                                    <i class="fas fa-copy"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-800 group-hover:text-blue-600">Salin Kode</div>
                                    <div class="text-sm text-gray-500">Simpan untuk cek ulang</div>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-500"></i>
                        </button>
                        
                        <a href="{{ route('complaint.track') }}" 
                           class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200 hover:border-green-300 transition duration-200 group">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center text-white mr-3">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div>
                                    <div class="font-medium text-gray-800 group-hover:text-green-600">Cek Status</div>
                                    <div class="text-sm text-gray-500">Pantau laporan lain</div>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-500"></i>
                        </a>
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
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-user-tie text-blue-500"></i>
                                </div>
                                <div class="ml-3">
                                    <div class="font-medium text-gray-800">Konselor BK</div>
                                    <div class="text-sm text-gray-600">Siap membantu 24/7</div>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-phone text-green-500"></i>
                                </div>
                                <div class="ml-3">
                                    <div class="font-medium text-gray-800">Hotline Darurat</div>
                                    <div class="text-sm text-gray-600">(021) 1234-5678</div>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <i class="fas fa-envelope text-purple-500"></i>
                                </div>
                                <div class="ml-3">
                                    <div class="font-medium text-gray-800">Email</div>
                                    <div class="text-sm text-gray-600">bk@sekolah.sch.id</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="text-sm text-gray-600">
                                <i class="fas fa-info-circle text-blue-500 mr-1"></i>
                                Untuk kasus darurat, langsung hubungi hotline
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial Prompt -->
                @if($complaint->status == 'completed')
                <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl shadow-xl overflow-hidden border border-purple-200 animate-fadeIn delay-500">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-star text-white text-2xl"></i>
                        </div>
                        <h3 class="font-bold text-gray-800 mb-2">Bagaimana pengalamanmu?</h3>
                        <p class="text-gray-600 text-sm mb-6">
                            Bantu kami menjadi lebih baik dengan berikan testimoni
                        </p>
                        <a href="{{ route('testimonial.create', ['code' => $complaint->unique_code]) }}" 
                           class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold hover:opacity-90 transition duration-200 group">
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
        <div class="mt-10 flex justify-between">
            <a href="{{ route('complaint.track') }}" 
               class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-bold transition duration-200 flex items-center gap-2 hover:bg-gray-50 hover:border-gray-400">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <div class="flex gap-4">
                <button onclick="window.print()" 
                        class="px-6 py-3 border-2 border-blue-300 text-blue-600 rounded-xl font-bold transition duration-200 flex items-center gap-2 hover:bg-blue-50">
                    <i class="fas fa-print"></i> Print
                </button>
                <button onclick="shareReport()" 
                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl font-bold transition duration-200 flex items-center gap-2 hover:opacity-90">
                    <i class="fas fa-share-alt"></i> Share
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
                text: 'Lihat status laporan saya di CINTA BK',
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
        // Animate progress bar
        const progressBar = document.querySelector('.h-full.bg-gradient-to-r');
        if (progressBar) {
            setTimeout(() => {
                progressBar.style.transition = 'width 2s ease-out';
            }, 500);
        }
        
        // Add hover effects
        document.querySelectorAll('.group').forEach(el => {
            el.addEventListener('mouseenter', function() {
                this.style.transition = 'all 0.3s ease';
            });
        });
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
    
    .animate-slideInRight {
        animation: slideInRight 0.5s ease-out;
    }
    
    .animate-slideOutRight {
        animation: slideOutRight 0.5s ease-out;
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.6s ease-out;
    }
    
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    .delay-500 { animation-delay: 0.5s; }
    
    /* Print styles */
    @media print {
        .bg-gradient-to-br, .absolute, button, a, .flex.justify-between {
            display: none !important;
        }
        
        .bg-white {
            box-shadow: none !important;
            border: 1px solid #ccc !important;
        }
        
        .max-w-6xl {
            max-width: 100% !important;
        }
    }
    
    /* Smooth hover effects */
    .hover\\:border-purple-300:hover {
        border-color: #a855f7;
        transform: translateY(-2px);
    }
    
    .group:hover .group-hover\\:text-purple-600 {
        color: #9333ea;
    }
    
    .group:hover .group-hover\\:translate-x-1 {
        transform: translateX(4px);
    }
</style>
@endpush
@endsection