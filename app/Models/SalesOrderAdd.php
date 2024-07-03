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

    public function items()
    {
        return $this->hasMany(ItemAdd::class, 'order_number', 'order_number');
    }

    public function processings()
    {
        return $this->hasMany(ProcessingAdd::class, 'order_number', 'order_number');
    }

    public function sub_contracts()
    {
        return $this->hasMany(Sub_Contract::class, 'order_number', 'order_number');
    }
    
}
