@extends('layouts.app')

@section('title', 'Detail Kelas')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center mb-4">
            <a href="{{ route('classes.index') }}" class="text-gray-500 hover:text-gray-700 mr-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Detail Kelas</h1>
                <p class="text-gray-600 mt-2">Informasi lengkap tentang kelas ini</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Kelas Info -->
        <div class="lg:col-span-2">
            <!-- Info Card -->
            <div class="bg-white rounded-xl shadow border border-gray-100 p-6 mb-6">
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center">
                        <div class="h-14 w-14 rounded-xl bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center mr-4">
                            <i class="fas fa-school text-2xl text-purple-600"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ $kelas->nama_kelas }}</h2>
                            <p class="text-gray-600">ID: KLS{{ str_pad($kelas->id, 3, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                        <i class="fas fa-circle text-xs mr-2"></i> Aktif
                    </span>
                </div>

                <!-- Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Tanggal Dibuat</h4>
                            <div class="flex items-center text-gray-900">
                                <i class="fas fa-calendar-plus text-purple-500 mr-2"></i>
                                {{ $kelas->created_at->format('d F Y') }}
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Dibuat Pada</h4>
                            <div class="flex items-center text-gray-900">
                                <i class="fas fa-clock text-purple-500 mr-2"></i>
                                {{ $kelas->created_at->format('H:i') }} WIB
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Terakhir Diupdate</h4>
                            <div class="flex items-center text-gray-900">
                                <i class="fas fa-calendar-edit text-purple-500 mr-2"></i>
                                {{ $kelas->updated_at->format('d F Y') }}
                            </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-1">Diupdate Pada</h4>
                            <div class="flex items-center text-gray-900">
                                <i class="fas fa-history text-purple-500 mr-2"></i>
                                {{ $kelas->updated_at->format('H:i') }} WIB
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-white rounded-xl shadow border border-gray-100 p-6">
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('classes.edit', $kelas->id) }}" 
                       class="inline-flex items-center px-4 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition shadow-md hover:shadow-lg">
                        <i class="fas fa-edit mr-2"></i> Edit Kelas
                    </a>
                    <button onclick="confirmDelete('{{ $kelas->nama_kelas }}', '{{ route('classes.destroy', $kelas->id) }}')"
                            class="inline-flex items-center px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition shadow-md hover:shadow-lg">
                        <i class="fas fa-trash mr-2"></i> Hapus Kelas
                    </button>
                    <a href="{{ route('classes.create') }}" 
                       class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                        <i class="fas fa-plus mr-2"></i> Tambah Baru
                    </a>
                    <a href="{{ route('classes.index') }}" 
                       class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                        <i class="fas fa-list mr-2"></i> Lihat Semua
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Column - Stats -->
        <div class="space-y-6">
            <!-- Stats Card -->
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                <div class="text-center mb-4">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-white bg-opacity-20 mb-3">
                        <i class="fas fa-chart-bar text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold">Statistik</h3>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span>Jumlah Siswa</span>
                        <span class="font-bold">0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Laporan Konseling</span>
                        <span class="font-bold">0</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Status</span>
                        <span class="font-bold">Aktif</span>
                    </div>
                </div>
            </div>

            <!-- Quick Info -->
            <div class="bg-white rounded-xl shadow border border-gray-100 p-6">
                <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-purple-500 mr-2"></i> Informasi Cepat
                </h4>
                <ul class="space-y-3">
                    <li class="flex items-center text-sm">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        <span>Kelas tersedia untuk dipilih siswa</span>
                    </li>
                    <li class="flex items-center text-sm">
                        <i class="fas fa-users text-blue-500 mr-2"></i>
                        <span>Dapat menampung banyak siswa</span>
                    </li>
                    <li class="flex items-center text-sm">
                        <i class="fas fa-sync-alt text-purple-500 mr-2"></i>
                        <span>Data dapat diperbarui kapan saja</span>
                    </li>
                </ul>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-xl shadow border border-gray-100 p-6">
                <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-history text-purple-500 mr-2"></i> Aktivitas Terbaru
                </h4>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                            <i class="fas fa-plus text-purple-600 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Kelas dibuat</p>
                            <p class="text-xs text-gray-500">{{ $kelas->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                            <i class="fas fa-sync text-purple-600 text-xs"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Terakhir diperbarui</p>
                            <p class="text-xs text-gray-500">{{ $kelas->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function confirmDelete(name, url) {
        if (confirm(`Apakah Anda yakin ingin menghapus kelas "${name}"?`)) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            form.innerHTML = `
                @csrf
                @method('DELETE')
            `;
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endpush
@endsection