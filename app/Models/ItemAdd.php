<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAdd extends Model
{
    use HasFactory;

    protected $table = 'itemadd';
    protected $fillable = [
        'order_number',
        'id_item',
        'no_item',
        'item',
        'dod_item',
        'material',
        'weight',
        'length',
        'width',
        'thickness',
        'qty',
        'nos',
        'nob',
        'issued_item',
        'ass_drawing',
        'drawing_no',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'order_number', 'order_number');
    }

    public function items()
{
    return $this->hasMany(ItemAdd::class, 'order_number', 'order_number');
}
}
