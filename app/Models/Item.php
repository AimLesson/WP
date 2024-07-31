<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';
    protected $fillable = [
        'order_number',
        'company_name',
        'dod',
        'so_number',
        'product',
    ];

    public function itemadd()
    {
        return $this->hasMany(ItemAdd::class, 'order_number', 'order_number');
    }

    public function processingAdds()
    {
        return $this->hasMany(ProcessingAdd::class, 'item_number', 'item_number');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_number', 'order_number');
    }
}
