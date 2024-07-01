<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class inspection_sheet extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'inspection_sheet';
    protected $fillable = [
        'item_no',
        'qty',
        'date',
        'so_no',
        'material',
        'weight',
        'dwg_no',
        'no_s',
        'no_b' ,
        'length',
        'width',
        'thickness',
        'rack',
    ];
}
