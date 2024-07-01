<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plan';
    protected $fillable = [
        'plan_name',
        'total_group',
    ];

    public function planadd()
    {
        return $this->hasMany(PlanAdd::class, 'plan_name', 'plan_name');
    }
}
