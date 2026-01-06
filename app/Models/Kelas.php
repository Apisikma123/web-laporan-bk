<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'classes';
    
    protected $fillable = [
        'nama_kelas'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope a query to search by nama_kelas.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('nama_kelas', 'LIKE', '%' . $search . '%');
    }

    /**
     * Scope a query to order by nama_kelas.
     */
    public function scopeOrderByName($query, $direction = 'asc')
    {
        return $query->orderBy('nama_kelas', $direction);
    }

    /**
     * Get the kode kelas attribute.
     */
    public function getKodeAttribute()
    {
        return 'CLS' . str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }

    /**
     * Format nama kelas to uppercase.
     */
    public function setNamaKelasAttribute($value)
    {
        $this->attributes['nama_kelas'] = strtoupper(trim($value));
    }

    /**
     * Check if class has related data.
     * Will be implemented when Student and Complaint models exist.
     */
    public function hasRelatedData()
    {
        // Placeholder - will implement later
        return false;
    }
}