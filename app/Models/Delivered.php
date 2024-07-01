<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Delivered extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'delivered';
    protected $fillable = [
        'order_number',
        'customer',
        'product',
        'cost_material',
        'cost_std',
        'cost_mach',
        'cost_labor',
        'cost_subcon',
        'cost_ohm',
        'amount',
        'so_amount',
        'state',
        'date_order',
        'date_finish',
        'date_delivery',
        'date_by',
    ];
}
