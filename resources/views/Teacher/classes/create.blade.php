@extends('layouts.app')

@section('title', 'Tambah Kelas Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center mb-4">
            <a href="{{ route('classes.index') }}" class="text-gray-500 hover:text-gray-700 mr-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Tambah Kelas</h1>
                <p class="text-gray-600 mt-2">Isi form untuk menambah kelas baru</p>
            </div>
        </div>
        
        <!-- Progress Steps -->
        <div class="flex items-center mb-8">
            <div class="flex-1">
                <div class="h-2 bg-purple-200 rounded-full">
                    <div class="h-2 bg-purple-600 rounded-full w-1/3"></div>
                </div>
            </div>
            <div class="ml-4 text-sm text-purple-600 font-medium">Langkah 1 dari 3</div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow border border-gray-100 p-6">
        <form action="{{ route('classes.store') }}" method="POST" id="createForm">
            @csrf
            
            <!-- Nama Kelas -->
            <div class="mb-6">
                <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-chalkboard-teacher mr-2 text-purple-600"></i>
                    Nama Kelas
                </label>
                <div class="relative">
                    <input type="text" 
                           id="nama_kelas" 
                           name="nama_kelas" 
                           value="{{ old('nama_kelas') }}"
                           placeholder="Contoh: X IPA 1"
                           required
                           autofocus
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition text-lg"
                           oninput="updatePreview(this.value)">
                    <div class="absolute right-3 top-3">
                        <button type="button" onclick="document.getElementById('nama_kelas').value = ''" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                @error('nama_kelas')
                    <p class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </p>
                @enderror
                <p class="mt-2 text-sm text-gray-500">
                    <i class="fas fa-info-circle mr-1 text-purple-600"></i>
                    Nama akan muncul di dropdown saat menambah siswa
                </p>
            </div>

            <!-- Preview -->
            <div class="mb-8">
                <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-br from-purple-100 to-purple-200 mb-4">
                            <i class="fas fa-school text-2xl text-purple-600"></i>
                        </div>
                        <h3 id="previewText" class="text-xl font-semibold text-gray-900">Nama Kelas</h3>
                        <p class="text-gray-600 mt-1">Ini akan tampil di sistem</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                <a href="{{ route('classes.index') }}" 
                   class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
                <div class="flex space-x-3">
                    <button type="reset" 
                            class="px-5 py-2.5 border border-red-300 text-red-700 rounded-lg hover:bg-red-50 transition inline-flex items-center">
                        <i class="fas fa-undo mr-2"></i> Reset
                    </button>
                    <button type="submit" 
                            class="px-6 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition shadow-md hover:shadow-lg inline-flex items-center">
                        <i class="fas fa-save mr-2"></i> Simpan Kelas
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Tips -->
    <div class="mt-6 bg-purple-50 border border-purple-200 rounded-xl p-5">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="fas fa-lightbulb text-purple-600 text-xl"></i>
            </div>
            <div class="ml-3">
                <h4 class="text-sm font-semibold text-purple-800">Tips Penamaan</h4>
                <div class="mt-2 text-sm text-purple-700">
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Gunakan format: <code class="bg-purple-100 px-1 rounded">X IPA 1</code></li>
                        <li>Hindari spasi berlebih dan karakter khusus</li>
                        <li>Nama akan otomatis diubah menjadi huruf besar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Update preview in real-time
    function updatePreview(value) {
        const preview = document.getElementById('previewText');
        if (value.trim() === '') {
            preview.textContent = 'Nama Kelas';
            preview.classList.remove('text-purple-600');
        } else {
            preview.textContent = value.toUpperCase();
            preview.classList.add('text-purple-600');
        }
    }
    
    // Auto uppercase
    document.getElementById('nama_kelas').addEventListener('input', function() {
        const cursorPos = this.selectionStart;
        this.value = this.value.toUpperCase();
        this.setSelectionRange(cursorPos, cursorPos);
    });
    
    // Form validation
    document.getElementById('createForm').addEventListener('submit', function(e) {
        const className = document.getElementById('nama_kelas').value.trim();
        
        if (className.length < 2) {
            e.preventDefault();
            showToast('error', 'Nama kelas minimal 2 karakter');
            return false;
        }
        
        // Add loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
        submitBtn.disabled = true;
        
        return true;
    });
</script>
@endpush
@endsection