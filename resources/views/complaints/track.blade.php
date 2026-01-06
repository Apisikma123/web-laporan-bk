<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto">
            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-3">Cek Status Konseling</h1>
                <p class="text-gray-600">Masukkan kode rahasia yang kamu dapatkan</p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <form action="{{ route('complaint.check') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 mb-2 font-bold">Kode Rahasia</label>
                        <input type="text" name="code" required
                               class="w-full px-4 py-3 border-2 border-purple-200 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent text-center font-mono text-lg"
                               placeholder="BK-XXXXXXXX"
                               pattern="BK-[A-Z0-9]{8}"
                               title="Format: BK- diikuti 8 huruf/angka">
                        <p class="text-sm text-gray-500 mt-2 text-center">Contoh: BK-ABC123DE</p>
                    </div>
                    
                    @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700">
                        {{ session('error') }}
                    </div>
                    @endif
                    
                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700">
                        {{ session('success') }}
                    </div>
                    @endif
                    
                    <button type="submit"
                            class="w-full py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-bold hover:opacity-90 transition shadow-lg">
                        🔍 Cek Status Sekarang
                    </button>
                </form>
                
                <div class="mt-8 pt-8 border-t border-gray-100">
                    <h3 class="font-bold text-gray-800 mb-4">Lupa Kode?</h3>
                    <div class="space-y-3">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>Cek email konfirmasi yang kami kirim</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                            <span>Hubungi guru BK di sekolah</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <a href="{{ route('complaint.create') }}" class="text-purple-600 hover:text-purple-800 font-medium">
                    ← Kembali ke form konseling
                </a>
            </div>
        </div>
    </div>
</x-app-layout>