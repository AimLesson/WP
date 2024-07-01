<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $table = 'quotation';
    protected $fillable = [
        'quotation_no',
        'company_name',
        'name',
        'date',
        'address',
        'npwp',
        'phone',
        'fax',
        'tax_address',
        'email',
        'confirmation',
        'type',
        'description',
        'sample',
        'ass_type',
        'qc_statement',
        'packing_type',
        'top',
        'net_days',
        'ptp',
        'dod',
        'shipping_address',
        'file',
        'valid',
        'mdp',
        'salesman',
        'discount_percent',
        'tax_type',
        'subtotal',
        'discount',
        'tax',
        'freight',
        'total_amount',
        // tambahkan kolom-kolom lain sesuai kebutuhan
    ];

    public function quotationadd()
    {
        return $this->hasMany(QuotationAdd::class, 'quotation_no', 'quotation_no');
    }
}
