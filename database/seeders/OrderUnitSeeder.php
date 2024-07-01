<?php

namespace Database\Seeders;

use App\Models\OrderUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderUnit::create(
            [
                'id_order_unit'=>'1',
                'code_order'=>'MDC'
            ]
        );
        OrderUnit::create(
            [
                'id_order_unit'=>'2',
                'code_order'=>'WF'
            ]
        );
        OrderUnit::create(
            [
                'id_order_unit'=>'3',
                'code_order'=>'Internal'
            ]
        );
    }
}
