<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Production_Sheet extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'production_sheet';
    protected $fillable = [
        'order_number',
        'customer',
        'product',
        'so_no',
        'dod',
        'assy_drawing',
        'po_ref',
        'no_prod',
        'no_item' ,
        'no_drawing',
        'date_wanted',
        'no_piece',
        'material',
        'no_blank',
        'weight',
        'blank_size',
        'item_name',
        'rack',
        'issued',
    ];
}
