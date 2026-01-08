@extends('layouts.app')

@section('title', 'Daftar Kelas')

@section('content')
<div x-data="{ showDeleteModal: false, deleteUrl: '', className: '' }">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Kelas</h1>
                <p class="text-gray-600 mt-2">Kelola data kelas untuk sistem konseling</p>
            </div>
            <a href="{{ route('classes.create') }}" 
               class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2.5 rounded-lg font-medium inline-flex items-center transition shadow-md hover:shadow-lg">
                <i class="fas fa-plus mr-2"></i> Tambah Kelas
            </a>
        </div>
    </div>

    <!-- Stats Card -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 shadow border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 bg-purple-50 rounded-lg">
                    <i class="fas fa-layer-group text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $kelas->total() }}</h3>
                    <p class="text-gray-600">Total Kelas</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 bg-green-50 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-2xl font-bold text-gray-900">{{ $kelas->count() }}</h3>
                    <p class="text-gray-600">Tampil</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 bg-blue-50 rounded-lg">
                    <i class="fas fa-clock text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-2xl font-bold text-gray-900">0</h3>
                    <p class="text-gray-600">Siswa (nanti)</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">
        <!-- Card Header -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex flex-col md:flex-row md:items-center justify-between">
                <div class="mb-4 md:mb-0">
                    <h2 class="text-lg font-semibold text-gray-800">Daftar Kelas</h2>
                    <p class="text-sm text-gray-600 mt-1">Semua kelas yang terdaftar dalam sistem</p>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- Search -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" 
                               id="searchInput" 
                               placeholder="Cari kelas..." 
                               class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 w-full md:w-64">
                    </div>
                    <!-- Refresh -->
                    <button onclick="location.reload()" 
                            class="p-2 text-gray-600 hover:text-purple-600 hover:bg-purple-50 rounded-lg transition">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Kelas
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Dibuat
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($kelas as $index => $class)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900 font-medium">#{{ $index + 1 }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-lg bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center">
                                    <i class="fas fa-graduation-cap text-purple-600"></i>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $class->nama_kelas }}</div>
                                    <div class="text-xs text-gray-500">ID: {{ $class->id }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $class->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $class->created_at->format('H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('classes.show', $class->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 hover:bg-blue-50 p-2 rounded transition">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('classes.edit', $class->id) }}" 
                                   class="text-yellow-600 hover:text-yellow-900 hover:bg-yellow-50 p-2 rounded transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button @click="className = '{{ $class->nama_kelas }}'; deleteUrl = '{{ route('classes.destroy', $class->id) }}'; showDeleteModal = true"
                                        class="text-red-600 hover:text-red-900 hover:bg-red-50 p-2 rounded transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="text-center py-8">
                                <div class="mb-4">
                                    <i class="fas fa-inbox text-4xl text-gray-300"></i>
                                </div>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada kelas</h3>
                                <p class="text-gray-600 mb-4">Mulai dengan menambahkan kelas pertama Anda</p>
                                <a href="{{ route('classes.create') }}" class="inline-flex items-center text-purple-600 hover:text-purple-700 font-medium">
                                    <i class="fas fa-plus mr-2"></i> Tambah Kelas
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($kelas->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Menampilkan <span class="font-medium">{{ $kelas->firstItem() }}</span> sampai 
                    <span class="font-medium">{{ $kelas->lastItem() }}</span> dari 
                    <span class="font-medium">{{ $kelas->total() }}</span> kelas
                </div>
                <div class="flex space-x-2">
                    {{ $kelas->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-show="showDeleteModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div @click.away="showDeleteModal = false" 
             class="bg-white rounded-xl shadow-xl max-w-md w-full p-6 transform transition-all">
            <div class="text-center mb-6">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Hapus Kelas</h3>
                <p class="text-gray-600">
                    Apakah Anda yakin ingin menghapus kelas 
                    <span class="font-semibold" x-text="className"></span>?
                </p>
                <p class="text-red-600 text-sm mt-2">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    Data yang dihapus tidak dapat dikembalikan
                </p>
            </div>
            <div class="flex justify-end space-x-3">
                <button @click="showDeleteModal = false" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Batal
                </button>
                <form :action="deleteUrl" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const className = row.querySelector('td:nth-child(2) .text-sm.font-semibold').textContent.toLowerCase();
            if (className.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
    
    // Auto-hide alerts
    setTimeout(() => {
        const alerts = document.querySelectorAll('.flash-message');
        alerts.forEach(alert => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
</script>
@endpush
@endsection