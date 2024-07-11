<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class standart_part extends Model
{
    use HasFactory;

    protected $table = 'standart_part';
    protected $fillable = [
        'order_number',
        'item_no',
        'date',
        'part_name',
        'item_name',
        'qty',
        'unit',
        'price',
        'total',
        'info',
    ];
    public $timestamps=false;

    public function order()
{
    return $this->belongsTo(Order::class, 'order_number', 'order_number');
}
}
