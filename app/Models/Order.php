<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'order_number',
        'so_number',
        'quotation_number',
        'kbli_code',
        'reff_number',
        'order_date',
        'product_type',
        'po_number',
        'sale_price',
        'production_cost',
        'information',
        'information2',
        'information3',
        'order_status',
        'customer',
        'product',
        'qty',
        'dod',
        'dod_forecast',
        'sample',
        'material',
        'catalog_number',
        'material_cost',
        'dod_adj',
    ];

    public function items()
    {
        return $this->hasMany(ItemAdd::class, 'order_number', 'order_number');
    }

    public function processings()
    {
        return $this->hasMany(ProcessingAdd::class, 'order_number', 'order_number');
    }

    public function subContracts()
    {
        return $this->hasMany(Sub_Contract::class, 'order_number', 'order_number');
    }

    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class, 'so_number', 'so_number');
    }

    public function standartParts()
    {
        return $this->hasMany(standart_part::class, 'order_number', 'order_number');
    }

    public function overheads()
    {
        return $this->hasMany(overhead::class, 'order_number', 'order_number');
    }

    public function scopeFinished($query)
    {
        return $query->where('order_status', 'Finished');
    }

    public function scopeNotFinished($query)
    {
        return $query->where('order_status', '!=', 'Finished');
    }
    public function scopeDelivered($query)
    {
        return $query->where('order_status', 'Delivered');
    }

    public function scopenotDelivered($query)
    {
        return $query->where('order_status', '!=', 'Delivered');
    }

    public function updateOrderStatus()
    {
        $processings = $this->processings;

        if ($processings->isEmpty()) {
            $this->order_status = 'queue';
        } else {
            $allStatuses = $processings->pluck('status')->unique();

            if ($allStatuses->count() === 1) {
                $status = $allStatuses->first();
                $this->order_status = $status;
            } else {
                if ($allStatuses->contains('started')) {
                    $this->order_status = 'started';
                } elseif ($allStatuses->contains('pending')) {
                    $this->order_status = 'pending';
                } elseif ($allStatuses->contains('queue')) {
                    $this->order_status = 'queue';
                } elseif ($allStatuses->count() === 1 && $allStatuses->first() === 'finished') {
                    // Ensure all processings are finished
                    $this->order_status = 'Finished';
                }
            }
        }

        $this->save();
    }
}
