<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationAdd extends Model
{
    use HasFactory;

    protected $table = 'quotationadd';
    protected $fillable = [
        'quotation_no',
        'item',
        'item_desc',
        'qty',
        'unit_price',
        'unit',
        'disc',
        'amount',
        'deskripsi',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class, 'quotation_no', 'quotation_no');
    }
}
