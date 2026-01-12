<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    protected $fillable = [
        'recipient',
        'subject', 
        'body',
        'type',
        'status',
        'complaint_id',
        'error_message'
    ];
    
    protected $casts = [
        'body' => 'array'
    ];
    
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}