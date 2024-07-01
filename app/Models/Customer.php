<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'customer';
    protected $fillable = [
        'company',
        'name',
        'address',
        'city',
        'phone',
        'fax',
        'email',
        'npwp',
        'tax_address',
        'shipment',
        'customer_no',
        'province',
        'zipcode',
        'country',
        'cp',
        'webpage',
    ];

    public function getCustomer()
    {
        $customers = Customer::all(['id', 'company']);
        return response()->json($customers);
    }
}
