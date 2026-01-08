{{-- resources/views/Teacher/complaints/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center mb-4">
            <a href="{{ route('complaints.index') }}" class="text-gray-500 hover:text-gray-700 mr-3">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Detail Laporan Konseling</h1>
                <p class="text-gray-600 mt-2">Informasi lengkap tentang laporan konseling siswa</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Complaint Info -->
        <div class="lg:col-span-2">
            <!-- Info Card -->
            <div class="bg-white rounded-xl shadow border border-gray-100 p-6 mb-6">
                <!-- Header dengan kode dan status -->
                <div class="flex items-start justify-between mb-6">
                    <div class="flex items-center">
                        <div class="h-14 w-14 rounded-xl bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center mr-4">
                            <i class="fas fa-file-alt text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Laporan #{{ $complaint->unique_code }}</h2>
                            <p class="text-gray-600">ID: {{ $complaint->id }}</p>
                        </div>
                    </div>
                    
                    <!-- Status Badge -->
                    @php
                        $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-800',
                            'in_progress' => 'bg-blue-100 text-blue-800',
                            'completed' => 'bg-green-100 text-green-800',
                            'cancelled' => 'bg-red-100 text-red-800'
                        ];
                        $statusLabels = [
                            'pending' => 'Pending',
                            'in_progress' => 'Dalam Proses',
                            'completed' => 'Selesai',
                            'cancelled' => 'Dibatalkan'
                        ];
                    @endphp
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusColors[$complaint->status] ?? 'bg-gray-100' }}">
                        <i class="fas fa-circle text-xs mr-2"></i> {{ $statusLabels[$complaint->status] ?? $complaint->status }}
                    </span>
                </div>

                <!-- Informasi Siswa -->
                <div class="mb-6">
                    <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-user-graduate text-blue-500 mr-2"></i> Informasi Siswa
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-500 mb-1">Nama Siswa</p>
                            <p class="font-medium text-gray-900">{{ $complaint->student_name }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-500 mb-1">Email</p>
                            <p class="font-medium text-gray-900">{{ $complaint->student_email }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-500 mb-1">Kelas</p>
                            <p class="font-medium text-gray-900">{{ $complaint->student_class }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-500 mb-1">Jenis Konseling</p>
                            <p class="font-medium text-gray-900">{{ $complaint->counseling_type }}</p>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi Masalah -->
                <div class="mb-6">
                    <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-comment-dots text-blue-500 mr-2"></i> Deskripsi Masalah
                    </h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-800 whitespace-pre-line">{{ $complaint->description }}</p>
                    </div>
                </div>

                <!-- Timeline -->
                <div>
                    <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                        <i class="fas fa-history text-blue-500 mr-2"></i> Timeline
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-plus text-blue-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Laporan dibuat</p>
                                <p class="text-xs text-gray-500">{{ $complaint->created_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-sync text-blue-600 text-xs"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium">Terakhir diperbarui</p>
                                <p class="text-xs text-gray-500">{{ $complaint->updated_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="bg-white rounded-xl shadow border border-gray-100 p-6">
                <div class="flex flex-wrap gap-3">
                    @if(in_array($complaint->status, ['pending', 'in_progress']))
                    <a href="{{ route('complaints.show', $complaint->id) }}?action=edit" 
                       class="inline-flex items-center px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow-md hover:shadow-lg">
                        <i class="fas fa-edit mr-2"></i> Update Status
                    </a>
                    @endif
                    
                    <form action="{{ route('complaints.destroy', $complaint->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Hapus laporan ini?')"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition shadow-md hover:shadow-lg">
                            <i class="fas fa-trash mr-2"></i> Hapus Laporan
                        </button>
                    </form>
                    
                    <a href="{{ route('complaints.index') }}" 
                       class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                        <i class="fas fa-list mr-2"></i> Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Column - Actions & Notes -->
        <div class="space-y-6">
            <!-- Status Update Form -->
            @if(request()->has('action') && request()->get('action') == 'edit')
            <div class="bg-white rounded-xl shadow border border-blue-200 p-6">
                <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-edit text-blue-500 mr-2"></i> Update Status Laporan
                </h4>
                <form action="{{ route('complaints.update.status', $complaint->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status Baru</label>
                            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $complaint->status == 'in_progress' ? 'selected' : '' }}>Dalam Proses</option>
                                <option value="completed" {{ $complaint->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                <option value="cancelled" {{ $complaint->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan</label>
                            <textarea name="notes" rows="3" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"
                                      placeholder="Tambahkan catatan atau tindakan yang dilakukan..."></textarea>
                        </div>
                        <button type="submit" 
                                class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
            @endif

            <!-- Add Note Form -->
            <div class="bg-white rounded-xl shadow border border-gray-100 p-6">
                <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-sticky-note text-green-500 mr-2"></i> Tambah Catatan
                </h4>
                <form action="{{ route('complaints.add.note', $complaint->id) }}" method="POST">
                    @csrf
                    <div class="space-y-3">
                        <textarea name="note" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
                                  placeholder="Tambahkan catatan baru..."></textarea>
                        <button type="submit" 
                                class="w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                            Simpan Catatan
                        </button>
                    </div>
                </form>
            </div>

            <!-- Existing Notes -->
            @if($complaint->counselor_notes)
            <div class="bg-white rounded-xl shadow border border-gray-100 p-6">
                <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-clipboard-list text-purple-500 mr-2"></i> Catatan Konselor
                </h4>
                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-gray-800 whitespace-pre-line text-sm">{{ $complaint->counselor_notes }}</p>
                </div>
            </div>
            @endif

            <!-- Priority Info -->
            <div class="bg-white rounded-xl shadow border border-gray-100 p-6">
                <h4 class="font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-flag text-orange-500 mr-2"></i> Informasi Prioritas
                </h4>
                @php
                    $priorityColors = [
                        'high' => 'bg-red-100 text-red-800',
                        'medium' => 'bg-orange-100 text-orange-800',
                        'low' => 'bg-green-100 text-green-800'
                    ];
                    $priorityLabels = [
                        'high' => 'Tinggi',
                        'medium' => 'Sedang',
                        'low' => 'Rendah'
                    ];
                @endphp
                <div class="flex items-center justify-between">
                    <span>Level Prioritas</span>
                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $priorityColors[$complaint->priority_level] ?? 'bg-gray-100' }}">
                        {{ $priorityLabels[$complaint->priority_level] ?? $complaint->priority_level }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
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