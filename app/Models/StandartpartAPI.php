<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandartpartAPI extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'other_database'; // Specify the correct connection name

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barangs'; // Specify your table name

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_barcode',
        'no_item',
        'nama_barang',
        'kode_log',
        'jumlah',
        'satuan',
        'harga',
        'rak',
        'total',
        'tanggal',
        'jumlah_minimal',
        'no_katalog',
        'merk',
        'no_akun',
    ];
}
