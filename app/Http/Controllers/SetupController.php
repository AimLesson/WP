<?php

namespace App\Http\Controllers;

use App\Imports\NoKatalogImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Plan;
use App\Models\Unit;
use App\Models\User;
use App\Models\Machine;
use App\Models\PlanAdd;
use App\Models\TaxType;
use App\Models\Kblicode;
use App\Models\Material;
use App\Models\Salesman;
use App\Models\Shipping;
use App\Models\SoTarget;
use App\Models\WorkUnit;
use App\Models\NoKatalog;
use App\Models\OrderUnit;
use App\Models\Department;
use App\Models\CompanyInfo;
use App\Models\ProductType;
use App\Models\MachineState;
use Illuminate\Http\Request;
use App\Models\Production_Sheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Node\Query\OrExpr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // For logging

class SetupController extends Controller
{
    // public function index()
    // {
    //     $productionsheet = Production_Sheet::get();

    //     return view('index', compact('productionsheet'));
    // }
    //setup
    public function setup()
    {
        return view('setup.setup');
    }

    public function machine(Request $request)
    {
        $machine = Machine::all();

        return view('setup.machine', compact('machine'));
    }

    public function createmachine()
    {
        // Fetch plan data
        $plan = DB::table('plan')->get();
        $planJoin = DB::table('plan')
            ->join('planadd', 'plan.plan_name', '=', 'planadd.plan_name')
            ->select('plan.*', 'planadd.*')
            ->get();

        // Initialize the plants array with default sequence numbers
        $plants = [
            'MDC' => 0,
            'SUPPORT' => 0,
            'EDU' => 0,
            'WF' => 0,
            'STP' => 0,
            'MA' => 0,
            'FNC' => 0
        ];

        // Fetch the last sequence numbers for each plant from the machine table
        $machines = DB::table('machine')
            ->select(DB::raw('plant, MAX(id_machine) as last_id_machine'))
            ->groupBy('plant')
            ->get();

        $nextIdMachines = [];

        // Update the plants array with the last sequence number from the database
        foreach ($machines as $machine) {
            // Extract the sequence number from the last_id_machine (assuming format 'PLANTnnn')
            preg_match('/(\d+)$/', $machine->last_id_machine, $matches);
            $lastSequence = isset($matches[1]) ? (int)$matches[1] : 0;

            // Calculate the next ID by incrementing the last sequence
            $nextSequence = str_pad($lastSequence + 1, 3, '0', STR_PAD_LEFT);

            // Update the nextIdMachines array
            if (array_key_exists($machine->plant, $plants)) {
                $nextIdMachines[$machine->plant] = "{$machine->plant}{$nextSequence}";

                // Log the highest id_machine for each plant
                Log::info("Highest ID for plant {$machine->plant}: {$machine->last_id_machine}");
            }
        }

        // If no machines were found, default to '001' for each plant
        foreach ($plants as $plant => $value) {
            if (!isset($nextIdMachines[$plant])) {
                $nextIdMachines[$plant] = "{$plant}001";
            }
        }

        // Log the next ID Machines array to confirm correct values
        Log::info('Next ID Machines:', $nextIdMachines);

        // Pass data to the view
        return view('setup.createmachine', compact('plan', 'planJoin', 'plants', 'nextIdMachines'));
    }


    public function storemachine(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'plant'                 => 'required',
                'id_machine'            => 'required|unique:machine,id_machine',
                'machine_name'          => 'required',
                'machine_type'          => 'required',
                'group_name'            => 'required',
                'group_id'              => 'required',
                'location'              => 'required',
                'start_time'            => 'required',
                'end_time'              => 'required',
                'groupseq_id'           => 'required',
                'groupseq_name'         => 'required',
                'machine_state'         => 'required',
                'process'               => 'required',
                'purchase_date'         => 'required',
                'purchase_price'        => 'required',
                'depreciation_age'      => 'required',
                'used_age'              => 'required',
                'mach_hour'             => 'required',
                'days_per_year'         => 'required',
                'bank_interest_percent' => 'required',
                'floor_area'            => 'required',
                'maintenance_factor'    => 'required',
                'maintenance_cost_year' => 'required',
                'floor_price'           => 'required',
                'power_consumption'     => 'required',
                'electric_price'        => 'required',
                'labor_cost'            => 'required',
                'machine_price'         => 'required',
                'depreciation_cost'     => 'required',
                'bank_interest'         => 'required',
                'area_cost'             => 'required',
                'electrical_cost'       => 'required',
                'maintenance_cost'      => 'required',
                'mach_cost_per_hour'    => 'required',
                'total_mach'            => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createmachine')->with('error', 'ID Machine Tidak Boleh Sama');
        }

        $machine = new Machine();
        $machine->plant = $request->input('plant');
        $machine->id_machine = $request->input('id_machine');
        $machine->machine_name = $request->input('machine_name');
        $machine->machine_type = $request->input('machine_type');
        $machine->group_name = $request->input('group_name');
        $machine->group_id = $request->input('group_id');
        $machine->location = $request->input('location');
        $machine->start_time = $request->input('start_time');
        $machine->end_time = $request->input('end_time');
        $machine->groupseq_id = $request->input('groupseq_id');
        $machine->groupseq_name = $request->input('groupseq_name');
        $machine->machine_state = $request->input('machine_state');
        $machine->process = $request->input('process');
        $machine->purchase_date = $request->input('purchase_date');
        $inputPurchasePrice = $request->input('purchase_price');
        $purchasePrice = str_replace(['Rp.', '.', ','], '', $inputPurchasePrice);
        $machine->purchase_price = $purchasePrice; // Menggunakan variabel $purchasePrice yang telah dibersihkan
        $machine->depreciation_age = $request->input('depreciation_age');
        $machine->used_age = $request->input('used_age');
        $machine->mach_hour = $request->input('mach_hour');
        $machine->days_per_year = $request->input('days_per_year');
        $machine->bank_interest_percent = $request->input('bank_interest_percent');
        $machine->floor_area = $request->input('floor_area');
        $machine->maintenance_factor = $request->input('maintenance_factor');
        $inputMaintenanceCostYear = $request->input('maintenance_cost_year');
        $maintenanceCostYear = str_replace(['Rp.', '.', ','], '', $inputMaintenanceCostYear);
        $machine->maintenance_cost_year = $maintenanceCostYear; // Menggunakan variabel $maintenanceCostYear yang telah dibersihkan
        $inputFloorPrice = $request->input('floor_price');
        $floorPrice = str_replace(['Rp.', '.', ','], '', $inputFloorPrice);
        $machine->floor_price = $floorPrice; // Menggunakan variabel $floorPrice yang telah dibersihkan
        $machine->power_consumption = $request->input('power_consumption');
        $inputElectricPrice = $request->input('electric_price');
        $electricPrice = str_replace(['Rp.', '.', ','], '', $inputElectricPrice);
        $machine->electric_price = $electricPrice; // Menggunakan variabel $electricPrice yang telah dibersihkan
        $inputLaborCost = $request->input('labor_cost');
        $laborCost = str_replace(['Rp.', '.', ','], '', $inputLaborCost);
        $machine->labor_cost = $laborCost; // Menggunakan variabel $electricPrice yang telah dibersihkan
        $inputMachinePrice = $request->input('machine_price');
        $machinePrice = str_replace(['Rp.', '.', ','], '', $inputMachinePrice);
        $machine->machine_price = $machinePrice; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputDepreciationCost = $request->input('depreciation_cost');
        $depreciationCost = str_replace(['Rp.', '.', ','], '', $inputDepreciationCost);
        $machine->depreciation_cost = $depreciationCost; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputBankInterest = $request->input('bank_interest');
        $bankInterest = str_replace(['Rp.', '.', ','], '', $inputBankInterest);
        $machine->bank_interest = $bankInterest; // Menggunakan variabel $electricPrice yang telah dibersihkan


        $inputAreaCost = $request->input('area_cost');
        $areaCost = str_replace(['Rp.', '.', ','], '', $inputAreaCost);
        $machine->area_cost = $areaCost; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputElectricalCost = $request->input('electrical_cost');
        $electricalCost = str_replace(['Rp.', '.', ','], '', $inputElectricalCost);
        $machine->electrical_cost = $electricalCost; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputMaintenanceCost = $request->input('maintenance_cost');
        $maintenanceCost = str_replace(['Rp.', '.', ','], '', $inputMaintenanceCost);
        $machine->maintenance_cost = $maintenanceCost; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputMachCostPerHour = $request->input('mach_cost_per_hour');
        $machCostPerHour = str_replace(['Rp.', '.', ','], '', $inputMachCostPerHour);
        $machine->mach_cost_per_hour = $machCostPerHour;

        $inputMachTotal = $request->input('total_mach');
        $machTotal = str_replace(['Rp.', '.', ','], '', $inputMachTotal);
        $machine->total_mach = $machTotal;

        $machine->save();

        return redirect()->route('setup.machine')->with('success', 'Machine data saved successfully.');
    }

    public function editmachine(Request $request, $id)
    {
        $machine = Machine::find($id);
        $plan = Plan::get();
        $machine_state = MachineState::get();
        if (!$machine) {
            return redirect()->route('setup.machine')->with('error', 'Machine Not Found!');
        }
        return view('setup.editmachine', compact('machine', 'plan', 'machine_state'));
    }

    public function updatemachine(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'plant'                 => 'required',
                'id_machine'            => 'required',
                'machine_name'          => 'required',
                'machine_type'          => 'required',
                'group_name'            => 'required',
                'group_id'              => 'required',
                'location'              => 'required',
                'start_time'            => 'required',
                'end_time'              => 'required',
                'groupseq_id'           => 'required',
                'groupseq_name'         => 'required',
                'machine_state'         => 'required',
                'process'               => 'required',
                'image'                 => 'image',
                'purchase_date'         => 'required',
                'purchase_price'        => 'required',
                'depreciation_age'      => 'required',
                'used_age'              => 'required',
                'mach_hour'             => 'required',
                'days_per_year'         => 'required',
                'bank_interest_percent' => 'required',
                'floor_area'            => 'required',
                'maintenance_factor'    => 'required',
                'maintenance_cost_year' => 'required',
                'floor_price'           => 'required',
                'power_consumption'     => 'required',
                'electric_price'        => 'required',
                'labor_cost'            => 'required',
                'machine_price'         => 'required',
                'depreciation_cost'     => 'required',
                'bank_interest'         => 'required',
                'area_cost'             => 'required',
                'electrical_cost'       => 'required',
                'maintenance_cost'      => 'required',
                'mach_cost_per_hour'    => 'required',
                'total_mach'            => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editmachine')->withErrors($validator)->withInput();
        }

        $machine = Machine::find($id);
        $machine->plant = $request->input('plant');
        $machine->id_machine = $request->input('id_machine');
        $machine->machine_name = $request->input('machine_name');
        $machine->machine_type = $request->input('machine_type');
        $machine->group_name = $request->input('group_name');
        $machine->group_id = $request->input('group_id');
        $machine->location = $request->input('location');
        $machine->start_time = $request->input('start_time');
        $machine->end_time = $request->input('end_time');
        $machine->groupseq_id = $request->input('groupseq_id');
        $machine->groupseq_name = $request->input('groupseq_name');
        $machine->machine_state = $request->input('machine_state');
        $machine->process = $request->input('process');
        $machine->purchase_date = $request->input('purchase_date');
        $inputPurchasePrice = $request->input('purchase_price');
        $purchasePrice = str_replace(['Rp.', '.', ','], '', $inputPurchasePrice);
        $machine->purchase_price = $purchasePrice; // Menggunakan variabel $purchasePrice yang telah dibersihkan
        $machine->depreciation_age = $request->input('depreciation_age');
        $machine->used_age = $request->input('used_age');
        $machine->mach_hour = $request->input('mach_hour');
        $machine->days_per_year = $request->input('days_per_year');
        $machine->bank_interest_percent = $request->input('bank_interest_percent');
        $machine->floor_area = $request->input('floor_area');
        $machine->maintenance_factor = $request->input('maintenance_factor');
        $inputMaintenanceCostYear = $request->input('maintenance_cost_year');
        $maintenanceCostYear = str_replace(['Rp.', '.', ','], '', $inputMaintenanceCostYear);
        $machine->maintenance_cost_year = $maintenanceCostYear; // Menggunakan variabel $maintenanceCostYear yang telah dibersihkan
        $inputFloorPrice = $request->input('floor_price');
        $floorPrice = str_replace(['Rp.', '.', ','], '', $inputFloorPrice);
        $machine->floor_price = $floorPrice; // Menggunakan variabel $floorPrice yang telah dibersihkan
        $machine->power_consumption = $request->input('power_consumption');
        $inputElectricPrice = $request->input('electric_price');
        $electricPrice = str_replace(['Rp.', '.', ','], '', $inputElectricPrice);
        $machine->electric_price = $electricPrice; // Menggunakan variabel $electricPrice yang telah dibersihkan
        $inputLaborCost = $request->input('labor_cost');
        $laborCost = str_replace(['Rp.', '.', ','], '', $inputLaborCost);
        $machine->labor_cost = $laborCost; // Menggunakan variabel $electricPrice yang telah dibersihkan
        $inputMachinePrice = $request->input('machine_price');
        $machinePrice = str_replace(['Rp.', '.', ','], '', $inputMachinePrice);
        $machine->machine_price = $machinePrice; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputDepreciationCost = $request->input('depreciation_cost');
        $depreciationCost = str_replace(['Rp.', '.', ','], '', $inputDepreciationCost);
        $machine->depreciation_cost = $depreciationCost; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputBankInterest = $request->input('bank_interest');
        $bankInterest = str_replace(['Rp.', '.', ','], '', $inputBankInterest);
        $machine->bank_interest = $bankInterest; // Menggunakan variabel $electricPrice yang telah dibersihkan


        $inputAreaCost = $request->input('area_cost');
        $areaCost = str_replace(['Rp.', '.', ','], '', $inputAreaCost);
        $machine->area_cost = $areaCost; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputElectricalCost = $request->input('electrical_cost');
        $electricalCost = str_replace(['Rp.', '.', ','], '', $inputElectricalCost);
        $machine->electrical_cost = $electricalCost; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputMaintenanceCost = $request->input('maintenance_cost');
        $maintenanceCost = str_replace(['Rp.', '.', ','], '', $inputMaintenanceCost);
        $machine->maintenance_cost = $maintenanceCost; // Menggunakan variabel $electricPrice yang telah dibersihkan

        $inputMachCostPerHour = $request->input('mach_cost_per_hour');
        $machCostPerHour = str_replace(['Rp.', '.', ','], '', $inputMachCostPerHour);
        $machine->mach_cost_per_hour = $machCostPerHour;

        $inputMachTotal = $request->input('total_mach');
        $machTotal = str_replace(['Rp.', '.', ','], '', $inputMachTotal);
        $machine->total_mach = $machTotal;

        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Ubah dari 'image_path' menjadi 'image'
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/lte/dist/img', $imageName); // Simpan gambar ke direktori yang sesuai
            $machine->image = $imageName;
        }
        $machine->save();

        return redirect()->route('setup.machine')->with('success', 'Machine data update successfully.');
    }

    public function viewmachine(Request $request, $id)
    {
        $machine = Machine::find($id);
        if (!$machine) {
            return redirect()->route('setup.machine')->with('error', 'Machine Not Found!');
        }
        return view('setup.viewmachine', compact('machine'));
    }

    public function deletemachine(Request $request, $id)
    {
        $machine = Machine::find($id);

        if (!$machine) {
            return redirect()->route('setup.machine')->with('error', 'Machine Not Found');
        }

        $machine->delete();
        return redirect()->route('setup.machine')->with('success', 'Machine Data Deleted Successfully');
    }

    public function directoryset()
    {
        return view('setup.directoryset');
    }


    public function privileges()
    {
        $privileges  = User::all();

        return view('setup.privileges', compact('privileges'));
    }

    public function viewps()
    {
        return view('setup.view_productionsheet');
    }

    public function print_productionsheet()
    {
        return view('setup.print_productionsheet');
    }

    public function create_productionsheet()
    {
        return view('setup.create_productionsheet');
    }

    public function companyinfo()
    {
        return view('setup.companyinfo');
    }

    public function editcompanyinfo(Request $request, $id)
    {
        $company_info = CompanyInfo::find($id);
        if (!$company_info) {
            return redirect()->route('setup.companyinfo')->with('error', 'Company Info Not Found!');
        }
        return view('setup.editcompanyinfo', compact('company_info'));
    }

    public function updatecompanyinfo(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'company_name'        => 'required',
                'address'             => 'required',
                'machines_type'       => 'required',
                'production_director' => 'required',
                'image'               => 'image', // Validasi gambar
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editcompanyinfo', ['id' => $id])->withErrors($validator)->withInput();
        }

        $companyinfo = CompanyInfo::find($id);

        if (!$companyinfo) {
            return redirect()->route('setup.companyinfo')->with('error', 'Company Info Not Found');
        }

        $companyinfo->company_name = $request->input('company_name');
        $companyinfo->address = $request->input('address');
        $companyinfo->machines_type = $request->input('machines_type');
        $companyinfo->production_director = $request->input('production_director');

        if ($request->hasFile('image')) {
            $image = $request->file('image'); // Ubah dari 'image_path' menjadi 'image'
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/lte/dist/img', $imageName); // Simpan gambar ke direktori yang sesuai
            $companyinfo->image = $imageName;
        }

        $companyinfo->save();
        return redirect()->route('setup.companyinfo')->with('success', 'Data Informasi Perusahaan berhasil diperbarui');
    }


    public function databaseacc()
    {
        return view('setup.databaseacc');
    }
    //setup - department
    public function department()
    {
        return view('setup.department');
    }

    public function createdepartment()
    {
        $lastDepart = Department::orderBy('kode', 'desc')->first();

        // // Menghitung nilai berikutnya
        // $nextId = $lastDepart ? $lastDepart->kode + 1 : 1;
        return view('setup.createdepartment');
    }

    public function ambilDataWorkUnit($work_unit)
    {
        $work_unit = WorkUnit::where('work_unit', $work_unit)->first();
        return response()->json($work_unit);
    }

    public function storedepartment(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kode'          => 'required',
                'work_unit'     => 'required',
                'name'          => 'required',
                'email'         => 'nullable',
                'group'         => 'required',
                'user_novvel'   => 'required',
                'information'   => 'nullable',
                'nik'           => 'nullable',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createdepartment')->withErrors($validator)->withInput();
        }

        $department = new Department();
        $department->kode = $request->input('kode');
        $department->work_unit = $request->input('work_unit');
        $department->name = $request->input('name');
        $department->email = $request->input('email');
        $department->group = $request->input('group');
        $department->user_novvel = $request->input('user_novvel');
        $department->information = $request->input('information');
        $department->nik = $request->input('nik');
        $department->save();

        return redirect()->route('setup.department')->with('success', 'Department Data Added');
    }

    public function editdepartment(Request $request, $id)
    {
        $department = Department::find($id);

        if (!$department) {
            return redirect()->route('setup.department')->with('error', 'Department Not Found!');
        }

        return view('setup.editDepartment', compact('department'));
    }

    public function updatedepartment(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kode'          => 'required',
                'work_unit'     => 'required',
                'name'          => 'required',
                'email'         => 'nullable',
                'group'         => 'required',
                'user_novvel'   => 'required',
                'information'   => 'nullable',
                'nik'           => 'nullable',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editdepartment', ['id' => $id])->withErrors($validator)->withInput();
        }

        $department = Department::find($id);

        if (!$department) {
            return redirect()->route('setup.department')->with('error', 'Department Not Found');
        }

        $department->kode = $request->input('kode');
        $department->work_unit = $request->input('work_unit');
        $department->name = $request->input('name');
        $department->email = $request->input('email');
        $department->group = $request->input('group');
        $department->user_novvel = $request->input('user_novvel');
        $department->information = $request->input('information');
        $department->nik = $request->input('nik');
        $department->save();
        return redirect()->route('setup.department')->with('success', 'Department Data Updated Successfully');
    }

    public function deletedepartment(Request $request, $id)
    {
        $department = Department::find($id);

        if (!$department) {
            return redirect()->route('setup.department')->with('error', 'Department Not Found');
        }

        $department->delete();
        return redirect()->route('setup.department')->with('success', 'Department Data Deleted Successfully');
    }

    //setup - kbli code
    public function kblicode()
    {
        $kbli_code = kblicode::get();

        return view('setup.kblicode', compact('kbli_code'));
    }

    public function createkblicode()
    {
        return view('setup.createkblicode');
    }

    public function storekblicode(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kbli_code'    => 'required|unique:kbli_code,kbli_code', // Add unique validation here
                'description'  => 'required',
            ],
            [
                'kbli_code.unique' => 'The KBLI Code has already been used. Please enter a unique code.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createkblicode')
                ->withErrors($validator)
                ->withInput();
        }

        $kbli_code['kbli_code'] = $request->kbli_code;
        $kbli_code['description'] = $request->description;

        Kblicode::create($kbli_code);

        return redirect()->route('setup.kblicode')->with('success', 'KBLI Code Added');
    }


    public function editkblicode(Request $request, $id)
    {
        $kblicode = Kblicode::find($id);

        if (!$kblicode) {
            return redirect()->route('setup.kblicode')->with('error', 'KBLI Code not found!');
        }

        return view('setup.editkblicode', compact('kblicode'));
    }

    public function updatekblicode(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kbli_code'    => 'required',
                'description'  => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createkblicode')->withErrors($validator)->withInput();
        }

        $kbli_code['kbli_code'] = $request->kbli_code;
        $kbli_code['description'] = $request->description;

        Kblicode::whereId($id)->update($kbli_code);

        return redirect()->route('setup.kblicode')->with('success', 'KBLI Code Updated');
    }

    public function deletekblicode(Request $request, $id)
    {
        $kblicode = Kblicode::find($id);

        if (!$kblicode) {
            return redirect()->route('setup.kblicode')->with('error', 'KBLI Code not found!');
        }

        $kblicode->delete();

        return redirect()->route('setup.kblicode')->with('success', 'KBLI Code data successfully deleted');
    }

    //order code
    public function ordercode()
    {
        return view('setup.ordercode');
    }

    public function orderunit()
    {
        return view('setup.orderunit');
    }

    public function createorderunit()
    {
        $lastOrderUnit = OrderUnit::orderBy('id_order_unit', 'desc')->first();

        // Menghitung nilai berikutnya
        $nextId = $lastOrderUnit ? $lastOrderUnit->id_order_unit + 1 : 1;

        return view('setup.createorderunit', ['nextId' => $nextId]);
    }

    public function storeorderunit(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_order_unit'    => 'required',
                'name'             => 'required',
                'code_order'       => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createorderunit')->withErrors($validator)->withInput();
        }

        $orderunit = new OrderUnit();
        $orderunit->id_order_unit = $request->input('id_order_unit');
        $orderunit->name = $request->input('name');
        $orderunit->code_order = $request->input('code_order');
        $orderunit->save();

        return redirect()->route('setup.orderunit')->with('success', 'Order Unit data saved successfully');
    }

    public function editorderunit(Request $request, $id)
    {
        $order_unit = OrderUnit::find($id);

        if (!$order_unit) {
            return redirect()->route('setup.orderunit')->with('error', 'Order Unit not found');
        }

        return view('setup.editorderunit', compact('order_unit'));
    }

    public function updateorderunit(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'code_order' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editorderunit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $order_unit = OrderUnit::find($id);

        if (!$order_unit) {
            return redirect()->route('setup.orderunit')->with('error', 'Order Unit Not Found');
        }
        $order_unit->name = $request->input('name');
        $order_unit->code_order = $request->input('code_order');

        $order_unit->save();
        return redirect()->route('setup.orderunit')->with('success', 'Order Unit Data Edited Successfully');
    }

    public function deleteorderunit($id)
    {
        $order_unit = orderunit::find($id);

        if (!$order_unit) {
            return redirect()->route('setup.orderunit')->with('error', 'Order Unit not found');
        }

        $order_unit->delete();

        return redirect()->route('setup.orderunit')->with('success', 'Order Unit Data Deleted Successfully');
    }

    //machine state
    public function ordermachine()
    {
        return view('setup.ordermachine');
    }

    public function createmachinestate()
    {
        $lastOrderUnit = MachineState::orderBy('code', 'desc')->first();

        // Menghitung nilai berikutnya
        $nextId = $lastOrderUnit ? $lastOrderUnit->code + 1 : 1;

        return view('setup.createmachinestate', ['nextId' => $nextId]);
    }

    public function storemachinestate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'code'    => 'required',
                'state'   => 'required',
                'info'      => 'nullable',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createmachinestate')->withErrors($validator)->withInput();
        }

        $machine_state = new MachineState();
        $machine_state->code = $request->input('code');
        $machine_state->state = $request->input('state');
        $machine_state->info = $request->input('info');
        $machine_state->save();

        return redirect()->route('setup.ordermachine')->with('success', 'Machine State data saved successfully');
    }

    public function editmachinestate(Request $request, $id)
    {
        $machine_state = MachineState::find($id);

        if (!$machine_state) {
            return redirect()->route('setup.ordermachine')->with('error', 'Machine State Not Found');
        }

        return view('setup.editmachinestate', compact('machine_state'));
    }

    public function updatemachinestate(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'state'      => 'required',
                'info'      => 'nullable',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editmachinestate', ['id' => $id])->withErrors($validator)->withInput();
        }

        $machine_state = MachineState::find($id);

        if (!$machine_state) {
            return redirect()->route('setup.ordermachine')->with('error', 'Machine state not found');
        }

        $machine_state->code = $request->input('code');
        $machine_state->state = $request->input('state');
        $machine_state->info = $request->input('info');
        $machine_state->save();
        return redirect()->route('setup.ordermachine')->with('success', 'Machine State Data Updated Successfully');
    }

    public function deletemachinestate(Request $request, $id)
    {
        $machine_state = MachineState::find($id);

        if (!$machine_state) {
            return redirect()->route('setup.ordermachine')->with('error', 'Machine state not found');
        }

        $machine_state->delete();

        return redirect()->route('setup.ordermachine')->with('success', 'Machine State Data Deleted Successfully');
    }

    // Order Unit
    public function unit()
    {
        $unit = Unit::get();
        return view('setup.unit', compact('unit'));
    }

    public function createunit()
    {
        $lastUnit = Unit::orderBy('id_unit', 'desc')->first();

        // Menghitung nilai berikutnya
        $nextId = $lastUnit ? $lastUnit->id_unit + 1 : 1;

        return view('setup.createunit', ['nextId' => $nextId]);
    }

    public function storeunit(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_unit'    => 'required',
                'unit'       => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createunit')->withErrors($validator)->withInput();
        }

        $unit = new unit();
        $unit->id_unit = $request->input('id_unit');
        $unit->unit = $request->input('unit');
        $unit->save();

        return redirect()->route('setup.unit')->with('success', 'Unit Data Saved Successfully');
    }

    public function editunit(Request $request, $id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return redirect()->route('setup.unit')->with('error', 'Unit Not Found');
        }

        return view('setup.editunit', compact('unit'));
    }

    public function updateunit(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_unit'      => 'required',
                'unit'         => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editunit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $unit = unit::find($id);

        if (!$unit) {
            return redirect()->route('setup.unit')->with('error', 'Unit Not Found');
        }

        $unit->id_unit = $request->input('id_unit');
        $unit->unit = $request->input('unit');
        $unit->save();
        return redirect()->route('setup.unit')->with('success', ' Unit Data Updated Successfully');
    }

    public function deleteunit($id)
    {
        $unit = unit::find($id);

        if (!$unit) {
            return redirect()->route('setup.unit')->with('error', 'Unit Not Found');
        }

        $unit->delete();

        return redirect()->route('setup.unit')->with('success', 'Unit Data Deleted Successfully');
    }

    public function workunit()
    {
        return view('setup.workunit');
    }

    public function createworkunit()
    {
        // $lastPlan = Plan::orderBy('id_plan', 'desc')->first();

        // // Menghitung nilai berikutnya
        // $nextId = $lastPlan ? $lastPlan->id_plan + 1 : 1;

        return view('setup.createworkunit');
    }

    public function storeworkunit(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'work_unit'    => 'required',
                'group'  => 'required',
                'information'  => 'nullable',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createworkunit')->withErrors($validator)->withInput();
        }

        $work_unit = new WorkUnit();
        $work_unit->work_unit = $request->input('work_unit');
        $work_unit->group = $request->input('group');
        $work_unit->information = $request->input('information');
        $work_unit->save();

        return redirect()->route('setup.workunit')->with('success', ' Unit Data Saved Successfully');
    }

    public function editworkunit(Request $request, $id)
    {
        $work_unit = WorkUnit::find($id);

        if (!$work_unit) {
            return redirect()->route('setup.workunit')->with('error', 'Work Unit Not Found');
        }

        return view('setup.editworkunit', compact('work_unit'));
    }

    public function updateworkunit(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'work_unit'      => 'required',
                'group'      => 'required',
                'information'      => 'nullable',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editworkunit', ['id' => $id])->withErrors($validator)->withInput();
        }

        $work_unit = WorkUnit::find($id);

        if (!$work_unit) {
            return redirect()->route('setup.workunit')->with('error', 'Work Unit Not Found');
        }

        $work_unit->work_unit = $request->input('work_unit');
        $work_unit->group = $request->input('group');
        $work_unit->information = $request->input('information');
        $work_unit->save();
        return redirect()->route('setup.workunit')->with('success', 'Work Unit Data Updated Successfully');
    }

    public function deleteworkunit(Request $request, $id)
    {
        $work_unit = WorkUnit::find($id);

        if (!$work_unit) {
            return redirect()->route('setup.workunit')->with('error', 'Work Unit Not Found');
        }

        $work_unit->delete();
        return redirect()->route('setup.workunit')->with('success', 'Work Unit Data Deleted Successfully');
    }

    public function plan()
    {
        $plan       = DB::table('plan')->get();
        $planJoin   = DB::table('plan')
            ->join('planadd', 'plan.plan_name', '=', 'planadd.plan_name')
            ->select('plan.*', 'planadd.*')
            ->get();

        return view('setup.plan', compact('plan', 'planJoin'));
    }

    public function viewplan($plan_name)
    {
        $planJoin = DB::table('plan')
            ->join('planadd', 'plan.plan_name', '=', 'planadd.plan_name')
            ->select('plan.*', 'planadd.*')
            ->where('planadd.plan_name', $plan_name)
            ->get();
        return view('setup.viewplan', compact('planJoin'));
    }

    public function createplan()
    {
        return view('setup.createplan');
    }

    public function storeplan(Request $request)
    {
        $request->validate([
            'plan_name'     => 'required|unique:plan,plan_name',
        ]);

        DB::beginTransaction();
        try {
            $plan = new Plan;
            $plan->plan_name    = $request->plan_name;
            $totalGroup         = count($request->group);
            $plan->total_group  = $totalGroup;
            $plan->save();

            foreach ($request->group as $key => $groups) {
                $planAdd['group']       = $groups;
                $planAdd['plan_name']   = $plan->plan_name;
                $planAdd['group_id']    = $request->group_id[$key];

                PlanAdd::create($planAdd);
            }

            DB::commit();

            return redirect()->route('setup.plan')->with('success', 'Plan Data Saved Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('setup.createplan')->with('error', 'Failed to Save Plan Data. Please Try Again!');
        }
    }

    public function editplan($plan_name)
    {
        $plan       = DB::table('plan')->where('plan_name', $plan_name)->first();
        $planJoin   = DB::table('plan')
            ->join('planadd', 'plan.plan_name', '=', 'planadd.plan_name')
            ->select('plan.*', 'planadd.*')
            ->where('planadd.plan_name', $plan_name)
            ->get();

        return view('setup.editplan', compact('plan', 'planJoin'));
    }

    public function deleteplanadd(Request $request)
    {
        DB::beginTransaction();
        try {
            $groupId = $request->id;
            $group = PlanAdd::findOrFail($groupId);
            $totalGroups = PlanAdd::count();

            if ($totalGroups > 1) {
                $group->delete();

                DB::commit();
                return redirect()->back()->with('success', 'Group successfully deleted.');
            } else {
                DB::rollback();
                return redirect()->back()->with('error', 'Cannot delete a group if only one remains!');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occurred while deleting the group!');
        }
    }

    public function updateplan(Request $request)
    {
        DB::beginTransaction();
        try {
            $update = [
                'plan_name' => $request->plan_name,
            ];

            PlanAdd::where('plan_name', $request->plan_name)->delete();

            foreach ($request->group as $key => $group) {
                $planAdd = [
                    'plan_name' => $request->plan_name,
                    'group'     => $group,
                    'group_id'  => $request->group_id[$key],
                ];

                PlanAdd::create($planAdd);
            }

            $totalGroup = PlanAdd::where('plan_name', $request->plan_name)->count();

            $update['total_group'] = $totalGroup;

            Plan::where('plan_name', $request->plan_name)->update($update);

            DB::commit();
            return redirect()->route('setup.plan')->with('success', 'Plan Data Updated Successfully');
        } catch (\Exception) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to update Plan. Please try again!');
        }
    }

    public function destroyplan($id)
    {
        DB::beginTransaction();

        try {
            $plan = Plan::find($id);
            $plan->planadd()->delete();
            $plan->delete();

            DB::commit();

            return redirect()->route('setup.plan')->with('success', 'Plan was successfully deleted!');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->route('setup.plan')->with('error', 'Failed to delete Plan. Please try again!');
        }
    }
    public function recalculation()
    {
        return view('setup.recalculation');
    }
    public function settinghost3()
    {
        return view('setup.settinghost3');
    }
    public function machines()
    {
        return view('setup.machines');
    }
    public function tabelsrepair()
    {
        return view('setup.tabelsrepair');
    }

    //so target
    public function sotarget()
    {
        return view('setup.sotarget');
    }

    public function createsotarget()
    {
        return view('setup.createsotarget');
    }

    public function storesotarget(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer'    => 'required',
                'product_type'  => 'required',
                'total_order'  => 'required',
                'nominal_value'  => 'required',
                'year'  => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createsotarget')->withErrors($validator)->withInput();
        }

        $sotarget = new SoTarget();
        $sotarget->customer = $request->input('customer');
        $sotarget->product_type = $request->input('product_type');
        $sotarget->total_order = $request->input('total_order');
        $sotarget->nominal_value = $request->input('nominal_value');
        $sotarget->year = $request->input('year');
        $sotarget->save();

        return redirect()->route('setup.sotarget')->with('success', 'SO Target Data Saved Successfully');
    }

    public function editsotarget(Request $request, $id)
    {
        $sotarget = SoTarget::find($id);

        if (!$sotarget) {
            return redirect()->route('setup.sotarget')->with('error', 'SO Target Not Found');
        }

        return view('setup.editsotarget', compact('sotarget'));
    }

    public function updatesotarget(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer'    => 'required',
                'product_type'  => 'required',
                'total_order'  => 'required',
                'nominal_value'  => 'required',
                'year'  => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editsotarget', ['id' => $id])->withErrors($validator)->withInput();
        }

        $sotarget = SoTarget::find($id);

        if (!$sotarget) {
            return redirect()->route('setup.sotarget')->with('error', 'SO Target Not Found');
        }

        $sotarget->customer = $request->input('customer');
        $sotarget->product_type = $request->input('product_type');
        $sotarget->total_order = $request->input('total_order');
        $sotarget->nominal_value = $request->input('nominal_value');
        $sotarget->year = $request->input('year');
        $sotarget->save();

        return redirect()->route('setup.sotarget')->with('success', 'SO Target Data Updated Successfully');
    }

    public function deletesotarget(Request $request, $id)
    {
        $sotarget = SoTarget::find($id);

        if (!$sotarget) {
            return redirect()->route('setup.sotarget')->with('error', 'SO Target Not Found');
        }

        $sotarget->delete();
        return redirect()->route('setup.sotarget')->with('success', 'SO Target Data Deleted Successfully');
    }


    //end_setup

    //tax type
    public function taxtype()
    {
        $taxtype = TaxType::get();

        return view('setup.taxtype', compact('taxtype'));
    }

    public function createtaxtype()
    {
        $lastTax = TaxType::orderBy(DB::raw('CAST(id_tax AS SIGNED)'), 'desc')->first();

        // Menghitung nilai berikutnya
        $nextId = $lastTax ? $lastTax->id_tax + 1 : 1;

        return view('setup.createtaxtype', ['nextId' => $nextId]);
    }

    public function storetaxtype(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_tax'    => 'required',
                'tax'       => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createtaxtype')->withErrors($validator)->withInput();
        }

        $taxtype = new TaxType();
        $taxtype->id_tax = $request->input('id_tax');
        $taxtype->tax = $request->input('tax');
        $taxtype->save();

        return redirect()->route('setup.taxtype')->with('success', 'Tax Type Data Saved Successfully');
    }

    public function edittaxtype(Request $request, $id)
    {
        $taxtype = TaxType::find($id);

        if (!$taxtype) {
            return redirect()->route('setup.taxtype')->with('error', 'Tax Type Not Found');
        }
        return view('setup.edittaxtype', compact('taxtype'));
    }

    public function updatetaxtype(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'tax'      => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.edittaxtype', ['id' => $id])->withErrors($validator)->withInput();
        }

        $taxtype = TaxType::find($id);

        if (!$taxtype) {
            return redirect()->route('setup.taxtype')->with('error', 'Tax Type Not Found');
        }

        $taxtype->tax = $request->input('tax');

        $taxtype->save();
        return redirect()->route('setup.taxtype')->with('success', 'Tax Type Data Updated Successfully');
    }

    public function deletetaxtype($id)
    {
        $taxtype = TaxType::find($id);

        if (!$taxtype) {
            return redirect()->route('setup.taxtype')->with('error', 'Tax Type Not Found');
        }

        $taxtype->delete();
        return redirect()->route('setup.taxtype')->with('success', 'Tax Type Data Deleted Successfully');
    }
    //end_setup

    //product type
    public function producttype()
    {
        $producttype = ProductType::get();

        return view('setup.producttype', compact('producttype'));
    }

    public function createproducttype()
    {
        $lastProduct = ProductType::orderBy(DB::raw('CAST(id_product_type AS SIGNED)'), 'desc')->first();

        // Menghitung nilai berikutnya
        $nextId = $lastProduct ? $lastProduct->id_product_type + 1 : 1;

        return view('setup.createproducttype', ['nextId' => $nextId]);
    }

    public function storeproducttype(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_product_type'    => 'required',
                'product_name'       => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createproducttype')->withErrors($validator)->withInput();
        }

        $producttype = new ProductType();
        $producttype->id_product_type = $request->input('id_product_type');
        $producttype->product_name = $request->input('product_name');
        $producttype->save();

        return redirect()->route('setup.producttype')->with('success', 'Product Type Data Saved Successfully');
    }

    public function editproducttype(Request $request, $id)
    {
        $producttype = ProductType::find($id);

        if (!$producttype) {
            return redirect()->route('setup.producttype')->with('error', 'Product Type Not Found');
        }
        return view('setup.editproducttype', compact('producttype'));
    }

    public function updateproducttype(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name'      => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editproducttype', ['id' => $id])->withErrors($validator)->withInput();
        }

        $producttype = ProductType::find($id);

        if (!$producttype) {
            return redirect()->route('setup.producttype')->with('error', 'Product Type Not Found');
        }

        $producttype->product_name = $request->input('product_name');
        $producttype->save();

        return redirect()->route('setup.producttype')->with('success', 'Product Type Data Updated Successfully');
    }

    public function deleteproducttype($id)
    {
        $producttype = ProductType::find($id);

        if (!$producttype) {
            return redirect()->route('setup.producttype')->with('error', 'Product Type Not Found');
        }

        $producttype->delete();
        return redirect()->route('setup.producttype')->with('success', 'Product Type Data Deleted Successfully');
    }
    //end_setup

    //shipping
    public function shipping()
    {
        $shipping = Shipping::get();

        return view('setup.shipping', compact('shipping'));
    }

    public function createshipping()
    {
        $lastShipping = Shipping::orderBy(DB::raw('CAST(id_shipping AS SIGNED)'), 'desc')->first();

        // Menghitung nilai berikutnya
        $nextId = $lastShipping ? $lastShipping->id_shipping + 1 : 1;

        return view('setup.createshipping', ['nextId' => $nextId]);
    }

    public function storeshipping(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_shipping'   => 'required',
                'shipping_name' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createshipping')->withErrors($validator)->withInput();
        }

        $shipping = new Shipping();
        $shipping->id_shipping = $request->input('id_shipping');
        $shipping->shipping_name = $request->input('shipping_name');
        $shipping->save();

        return redirect()->route('setup.shipping')->with('success', 'Shipping Data Saved Successfully');
    }

    public function editshipping(Request $request, $id)
    {
        $shipping = Shipping::find($id);

        if (!$shipping) {
            return redirect()->route('setup.shipping')->with('error', 'Shipping Not Found');
        }
        return view('setup.editshipping', compact('shipping'));
    }

    public function updateshipping(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'shipping_name'      => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.editshipping', ['id' => $id])->withErrors($validator)->withInput();
        }

        $shipping = Shipping::find($id);

        if (!$shipping) {
            return redirect()->route('setup.shipping')->with('error', 'Shipping Not Found');
        }

        $shipping->shipping_name = $request->input('shipping_name');
        $shipping->save();

        return redirect()->route('setup.shipping')->with('success', 'Shipping Data Updated Successfully');
    }

    public function deleteshipping($id)
    {
        $shipping = Shipping::find($id);

        if (!$shipping) {
            return redirect()->route('setup.shipping')->with('error', 'Shipping Not Found');
        }

        $shipping->delete();
        return redirect()->route('setup.shipping')->with('success', 'Shipping Data Deleted Successfully');
    }

    //setup - material
    public function material()
    {
        $material = Material::get();

        return view('setup.material', compact('material'));
    }

    public function creatematerial()
    {
        return view('setup.creatematerial');
    }

    public function storematerial(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_material' => 'required',
                'material'      => 'required',
                'length'        => 'required',
                'width'         => 'required',
                'thickness'     => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.creatematerial')->with('error', 'Failed');
        }

        $material = new Material();
        $material->id_material   = $request->input('id_material');
        $material->material     =   $request->input('material');
        $material->length       =   $request->input('length');
        $material->width        =   $request->input('width');
        $material->thickness    =   $request->input('thickness');
        $material->save();

        return redirect()->route('setup.material')->with('success', 'Material data saved successfully');
    }

    public function editmaterial(Request $request, $id)
    {
        $material = Material::find($id);
        if (!$material) {
            return redirect()->route('setup.material')->with('error', 'Material not found');
        }
        return view('setup.editmaterial', compact('material'));
    }

    public function updatematerial(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id_material'   =>  'required',
                'material'      =>  'required',
                'length'        =>  'required',
                'width'         =>  'required',
                'thickness'     =>  'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('setup.editmaterial', ['id' => $id])->withErrors($validator)->withInput();
        }
        $material = Material::find($id);
        if (!$material) {
            return redirect()->route('setup.material')->with('error', 'Material Not found');
        }

        $material->id_material = $request->input('id_material');
        $material->material = $request->input('material');
        $material->length = $request->input('length');
        $material->width = $request->input('width');
        $material->thickness = $request->input('thickness');
        $material->save();
        return redirect()->route('setup.material')->with('success', 'Material updated successfully');
    }

    public function deletematerial($id)
    {
        $material = Material::find($id);
        if (!$material) {
            return redirect()->route('setup.material')->with('error', 'Material not found');
        }

        $material->delete();
        return redirect()->route('setup.material')->with('success', 'Material delete successfully');
    }



    //setup - Katalog
    public function katalog()
    {
        $no_katalog = NoKatalog::get();

        return view('setup.katalog', compact('no_katalog'));
    }
    public function createkatalog()
    {
        return view('setup.createkatalog');
    }

    public function storekatalog(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'no_katalog' => 'required',
                'nama_katalog'      => 'required',
                'price'        => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createkatalog')->with('error', 'Failed');
        }

        $no_katalog = new NoKatalog();
        $no_katalog->no_katalog   = $request->input('no_katalog');
        $no_katalog->nama_katalog     =   $request->input('nama_katalog');
        $no_katalog->price       =   $request->input('price');
        $no_katalog->save();

        return redirect()->route('setup.katalog')->with('success', 'Katalog data saved successfully');
    }

    public function editkatalog(Request $request, $id)
    {
        $no_katalog = NoKatalog::find($id);
        if (!$no_katalog) {
            return redirect()->route('setup.katalog')->with('error', 'Katalog not found');
        }
        return view('setup.editkatalog', compact('no_katalog'));
    }

    public function updatekatalog(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'no_katalog' => 'required',
                'nama_katalog'      => 'required',
                'price'        => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('setup.editkatalog', ['id' => $id])->withErrors($validator)->withInput();
        }
        $no_katalog = NoKatalog::find($id);
        if (!$no_katalog) {
            return redirect()->route('setup.katalog')->with('error', 'Katalog Not found');
        }

        $no_katalog->no_katalog = $request->input('no_katalog');
        $no_katalog->nama_katalog = $request->input('nama_katalog');
        $no_katalog->price = $request->input('price');
        $no_katalog->save();
        return redirect()->route('setup.katalog')->with('success', 'Katalog updated successfully');
    }

    public function deletekatalog($id)
    {
        $no_katalog = NoKatalog::find($id);
        if (!$no_katalog) {
            return redirect()->route('setup.katalog')->with('error', 'Katalog not found');
        }

        $no_katalog->delete();
        return redirect()->route('setup.katalog')->with('success', 'Katalog delete successfully');
    }


    public function importKatalog(Request $request)
{
    try {
        // Log MIME type to help with debugging
        if ($request->hasFile('file')) {
            Log::info('File MIME type: ' . $request->file('file')->getMimeType());
        }

        // Validate that the file is present and has one of the allowed MIME types
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv,txt',
        ]);

        // Use the file directly without storing it temporarily
        Excel::import(new NoKatalogImport, $request->file('file'));

        // Redirect to the katalog setup route with success message
        return redirect()->route('setup.katalog')->with('success', 'Katalog data imported successfully');
    } catch (\Exception $e) {
        // Log the error message
        Log::error('Error importing file: ' . $e->getMessage());

        // Redirect back with an error message
        return redirect()->route('setup.katalog')->with('error', 'Error importing file. Please try again.');
    }
}
    


    //setup - Salesman
    public function salesman()
    {
        $salesman = Salesman::get();

        return view('setup.salesman', compact('salesman'));
    }
    public function createsalesman()
    {
        return view('setup.createsalesman');
    }

    public function storesalesman(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'salesman' => 'required',
                'unit'      => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('setup.createsalesman')->with('error', 'Failed');
        }

        $salesman = new Salesman();
        $salesman->salesman   = $request->input('salesman');
        $salesman->unit     =   $request->input('unit');
        $salesman->save();

        return redirect()->route('setup.salesman')->with('success', 'Salesman data saved successfully');
    }

    public function editsalesman(Request $request, $id)
    {
        $salesman = Salesman::find($id);
        if (!$salesman) {
            return redirect()->route('setup.salesman')->with('error', 'Salesman not found');
        }
        return view('setup.editsalesman', compact('salesman'));
    }

    public function updatesalesman(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'salesman' => 'required',
                'unit'      => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->route('setup.editsalesman', ['id' => $id])->withErrors($validator)->withInput();
        }
        $salesman = Salesman::find($id);
        if (!$salesman) {
            return redirect()->route('setup.salesman')->with('error', 'Salesman Not found');
        }

        $salesman->salesman = $request->input('salesman');
        $salesman->unit = $request->input('unit');
        $salesman->save();
        return redirect()->route('setup.salesman')->with('success', 'Salesman updated successfully');
    }

    public function deletesalesman($id)
    {
        $salesman = Salesman::find($id);
        if (!$salesman) {
            return redirect()->route('setup.salesman')->with('error', 'Salesman not found');
        }

        $salesman->delete();
        return redirect()->route('setup.salesman')->with('success', 'Salesman delete successfully');
    }

    //end_setup

}
