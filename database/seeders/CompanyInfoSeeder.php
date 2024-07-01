<?php

namespace Database\Seeders;

use App\Models\CompanyInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       CompanyInfo::create([
        'company_name'             => 'PT ATMI SOLO',
        'address'                  => 'Jalan Adisucipto, Kotak Pos 215/57 SURAKARTA',
        'machines_type'            => 'Machines Groups',
        'production_director'      => 'St. Hermawan BP',
        'image'                    => 'logopt1.png',
       ]);
    }
}
