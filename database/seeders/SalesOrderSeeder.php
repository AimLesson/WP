<?php

namespace Database\Seeders;

use App\Models\SalesOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalesOrder::create(
            [
                'quotation_no' => 'Q1',
                'sales_order_no' => 'SO1',
                'company_name' => 'ATMI SOLO',
                'name' => 'Jaka',
                'date' => '13/11/2023',
                'kbli' => '13424',
                'email' => 'admin@gmail',
                'telephone' => '082227139878',
                'po_no' => 'P001',
                'address' => 'SURAKARTA',
                'npwp' => '13554665151315',
                'tax_address' => 'SURAKARTA',
                'scope_of_work_no' => 'SOW001',
                'reference_number' => '01',
                'work_unit' => 'MDC',
                'fax' => '02816655482',
                'radio_information' => 'fax',
                'confirmation' => 'FAX',
                'special_requirement' => 'Kuning',
                'delivery_statement' => 'Price Include Transport',
                'term_of_payment' => 'COD',
                'dod' => '07/12/2023',
                'image' => 'null',
                'sample_reference' => 'None',
                'assy_type' => 'Assy in ATMI',
                'qc_statement' => 'QC Sheet',
                'packing_type' => 'Carton Packing',
                'tax' => 'Include Tax',
                'discount' => '10000',
                'discount_percent' => '10',
                'total_amount' => '100000',
                'down_of_payment' => '50000',
                'down_of_payment_percent' => '50',
                'shippingpoint' => 'Local',
                'salesman' => 'Surya',
            ]
        );
    }
}
