<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'processing_add_id',
        'started_at',
        'pending_at',
        'duration_seconds',
        'user_name'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'pending_at' => 'datetime',
    ];

    public function processingAdd()
    {
        return $this->belongsTo(ProcessingAdd::class);
    }
}
