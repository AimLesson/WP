<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(){
        return view('report.report');
    }
    public function order(){
        return view('report.order');
    }
    public function controlsheet(){
        return view('report.controlsheet');
    }
    public function productionsheet(){
        return view('report.productionsheet');
    }
    public function inspectionsheet(){
        return view('report.inspectionsheet');
    }
    public function materialsheet(){
        return view('report.materialsheet');
    }
    public function standartpartsheet(){
        return view('report.standartpartsheet');
    }
    public function subcont(){
        return view('report.subcont');
    }
    public function overheadmanufacture(){
        return view('report.overheadmanufacture');
    }
    public function monitoranalisaorder(){
        return view('report.monitoranalisaorder');
    }
    public function statistic(){
        return view('report.statistic');
    }
    public function reportordergraph(){
        return view('report.reportordergraph');
    }
    public function capacity(){
        return view('report.capacity');
    }
    public function wip(){
        return view('report.wip');
    }
    public function wip_process(){
        return view('report.wip_process');
    }
    public function wip_material(){
        return view('report.wip_material');
    }
    public function outstanding(){
        return view('report.outstanding');
    }
    public function finishgood(){
        return view('report.finishgood');
    }
    public function delivered(){
        return view('report.delivered');
    }
    public function hpp(){
        return view('report.hpp');
    }
    public function hppmdc(){
        return view('report.hppmdc');
    }
    public function hppwf(){
        return view('report.hppwf');
    }
    public function perhitunganwip(){
        return view('report.perhitunganwip');
    }
    public function salesorder(){
        return view('report.salesorder');
    }

}
