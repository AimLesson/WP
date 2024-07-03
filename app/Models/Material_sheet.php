<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class material_sheet extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'material_sheet';
    protected $fillable = [
        'order_number',
        'customer',
        'product',
        'so_no',
        'dod',
        'no_product',
        'item_no',
        'item_name',
        'dwg_no' ,
        'nos',
        'material',
        'shape',
        'length',
        'width',
        'thick',
        'weight',
        'mat_cost',
        'mat_price',
        
    ];

    public function material_sheets()
{
    return $this->hasMany(Material_Sheet::class, 'order_number', 'order_number');
}
}
