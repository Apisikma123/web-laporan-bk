{{-- resources/views/students/complaints/track.blade.php --}}
@extends('layouts.guest')

@section('title', 'Cek Status Laporan - CINTA BK')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-cyan-50 to-purple-50 py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Background Animations -->
    <div class="absolute top-10 left-10 w-64 h-64 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
    <div class="absolute bottom-10 right-10 w-64 h-64 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-cyan-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
    
    <div class="max-w-4xl mx-auto relative z-10">
        <!-- Header -->
        <div class="text-center mb-10 animate-fadeIn">
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-100 to-cyan-100 px-4 py-2 rounded-full mb-4">
                <i class="fas fa-search text-blue-500"></i>
                <span class="text-sm font-medium text-blue-700">Cek Status Laporan</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Pantau Perkembangan Laporanmu
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Masukkan kode rahasia yang kamu dapatkan untuk melihat status laporan
            </p>
        </div>
        
        <!-- Track Form Container -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-blue-100 mb-10 transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-8">
                @if(session('success'))
                <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4 animate-fadeIn">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-500 text-2xl"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="font-bold text-green-800">Berhasil!</h3>
                            <p class="text-green-700">{{ session('success') }}</p>
                            @if(session('code'))
                            <div class="mt-2">
                                <span class="font-mono bg-green-100 text-green-800 px-3 py-1 rounded-lg text-sm">
                                    <i class="fas fa-key mr-1"></i> Kode: {{ session('code') }}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                
                @if(session('error'))
                <div class="mb-6 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl p-4 animate-shake">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="font-bold text-red-800">Perhatian</h3>
                            <p class="text-red-700">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
                @endif
                
                <form action="{{ route('complaint.check') }}" method="POST" id="trackForm">
                    @csrf
                    
                    <div class="relative group">
                        <label class="block text-gray-700 mb-3 font-medium text-lg">
                            <i class="fas fa-key text-purple-500 mr-2"></i>
                            Kode Rahasia Laporan
                        </label>
                        
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-blue-400"></i>
                            </div>
                            <input type="text" name="kode" required
                                   value="{{ old('kode') }}"
                                   class="w-full pl-12 pr-4 py-4 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 hover:border-blue-300 text-lg font-mono placeholder-gray-400 group-hover:shadow-lg"
                                   placeholder="Contoh: CINTA-AB12CD"
                                   autocomplete="off">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" onclick="pasteFromClipboard()" 
                                        class="text-blue-500 hover:text-blue-700 transition duration-200">
                                    <i class="fas fa-paste"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center mt-2">
                            <p class="text-sm text-gray-500">
                                <i class="fas fa-info-circle mr-1"></i>
                                Masukkan kode yang kamu dapat saat mengirim laporan
                            </p>
                            <button type="button" onclick="showHelp()" 
                                    class="text-sm text-blue-600 hover:text-blue-800 transition duration-200">
                                <i class="fas fa-question-circle mr-1"></i> Lupa kode?
                            </button>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('complaint.create') }}" 
                           class="px-6 py-3 border-2 border-purple-300 text-purple-600 rounded-xl font-bold transition duration-200 text-center flex items-center justify-center gap-2 hover:scale-105 hover:bg-purple-50 hover:shadow-md flex-1">
                            <i class="fas fa-plus"></i> Buat Laporan Baru
                        </a>
                        <button type="submit" 
                                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl font-bold transition duration-200 flex items-center justify-center gap-2 hover:scale-105 hover:shadow-lg flex-1 group">
                            <span class="flex items-center gap-2">
                                <i class="fas fa-search"></i> Cek Status
                            </span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-200"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Help Section -->
            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-6 border-t border-blue-200">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-lightbulb text-blue-500"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="font-bold text-gray-800 mb-2">Tips Mencari Kode:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                <span>Cek email konfirmasi yang kami kirim</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                <span>Simpan screenshot saat berhasil mengirim laporan</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                                <span>Kode format: CINTA-XXXXXX (6 huruf/angka)</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Status Guide -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            @foreach([
                ['status' => 'pending', 'icon' => 'fas fa-clock', 'color' => 'from-yellow-400 to-orange-400', 'title' => 'Menunggu', 'desc' => 'Laporan baru diterima'],
                ['status' => 'in_progress', 'icon' => 'fas fa-spinner', 'color' => 'from-blue-400 to-cyan-400', 'title' => 'Diproses', 'desc' => 'Tim BK sedang menangani'],
                ['status' => 'completed', 'icon' => 'fas fa-check-circle', 'color' => 'from-green-400 to-emerald-400', 'title' => 'Selesai', 'desc' => 'Laporan telah ditanggapi'],
                ['status' => 'cancelled', 'icon' => 'fas fa-times-circle', 'color' => 'from-red-400 to-pink-400', 'title' => 'Dibatalkan', 'desc' => 'Laporan dibatalkan']
            ] as $item)
            <div class="bg-white rounded-xl p-6 border border-gray-200 hover:shadow-lg transition-all duration-300 hover:-translate-y-2 group">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 rounded-full bg-gradient-to-r {{ $item['color'] }} flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="{{ $item['icon'] }} text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-2">{{ $item['title'] }}</h3>
                    <p class="text-sm text-gray-600">{{ $item['desc'] }}</p>
                    <div class="mt-4 w-full h-1 bg-gradient-to-r {{ $item['color'] }} rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- FAQ Section -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-blue-100">
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                    <i class="fas fa-question-circle text-blue-500 mr-3"></i>
                    Pertanyaan yang Sering Diajukan
                </h2>
                
                <div class="space-y-4">
                    @foreach([
                        ['q' => 'Berapa lama proses respons tim BK?', 'a' => 'Biasanya 1-3 hari kerja. Kasus darurat diprioritaskan.'],
                        ['q' => 'Bagaimana jika lupa kode rahasia?', 'a' => 'Cek email konfirmasi atau hubungi admin BK.'],
                        ['q' => 'Apakah data saya aman?', 'a' => '100% aman! Hanya tim BK yang bisa mengakses.'],
                        ['q' => 'Bisakah saya update laporan?', 'a' => 'Ya, gunakan kode yang sama untuk update.']
                    ] as $faq)
                    <div class="border border-gray-200 rounded-xl p-4 hover:border-blue-300 transition duration-200 group">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <i class="fas fa-question text-blue-500"></i>
                            </div>
                            <div class="ml-3 flex-1">
                                <h4 class="font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">{{ $faq['q'] }}</h4>
                                <p class="text-gray-600 text-sm">{{ $faq['a'] }}</p>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400 group-hover:text-blue-500 transition-colors"></i>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Paste from clipboard
    function pasteFromClipboard() {
        navigator.clipboard.readText().then(text => {
            const input = document.querySelector('input[name="kode"]');
            input.value = text.toUpperCase().trim();
            input.focus();
            
            // Show success message
            showToast('Kode berhasil dipaste dari clipboard!', 'success');
        }).catch(err => {
            showToast('Gagal membaca clipboard', 'error');
        });
    }
    
    // Show help modal
    function showHelp() {
        const modal = `
            <div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
                <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full animate-fadeIn">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-key text-blue-500 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800 text-lg">Lupa Kode Rahasia?</h3>
                                <p class="text-sm text-gray-600">Jangan khawatir!</p>
                            </div>
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <div class="bg-blue-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-700">
                                    <i class="fas fa-envelope text-blue-500 mr-2"></i>
                                    <strong>Cek email kamu</strong> - Kami mengirim kode saat laporan berhasil dikirim
                                </p>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-700">
                                    <i class="fas fa-screenshot text-blue-500 mr-2"></i>
                                    <strong>Cek screenshot</strong> - Jika kamu screenshot halaman konfirmasi
                                </p>
                            </div>
                            <div class="bg-blue-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-700">
                                    <i class="fas fa-user-tie text-blue-500 mr-2"></i>
                                    <strong>Hubungi BK</strong> - Datang ke ruang BK dengan membuktikan identitas
                                </p>
                            </div>
                        </div>
                        
                        <button onclick="closeModal()" 
                                class="w-full bg-gradient-to-r from-blue-500 to-cyan-500 text-white font-bold py-3 rounded-lg hover:opacity-90 transition duration-200">
                            Mengerti
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        document.body.insertAdjacentHTML('beforeend', modal);
    }
    
    function closeModal() {
        const modal = document.querySelector('.fixed.inset-0.bg-black');
        if (modal) {
            modal.remove();
        }
    }
    
    // Toast notification
    function showToast(message, type = 'info') {
        const colors = {
            success: 'from-green-500 to-emerald-500',
            error: 'from-red-500 to-pink-500',
            info: 'from-blue-500 to-cyan-500'
        };
        
        const toast = `
            <div class="fixed bottom-4 right-4 z-50 animate-slideInRight">
                <div class="bg-gradient-to-r ${colors[type]} text-white rounded-xl shadow-xl p-4 max-w-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-3">
                            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-triangle' : 'info-circle'}"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm">${message}</p>
                        </div>
                        <button onclick="this.parentElement.parentElement.remove()" class="ml-2 text-white opacity-70 hover:opacity-100">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;
        
        document.body.insertAdjacentHTML('beforeend', toast);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            const toastEl = document.querySelector('.fixed.bottom-4.right-4');
            if (toastEl) {
                toastEl.classList.add('animate-slideOutRight');
                setTimeout(() => toastEl.remove(), 500);
            }
        }, 5000);
    }
    
    // Form validation
    document.getElementById('trackForm').addEventListener('submit', function(e) {
        const kodeInput = this.querySelector('input[name="kode"]');
        const kode = kodeInput.value.trim().toUpperCase();
        
        // Validate format
        if (!kode.match(/^CINTA-[A-Z0-9]{6}$/)) {
            e.preventDefault();
            showToast('Format kode salah! Contoh: CINTA-AB12CD', 'error');
            kodeInput.classList.add('border-red-400', 'animate-pulse');
            setTimeout(() => kodeInput.classList.remove('border-red-400', 'animate-pulse'), 1000);
            kodeInput.focus();
        }
    });
    
    // Initialize animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animate status cards sequentially
        document.querySelectorAll('.bg-white.rounded-xl').forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('animate-fadeIn');
            }, index * 100);
        });
    });
</script>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fadeIn {
        animation: fadeIn 0.6s ease-out;
    }
    
    /* Custom animation delays */
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    
    /* Input focus effects */
    input:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        transform: translateY(-1px);
    }
    
    /* Card hover effects */
    .hover\\:-translate-y-2:hover {
        transform: translateY(-8px);
    }
    
    /* Smooth transitions */
    * {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }
</style>
@endpush
@endsection