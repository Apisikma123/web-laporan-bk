<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-purple-50 via-blue-50 to-pink-50 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <!-- Progress Bar -->
            <div class="mb-10">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center text-white font-bold">
                            1
                        </div>
                        <div class="ml-3">
                            <p class="font-bold text-gray-800">Isi Form</p>
                            <p class="text-sm text-gray-500">Langkah pertama</p>
                        </div>
                    </div>
                    <div class="hidden md:block h-1 flex-grow mx-6 bg-gradient-to-r from-purple-300 via-blue-300 to-pink-300"></div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-bold">
                            2
                        </div>
                        <div class="ml-3">
                            <p class="font-medium text-gray-600">Dapat Kode</p>
                            <p class="text-sm text-gray-400">Langkah kedua</p>
                        </div>
                    </div>
                    <div class="hidden md:block h-1 flex-grow mx-6 bg-gray-200"></div>
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
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Ceritakan Masalahmu di Sini <span class="text-purple-600">❤️</span>
                </h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Kami siap mendengarkan. Semua cerita dijamin <span class="font-bold text-purple-600">100% rahasia</span>.
                </p>
            </div>

            <!-- Form Container -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-purple-100">
                <form action="{{ route('complaint.store') }}" method="POST" id="counselingForm" class="space-y-0">
                    @csrf
                    
                    <!-- Section 1: Identitas -->
                    <div class="p-8 border-b border-purple-100">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-lg flex items-center justify-center text-white font-bold mr-4">
                                1
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">Data Diri Kamu</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama -->
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="student_name" required
                                       class="w-full px-4 py-3 border-2 border-purple-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                                       placeholder="Masukkan nama lengkap">
                                <p class="text-xs text-gray-500 mt-1">Nama asli kamu</p>
                            </div>
                            
                            <!-- Email -->
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">
                                    Email Aktif <span class="text-red-500">*</span>
                                </label>
                                <input type="email" name="student_email" required
                                       class="w-full px-4 py-3 border-2 border-purple-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                                       placeholder="email@sekolah.sch.id">
                                <p class="text-xs text-gray-500 mt-1">Untuk notifikasi perkembangan</p>
                            </div>
                            
                            <!-- Kelas -->
                            <div class="md:col-span-2">
                                <label class="block text-gray-700 mb-2 font-medium">
                                    Kelas <span class="text-red-500">*</span>
                                </label>
                                <select name="student_class" required
                                        class="w-full px-4 py-3 border-2 border-purple-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 appearance-none bg-white">
                                    <option value="">Pilih kelas kamu...</option>
                                    @if(isset($classes) && $classes->count() > 0)
                                        <optgroup label="🏫 SMP">
                                            @foreach($classes->where('level', 'SMP') as $class)
                                                <option value="{{ $class->class_name }}">
                                                    Kelas {{ $class->class_name }}
                                                    @if($class->homeroom_teacher)
                                                         - Wali: {{ $class->homeroom_teacher }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </optgroup>
                                        
                                        <optgroup label="🎓 SMA">
                                            @foreach($classes->where('level', 'SMA') as $class)
                                                <option value="{{ $class->class_name }}">
                                                    {{ $class->class_name }}
                                                    @if($class->major)
                                                         - {{ $class->major }}
                                                    @endif
                                                    @if($class->homeroom_teacher)
                                                         - Wali: {{ $class->homeroom_teacher }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @else
                                        <option value="" disabled>Data kelas sedang tidak tersedia</option>
                                    @endif
                                </select>
                                <p class="text-xs text-gray-500 mt-1">Kelasmu gak ada? Hubungi guru BK</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section 2: Jenis Masalah -->
                    <div class="p-8 border-b border-purple-100">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-pink-500 to-red-500 rounded-lg flex items-center justify-center text-white font-bold mr-4">
                                2
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">Jenis Permasalahan</h2>
                        </div>
                        
                        <p class="text-gray-600 mb-6">Pilih yang paling sesuai dengan kondisi kamu:</p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                            @php
                                $problemTypes = [
                                    'darurat' => ['icon' => '🚨', 'title' => 'Darurat', 'desc' => 'Butuh bantuan segera'],
                                    'bullying' => ['icon' => '🚫', 'title' => 'Bullying', 'desc' => 'Dibully/diintimidasi'],
                                    'kecemasan' => ['icon' => '😰', 'title' => 'Stres', 'desc' => 'Cemas/tekanan mental'],
                                    'keluarga' => ['icon' => '👨‍👩‍👧‍👦', 'title' => 'Keluarga', 'desc' => 'Masalah keluarga'],
                                    'akademik' => ['icon' => '📚', 'title' => 'Akademik', 'desc' => 'Kesulitan belajar'],
                                    'pertemanan' => ['icon' => '👫', 'title' => 'Teman', 'desc' => 'Masalah pertemanan'],
                                    'percintaan' => ['icon' => '💔', 'title' => 'Percintaan', 'desc' => 'Masalah asmara'],
                                    'lainnya' => ['icon' => '❓', 'title' => 'Lainnya', 'desc' => 'Masalah lainnya'],
                                ];
                            @endphp
                            
                            @foreach($problemTypes as $key => $type)
                            <label class="problem-option relative">
                                <input type="radio" name="complaint_type" value="{{ $key }}" 
                                       class="absolute opacity-0" required>
                                <div class="p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-purple-300 hover:bg-purple-50 transition duration-200 h-full">
                                    <div class="flex items-center mb-2">
                                        <div class="text-2xl">{{ $type['icon'] }}</div>
                                        <div class="ml-3">
                                            <div class="font-bold text-gray-800">{{ $type['title'] }}</div>
                                            <div class="text-xs text-gray-500">{{ $type['desc'] }}</div>
                                        </div>
                                    </div>
                                    <div class="w-6 h-6 border-2 border-gray-300 rounded-full absolute top-3 right-3 flex items-center justify-center">
                                        <div class="w-3 h-3 bg-purple-600 rounded-full hidden"></div>
                                    </div>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Section 3: Cerita -->
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center text-white font-bold mr-4">
                                3
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">Ceritakan Detailnya</h2>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 mb-3 font-medium">
                                Deskripsi Lengkap <span class="text-red-500">*</span>
                                <span class="text-sm font-normal text-gray-500">(minimal 100 karakter)</span>
                            </label>
                            
                            <div class="mb-4 bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-xl border border-blue-200">
                                <p class="text-sm text-gray-700 mb-2">
                                    <span class="font-bold text-purple-600">Tips:</span> Ceritakan dengan detail agar kami bisa membantu lebih baik
                                </p>
                                <ul class="text-xs text-gray-600 space-y-1">
                                    <li>• Apa masalahnya dan kapan mulai terjadi?</li>
                                    <li>• Bagaimana perasaan kamu tentang hal ini?</li>
                                    <li>• Sudah coba apa untuk mengatasinya?</li>
                                    <li>• Apa yang kamu harapkan dari kami?</li>
                                </ul>
                            </div>
                            
                            <textarea name="description" rows="8" required
                                      class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 resize-none"
                                      placeholder="Mulai tulis ceritamu di sini... 
Contoh: 'Sudah 2 minggu ini aku merasa sangat cemas karena nilai ulangan yang terus turun. Setiap mau belajar, pikiran langsung blank. Sudah coba belajar kelompok tapi tetap susah fokus. Aku takut tidak lulus ujian nanti...'"
                                      oninput="updateCharCount(this)"></textarea>
                            
                            <div class="flex justify-between items-center mt-3">
                                <div>
                                    <span id="charCount" class="text-sm font-bold text-gray-500">0</span>
                                    <span class="text-sm text-gray-500">/500 karakter</span>
                                </div>
                                <div class="flex items-center text-sm text-blue-600 font-medium">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
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
                                   class="px-6 py-3 border-2 border-purple-300 text-purple-600 rounded-xl font-bold hover:bg-purple-50 transition duration-200 text-center">
                                    🔍 Cek Status
                                </a>
                                <button type="submit"
                                        class="px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold hover:opacity-90 transition duration-200 shadow-lg hover:shadow-xl flex items-center justify-center">
                                    <span>✨ Kirim Cerita Saya</span>
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Privacy Notice -->
                        <div class="mt-6 pt-6 border-t border-green-200">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
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
                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-xl p-6 border border-yellow-200">
                    <h3 class="font-bold text-gray-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Penting untuk Diketahui
                    </h3>
                    <ul class="text-sm text-gray-700 space-y-2">
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Respon tim BK: 1-3 hari kerja</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Kasus darurat diprioritaskan</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Konseling bersifat gratis</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-green-500 mr-2">✓</span>
                            <span>Follow-up berkala hingga tuntas</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl p-6 border border-purple-200">
                    <h3 class="font-bold text-gray-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Apa Selanjutnya?
                    </h3>
                    <ol class="text-sm text-gray-700 space-y-2">
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-purple-100 text-purple-700 rounded-full flex items-center justify-center text-xs font-bold mr-2">1</span>
                            Simpan <strong>Kode Rahasia</strong> yang diberikan
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-purple-100 text-purple-700 rounded-full flex items-center justify-center text-xs font-bold mr-2">2</span>
                            Cek email untuk konfirmasi
                        </li>
                        <li class="flex items-center">
                            <span class="w-6 h-6 bg-purple-100 text-purple-700 rounded-full flex items-center justify-center text-xs font-bold mr-2">3</span>
                            Gunakan kode untuk cek perkembangan
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Character counter
        function updateCharCount(textarea) {
            const count = textarea.value.length;
            const charCount = document.getElementById('charCount');
            charCount.textContent = count;
            
            if (count < 100) {
                charCount.className = 'text-sm font-bold text-red-500';
            } else if (count < 300) {
                charCount.className = 'text-sm font-bold text-yellow-500';
            } else {
                charCount.className = 'text-sm font-bold text-green-500';
            }
        }
        
        // Problem type selection
        document.querySelectorAll('.problem-option').forEach(option => {
            const input = option.querySelector('input[type="radio"]');
            const card = option.querySelector('div');
            
            option.addEventListener('click', function() {
                // Remove selection from all options
                document.querySelectorAll('.problem-option').forEach(opt => {
                    opt.querySelector('div').classList.remove('border-purple-500', 'bg-purple-50', 'ring-2', 'ring-purple-200');
                    opt.querySelector('.w-3.h-3').classList.add('hidden');
                });
                
                // Add selection to clicked option
                card.classList.add('border-purple-500', 'bg-purple-50', 'ring-2', 'ring-purple-200');
                card.querySelector('.w-3.h-3').classList.remove('hidden');
                input.checked = true;
            });
            
            // Check if this option is selected by default
            if (input.checked) {
                card.classList.add('border-purple-500', 'bg-purple-50', 'ring-2', 'ring-purple-200');
                card.querySelector('.w-3.h-3').classList.remove('hidden');
            }
        });
        
        // Form validation
        document.getElementById('counselingForm').addEventListener('submit', function(e) {
            const description = this.querySelector('textarea[name="description"]');
            const problemType = this.querySelector('input[name="complaint_type"]:checked');
            
            if (!problemType) {
                e.preventDefault();
                alert('Pilih jenis permasalahan terlebih dahulu!');
                return;
            }
            
            if (description.value.length < 100) {
                e.preventDefault();
                alert('Ceritamu terlalu pendek. Coba ceritakan lebih detail ya (minimal 100 karakter)!');
                description.focus();
                return;
            }
            
            // Show loading
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span>⏳ Mengirim...</span>';
            submitBtn.disabled = true;
            
            // Re-enable after 5 seconds (in case of error)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 5000);
        });
    </script>
    
    <style>
        .problem-option input:checked + div {
            border-color: #a855f7;
            background-color: #faf5ff;
            box-shadow: 0 0 0 2px rgba(168, 85, 247, 0.2);
        }
        
        .problem-option input:checked + div .w-3.h-3 {
            display: flex !important;
        }
        
        select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%239ca3af' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.25em 1.25em;
            padding-right: 2.75rem;
        }
        
        .problem-option div {
            transition: all 0.2s ease;
        }
        
        .problem-option:hover div {
            transform: translateY(-2px);
        }
    </style>
</x-app-layout>