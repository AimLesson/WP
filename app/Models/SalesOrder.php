<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    use HasFactory;

    protected $table = 'salesorder';
    protected $fillable = [
        'so_number',
        'quotation_no',
        'company_name',
        'name',
        'address',
        'phone',
        'order_unit',
        'sow_no',
        'tax_address',
        'npwp',
        'fax',
        'email',
        'confirmation',
        'type',
        'sample',
        'ass_type',
        'qc_statement',
        'packing_type',
        'ptp',
        'dod',
        'shipping_address',
        'date',
        'top',
        'net_days',
        'fob',
        'shipping',
        'ship_date',
        'po_number',
        'salesman',
        'dp',
        'dp_percent',
        'file',
        'subtotal',
        'discount',
        'tax',
        'freight',
        'total_amount',
        'discount_percent',
        'tax_type',
        'description',
    ];

    public function soadd()
    {
        return $this->hasMany(SalesOrderAdd::class, 'so_number', 'so_number');
    }
    
}
