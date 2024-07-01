<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Machine extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    // use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'machine';
    protected $fillable = [
        'plant'                 ,
        'id_machine'            ,
        'machine_name'          ,
        'machine_type   '       ,
        'group_name'            ,
        'group_id'              ,
        'location'              ,
        'start_time'            ,
        'end_time'              ,
        'groupseq_id'           ,
        'groupseq_name'         ,
        'machine_state'         ,
        'process'               ,
        'image'                 ,
        'purchase_date'         ,
        'purchase_price'        ,
        'depreciation_age'      ,
        'used_age'              ,
        'mach_hour'             ,
        'days_per_year'         ,
        'bank_interest_percent' ,
        'floor_area'            ,
        'maintenance_factor'    ,
        'maintenance_cost_year' ,
        'floor_price'           ,
        'power_consumption'     ,
        'electric_price'        ,
        'labor_cost'            ,
        'machine_price'         ,
        'depreciation_cost'     ,
        'bank_interest'         ,
        'area_cost'             ,
        'electrical_cost'       ,
        'maintenance_cost'      ,
        'mach_cost_per_hour'    ,
        'total_mach'            ,
    ];
}
