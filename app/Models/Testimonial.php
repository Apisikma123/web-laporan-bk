<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class',
        'message',
        'counseling_type',
        'rating',
        'is_approved'
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean'
    ];

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}