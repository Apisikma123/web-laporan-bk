<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru BK - Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .stat-card {
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .status-badge {
            font-size: 0.85rem;
            font-weight: 600;
        }
        .urgent {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.7; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header Guru-Friendly -->
    <header class="bg-gradient-to-r from-blue-600 to-purple-700 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center py-5">
                <!-- Logo & Info Sekolah -->
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="bg-white text-blue-600 p-3 rounded-xl mr-4 shadow">
                        <i class="fas fa-school text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">DASHBOARD GURU BK</h1>
                        <p class="text-blue-100">Sistem Layanan Konseling Sekolah</p>
                        <p class="text-sm text-blue-200 mt-1">
                            <i class="fas fa-user-circle mr-1"></i> 
                            Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span>
                        </p>
                    </div>
                </div>

                <!-- Menu Navigasi -->
                <nav class="flex flex-wrap gap-4">
                    <a href="{{ route('dashboard') }}" 
                       class="px-4 py-2 bg-white/20 rounded-lg hover:bg-white/30 transition flex items-center">
                        <i class="fas fa-home mr-2"></i> Beranda
                    </a>
                    <a href="{{ route('complaints.index') }}" 
                       class="px-4 py-2 bg-white/20 rounded-lg hover:bg-white/30 transition flex items-center">
                        <i class="fas fa-clipboard-list mr-2"></i> Daftar Laporan
                    </a>
                    <a href="{{ route('classes.index') }}" 
                       class="px-4 py-2 bg-white/20 rounded-lg hover:bg-white/30 transition flex items-center">
                        <i class="fas fa-users-class mr-2"></i> Data Kelas
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" 
                                class="px-4 py-2 bg-red-500/80 hover:bg-red-600 rounded-lg transition flex items-center">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                        </button>
                    </form>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Dashboard -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Info Tanggal & Waktu -->
        <div class="bg-white rounded-xl shadow p-5 mb-8 border-l-4 border-blue-500">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">
                        <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                        Informasi Hari Ini
                    </h2>
                    <p class="text-gray-600 mt-1">
                        {{ now()->translatedFormat('l, d F Y') }} | 
                        <span id="current-time" class="font-bold text-blue-600"></span>
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="flex gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">{{ $total ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Total Laporan</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-yellow-600">{{ $pending ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Perlu Tindakan</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-green-600">{{ $resolved ?? 0 }}</div>
                            <div class="text-sm text-gray-600">Selesai</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kartu Statistik Besar (Mudah Dibaca) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Total Laporan -->
            <div class="stat-card bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-500">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">
                        <i class="fas fa-file-alt text-blue-500 mr-2"></i>
                        Total Laporan
                    </h3>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-chart-bar text-blue-600 text-xl"></i>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-gray-800 mb-2">{{ $total ?? 0 }}</div>
                    <p class="text-gray-600">Laporan masuk</p>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Hari ini: 0</span>
                        <span class="text-gray-600">Minggu ini: 0</span>
                    </div>
                </div>
            </div>

            <!-- Menunggu Tindakan -->
            <div class="stat-card bg-white rounded-xl shadow-lg p-6 border-t-4 border-yellow-500">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">
                        <i class="fas fa-clock text-yellow-500 mr-2"></i>
                        Menunggu Tindakan
                    </h3>
                    <div class="bg-yellow-100 p-3 rounded-full urgent">
                        <i class="fas fa-exclamation-triangle text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-gray-800 mb-2">{{ $pending ?? 0 }}</div>
                    <p class="text-gray-600">Perlu perhatian</p>
                </div>
                <div class="mt-4">
                    @if(($pending ?? 0) > 0)
                    <a href="{{ route('complaints.index') }}?status=pending" 
                       class="block text-center bg-yellow-500 text-white py-2 rounded-lg hover:bg-yellow-600 transition">
                        <i class="fas fa-eye mr-2"></i> Lihat Laporan
                    </a>
                    @else
                    <div class="text-center text-green-600 py-2">
                        <i class="fas fa-check-circle mr-2"></i> Semua sudah ditangani
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sedang Diproses -->
            <div class="stat-card bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-400">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">
                        <i class="fas fa-spinner text-blue-400 mr-2"></i>
                        Sedang Diproses
                    </h3>
                    <div class="bg-blue-50 p-3 rounded-full">
                        <i class="fas fa-cogs text-blue-400 text-xl"></i>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-gray-800 mb-2">{{ $processed ?? 0 }}</div>
                    <p class="text-gray-600">Dalam penanganan</p>
                </div>
                <div class="mt-4">
                    <div class="text-sm text-gray-600">
                        <i class="fas fa-info-circle mr-1"></i>
                        Laporan yang sedang ditindaklanjuti
                    </div>
                </div>
            </div>

            <!-- Sudah Selesai -->
            <div class="stat-card bg-white rounded-xl shadow-lg p-6 border-t-4 border-green-500">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-800">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        Sudah Selesai
                    </h3>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-trophy text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold text-gray-800 mb-2">{{ $resolved ?? 0 }}</div>
                    <p class="text-gray-600">Telah diselesaikan</p>
                </div>
                <div class="mt-4">
                    <div class="flex items-center text-green-600">
                        <i class="fas fa-chart-line mr-2"></i>
                        @if($total > 0)
                        <span>Persentase: {{ round(($resolved/$total)*100, 1) }}%</span>
                        @else
                        <span>Belum ada data</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Utama: Laporan & Aksi Cepat -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Kolom Kiri: Aksi Cepat & Info -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Tombol Aksi Cepat -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-3">
                        <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                        AKSI CEPAT
                    </h2>
                    
                    <div class="space-y-4">
                        <a href="{{ route('complaints.index') }}" 
                           class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition group">
                            <div class="bg-blue-500 text-white p-3 rounded-lg mr-4">
                                <i class="fas fa-list-check text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Kelola Laporan</h3>
                                <p class="text-sm text-gray-600">Lihat dan tangani semua laporan</p>
                            </div>
                            <div class="ml-auto text-blue-500">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </a>

                        <a href="{{ route('classes.index') }}" 
                           class="flex items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition group">
                            <div class="bg-green-500 text-white p-3 rounded-lg mr-4">
                                <i class="fas fa-users text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Data Kelas</h3>
                                <p class="text-sm text-gray-600">Kelola data siswa per kelas</p>
                            </div>
                            <div class="ml-auto text-green-500">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </a>

                        <a href="{{ route('complaint.create') }}" 
                           class="flex items-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition group">
                            <div class="bg-purple-500 text-white p-3 rounded-lg mr-4">
                                <i class="fas fa-plus-circle text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Buat Contoh</h3>
                                <p class="text-sm text-gray-600">Contoh laporan untuk siswa</p>
                            </div>
                            <div class="ml-auto text-purple-500">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </a>

                        <button onclick="window.print()" 
                                class="w-full flex items-center p-4 bg-gray-50 hover:bg-gray-100 rounded-lg transition group">
                            <div class="bg-gray-500 text-white p-3 rounded-lg mr-4">
                                <i class="fas fa-print text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Cetak Laporan</h3>
                                <p class="text-sm text-gray-600">Print data bulan ini</p>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Info Penting -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl shadow-lg p-6">
                    <h2 class="text-xl font-bold mb-4">
                        <i class="fas fa-info-circle mr-2"></i>
                        INFORMASI PENTING
                    </h2>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle mt-1 mr-3 text-green-300"></i>
                            <span>Pastikan semua laporan ditindaklanjuti maksimal 3 hari</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle mt-1 mr-3 text-green-300"></i>
                            <span>Laporan darurat harus diprioritaskan</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle mt-1 mr-3 text-green-300"></i>
                            <span>Data siswa bersifat rahasia</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle mt-1 mr-3 text-green-300"></i>
                            <span>Simpan bukti tindak lanjut</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Kolom Kanan: Tabel Laporan Terbaru -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="px-6 py-5 bg-gradient-to-r from-gray-800 to-gray-900">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold text-white">
                                <i class="fas fa-history mr-3"></i>
                                LAPORAN TERBARU
                            </h2>
                            <a href="{{ route('complaints.index') }}" 
                               class="text-white hover:text-blue-300 font-medium">
                                Lihat Semua <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-left font-bold text-gray-700">KODE</th>
                                    <th class="px-6 py-4 text-left font-bold text-gray-700">NAMA SISWA</th>
                                    <th class="px-6 py-4 text-left font-bold text-gray-700">KELAS</th>
                                    <th class="px-6 py-4 text-left font-bold text-gray-700">STATUS</th>
                                    <th class="px-6 py-4 text-left font-bold text-gray-700">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($recentComplaints as $complaint)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-6 py-4">
                                        <div class="font-mono font-bold text-blue-600">
                                            {{ $complaint->unique_code ?? 'N/A' }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ $complaint->created_at->format('d/m/Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900">{{ $complaint->student_name ?? 'N/A' }}</div>
                                        <div class="text-sm text-gray-500">
                                            {{ $complaint->counseling_type ?? 'Lainnya' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-bold text-gray-800">
                                            {{ $complaint->student_class ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $status = $complaint->status ?? 'pending';
                                            $statusConfig = [
                                                'pending' => ['color' => 'bg-red-100 text-red-800', 'icon' => 'fas fa-clock', 'label' => 'MENUNGGU'],
                                                'processed' => ['color' => 'bg-yellow-100 text-yellow-800', 'icon' => 'fas fa-spinner', 'label' => 'PROSES'],
                                                'resolved' => ['color' => 'bg-green-100 text-green-800', 'icon' => 'fas fa-check', 'label' => 'SELESAI'],
                                            ];
                                            $config = $statusConfig[$status] ?? ['color' => 'bg-gray-100 text-gray-800', 'icon' => 'fas fa-question', 'label' => strtoupper($status)];
                                        @endphp
                                        <span class="status-badge px-3 py-1 rounded-full {{ $config['color'] }} flex items-center">
                                            <i class="{{ $config['icon'] }} mr-2"></i>
                                            {{ $config['label'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('complaint.show', $complaint->unique_code ?? '#') }}" 
                                           class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition flex items-center justify-center">
                                            <i class="fas fa-eye mr-2"></i> DETAIL
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="text-gray-400">
                                            <i class="fas fa-inbox text-4xl mb-3"></i>
                                            <p class="text-lg">Belum ada laporan konseling</p>
                                            <p class="text-sm mt-2">Siswa dapat mengisi form konseling melalui halaman depan</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if(isset($recentComplaints) && $recentComplaints->count() > 0)
                    <div class="px-6 py-4 bg-gray-50 border-t">
                        <div class="flex justify-between items-center">
                            <div class="text-gray-600">
                                <i class="fas fa-info-circle mr-2"></i>
                                Menampilkan {{ $recentComplaints->count() }} laporan terbaru dari total {{ $total ?? 0 }} laporan
                            </div>
                            <div class="flex gap-2">
                                @if(($pending ?? 0) > 0)
                                <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-bold">
                                    <i class="fas fa-exclamation-triangle mr-1"></i>
                                    {{ $pending }} PERLU TINDAKAN
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Statistik Sederhana -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">
                            <i class="fas fa-chart-pie text-purple-500 mr-2"></i>
                            Ringkasan Status
                        </h3>
                        <div class="space-y-4">
                            @php
                                $statuses = [
                                    ['label' => 'Menunggu', 'value' => $pending ?? 0, 'color' => 'bg-red-500', 'icon' => 'fas fa-clock'],
                                    ['label' => 'Diproses', 'value' => $processed ?? 0, 'color' => 'bg-yellow-500', 'icon' => 'fas fa-spinner'],
                                    ['label' => 'Selesai', 'value' => $resolved ?? 0, 'color' => 'bg-green-500', 'icon' => 'fas fa-check'],
                                ];
                            @endphp
                            
                            @foreach($statuses as $status)
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700 flex items-center">
                                        <i class="{{ $status['icon'] }} mr-2 text-gray-500"></i>
                                        {{ $status['label'] }}
                                    </span>
                                    <span class="text-sm font-bold {{ $status['color'] }} text-white px-2 rounded">
                                        {{ $status['value'] }}
                                    </span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div class="h-3 rounded-full {{ $status['color'] }}" 
                                         style="width: {{ $total > 0 ? ($status['value']/$total)*100 : 0 }}%"></div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">
                            <i class="fas fa-bullhorn text-orange-500 mr-2"></i>
                            Panduan Singkat
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start p-3 bg-blue-50 rounded-lg">
                                <i class="fas fa-1 text-blue-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-gray-800">Lihat laporan masuk</p>
                                    <p class="text-sm text-gray-600">Cek bagian "Laporan Terbaru"</p>
                                </div>
                            </div>
                            <div class="flex items-start p-3 bg-green-50 rounded-lg">
                                <i class="fas fa-2 text-green-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-gray-800">Tangani laporan</p>
                                    <p class="text-sm text-gray-600">Klik "DETAIL" untuk melihat dan menindaklanjuti</p>
                                </div>
                            </div>
                            <div class="flex items-start p-3 bg-purple-50 rounded-lg">
                                <i class="fas fa-3 text-purple-500 mt-1 mr-3"></i>
                                <div>
                                    <p class="font-medium text-gray-800">Ubah status</p>
                                    <p class="text-sm text-gray-600">Setelah ditangani, ubah status menjadi "Selesai"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Dashboard -->
        <footer class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center">
                        <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <p class="font-bold text-gray-800">SISTEM KONSELING SEKOLAH</p>
                            <p class="text-sm text-gray-600">Dashboard khusus Guru Bimbingan Konseling</p>
                        </div>
                    </div>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-gray-600">
                        <i class="fas fa-calendar-alt mr-1"></i>
                        Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Hak Akses: GURU BK | Terakhir update: {{ now()->format('d/m/Y H:i') }}
                    </p>
                </div>
            </div>
        </footer>
    </main>

    <!-- JavaScript untuk Fitur Tambahan -->
    <script>
        // Update waktu real-time
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('current-time').textContent = timeString;
        }
        setInterval(updateTime, 1000);
        updateTime();

        // Notifikasi sederhana
        @if(session('success'))
        setTimeout(() => {
            alert("SUKSES: {{ session('success') }}");
        }, 500);
        @endif

        @if(session('error'))
        setTimeout(() => {
            alert("PERHATIAN: {{ session('error') }}");
        }, 500);
        @endif

        // Highlight laporan urgent
        document.addEventListener('DOMContentLoaded', function() {
            const pendingCount = {{ $pending ?? 0 }};
            if (pendingCount > 0) {
                console.log(`⚠️ Ada ${pendingCount} laporan yang perlu ditindaklanjuti`);
            }
        });
    </script>
</body>
</html>