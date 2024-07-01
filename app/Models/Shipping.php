<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Shipping extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'shipping';
    protected $fillable = [
        'id_shipping',
        'shipping_name',
    ];
}
