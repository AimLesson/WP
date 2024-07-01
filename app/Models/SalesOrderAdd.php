<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderAdd extends Model
{
    use HasFactory;

    protected $table = 'soadd';
    protected $fillable = [
        'so_number',
        'item',
        'item_desc',
        'qty',
        'unit',
        'unit_price',
        'disc',
        'amount',
        'product_type',
        'order_no',
        'spec',
        'kbli',
    ];

    public function salesorder()
    {
        return $this->belongsTo(SalesOrder::class, 'so_number', 'so_number');
    }
}
