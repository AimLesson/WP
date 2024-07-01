<?php

namespace Database\Seeders;

use App\Models\TaxType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaxType::create(
            [
                'id_tax' => '1',
                'tax' => 'Pajak Pertambahan Nilai (PPN) ',
            ]
        );
        TaxType::create(
            [
                'id_tax' => '2',
                'tax' => 'Pajak Penghasilan Ps.22',
            ]
        );
        TaxType::create(
            [
                'id_tax' => '3',
                'tax' => 'Pajak Penghasilan Ps.23',
            ]
        );
        TaxType::create(
            [
                'id_tax' => '4',
                'tax' => 'Ekspor BPK Berwujud',
            ]
        );
        TaxType::create(
            [
                'id_tax' => '5',
                'tax' => 'PPN Khusus Dokumen',
            ]
        );
    }
}
