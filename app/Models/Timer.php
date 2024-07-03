<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    use HasFactory;

    protected $table='used_time';

    protected $fillable = [
        'proceed_number', 'est_time', 'duration', 'created_at', 'pending_at', 'finished_at'
    ];

    protected $dates = [
        'created_at', 'pending_at', 'finished_at'
    ];
}
