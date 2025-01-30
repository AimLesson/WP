<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


class ItemAdd extends Model
{
    use HasFactory;

    protected $table = 'itemadd';
    protected $fillable = [
        'order_number',
        'id_item',
        'no_item',
        'item',
        'dod_item',
        'material',
        'weight',
        'length',
        'width',
        'thickness',
        'qty',
        'nos',
        'nob',
        'issued_item',
        'ass_drawing',
        'drawing_no',
        'material_cost',
        'status'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'order_number', 'order_number');
    }

    public function items()
    {
        return $this->hasMany(ItemAdd::class, 'order_number', 'order_number');
    }

    public function processings()
    {
        return $this->hasMany(processingadd::class, 'order_number', 'order_number');
    }

    public function processingAdds()
    {
        return $this->hasMany(processingadd::class, 'item_number', 'no_item');
    }

    public function specificProcessings()
    {
        return $this->hasMany(ProcessingAdd::class, 'item_number', 'no_item')
                    ->where('order_number', $this->order_number);
    }

    public function order()
    {
        // Ensure this points to the actual Order model
        return $this->belongsTo(Order::class, 'order_number', 'order_number');
    }

    public function updateItemStatus()
    {
        Log::info('updateItemStatus called for ItemAdd', [
            'item_id' => $this->id,
            'order_number' => $this->order_number,
        ]);
    
        // Retrieve processings by order_number
        $processings = $this->processings()
        ->where('order_number', $this->order_number)
        ->where('item_number', $this->no_item)
        ->get();
        Log::info('Retrieved processings', [
            'processings_count' => $processings->count(),
            'processing_ids' => $processings->pluck('id')->toArray(),
        ]);
        
    
        if ($processings->isEmpty()) {
            $this->status = 'queue';
            Log::info('No processings found, setting item status to queue', [
                'item_id' => $this->id,
                'new_status' => $this->status,
            ]);
        } else {
            $allStatuses = $processings->pluck('status')->unique();
            Log::info('Unique processing statuses found', [
                'statuses' => $allStatuses->toArray(),
            ]);
    
            if ($allStatuses->count() === 1) {
                $this->status = $allStatuses->first();
                Log::info('All processing statuses are identical, setting item status', [
                    'item_id' => $this->id,
                    'new_status' => $this->status,
                ]);
            } else {
                if ($allStatuses->contains('started')) {
                    $this->status = 'started';
                } elseif ($allStatuses->contains('pending')) {
                    $this->status = 'pending';
                } elseif ($allStatuses->contains('queue')) {
                    $this->status = 'queue';
                } elseif ($allStatuses->every(fn($status) => $status === 'finished')) {
                    $this->status = 'finished';
                }
                Log::info('Mixed statuses found, setting item status based on priority', [
                    'item_id' => $this->id,
                    'new_status' => $this->status,
                ]);
            }
        }
    
        $this->save();
        Log::info('Item status saved', [
            'item_id' => $this->id,
            'final_status' => $this->status,
        ]);
    
        $order = $this->order; // Ensure a `belongsTo` relation is set to `Order`
        $allItemsFinished = $order->items()->where('status', '!=', 'finished')->doesntExist();
        Log::info('Checked if all items in order are finished', [
            'order_id' => $order->id,
            'all_items_finished' => $allItemsFinished,
        ]);
    
        if ($allItemsFinished) {
            $order->updateOrderStatus();
            Log::info('Order status updated as all items are finished', [
                'order_id' => $order->id,
            ]);
        }
    }
    



}
