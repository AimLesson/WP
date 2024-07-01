@extends('setup.setup')
@section('content')
    <style>
        .vertical-center {
            display: flex;
            align-items: center;
            justify-content: left;
            height: 100%;
        }

        .nominal {
            float: right;
            /* Membuat elemen "Nominal" berada di sebelah kanan */
            font-size: 16px;
            /* Sesuaikan ukuran teks sesuai kebutuhan */
            margin-top: 5px;
            margin-right: 15px;
            /* Sesuaikan margin atas sesuai kebutuhan */
            color: #888;
            /* Sesuaikan warna teks sesuai kebutuhan */
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Machine View</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.machine') }}">Machine</a></li>
                            <li class="breadcrumb-item active">View Machine</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Machine View</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Bagian Atas - Bagian Pertama (Horizontal) -->
                            <div class="form-group">
                                <label>Plan</label>
                                <input type="text" name="plant" class="form-control" id="InpuPlant"
                                    placeholder="Input Plant" value="{{ $machine->plant }}" readonly required>
                            </div>
                            <!-- Elemen ID, Machine, Machine Type, Group, dan Location -->
                            <div class="form-group">
                                <label for="InputIDMachine">ID</label>
                                <input type="text" name="id_machine" class="form-control" id="InputIDMachine"
                                    placeholder="Input ID" value="{{ $machine->id_machine }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="InputMachine">Machine</label>
                                <input type="text" name="machine_name" class="form-control" id="InputMachine"
                                    placeholder="Input Machine" value="{{ $machine->machine_name }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="InputMachineType">Machine Type</label>
                                <input type="text" name="machine_type" class="form-control" id="InputMachineType"
                                    placeholder="Input Machine Type" value="{{ $machine->machine_type }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="InputGroup">Group (ID/NAME)</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="group_name" class="form-control" id="InputGroupName"
                                            placeholder="Group Name"value="{{ $machine->group_name }}" readonly required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="group_id" class="form-control" id="InputGroupID"
                                            placeholder="ID" maxlength="2" value="{{ $machine->group_id }}" readonly
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputLocation">Location</label>
                                <input type="text" name="location" class="form-control" id="InputLocation"
                                    placeholder="Input Location" value="{{ $machine->location }}" readonly required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Bagian Atas - Bagian Kedua (Horizontal) -->
                            <!-- Elemen Time Start and Finish, Group Seq, Machine Status, dan Process -->
                            <div class="form-group">
                                <label for="InputTime">Time Start and Finish</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="time" name="start_time" class="form-control" id="InputStartTime"
                                            value="{{ $machine->start_time }}"readonly required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="time" name="end_time" class="form-control" id="InputEndTime"
                                            value="{{ $machine->end_time }}" readonly required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="mach_hour" class="form-control" id="InputHPD"
                                            placeholder="hour/day" value="{{ $machine->mach_hour }} hour/day" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputGroupSeq">Group Seq</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="groupseq_id" class="form-control" id="InputSeqID"
                                            placeholder="ID" maxlength="1" value="{{ $machine->groupseq_id }}" readonly
                                            required>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control select2" name="groupseq_name" id="InputSeqName"
                                            value="{{ $machine->groupseq_name }}" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputMachineStatus">Machine Status</label>
                                <input class="form-control select2" name="machine_state" id="InputMachineStatus"
                                    style="width: 100%;" value="{{ $machine->machine_state }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="InputProcess">Process</label>
                                <input type="text" name="process" class="form-control" id="InputProcess"
                                    placeholder="Input Process" value="{{ $machine->process }}" readonly required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Bagian Atas - Bagian Ketiga (Horizontal) -->
                            <!-- Elemen untuk gambar -->
                            <div class="form-group">
                                <label for="InputImage">Image</label>
                            </div>
                            <!-- Tambahkan elemen <img> untuk menampilkan preview gambar dari database -->
                            <img id="imagePreview" src="{{ asset('/storage/lte/dist/img/' . $machine->image) }}"
                                alt="{{ $machine->image }}"
                                style="max-width: 100%; max-height: 1000px; display: block; margin: 0 auto;">
                        </div>
                    </div>

                    <div class="my-4"></div>

                    <div class="row">
                        <div class="col-md-3">
                            <!-- Bagian Bawah - Bagian Pertama (Horizontal) -->
                            <!-- Elemen untuk Purchase Date, Purchase Price, Depreciation Age, Used Age, Mach. Hour, dan Days per Year -->
                            <div class="form-group">
                                <label>Purchase Date</label>
                                <div class="input-group date" id="purchasedate" data-target-input="nearest">
                                    <input type="text" name="purchase_date" class="form-control "
                                        placeholder="Input Selected Date" value="{{ $machine->purchase_date }}" readonly
                                        required>
                                    <div class="input-group-append" >
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputPurchasePrice">Purchase Price (Rp)</label>
                                <input type="text" name="purchase_price" class="form-control" id="InputPurchasePrice"
                                    placeholder="Input Purchase Price (Rp)" value="{{ 'Rp. ' . number_format($machine->purchase_price, 0, ',', '.') }}"
                                    readonly required>
                            </div>
                            <div class="form-group">
                                <label for="InputDepreciationAge">Depreciation Age</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="depreciation_age" class="form-control"
                                            id="InputDepreciationAge" placeholder="Input Depreciation Age"
                                            value="{{ $machine->depreciation_age }}" readonly required>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="vertical-center" style="font-size: 20px;">Years</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputUsedAge">Used Age</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="used_age" class="form-control" id="InputUsedAge"
                                            placeholder="Input Used Age" value="{{ $machine->used_age }}" readonly
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="vertical-center" style="font-size: 20px;">Years</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputMachHour">Mach. Hour</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="mach_hour" class="form-control" id="InputMachHour"
                                            placeholder="Input Mach. Hour" value="{{ $machine->mach_hour }}" readonly
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="vertical-center" style="font-size: 20px;">hour/day</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputDaysPerYear">Days per Year</label>
                                <input type="text" name="days_per_year" class="form-control" id="InputDaysPerYear"
                                    placeholder="Input Days per Year" value="{{ $machine->days_per_year }}" readonly
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <!-- Bagian Bawah - Bagian Kedua (Horizontal) -->
                            <!-- Elemen untuk Bank Interest Percent, Floor Area, Maintenance Factor, dan Maintenance Cost/Year -->
                            <div class="form-group">
                                <label for="InputBankInterestPercent">Bank Interest Percent</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="bank_interest_percent" class="form-control"
                                            id="InputBankInterestPercent" placeholder="Input Bank Interest Percent"
                                            value="{{ $machine->bank_interest_percent }}" readonly required>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="vertical-center" style="font-size: 20px;">%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputFloorArea">Floor Area</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="floor_area" class="form-control" id="InputFloorArea"
                                            placeholder="Input Floor Area" value="{{ $machine->floor_area }}" readonly
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="vertical-center" style="font-size: 20px;">M²</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputMaintenanceFactor">Maintenance Factor</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="maintenance_factor" class="form-control"
                                            id="InputMaintenanceFactor" placeholder="Input Maintenance Factor"
                                            value="{{ $machine->maintenance_factor }}" readonly required>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="vertical-center" style="font-size: 20px;">%</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputMaintenanceCostYear">Maintenance Cost/Year (Rp)</label>
                                <input type="text" name="maintenance_cost_year" class="form-control"
                                    id="InputMaintenanceCostYear" placeholder="Input Maintenance Cost/Year"
                                    value="{{ 'Rp. ' . number_format($machine->maintenance_cost_year, 0, ',', '.') }}" readonly required>
                                <h7 class="nominal">*Nominal</h7>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <!-- Bagian Bawah - Bagian Ketiga (Horizontal) -->
                            <!-- Elemen untuk Floor Price, Power Consumption, Electric Price/kWh, Labor Cost, dan Machine Price -->
                            <div class="form-group">
                                <label for="InputFloorPrice">Floor Price (Rp)</label>
                                <input type="text" name="floor_price" class="form-control" id="InputFloorPrice"
                                    placeholder="{{ 'Rp. ' . number_format($machine->floor_price, 0, ',', '.') }}" readonly
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="InputPowerConsumption">Power Consumption</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" name="power_consumption" class="form-control"
                                            id="InputPowerConsumption" placeholder="Input Power Consumption"
                                            value="{{ $machine->power_consumption }}" readonly required>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="vertical-center" style="font-size: 20px;">kW</div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="InputElectricPrice">Electric Price/kWh (Rp)</label>
                                <input type="text" name="electric_price" class="form-control" id="InputElectricPrice"
                                    placeholder="Input Electric Price/kWh" value="{{ 'Rp. ' . number_format($machine->electric_price, 0, ',', '.') }}"
                                    readonly required>
                            </div>
                            <div class="form-group">
                                <label for="InputLaborCost">Labor Cost (Rp)</label>
                                <input type="text" name="labor_cost" class="form-control" id="InputLaborCost"
                                    placeholder="Input Labor Cost" value="{{ 'Rp. ' . number_format($machine->labor_cost, 0, ',', '.') }}" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="InputMachinePrice">Machine Price (Rp)</label>
                                <input type="text" name="machine_price" class="form-control" id="InputMachinePrice"
                                    placeholder="Input Machine Price" value="{{ 'Rp. ' . number_format($machine->machine_price, 0, ',', '.') }}" readonly
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="InputTotalMach">Mach Total</label>
                                <input type="text" name="total_mach" class="form-control" id="InputTotalMach"
                                    placeholder="Input Mach Total" value="{{ 'Rp. ' . number_format($machine->total_mach, 0, ',', '.') }}" readonly
                                    required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <!-- Bagian Bawah - Bagian Keempat (Horizontal) -->
                            <!-- Elemen untuk Depreciation Cost, Bank Interest, Area Cost, Electrical Cost, Maintenance Cost, dan Mach. Cost/Hour -->
                            <div class="form-group">
                                <label for="InputDepreciationCost">Depreciation Cost</label>
                                <input type="text" name="depreciation_cost" class="form-control"
                                    id="InputDepreciationCost" placeholder="Input Depreciation Cost"
                                    value="{{ 'Rp. ' . number_format($machine->depreciation_cost, 0, ',', '.') }}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="InputBankInterest">Bank Interest</label>
                                <input type="text" name="bank_interest" class="form-control" id="InputBankInterest"
                                    placeholder="Input Bank Interest" value="{{ 'Rp. ' . number_format($machine->bank_interest, 0, ',', '.') }}" required
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="InputAreaCost">Area Cost</label>
                                <input type="text" name="area_cost" class="form-control" id="InputAreaCost"
                                    placeholder="Input Area Cost" value="{{ 'Rp. ' . number_format($machine->area_cost, 0, ',', '.') }}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="InputElectricalCost">Electrical Cost</label>
                                <input type="text" name="electrical_cost" class="form-control"
                                    id="InputElectricalCost" placeholder="Input Electrical Cost"
                                    value="{{ 'Rp. ' . number_format($machine->electrical_cost, 0, ',', '.') }}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="InputMaintenanceCost">Maintenance Cost</label>
                                <input type="text" name="maintenance_cost" class="form-control"
                                    id="InputMaintenanceCost" placeholder="Input Maintenance Cost"
                                    value="{{ 'Rp. ' . number_format($machine->maintenance_cost, 0, ',', '.') }}" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="InputMachCostPerHour">Mach Cost/Hour</label>
                                <input type="text" name="mach_cost_per_hour" class="form-control"
                                    id="InputMachCostPerHour" placeholder="Input Mach. Cost/Hour"
                                    value="{{ 'Rp. ' . number_format($machine->mach_cost_per_hour, 0, ',', '.') }}" required readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </section>
    </div>
    </div>

    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        updateTitle('View Machine ');
    </script>
@endsection
