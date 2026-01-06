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
                       placeholder="Cari nama siswa atau kode..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            </div>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="processed">Diproses</option>
                <option value="resolved">Selesai</option>
            </select>
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                <option value="">Semua Prioritas</option>
                <option value="high">Tinggi</option>
                <option value="medium">Sedang</option>
                <option value="low">Rendah</option>
            </select>
            <button class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                <i class="fas fa-filter mr-2"></i> Filter
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
                    <h3 class="text-lg font-bold text-gray-900">{{ $complaints->where('status', 'processed')->count() }}</h3>
                    <p class="text-sm text-gray-600">Diproses</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow border border-gray-100">
            <div class="flex items-center">
                <div class="p-2 bg-green-50 rounded-lg mr-3">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-900">{{ $complaints->where('status', 'resolved')->count() }}</h3>
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
                <a href="{{ route('complaint.create') }}" class="text-sm text-purple-600 hover:text-purple-700">
                    <i class="fas fa-plus mr-1"></i> Laporan Baru
                </a>
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
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($complaints as $complaint)
                    <tr class="hover:bg-gray-50 cursor-pointer" onclick="window.location='{{ route('complaint.show', $complaint->unique_code) }}'">
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
                                    'processed' => 'bg-blue-100 text-blue-800',
                                    'resolved' => 'bg-green-100 text-green-800'
                                ];
                            @endphp
                            <span class="px-2 py-1 text-xs font-medium rounded-full {{ $statusColors[$complaint->status] ?? 'bg-gray-100' }}">
                                {{ $complaint->status }}
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
                                {{ $complaint->priority_level }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $complaint->created_at->format('d/m/Y') }}
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
            <p class="text-gray-600 mb-4">Belum ada laporan konseling yang diterima</p>
            <a href="{{ route('complaint.create') }}" class="inline-flex items-center text-purple-600 hover:text-purple-700 font-medium">
                <i class="fas fa-plus mr-2"></i> Buat Laporan Pertama
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
</script>
@endpush
@endsection