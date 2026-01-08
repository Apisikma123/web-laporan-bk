<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'classes'; // karena nama tabel adalah 'classes'
    
    protected $fillable = [
        'nama_kelas',
        // tambahkan kolom lain jika ada
    ];
}