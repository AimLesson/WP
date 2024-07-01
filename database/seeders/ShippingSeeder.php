<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shipping::create(
            [
                'id_shipping'  =>'1',
                'shipping_name'=>'RENTAL'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'2',
                'shipping_name'=>'RITRA CARGO'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'3',
                'shipping_name'=>'ROCKY'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'4',
                'shipping_name'=>'ROSALIA'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'5',
                'shipping_name'=>'SADAR JAYA'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'6',
                'shipping_name'=>'SANEX'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'7',
                'shipping_name'=>'SEHATI EKSPEDISI'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'8',
                'shipping_name'=>'SENAPATI LOGISTIC'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'9',
                'shipping_name'=>'SIBA SURYA'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'10',
                'shipping_name'=>'SOLID LOGISTIC'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'11',
                'shipping_name'=>'SUMBER REJEKI'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'12',
                'shipping_name'=>'SURYA CEMERLANG'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'13',
                'shipping_name'=>'SUMBER ALAM SHUTTLE'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'14',
                'shipping_name'=>'TAM CARGO'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'15',
                'shipping_name'=>'TAM LOGISTIC'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'16',
                'shipping_name'=>'TIKI JNE'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'17',
                'shipping_name'=>'TIKINDO'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'18',
                'shipping_name'=>'TNT'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'19',
                'shipping_name'=>'TNT Indonesia'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'20',
                'shipping_name'=>'TRAVEL'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'21',
                'shipping_name'=>'TRAVEL JAYA SAKTI'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'23',
                'shipping_name'=>'TRAVEL MELATI'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'24',
                'shipping_name'=>'TRISAKA'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'25',
                'shipping_name'=>'TRUCK ADE'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'26',
                'shipping_name'=>'TRUCK ATMI'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'27',
                'shipping_name'=>'UPS EXPRESS SAVE'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'28',
                'shipping_name'=>'VIA DSO'
            ]
        );
        Shipping::create(
            [
                'id_shipping'  =>'29',
                'shipping_name'=>'WAHANA'
            ]
        );
    }
}
