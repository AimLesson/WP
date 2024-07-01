<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newprocessing extends Model
{
    use HasFactory;

    protected $table = 'newprocessing';
    protected $fillable = [
        'process_number',
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
        return $this->belongsTo(Processing::class, 'process_number', 'id');
    }
}
