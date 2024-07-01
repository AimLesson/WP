<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create(
            [
                'id_unit' => '1',
                'unit' => 'pcs',
            ]
        );
        Unit::create(
            [
                'id_unit' => '2',
                'unit' => 'batang',
            ]
        );
        Unit::create(
            [
                'id_unit' => '3',
                'unit' => 'pce',
            ]
        );
    }
}
