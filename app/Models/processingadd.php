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
        'duration',
        'pending_at',
        'started_at',
        'finished_at',
        'date_wanted',
        'barcode_id',
        'mach_cost',
        'labor_cost',
        'nop',
        'processing_id',
        'status'
    ];

    public function processing()
    {
        return $this->belongsTo(Processing::class, 'processing_id', 'id');
    }

    public function processings()
    {
        return $this->hasMany(ProcessingAdd::class, 'order_number', 'order_number');
    }

    public function processingused()
    {
        return $this->belongsTo(Processing::class, 'processing_id', 'id');
    }

    public function processingsused()
    {
        return $this->hasMany(ProcessingAdd::class, 'order_number', 'order_number');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_number', 'order_number');
    }

    // BelongsTo relationship to Item model using item_number as foreign key
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_number', 'item_number');
    }

    // BelongsTo relationship to ItemAdd model using item_number as foreign key
    public function itemAdd()
    {
        return $this->belongsTo(ItemAdd::class, 'item_number', 'no_item');
    }


}
