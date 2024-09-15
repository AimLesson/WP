<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WIP extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'order_number',
        'total_sales',
        'total_material_cost',
        'total_labor_cost',
        'total_machine_cost',
        'total_standard_part_cost',
        'total_sub_contract_cost',
        'total_overhead_cost',
        'cogs',
        'gpm',
        'oh_org',
        'noi',
        'bnp',
        'lsp',
        'wip_date'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_number', 'order_number');
    }
}
