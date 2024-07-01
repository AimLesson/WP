<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class standartpart_sheet extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'standartpart_sheet';
    protected $fillable = [
        'order_number',
        'customer',
        'product',
        'so_no',
        'dod',
        'no_product',
        'item_no',
        'item_name',
        'part_no' ,
        'part_name',
        'qty',
        'unit',
        'price',
        'total_price',
        'info',
        'pemesanan',
        'pesanan',
    ];
}
