<?php

namespace Database\Seeders;

use App\Models\Kblicode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KbliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kblicode::create(
            [
                'kbli_code'   => '31004',
                'description' => 'Furnitur untuk sekolah, kantor, pabrik'
            ]
        );
        Kblicode::create(
            [
                'kbli_code'   => '33122',
                'description' => 'Jasa Reparasi Mesin Produksi'
            ]
        );
        Kblicode::create(
            [
                'kbli_code'   => '32502',
                'description' => 'Dental Chair'
            ]
        );
        Kblicode::create(
            [
                'kbli_code'   => '28221',
                'description' => 'Pembuatan Mesin Perkakas dan Mesin Khusus'
            ]
        );
        Kblicode::create(
            [
                'kbli_code'   => '25991',
                'description' => 'Brankas'
            ]
        );
        Kblicode::create(
            [
                'kbli_code'   => '32501',
                'description' => 'Tempat tidur rumah sakit'
            ]
        );
        Kblicode::create(
            [
                'kbli_code'   => '46696',
                'description' => 'Besi Skrap'
            ]
        );
        Kblicode::create(
            [
                'kbli_code'   => '28299',
                'description' => 'Mesin Perkakas Khusus'
            ]
        );
    }
}
