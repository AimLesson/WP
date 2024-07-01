<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::create(
            [
                'id_product_type'=>'1',
                'product_name'   =>'SPM',
            ]
        );
        ProductType::create(
            [
                'id_product_type'=>'2',
                'product_name'   =>'Precision Part',
            ]
        );
        ProductType::create(
            [
                'id_product_type'=>'3',
                'product_name'   =>'Standart Product',
            ]
        );
        ProductType::create(
            [
                'id_product_type'=>'4',
                'product_name'   =>'WF Standart Product',
            ]
        );
        ProductType::create(
            [
                'id_product_type'=>'5',
                'product_name'   =>'WF Customized Product',
            ]
        );
    }
}
