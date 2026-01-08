@extends('layouts.app')

@section('title', 'Laporan Konseling')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Laporan Konseling</h1>
                <p class="text-gray-600 mt-2">Kelola semua laporan konseling siswa</p>
            </div>
            <div class="text-sm text-gray-500">
                <i class="fas fa-info-circle mr-2"></i>
                Total: {{ $complaints->total() }} laporan
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow border border-gray-100 p-4 mb-6">
        <div class="flex flex-wrap items-center gap-4">
            <div class="flex-1 min-w-[250px]">
                <input type="text" 
                       id="searchInput"
                       placeholder="Cari nama siswa, kode, atau kelas..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            </div>
            <select id="statusFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="in_progress">Dalam Proses</option>
                <option value="completed">Selesai</option>
                <option value="cancelled">Dibatalkan</option>
            </select>
            <select id="priorityFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                <option value="">Semua Prioritas</option>
                <option value="high">Tinggi</option>
                <option value="medium">Sedang</option>
                <option value="low">Rendah</option>
            </select>
            <button id="applyFilter" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                <i class="fas fa-filter mr-2"></i> Filter
            </button>
            <button id="resetFilter" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                <i class="fas fa-redo mr-2"></i> Reset
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl p-4 shadow border border-gray-100">
            <div class="flex items-center">
                <div class="p-2 bg-blue-50 rounded-lg mr-3">
                    <i class="fas fa-inbox text-blue-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">{{ $complaints->total() }}</h3>
                    <p class="text-sm text-gray-600">Total Laporan</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-100">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-50 rounded-lg mr-3">
                    <i class="fas fa-clock text-yellow-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">{{ $complaints->where('status', 'pending')->count() }}</h3>
                    <p class="text-sm text-gray-600">Pending</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-100">
            <div class="flex items-center">
                <div class="p-2 bg-purple-50 rounded-lg mr-3">
                    <i class="fas fa-spinner text-purple-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">{{ $complaints->where('status', 'in_progress')->count() }}</h3>
                    <p class="text-sm text-gray-600">Dalam Proses</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-100">
            <div class="flex items-center">
                <div class="p-2 bg-green-50 rounded-lg mr-3">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">{{ $complaints->where('status', 'completed')->count() }}</h3>
                    <p class="text-sm text-gray-600">Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow border border-gray-100 overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800">Daftar Laporan</h2>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-800">
                        <i class="fas fa-dashboard mr-1"></i> Dashboard
                    </a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('classes.index') }}" class="text-sm text-gray-600 hover:text-gray-800">
                        <i class="fas fa-users mr-1"></i> Kelas
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Content -->
        @if($complaints->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Siswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kelas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prioritas</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dibuat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($complaints as $complaint)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-mono text-purple-600 font-bold">{{ $complaint->unique_code }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $complaint->student_name }}</div>
                            <div class="text-xs text-gray-500">{{ $complaint->student_email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900">{{ $complaint->student_class }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-900">{{ $complaint->counseling_type }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'in_progress' => 'bg-blue-100 text-blue-800',
                                    'completed' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-red-100 text-red-800'
                                ];
                            @endphp
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $statusColors[$complaint->status] ?? 'bg-gray-100' }}">
                                @if($complaint->status == 'pending')
                                    Pending
                                @elseif($complaint->status == 'in_progress')
                                    Dalam Proses
                                @elseif($complaint->status == 'completed')
                                    Selesai
                                @elseif($complaint->status == 'cancelled')
                                    Dibatalkan
                                @else
                                    {{ $complaint->status }}
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $priorityColors = [
                                    'high' => 'bg-red-100 text-red-800',
                                    'medium' => 'bg-orange-100 text-orange-800',
                                    'low' => 'bg-green-100 text-green-800'
                                ];
                            @endphp
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $priorityColors[$complaint->priority_level] ?? 'bg-gray-100' }}">
                                @if($complaint->priority_level == 'high')
                                    Tinggi
                                @elseif($complaint->priority_level == 'medium')
                                    Sedang
                                @elseif($complaint->priority_level == 'low')
                                    Rendah
                                @else
                                    {{ $complaint->priority_level }}
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $complaint->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('complaints.show', $complaint->id) }}" 
                                   class="text-blue-600 hover:text-blue-900"
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>

                                
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-700">
                    Menampilkan <span class="font-medium">{{ $complaints->firstItem() }}</span> sampai 
                    <span class="font-medium">{{ $complaints->lastItem() }}</span> dari 
                    <span class="font-medium">{{ $complaints->total() }}</span> laporan
                </div>
                <div>
                    {{ $complaints->links() }}
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-12">
            <div class="mb-4">
                <i class="fas fa-inbox text-4xl text-gray-300"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada laporan</h3>
            <p class="text-gray-600 mb-4">Belum ada laporan konseling yang diterima dari siswa</p>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center text-purple-600 hover:text-purple-700 font-medium">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
            </a>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    // Auto-hide alerts after 5 seconds
    setTimeout(() => {
        const alerts = document.querySelectorAll('.flash-message');
        alerts.forEach(alert => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);

    // Filter functionality
    document.getElementById('applyFilter')?.addEventListener('click', function() {
        const search = document.getElementById('searchInput').value;
        const status = document.getElementById('statusFilter').value;
        const priority = document.getElementById('priorityFilter').value;
        
        let url = new URL(window.location.href);
        let params = new URLSearchParams();
        
        if (search) params.set('search', search);
        if (status) params.set('status', status);
        if (priority) params.set('priority', priority);
        
        window.location.href = url.pathname + '?' + params.toString();
    });

    document.getElementById('resetFilter')?.addEventListener('click', function() {
        window.location.href = window.location.pathname;
    });

    // Enter key to filter
    document.getElementById('searchInput')?.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            document.getElementById('applyFilter').click();
        }
    });
</script>
@endpush
@endsection