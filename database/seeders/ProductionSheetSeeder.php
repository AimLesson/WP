<?php

namespace Database\Seeders;

use App\Models\Production_Sheet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductionSheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Production_Sheet::create(
            [
                'order_number'      => 'STWF2301',
                'customer'  => 'PT ATMI SOLO',
                'product'     => 'Tool',
                'so_no'      => 'STW2301',
                'dod'      => '2023/01/31',
                'assy_drawing'    => '0',
                'po_ref'    => '0',
                'no_prod'    => '1',
                'no_item'    => '71',
                'no_drawing'    => '138267',
                'date_wanted'    => '2023/06/13',
                'no_piece'    => '100',
                'material'    => 'MS A-10',
                'no_blank'    => '100',
                'weight'    => '0',
                'blank_size'    => '10 x 106',
                'item_name'    => 'locking pin',
                'rack'    => '',
                'issued'    => '2023/06/13',
            ]
        );
    }
}
