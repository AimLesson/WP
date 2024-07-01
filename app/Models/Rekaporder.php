<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekaporder extends Model
{
    use HasFactory;

    protected $table = 'rekap_order';
    protected $fillable = [
        'customer',
        'product',
        'so_number',
        'qty',
        'harga',
        'total_harga',
        'tahun',
        'kbli_code',
    ];
}
