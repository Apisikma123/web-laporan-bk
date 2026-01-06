@extends('layouts.page')

@section('title', 'Syarat & Ketentuan - CINTA')

@section('icon')
<svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
</svg>
@endsection

@section('page-title', 'Syarat & Ketentuan Penggunaan')
@section('page-description', 'Ketentuan yang mengatur penggunaan Sistem CINTA')
@section('last-updated', '29 Desember 2024')

@section('content')
<h2 class="text-2xl font-bold text-gray-900 mb-6">1. Penerimaan Syarat</h2>
<p class="mb-4">Dengan mengakses dan menggunakan Sistem <span class="highlight">CINTA</span> (Complaint and Improvement Tracking Application), Anda setuju untuk terikat oleh syarat dan ketentuan penggunaan berikut.</p>

<h2 class="text-2xl font-bold text-gray-900 mb-6 mt-8">2. Definisi</h2>
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li><strong>"Sistem CINTA"</strong>: Aplikasi web pengaduan siswa yang dikembangkan untuk sekolah.</li>
    <li><strong>"Pengguna Guru"</strong>: Staf pengajar yang terdaftar dan memiliki akses ke dashboard.</li>
    <li><strong>"Pengguna Siswa"</strong>: Siswa yang membuat pengaduan melalui sistem.</li>
    <li><strong>"Pengaduan"</strong>: Laporan atau keluhan yang diajukan melalui sistem.</li>
</ul>

<h2 class="text-2xl font-bold text-gray-900 mb-6 mt-8">3. Registrasi Akun Guru</h2>
<div class="bg-gray-50 rounded-xl p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-900 mb-3">3.1 Persyaratan Registrasi</h3>
    <ul class="list-disc pl-6 space-y-2">
        <li>Harus merupakan staf pengajar di sekolah terkait</li>
        <li>Menggunakan email sekolah resmi (domain .sch.id)</li>
        <li>Menyediakan NIP/ID guru yang valid</li>
        <li>Membuat password dengan minimal 8 karakter</li>
    </ul>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-6 mt-8">4. Penggunaan Sistem</h2>
<div class="grid md:grid-cols-2 gap-6 mb-6">
    <div class="bg-purple-50 rounded-xl p-6">
        <h3 class="text-lg font-semibold text-purple-900 mb-3">4.1 Kewajiban Pengguna</h3>
        <ul class="list-disc pl-6 space-y-2 text-purple-800">
            <li>Menyimpan kerahasiaan akun dan password</li>
            <li>Tidak membagikan akses akun kepada pihak lain</li>
            <li>Menggunakan sistem sesuai tujuan pendidikan</li>
            <li>Melaporkan aktivitas mencurigakan</li>
        </ul>
    </div>
    
    <div class="bg-blue-50 rounded-xl p-6">
        <h3 class="text-lg font-semibold text-blue-900 mb-3">4.2 Larangan</h3>
        <ul class="list-disc pl-6 space-y-2 text-blue-800">
            <li>Menyalahgunakan data pribadi</li>
            <li>Membuat pengaduan palsu</li>
            <li>Melakukan hacking atau eksploitasi sistem</li>
            <li>Menyebarkan konten tidak pantas</li>
        </ul>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-6 mt-8">5. Pengaduan Siswa</h2>
<p class="mb-4">Sistem CINTA memungkinkan siswa untuk membuat pengaduan tanpa perlu login. Setiap pengaduan akan mendapatkan kode tracking unik.</p>

<div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 mb-6">
    <h3 class="text-lg font-semibold text-emerald-900 mb-3">Prinsip Pengaduan</h3>
    <ul class="list-disc pl-6 space-y-2 text-emerald-800">
        <li><strong>Anonimitas</strong>: Siswa tidak perlu mengungkap identitas</li>
        <li><strong>Keamanan</strong>: Data pengaduan dienkripsi dan dilindungi</li>
        <li><strong>Respon Cepat</strong>: Pengaduan akan ditindaklanjuti dalam 24-48 jam</li>
        <li><strong>Transparansi</strong>: Status pengaduan dapat dilacak dengan kode</li>
    </ul>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-6 mt-8">6. Privasi dan Keamanan Data</h2>
<p class="mb-4">Kami berkomitmen melindungi privasi pengguna. Data pribadi hanya digunakan untuk:</p>
<ul class="list-disc pl-6 mb-6 space-y-2">
    <li>Verifikasi akun guru</li>
    <li>Proses penanganan pengaduan</li>
    <li>Statistik dan perbaikan sistem</li>
    <li>Pemenuhan kewajiban hukum</li>
</ul>

<h2 class="text-2xl font-bold text-gray-900 mb-6 mt-8">7. Hak Kekayaan Intelektual</h2>
<p class="mb-6">Seluruh konten, fitur, dan fungsionalitas dalam Sistem CINTA adalah hak milik pengembang dan dilindungi oleh undang-undang hak cipta.</p>

<h2 class="text-2xl font-bold text-gray-900 mb-6 mt-8">8. Pembatasan Tanggung Jawab</h2>
<div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 mb-6">
    <p class="text-yellow-800">
        <strong>Perhatian:</strong> Sistem CINTA disediakan "sebagaimana adanya". Kami tidak bertanggung jawab atas kerugian tidak langsung yang timbul dari penggunaan sistem.
    </p>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-6 mt-8">9. Perubahan Syarat</h2>
<p class="mb-6">Kami berhak mengubah syarat dan ketentuan ini kapan saja. Perubahan akan diumumkan melalui website dan email terdaftar.</p>

<h2 class="text-2xl font-bold text-gray-900 mb-6 mt-8">10. Kontak</h2>
<div class="bg-gray-50 rounded-xl p-6">
    <p class="mb-3">Untuk pertanyaan mengenai Syarat & Ketentuan ini, silakan hubungi:</p>
    <ul class="space-y-2">
        <li class="flex items-center">
            <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span>Email: <a href="mailto:admin@cinta.app" class="text-purple-600 hover:underline">admin@cinta.app</a></span>
        </li>
        <li class="flex items-center">
            <svg class="w-5 h-5 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
            </svg>
            <span>Telepon: (021) 1234-5678</span>
        </li>
    </ul>
</div>
@endsection

@section('accept-button')
@auth
    <!-- Jika sudah login, tombol tidak ditampilkan -->
@else
    <!-- Tombol untuk user yang sedang registrasi -->
@endif
@endsection