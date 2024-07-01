<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanAdd extends Model
{
    use HasFactory;

    protected $table = 'planadd';
    protected $fillable = [
        'plan_name',
        'group',
        'group_id',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_name', 'plan_name');
    }
}