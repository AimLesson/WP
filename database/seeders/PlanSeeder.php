<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan record pertama
        Plan::create([
            'id_plan'   => 1, // Sesuaikan tipe data dan pastikan unik
            'plan_name' => 'MDC',
        ]);
        // Menambahkan record kedua
        Plan::create([
            'id_plan'   => 2, // Sesuaikan tipe data dan pastikan unik
            'plan_name' => 'SUPPORT',
        ]);
        Plan::create([
            'id_plan'   => 3, // Sesuaikan tipe data dan pastikan unik
            'plan_name' => 'EDU',
        ]);
        Plan::create([
            'id_plan'   => 4, // Sesuaikan tipe data dan pastikan unik
            'plan_name' => 'WF',
        ]);
        Plan::create([
            'id_plan'   => 5, // Sesuaikan tipe data dan pastikan unik
            'plan_name' => 'STP',
        ]);
    }
}
