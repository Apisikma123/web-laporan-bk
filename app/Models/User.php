<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Pastikan ini ada
        'phone',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Scope untuk guru
    public function scopeTeachers($query)
    {
        return $query->where('role', 'teacher');
    }

    // Scope untuk admin
    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    // Cek apakah user adalah guru
    public function isTeacher()
    {
        return $this->role === 'teacher';
    }
}