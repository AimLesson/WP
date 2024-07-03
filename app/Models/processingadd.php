<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessingAdd extends Model
{
    use HasFactory;

    protected $table = 'newprocessing';
    protected $fillable = [
        'order_number',
        'item_number',
        'machine',
        'group_name',
        'operation',
        'estimated_time',
        'date_wanted',
        'barcode_id',
        'mach_cost',
        'nop'
    ];

    public function processing()
    {
        return $this->belongsTo(Processing::class, 'processing_id', 'id');
    }

    public function processings()
{
    return $this->hasMany(ProcessingAdd::class, 'order_number', 'order_number');
}
}
