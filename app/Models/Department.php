<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Department extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'department';
    protected $fillable = [
        'kode',
        'work_unit',
        'name',
        'email',
        'group',
        'user_novvel',
        'information',
        'nik',
    ];
}
