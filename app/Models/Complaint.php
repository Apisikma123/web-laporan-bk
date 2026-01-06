<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_code',
        'student_name',
        'student_email',
        'student_class',
        'counseling_type',
        'description',
        'status',
        'priority_level',
        'counselor_response',
        'session_date',
        'follow_up_plan',
        'attachment'
    ];

    protected $casts = [
        'session_date' => 'datetime'
    ];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'student_class', 'class_name');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeProcessed($query)
    {
        return $query->where('status', 'processed');
    }

    public function scopeResolved($query)
    {
        return $query->where('status', 'resolved');
    }

    public function scopeHighPriority($query)
    {
        return $query->where('priority_level', 'high');
    }

    public function scopeByClass($query, $class)
    {
        return $query->where('student_class', $class);
    }
}