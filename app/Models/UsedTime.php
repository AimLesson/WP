<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsedTime extends Model
{
    use HasFactory;

    protected $table = 'used_time';

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
        'total_price',
        'date',
        'memo',
        'image',
        'cost_place',
        'nos',
        'est',
        'start_date',
        'time_stamp',
        'status',
        'used_time',
        'date_want',
        'finish_date',
        'finish_time',
        'id_opt',
        'prc',
        'inp',
        'date_stop',
        'time_stop',
        'used_time_pend',
        'date_start2',
        'time_start2',
        'no_order',
        'no_items',
        'barcode_id',
        'u'
    ];

    public $timestamps = true;
}
