<?php

namespace Database\Seeders;

use App\Models\WorkUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WorkUnit::create(
            [
                'work_unit'     => 'FIN',
                'group'         => 'FIN',
                'information'   => 'Finance',
            ]
        );
        WorkUnit::create(
            [
                'work_unit'     => 'WF',
                'group'         => 'WF',
                'information'   => 'Maker',
            ]
        );
        WorkUnit::create(
            [
                'work_unit'     => 'PROD_WF',
                'group'         => 'WF',
                'information'   => 'App Prod',
            ]
        );
        WorkUnit::create(
            [
                'work_unit'     => 'MA',
                'group'         => 'MA',
                'information'   => 'App MA',
            ]
        );
        WorkUnit::create(
            [
                'work_unit'     => 'LOG',
                'group'         => 'LOG',
                'information'   => 'Logistik',
            ]
        );
        WorkUnit::create(
            [
                'work_unit'     => 'PROD_MDC',
                'group'         => 'MDC',
                'information'   => 'App_Prod',
            ]
        );
        WorkUnit::create(
            [
                'work_unit'     => 'MDC',
                'group'         => 'MDC',
                'information'   => 'Maker',
            ]
        );
        WorkUnit::create(
            [
                'work_unit'     => 'SJ_WF',
                'group'         => 'SJ',
                'information'   => 'Surat Jalan',
            ]
        );
        WorkUnit::create(
            [
                'work_unit'     => 'SJ_MDC',
                'group'         => 'SJ',
                'information'   => 'Surat Jalan',
            ]
        );
        WorkUnit::create(
            [
                'work_unit'     => 'EDU',
                'group'         => 'EDU',
                'information'   => 'Maker',
            ]
        );
    }
}
