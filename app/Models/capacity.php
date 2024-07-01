<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class capacity extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'capacity';
    protected $fillable = [
        'plant',
        'group_no',
        'group_name',
        'load',
        'cap_week',
        'cap_actual',
    ];
}
