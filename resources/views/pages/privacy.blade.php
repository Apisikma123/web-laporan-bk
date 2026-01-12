@extends('layouts.page')

@section('title', 'Kebijakan Privasi - CINTA')

@section('icon')
<svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
</svg>
@endsection

@section('page-title', 'Kebijakan Privasi')
@section('page-description', 'Bagaimana kami melindungi dan mengelola data pribadi Anda')


@section('content')
<div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-8 mb-10">
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Prinsip Privasi Kami</h2>
    <p class="text-gray-700 mb-6">
        Sistem <span class="highlight">CINTA</span> berkomitmen untuk melindungi privasi dan data pribadi pengguna. 
        Kebijakan ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda.
    </p>
    
    <div class="grid md:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Transparansi</h3>
            <p class="text-gray-600 text-sm">Kami menjelaskan dengan jelas bagaimana data digunakan</p>
        </div>
        
        <div class="bg-white rounded-xl p-6 shadow-sm">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Keamanan</h3>
            <p class="text-gray-600 text-sm">Data dilindungi dengan enkripsi dan protokol keamanan</p>
        </div>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-6">1. Informasi yang Kami Kumpulkan</h2>
<div class="overflow-x-auto mb-8">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Data</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contoh</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tujuan Penggunaan</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Data Guru</span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <ul class="list-disc pl-5 text-sm text-gray-600">
                        <li>Nama lengkap</li>
                        <li>Email sekolah</li>
                        <li>NIP/ID guru</li>
                        <li>Mata pelajaran</li>
                    </ul>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">
                    Verifikasi akun, komunikasi, statistik
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Data Pengaduan</span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <ul class="list-disc pl-5 text-sm text-gray-600">
                        <li>Isi pengaduan</li>
                        <li>Kategori masalah</li>
                        <li>Tanggal & waktu</li>
                        <li>Status penanganan</li>
                    </ul>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">
                    Penanganan kasus, monitoring, perbaikan sistem
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Data Teknis</span>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <ul class="list-disc pl-5 text-sm text-gray-600">
                        <li>Alamat IP</li>
                        <li>Jenis browser</li>
                        <li>Waktu akses</li>
                        <li>Log aktivitas</li>
                    </ul>
                </td>
                <td class="px-6 py-4 text-sm text-gray-600">
                    Keamanan, troubleshooting, analitik
                </td>
            </tr>
        </tbody>
    </table>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-6">2. Penggunaan Informasi</h2>
<div class="grid md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="text-purple-600 font-bold text-2xl mb-2">01</div>
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Operasional Sistem</h3>
        <p class="text-gray-600 text-sm">Mengelola akun pengguna, memproses pengaduan, dan memberikan layanan</p>
    </div>
    
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="text-purple-600 font-bold text-2xl mb-2">02</div>
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Komunikasi</h3>
        <p class="text-gray-600 text-sm">Mengirim notifikasi, update sistem, dan informasi penting</p>
    </div>
    
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <div class="text-purple-600 font-bold text-2xl mb-2">03</div>
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Perbaikan Layanan</h3>
        <p class="text-gray-600 text-sm">Menganalisis penggunaan sistem untuk pengembangan fitur</p>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-6">3. Perlindungan Data</h2>
<div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-8 mb-8">
    <h3 class="text-xl font-semibold text-blue-900 mb-4">Langkah-langkah Keamanan</h3>
    <div class="grid md:grid-cols-2 gap-6">
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mt-1">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="font-medium text-blue-900">Enkripsi Data</h4>
                    <p class="text-blue-700 text-sm mt-1">Data sensitif dienkripsi menggunakan AES-256</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mt-1">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="font-medium text-blue-900">Autentikasi</h4>
                    <p class="text-blue-700 text-sm mt-1">Verifikasi multi-faktor untuk akun guru</p>
                </div>
            </div>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mt-1">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="font-medium text-blue-900">Backup Rutin</h4>
                    <p class="text-blue-700 text-sm mt-1">Data dicadangkan secara berkala</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mt-1">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="font-medium text-blue-900">Monitoring</h4>
                    <p class="text-blue-700 text-sm mt-1">Aktivitas mencurigakan dipantau 24/7</p>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="text-2xl font-bold text-gray-900 mb-6">4. Hak Pengguna</h2>
<div class="bg-gray-50 rounded-xl p-6 mb-8">
    <p class="text-gray-700 mb-4">Anda memiliki hak untuk:</p>
    <div class="grid md:grid-cols-2 gap-4">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="text-gray-700">Mengakses data pribadi Anda</span>
        </div>
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="text-gray-700">Memperbaiki data yang tidak akurat</span>
        </div>
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="text-gray-700">Menghapus akun dan data</span>
        </div>
        <div class="flex items-center">
            <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
            </svg>
            <span class="text-gray-700">Mengajukan keberatan pemrosesan data</span>
        </div>
    </div>
</div>


@endsection