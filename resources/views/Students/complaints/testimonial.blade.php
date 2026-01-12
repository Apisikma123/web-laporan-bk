{{-- resources/views/students/complaints/testimonial.blade.php --}}
@extends('layouts.guest')

@section('title', 'Beri Testimoni - CINTA BK')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-yellow-50 via-orange-50 to-pink-50 py-8 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Background Animations -->
    <div class="absolute top-10 left-10 w-80 h-80 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
    <div class="absolute bottom-10 right-10 w-80 h-80 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-orange-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
    
    <div class="max-w-4xl mx-auto relative z-10">
        <!-- Header -->
        <div class="text-center mb-10 animate-fadeIn">
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-100 to-orange-100 px-4 py-2 rounded-full mb-4">
                <i class="fas fa-star text-yellow-500"></i>
                <span class="text-sm font-medium text-orange-700">Beri Testimoni</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Bagaimana Pengalamanmu?
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Ceritakan pengalamanmu agar kami bisa lebih baik lagi
            </p>
        </div>
        
        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Testimonial Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-yellow-100 animate-fadeIn delay-100">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full flex items-center justify-center text-white mr-4">
                                <i class="fas fa-comment-medical text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">Testimoni Kamu</h2>
                                <p class="text-gray-600">Cerita pengalaman dengan tim BK</p>
                            </div>
                        </div>
                        
                        <!-- PERBAIKAN: route('testimoni.store') dan field names -->
                        <form action="{{ route('testimoni.store') }}" method="POST" id="testimonialForm">
                            @csrf
                            <!-- PERBAIKAN: complaint_id bukan complaint_code -->
                            <input type="hidden" name="complaint_id" value="{{ $complaint->id ?? '' }}">
                            
                            <!-- Rating -->
                            <div class="mb-8">
                                <label class="block text-gray-700 mb-4 font-medium text-lg">
                                    Berapa rating untuk pelayanan BK?
                                </label>
                                <div class="flex items-center justify-center gap-2 mb-6" id="ratingStars">
                                    @for($i = 1; $i <= 5; $i++)
                                    <button type="button" 
                                            onclick="setRating({{ $i }})" 
                                            class="rating-star w-16 h-16 text-4xl transition-all duration-300 hover:scale-110">
                                        <i class="far fa-star text-gray-300"></i>
                                    </button>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="ratingValue" value="0">
                                <div class="text-center">
                                    <div id="ratingLabel" class="text-lg font-bold text-gray-500">Pilih rating dulu</div>
                                    <div id="ratingDescription" class="text-sm text-gray-500 mt-1"></div>
                                </div>
                            </div>
                            
                            <!-- Testimonial Text -->
                            <div class="mb-8">
                                <label class="block text-gray-700 mb-3 font-medium">
                                    <i class="fas fa-comment-dots text-blue-500 mr-2"></i>
                                    Cerita Pengalamanmu
                                </label>
                                <div class="relative group">
                                    <textarea name="testimonial" rows="6" required
                                              class="w-full px-4 py-4 border-2 border-yellow-200 rounded-xl focus:ring-2 focus:ring-yellow-500 focus:border-transparent transition duration-200 resize-none hover:border-yellow-300 group-hover:shadow-lg"
                                              placeholder="Ceritakan pengalamanmu dengan tim BK...
Contoh: 'Saya sangat terbantu dengan konseling dari Bu Guru. Beliau sangat memahami perasaan saya dan memberikan solusi yang tepat. Sekarang saya lebih percaya diri dan bisa mengatasi masalah dengan baik.'"
                                              oninput="updateTestimonialCount(this)"></textarea>
                                    <div class="absolute -top-2 left-4 bg-white px-2 text-xs text-yellow-600 font-medium opacity-0 group-hover:opacity-100 transition-opacity">
                                        Testimoni Kamu
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-3">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full flex items-center justify-center bg-gradient-to-r from-yellow-100 to-orange-100">
                                            <i class="fas fa-text-height text-yellow-500 text-xs"></i>
                                        </div>
                                        <div>
                                            <span id="testimonialCount" class="text-sm font-bold text-gray-500">0</span>
                                            <span class="text-sm text-gray-500">/1000 karakter</span>
                                        </div>
                                    </div>
                                    <div class="text-sm text-yellow-600 font-medium bg-yellow-50 px-3 py-1 rounded-full">
                                        <i class="fas fa-lock mr-1"></i> Nama bisa disamarkan
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Anonymity Option -->
                            <div class="mb-8">
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-200">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                                            <i class="fas fa-user-secret text-gray-600"></i>
                                        </div>
                                        <div>
                                            <div class="font-medium text-gray-800">Sembunyikan identitas?</div>
                                            <div class="text-sm text-gray-600">Nama kamu akan diganti dengan inisial</div>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <!-- PERBAIKAN: is_anonymous bukan anonymous -->
                                        <input type="checkbox" name="is_anonymous" value="1" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-purple-500 peer-checked:to-pink-500"></div>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="flex gap-4">
                                <a href="{{ route('complaint.track') }}" 
                                   class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-bold transition duration-200 flex items-center justify-center gap-2 hover:bg-gray-50 hover:border-gray-400 flex-1">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                                <button type="submit" 
                                        class="px-6 py-3 bg-gradient-to-r from-yellow-500 to-orange-500 text-white rounded-xl font-bold transition duration-200 flex items-center justify-center gap-2 hover:opacity-90 hover:scale-105 flex-1 group">
                                    <i class="fas fa-paper-plane mr-2"></i> Kirim Testimoni
                                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Privacy Notice -->
                <div class="mt-8 bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-200 animate-fadeIn delay-300">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-shield-alt text-green-500"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-gray-800 mb-2">Privasi Terjamin</h3>
                            <p class="text-gray-700 text-sm">
                                Testimoni kamu akan digunakan untuk perbaikan layanan BK. 
                                Jika memilih "Sembunyikan identitas", nama akan diganti dengan inisial seperti "Siswa A".
                                Email dan data pribadi tidak akan dipublikasikan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right: Info & Examples -->
            <div class="space-y-8">
                <!-- Why Testimonial -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-blue-100 animate-fadeIn delay-200">
                    <div class="p-6 border-b border-blue-200 bg-gradient-to-r from-blue-50 to-cyan-50">
                        <h3 class="font-bold text-gray-800 flex items-center">
                            <i class="fas fa-question-circle text-blue-500 mr-2"></i>
                            Kenapa Beri Testimoni?
                        </h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-4">
                            @foreach([
                                ['icon' => 'fas fa-heart', 'color' => 'text-pink-500', 'title' => 'Membantu Teman', 'desc' => 'Testimoni kamu bisa membantu teman lain'],
                                ['icon' => 'fas fa-chart-line', 'color' => 'text-green-500', 'title' => 'Perbaikan Layanan', 'desc' => 'BK jadi lebih baik ke depannya'],
                                ['icon' => 'fas fa-users', 'color' => 'text-purple-500', 'title' => 'Support Tim BK', 'desc' => 'Memberi semangat untuk tim BK'],
                                ['icon' => 'fas fa-trophy', 'color' => 'text-yellow-500', 'title' => 'Inspirasi', 'desc' => 'Menginspirasi yang lain untuk cerita']
                            ] as $item)
                            <li class="flex items-start group">
                                <div class="flex-shrink-0 mt-0.5">
                                    <i class="{{ $item['icon'] }} {{ $item['color'] }} text-lg"></i>
                                </div>
                                <div class="ml-3">
                                    <div class="font-medium text-gray-800 group-hover:{{ str_replace('text-', 'text-', $item['color']) }} transition-colors">
                                        {{ $item['title'] }}
                                    </div>
                                    <div class="text-sm text-gray-600">{{ $item['desc'] }}</div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <!-- Example Testimonials -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-purple-100 animate-fadeIn delay-300">
                    <div class="p-6 border-b border-purple-200 bg-gradient-to-r from-purple-50 to-pink-50">
                        <h3 class="font-bold text-gray-800 flex items-center">
                            <i class="fas fa-comments text-purple-500 mr-2"></i>
                            Contoh Testimoni
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            @foreach([
                                ['rating' => 5, 'text' => 'Terima kasih Bu Guru sudah mendengarkan cerita saya. Sekarang saya lebih paham cara mengatasi masalah.'],
                                ['rating' => 4, 'text' => 'Pelayanan cepat dan ramah. Hanya perlu tunggu 2 hari sudah dapat respon.'],
                                ['rating' => 5, 'text' => 'Sangat membantu! Dari yang awalnya takut cerita, sekarang jadi lega. Terima kasih!']
                            ] as $testimonial)
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <div class="flex items-center mb-2">
                                    <div class="flex">
                                        @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-{{ $i <= $testimonial['rating'] ? 'yellow-400' : 'gray-300' }} text-sm mr-0.5"></i>
                                        @endfor
                                    </div>
                                    <div class="ml-auto text-xs text-gray-500">Siswa X</div>
                                </div>
                                <p class="text-sm text-gray-700 italic">"{{ $testimonial['text'] }}"</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Tips -->
                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl p-6 border border-yellow-200 animate-fadeIn delay-400">
                    <h3 class="font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                        Tips Testimoni yang Baik
                    </h3>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                            <span>Jujur dan sesuai pengalaman</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                            <span>Sebut hal yang paling membantu</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                            <span>Beri saran untuk perbaikan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mr-2 mt-0.5"></i>
                            <span>Gunakan bahasa yang sopan</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Rating system
    let currentRating = 0;
    const ratingDescriptions = {
        1: 'Kurang memuaskan',
        2: 'Cukup',
        3: 'Baik',
        4: 'Sangat baik',
        5: 'Luar biasa!'
    };
    
    function setRating(rating) {
        currentRating = rating;
        document.getElementById('ratingValue').value = rating;
        
        // Update stars
        document.querySelectorAll('.rating-star').forEach((star, index) => {
            const icon = star.querySelector('i');
            if (index < rating) {
                icon.className = 'fas fa-star text-yellow-400';
                star.classList.add('animate-pulse');
                setTimeout(() => star.classList.remove('animate-pulse'), 300);
            } else {
                icon.className = 'far fa-star text-gray-300';
            }
        });
        
        // Update label
        document.getElementById('ratingLabel').textContent = rating + ' / 5 Bintang';
        document.getElementById('ratingLabel').className = 'text-lg font-bold text-yellow-600';
        document.getElementById('ratingDescription').textContent = ratingDescriptions[rating];
        
        // Add confetti for 5 stars
        if (rating === 5) {
            showConfetti();
        }
    }
    
    // Testimonial character counter
    function updateTestimonialCount(textarea) {
        const count = textarea.value.length;
        const countEl = document.getElementById('testimonialCount');
        
        countEl.textContent = count;
        
        if (count < 50) {
            countEl.className = 'text-sm font-bold text-red-500';
        } else if (count < 200) {
            countEl.className = 'text-sm font-bold text-yellow-500';
        } else {
            countEl.className = 'text-sm font-bold text-green-500';
        }
    }
    
    // Confetti effect
    function showConfetti() {
        const confetti = document.createElement('div');
        confetti.innerHTML = `
            <div class="fixed inset-0 pointer-events-none z-50">
                ${Array.from({length: 50}).map(() => 
                    `<div class="absolute w-2 h-2 rounded-full" style="
                        left: ${Math.random() * 100}%;
                        top: -10px;
                        background: ${['#fbbf24', '#f59e0b', '#f97316', '#ea580c'][Math.floor(Math.random() * 4)]};
                        animation: fall ${1 + Math.random() * 2}s linear forwards;
                        transform: rotate(${Math.random() * 360}deg);
                    "></div>`
                ).join('')}
            </div>
        `;
        
        document.body.appendChild(confetti);
        
        setTimeout(() => {
            confetti.remove();
        }, 3000);
    }
    
    // Form validation
    document.getElementById('testimonialForm').addEventListener('submit', function(e) {
        const rating = document.getElementById('ratingValue').value;
        const testimonial = this.querySelector('textarea[name="testimonial"]');
        
        if (rating == 0) {
            e.preventDefault();
            showToast('Pilih rating dulu ya!', 'error');
            
            document.getElementById('ratingStars').classList.add('animate-shake');
            setTimeout(() => {
                document.getElementById('ratingStars').classList.remove('animate-shake');
            }, 500);
            
            return;
        }
        
        if (testimonial.value.length < 20) {
            e.preventDefault();
            showToast('Testimoni terlalu pendek. Minimal 20 karakter ya!', 'error');
            
            testimonial.classList.add('animate-pulse', 'border-red-400');
            setTimeout(() => {
                testimonial.classList.remove('animate-pulse', 'border-red-400');
            }, 1000);
            
            testimonial.focus();
            return;
        }
        
        // Show loading
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...';
        submitBtn.disabled = true;
    });
    
    // Toast notification
    function showToast(message, type = 'info') {
        const colors = {
            success: 'from-green-500 to-emerald-500',
            error: 'from-red-500 to-pink-500',
            info: 'from-yellow-500 to-orange-500'
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
    
    // Initialize
    document.addEventListener('DOMContentLoaded', function() {
        // Add fall animation for confetti
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fall {
                to {
                    transform: translateY(100vh) rotate(720deg);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    });
</script>

<style>
    @keyframes fall {
        to {
            transform: translateY(100vh) rotate(720deg);
            opacity: 0;
        }
    }
    
    /* Rating star hover effect */
    .rating-star:hover i {
        transform: scale(1.3);
        transition: transform 0.2s;
    }
    
    .rating-star:hover ~ .rating-star i {
        color: #d1d5db !important;
    }
    
    /* Toggle switch */
    input:checked ~ .peer-checked\\:bg-gradient-to-r {
        background-image: linear-gradient(to right, var(--tw-gradient-stops));
    }
    
    /* Smooth transitions */
    textarea, input, button {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }
    
    textarea:focus {
        box-shadow: 0 0 0 3px rgba(251, 191, 36, 0.1);
        transform: translateY(-1px);
    }
    
    /* Card hover effects */
    .hover\\:scale-110:hover {
        transform: scale(1.1);
    }
    
    .group:hover .group-hover\\:translate-x-1 {
        transform: translateX(4px);
    }
</style>
@endpush
@endsection