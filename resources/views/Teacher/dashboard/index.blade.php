@extends('layouts.app')

@section('title', 'Dashboard Guru - CINTA BK')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">
        <i class="fas fa-tachometer-alt text-purple-500 mr-2"></i>
        Dashboard Guru BK
    </h1>
    <p class="text-gray-600">Selamat datang, {{ auth()->user()->name }}! 👋</p>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Laporan -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 hover:shadow-xl transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Total Laporan</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $total }}</h3>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                <i class="fas fa-file-alt text-purple-500 text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Menunggu -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-yellow-500 hover:shadow-xl transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Menunggu</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $pending }}</h3>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                <i class="fas fa-clock text-yellow-500 text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Diproses -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500 hover:shadow-xl transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Diproses</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $in_progress }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-spinner text-blue-500 text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Selesai -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500 hover:shadow-xl transition-shadow">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm font-medium">Selesai</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $completed }}</h3>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                <i class="fas fa-check-circle text-green-500 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Complaints -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-bold text-gray-800">
                <i class="fas fa-history text-purple-500 mr-2"></i>
                Laporan Terbaru
            </h2>
            <a href="{{ route('complaints.index') }}" class="text-purple-600 hover:text-purple-800 font-medium">
                Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Siswa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($recentComplaints as $complaint)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="font-mono font-bold text-purple-600">{{ $complaint->unique_code }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">{{ $complaint->student_name }}</div>
                        <div class="text-sm text-gray-500">{{ $complaint->student_email }}</div>
                        @if($complaint->phone_number)
                        <div class="text-sm text-green-600 mt-1">
                            <i class="fab fa-whatsapp"></i> {{ $complaint->phone_number }}
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800">
                            {{ $complaint->student_class }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $typeColors = [
                                'akademik' => 'bg-blue-100 text-blue-800',
                                'sosial' => 'bg-green-100 text-green-800',
                                'karir' => 'bg-yellow-100 text-yellow-800',
                                'pribadi' => 'bg-pink-100 text-pink-800',
                                'darurat' => 'bg-red-100 text-red-800',
                                'lainnya' => 'bg-gray-100 text-gray-800'
                            ];
                            $color = $typeColors[$complaint->counseling_type] ?? 'bg-gray-100 text-gray-800';
                        @endphp
                        <span class="px-3 py-1 rounded-full text-sm {{ $color }}">
                            {{ ucfirst($complaint->counseling_type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'in_progress' => 'bg-blue-100 text-blue-800',
                                'completed' => 'bg-green-100 text-green-800',
                                'cancelled' => 'bg-gray-100 text-gray-800'
                            ];
                            $statusColor = $statusColors[$complaint->status] ?? 'bg-gray-100 text-gray-800';
                            $statusLabels = [
                                'pending' => 'Menunggu',
                                'in_progress' => 'Diproses',
                                'completed' => 'Selesai',
                                'cancelled' => 'Dibatalkan'
                            ];
                            $statusLabel = $statusLabels[$complaint->status] ?? $complaint->status;
                        @endphp
                        <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusColor }}">
                            {{ $statusLabel }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $complaint->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('complaints.show', $complaint->id) }}" 
                           class="text-purple-600 hover:text-purple-900 font-medium">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                        <p class="text-lg">Belum ada laporan</p>
                        <p class="text-sm mt-2">Siswa belum mengirim laporan konseling</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Stats by Type -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Jenis Masalah -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">
            <i class="fas fa-chart-pie text-purple-500 mr-2"></i>
            Laporan Berdasarkan Jenis
        </h3>
        <div class="space-y-3">
            @foreach($typeStats as $stat)
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    @php
                        $typeIcons = [
                            'akademik' => 'fas fa-book-open text-blue-500',
                            'sosial' => 'fas fa-users text-green-500',
                            'karir' => 'fas fa-graduation-cap text-yellow-500',
                            'pribadi' => 'fas fa-brain text-pink-500',
                            'darurat' => 'fas fa-exclamation-triangle text-red-500',
                            'lainnya' => 'fas fa-question-circle text-gray-500'
                        ];
                        $icon = $typeIcons[$stat->counseling_type] ?? 'fas fa-question-circle text-gray-500';
                        $typeLabels = [
                            'akademik' => 'Akademik',
                            'sosial' => 'Sosial',
                            'karir' => 'Karir',
                            'pribadi' => 'Pribadi',
                            'darurat' => 'Darurat',
                            'lainnya' => 'Lainnya'
                        ];
                        $label = $typeLabels[$stat->counseling_type] ?? 'Lainnya';
                    @endphp
                    <i class="{{ $icon }} mr-3"></i>
                    <span class="font-medium">{{ $label }}</span>
                </div>
                <div class="flex items-center">
                    <span class="font-bold text-gray-800 mr-2">{{ $stat->total }}</span>
                    <span class="text-sm text-gray-500">laporan</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- Kelas -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">
            <i class="fas fa-school text-blue-500 mr-2"></i>
            Laporan Berdasarkan Kelas
        </h3>
        <div class="space-y-3">
            @foreach($classStats as $stat)
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-users-class text-purple-500 mr-3"></i>
                    <span class="font-medium">Kelas {{ $stat->kelas }}</span>
                </div>
                <div class="flex items-center">
                    <span class="font-bold text-gray-800 mr-2">{{ $stat->total }}</span>
                    <span class="text-sm text-gray-500">laporan</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Monthly Stats -->
<div class="bg-white rounded-xl shadow-lg p-6 mt-8">
    <h3 class="text-lg font-bold text-gray-800 mb-4">
        <i class="fas fa-chart-line text-green-500 mr-2"></i>
        Grafik Bulanan {{ date('Y') }}
    </h3>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @for($i = 1; $i <= 12; $i++)
            @php
                $monthData = $monthlyStats->where('month', $i)->first();
                $totalMonth = $monthData ? $monthData->total : 0;
                $monthNames = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            @endphp
            <div class="text-center">
                <div class="text-sm text-gray-500 mb-1">{{ $monthNames[$i] }}</div>
                <div class="text-lg font-bold text-gray-800">{{ $totalMonth }}</div>
                <div class="h-2 bg-gray-200 rounded-full mt-1 overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-green-400 to-emerald-500 rounded-full" 
                         style="width: {{ min($totalMonth * 20, 100) }}%"></div>
                </div>
            </div>
        @endfor
    </div>
</div>

@endsection

@push('styles')
<style>
    /* Custom styles */
    .border-l-4 {
        border-left-width: 4px;
    }
    
    /* Hover effects */
    .hover\:shadow-xl {
        transition: box-shadow 0.3s ease;
    }
    
    /* Table row hover */
    tr:hover {
        background-color: #f9fafb;
    }
    
    /* Animation for stats */
    .stat-card {
        transition: transform 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush