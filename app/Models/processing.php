<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class processing extends Model
{
    use HasFactory;

    protected $table='processing';
    protected $fillable=[
        'order_number' ,
        'item_no' ,
        'dod' ,
        'item' ,
        'total_process' ,
    ];

    public function processadd()
    {
        return $this->hasMany(processingadd::class, 'order_number', 'order_number');
    }
}
