<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_contract extends Model
{
    use HasFactory;

    protected $table = 'sub_contract';
    protected $fillable = [
        'order_number',
        'item_no',
        'dod',
        'description',
        'qty',
        'unit',
        'price_unit',
        'total_price',
        'info',
    ];

    public $timestamps =false;
}
