<?php

namespace Database\Seeders;

use App\Models\MachineState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MachineStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MachineState::create([
            'code'   => 1, // Sesuaikan tipe data dan pastikan unik
            'state' => 'OK',
        ]);
        MachineState::create([
            'code'   => 2, // Sesuaikan tipe data dan pastikan unik
            'state' => 'Under Repair',
        ]);
        MachineState::create([
            'code'   => 3, // Sesuaikan tipe data dan pastikan unik
            'state' => 'Que up Repair',
        ]);
        MachineState::create([
            'code'   => 4, // Sesuaikan tipe data dan pastikan unik
            'state' => 'Out of Date',
        ]);
    }
}
