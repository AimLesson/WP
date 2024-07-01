<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartNo extends Model
{
    use HasFactory;

    protected $table = 'part_nos';

    protected $fillable = [
        'order_number',
        'so_number',
        'product',
        'company_name',
        'dod',
        'part_no',
        'part_name',
        'qty',
        'unit',
        'price',
        'totalprice',
        'info',
        'date',
    ];

    public $timestamps = false;
}
