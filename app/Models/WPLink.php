<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WPLink extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $connection = 'other_database'; // Specify the correct connection name

    protected $table = 'WPLink';
    protected $fillable = [
        'order_number', // Add this line
        'no_item',
        'qr_id',
        'material',
        'jumlah',
        'satuan',
        'harga',
        'total',
        'jenis',
        'barcode_id',
    ];

    public function processingAdds()
    {
        return $this->hasMany(ProcessingAdd::class, 'item_number', 'no_item');
    }


}
