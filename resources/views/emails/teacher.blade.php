<div style="font-family:sans-serif;max-width:600px;margin:0 auto;background:white;padding:20px;border-radius:12px;box-shadow:0 2px 10px rgba(0,0,0,0.1);">
    <div style="background:#4f46e5;color:white;padding:16px;border-radius:8px;text-align:center;margin-bottom:20px;">
        <h2>{{ $complaint->priority_level === 'high' ? '🚨 DARURAT' : '📋 Baru' }}</h2>
    </div>
    <h3>Laporan Baru dari Siswa</h3>
    <p><strong>Nama:</strong> {{ $complaint->student_name }}<br>
    <strong>Kelas:</strong> {{ $complaint->student_class }}<br>
    <strong>Jenis:</strong> {{ ucfirst($complaint->counseling_type) }}</p>
    <p><strong>Deskripsi:</strong><br>{!! nl2br(e(Str::limit($complaint->description, 300))) !!}</p>
    <a href="{{ $detail_url }}" style="display:inline-block;background:#4f46e5;color:white;padding:10px 20px;text-decoration:none;border-radius:6px;margin-top:15px;">Lihat Detail</a>
</div>