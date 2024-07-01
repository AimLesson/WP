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
}
