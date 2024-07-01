<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class overhead extends Model
{
    use HasFactory;

    protected $table = 'overhead';
    protected $fillable = [
        'order_number',
        'customer',
        'so_no',
        'product',
        'dod',
        'no_product',
        'tanggal',
        'description',
        'ref',
        'jumlah',
        'keterangan',
        'cost',
        'info',
    ];

    public $timestamps =false;
}
