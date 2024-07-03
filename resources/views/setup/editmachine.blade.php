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
                        <h1 class="m-0">Edit Machine</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.machine') }}">Machine</a></li>
                            <li class="breadcrumb-item active">Edit Machine</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <form action="{{ route('setup.updatemachine', ['id' => $machine->id]) }}" method="POST"
                    enctype="multipart/form-data" onsubmit="return validateForm();">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h3 class="card-title">Machine Edit Form</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Bagian Atas - Bagian Pertama (Horizontal) -->
                                <div class="form-group">
                                    <label>Plan</label>
                                    <select class="form-control select2" name="plant" id="select-plant"
                                        style="width: 100%;">
                                        <option selected="selected" disabled selected>-- Select a Plan --</option>
                                        {{-- @php
                                            // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                            $plan = \App\Models\plan::get();
                                        @endphp --}}
                                        @foreach ($plan as $singlePlan)
                                            <option value="{{ $singlePlan->plan_name }}"
                                                @if ($singlePlan->plan_name == $machine->plant) selected @endif>
                                                {{ $singlePlan->plan_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Elemen ID, Machine, Machine Type, Group, dan Location -->
                                <div class="form-group">
                                    <label for="InputIDMachine">ID</label>
                                    <input type="text" name="id_machine" class="form-control" id="InputIDMachine"
                                        placeholder="Input ID" value="{{ $machine->id_machine }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputMachine">Machine</label>
                                    <input type="text" name="machine_name" class="form-control" id="InputMachine"
                                        placeholder="Input Machine" value="{{ $machine->machine_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputMachineType">Machine Type</label>
                                    <input type="text" name="machine_type" class="form-control" id="InputMachineType"
                                        placeholder="Input Machine Type" value="{{ $machine->machine_type }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputGroup">Group (ID/NAME)</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <select class="form-control select2" name="group_name" id="InputGroupName"
                                                style="width: 100%;" required>
                                                <option selected="selected" disabled>-- Select Group --</option>
                                                <option value="ASSY EL MDC"
                                                    @if ($machine->group_name == 'ASSY EL MDC') selected @endif>ASSY EL MDC</option>
                                                <option value="ASSY MDC"@if ($machine->group_name == 'ASSY MDC') selected @endif>
                                                    ASSY MDC</option>
                                                <option value="ASSY WF"@if ($machine->group_name == 'ASSY WF') selected @endif>
                                                    ASSY WF</option>
                                                <option
                                                    value="BEND CNC WF"@if ($machine->group_name == 'BEND CNC WF') selected @endif>
                                                    BEND CNC WF</option>
                                                <option
                                                    value="BEND MAN WF"@if ($machine->group_name == 'BEND MAN WF') selected @endif>
                                                    BEND MAN WF</option>
                                                <option
                                                    value="BEND PIPE WF"@if ($machine->group_name == 'BEND PIPE WF') selected @endif>
                                                    BEND PIPE WF</option>
                                                <option value="BW CT"@if ($machine->group_name == 'BW CT') selected @endif>BW
                                                    CT</option>
                                                <option value="BW MDC"@if ($machine->group_name == 'BW MDC') selected @endif>BW
                                                    MDC</option>
                                                <option value="BW WAP"@if ($machine->group_name == 'BW WAP') selected @endif>BW
                                                    WAP</option>
                                                <option value="BW WBS"@if ($machine->group_name == 'BW WBS') selected @endif>BW
                                                    WBS</option>
                                                <option value="BW WF"@if ($machine->group_name == 'BW WF') selected @endif>BW
                                                    WF</option>
                                                <option value="CUT WF"@if ($machine->group_name == 'CUT WF') selected @endif>
                                                    CUT WF</option>
                                                <option value="DESIGN"@if ($machine->group_name == 'DESIGN') selected @endif>
                                                    DESIGN</option>
                                                <option
                                                    value="DRILL MDC"@if ($machine->group_name == 'DRILL MDC') selected @endif>
                                                    DRILL MDC</option>
                                                <option
                                                    value="DRILL WAP"@if ($machine->group_name == 'DRILL WAP') selected @endif>
                                                    DRILL WAP</option>
                                                <option
                                                    value="DRILL WBS"@if ($machine->group_name == 'DRILL WBS') selected @endif>
                                                    DRILL WBS</option>
                                                <option value="DRILL WF"@if ($machine->group_name == 'DRILL WF') selected @endif>
                                                    DRILL WF</option>
                                                <option value="EDM WAD"@if ($machine->group_name == 'EDM WAD') selected @endif>
                                                    EDM WAD</option>
                                                <option value="ENG"@if ($machine->group_name == 'ENG') selected @endif>
                                                    ENG</option>
                                                <option value="FTW WF"@if ($machine->group_name == 'FTW WF') selected @endif>
                                                    FTW WF</option>
                                                <option
                                                    value="GR CUT WF"@if ($machine->group_name == 'GR CUT WF') selected @endif>GR
                                                    CUT WF</option>
                                                <option value="HK"@if ($machine->group_name == 'HK') selected @endif>HK
                                                </option>
                                                <option value="HOBB WAD"@if ($machine->group_name == 'HOBB WAD') selected @endif>
                                                    HOBB WAD</option>
                                                <option value="HTM"@if ($machine->group_name == 'HTM') selected @endif>
                                                    HTM</option>
                                                <option value="IT"@if ($machine->group_name == 'IT') selected @endif>IT
                                                </option>
                                                <option value="LOG"@if ($machine->group_name == 'LOG') selected @endif>
                                                    LOG</option>
                                                <option
                                                    value="LW CNC MDC"@if ($machine->group_name == 'LW CNC MDC') selected @endif>LW
                                                    CNC MDC</option>
                                                <option
                                                    value="LW CNC SMK"@if ($machine->group_name == 'LW CNC SMK') selected @endif>LW
                                                    CNC SMK</option>
                                                <option
                                                    value="LW CNC STP"@if ($machine->group_name == 'LW CNC STP') selected @endif>LW
                                                    CNC STP</option>
                                                <option
                                                    value="LW CNC WAD"@if ($machine->group_name == 'LW CNC WAD') selected @endif>LW
                                                    CNC WAD</option>
                                                <option
                                                    value="LW MAN WAD"@if ($machine->group_name == 'LW MAN WAD') selected @endif>LW
                                                    MAN WAD</option>
                                                <option value="LW MANUAL STP"
                                                    @if ($machine->group_name == 'LW MANUAL STP') selected @endif>LW MANUAL STP
                                                </option>
                                                <option value="LW MDC"@if ($machine->group_name == 'LW MDC') selected @endif>LW
                                                    MDC</option>
                                                <option value="LW WAP"@if ($machine->group_name == 'LW WAP') selected @endif>LW
                                                    WAP</option>
                                                <option value="LW WBS"@if ($machine->group_name == 'LW WBS') selected @endif>
                                                    LW WBS</option>
                                                <option
                                                    value="MILL CNC MAHO"@if ($machine->group_name == 'MILL CNC MAHO') selected @endif>
                                                    MILL CNC MAHO</option>
                                                <option
                                                    value="MILL CNC SMK"@if ($machine->group_name == 'MILL CNC SMK') selected @endif>
                                                    MILL CNC SMK</option>
                                                <option
                                                    value="MILL CNC STARRAG"@if ($machine->group_name == 'MILL CNC STARRAG') selected @endif>
                                                    MILL CNC STARRAG</option>
                                                <option
                                                    value="MILL CNC STP"@if ($machine->group_name == 'MILL CNC STP') selected @endif>
                                                    MILL CNC STP</option>
                                                <option
                                                    value="MILL CNC VICTOR"@if ($machine->group_name == 'MILL CNC VICTOR') selected @endif>
                                                    MILL CNC VICTOR</option>
                                                <option
                                                    value="MILL CNC WAD"@if ($machine->group_name == 'MILL CNC WAD') selected @endif>
                                                    MILL CNC WAD</option>
                                                <option
                                                    value="MILL CNC WAP"@if ($machine->group_name == 'MILL CNC WAP') selected @endif>
                                                    MILL CNC WAP</option>
                                                <option
                                                    value="MILL MAN MDC"@if ($machine->group_name == 'MILL MAN MDC') selected @endif>
                                                    MILL MAN MDC</option>
                                                <option
                                                    value="MILL MAN WAP"@if ($machine->group_name == 'MILL MAN WAP') selected @endif>
                                                    MILL MAN WAP</option>
                                                <option
                                                    value="MILL MANUAL STP"@if ($machine->group_name == 'MILL MANUAL STP') selected @endif>
                                                    MILL MANUAL STP</option>
                                                <option
                                                    value="MILL WAP"@if ($machine->group_name == 'MILL WAP') selected @endif>
                                                    MILL WAP</option>
                                                <option
                                                    value="MILL WBS"@if ($machine->group_name == 'MILL WBS') selected @endif>
                                                    MILL WBS</option>
                                                <option
                                                    value="MILL YCM MDC"@if ($machine->group_name == 'MILL YCM MDC') selected @endif>
                                                    MILL YCM MDC</option>
                                                <option
                                                    value="MILLING SMK"@if ($machine->group_name == 'MILLING SMK') selected @endif>
                                                    MILLING SMK</option>
                                                <option value="MN"@if ($machine->group_name == 'MN') selected @endif>
                                                    MN</option>
                                                <option value="MT"@if ($machine->group_name == 'MT') selected @endif>
                                                    MT</option>
                                                <option
                                                    value="PACKING WF"@if ($machine->group_name == 'PACKING WF') selected @endif>
                                                    PACKING WF</option>
                                                <option
                                                    value="PAINTING WF"@if ($machine->group_name == 'PAINTING WF') selected @endif>
                                                    PAINTING WF</option>
                                                <option value="PPIC"@if ($machine->group_name == 'PPIC') selected @endif>
                                                    PPIC</option>
                                                <option
                                                    value="PUN CNC WF"@if ($machine->group_name == 'PUN CNC WF') selected @endif>
                                                    PUN CNC WF</option>
                                                <option
                                                    value="PUN MAN WF"@if ($machine->group_name == 'PUN MAN WF') selected @endif>
                                                    PUN MAN WF</option>
                                                <option value="QC"@if ($machine->group_name == 'QC') selected @endif>
                                                    QC</option>
                                                <option value="ROOL WF"@if ($machine->group_name == 'ROOL WF') selected @endif>
                                                    ROOL WF</option>
                                                <option
                                                    value="SALVAGNINI"@if ($machine->group_name == 'SALVAGNINI') selected @endif>
                                                    SALVAGNINI</option>
                                                <option value="SAW"@if ($machine->group_name == 'SAW') selected @endif>
                                                    SAW</option>
                                                <option
                                                    value="SF GR CT"@if ($machine->group_name == 'SF GR CT') selected @endif>SF
                                                    GR CT</option>
                                                <option
                                                    value="SF GR STP"@if ($machine->group_name == 'SF GR STP') selected @endif>SF
                                                    GR STP</option>
                                                <option
                                                    value="SLOT WAD"@if ($machine->group_name == 'SLOT WAD') selected @endif>
                                                    SLOT WAD</option>
                                                <option
                                                    value="SPOT WELD WF"@if ($machine->group_name == 'SPOT WELD WF') selected @endif>
                                                    SPOT WELD WF</option>
                                                <option value="TC"@if ($machine->group_name == 'TC') selected @endif>
                                                    TC</option>
                                                <option
                                                    value="TL GR CT"@if ($machine->group_name == 'TL GR CT') selected @endif>TL
                                                    GR CT</option>
                                                <option value="TMK"@if ($machine->group_name == 'TMK') selected @endif>
                                                    TMK</option>
                                                <option value="TURNING"@if ($machine->group_name == 'TURNING') selected @endif>
                                                    TURNING</option>
                                                <option
                                                    value="UN GR CT"@if ($machine->group_name == 'UN GR CT') selected @endif>UN
                                                    GR CT</option>
                                                <option
                                                    value="UN GR MDC"@if ($machine->group_name == 'UN GR MDC') selected @endif>UN
                                                    GR MDC</option>
                                                <option
                                                    value="UN GR STP"@if ($machine->group_name == 'UN GR STP') selected @endif>UN
                                                    GR STP</option>
                                                <option
                                                    value="W CUT WAD"@if ($machine->group_name == 'W CUT WAD') selected @endif>W
                                                    CUT WAD</option>
                                                <option
                                                    value="WELD MDC"@if ($machine->group_name == 'WELD MDC') selected @endif>
                                                    WELD MDC</option>
                                                <option
                                                    value="WELD WAP"@if ($machine->group_name == 'WELD WAP') selected @endif>
                                                    WELD WAP</option>
                                                <option value="WELD WF"@if ($machine->group_name == 'WELD WF') selected @endif>
                                                    WELD WF</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="group_id" class="form-control" id="InputGroupID"
                                                placeholder="ID" maxlength="2" value="{{ $machine->group_id }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputLocation">Location</label>
                                    <input type="text" name="location" class="form-control" id="InputLocation"
                                        placeholder="Input Location" value="{{ $machine->location }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Bagian Atas - Bagian Kedua (Horizontal) -->
                                <!-- Elemen Time Start and Finish, Group Seq, Machine Status, dan Process -->
                                <div class="form-group">
                                    <label for="InputTime">Time Start and Finish</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="time" name="start_time" class="form-control"
                                                id="InputStartTime" value="{{ $machine->start_time }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="time" name="end_time" class="form-control" id="InputEndTime"
                                                value="{{ $machine->end_time }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="mach_hour" class="form-control" id="InputHPD"
                                                value="{{ $machine->mach_hour }}" placeholder="hour/day" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputGroupSeq">Group Seq</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="groupseq_id" class="form-control"
                                                id="InputSeqID" placeholder="ID" maxlength="1"
                                                value="{{ $machine->groupseq_id }}" required>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control select2" name="groupseq_name" id="InputSeqName"
                                                style="width: 100%;" required>
                                                <option selected="selected" disabled>-- Select Group Seq --</option>
                                                <option value="SAW;CUT"@if ($machine->groupseq_name == 'SAW;CUT') selected @endif>
                                                    SAW;CUT</option>
                                                <option
                                                    value="PUNC;LW MKN"@if ($machine->groupseq_name == 'PUNC;LW MKN ') selected @endif>
                                                    PUNC; LW MKN;</option>
                                                <option
                                                    value="BEND;MILL MKN"@if ($machine->groupseq_name == 'BEND;MILL MKN') selected @endif>
                                                    BEND;MILL MKN</option>
                                                <option
                                                    value="WELD;GRD;HOB;EDM;SLOT"@if ($machine->groupseq_name == 'WELD;GRD;HOB;EDM;SLOT') selected @endif>
                                                    WELD;GRD;HOB;EDM;SLOT</option>
                                                <option
                                                    value="LW/MILL WF;BW/DRL/HTM"@if ($machine->groupseq_name == 'LW/MILL WF;BW/DRL/HTM') selected @endif>
                                                    LW/MILL WF;BW/DRL/HTM</option>
                                                <option
                                                    value="FTW;HRD;WELD MKN"@if ($machine->groupseq_name == 'FTW;HRD;WELD MKN') selected @endif>
                                                    FTW;HRD;WELD MKN</option>
                                                <option
                                                    value="PAINT;ASS MEK"@if ($machine->groupseq_name == 'PAINT;ASS MEK') selected @endif>
                                                    PAINT;ASS MEK</option>
                                                <option value="ASS WF"@if ($machine->groupseq_name == 'ASS WF') selected @endif>
                                                    ASS WF</option>
                                                <option value="PACK"@if ($machine->groupseq_name == 'PACK') selected @endif>
                                                    PACK</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputMachineStatus">Machine Status</label>
                                    <select class="form-control select2" name="machine_state" id="InputMachineStatus"
                                        style="width: 100%;" required>
                                        <option selected="selected" disabled selected>-- Select a Machine State --</option>
                                        @foreach ($machine_state as $singleState)
                                            <option value="{{ $singleState->state }}"
                                                @if ($singleState->state == $machine->machine_state) selected @endif>
                                                {{ $singleState->state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="InputProcess">Process</label>
                                    <input type="text" name="process" class="form-control" id="InputProcess"
                                        placeholder="Input Process" value="{{ $machine->process }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Bagian Atas - Bagian Ketiga (Horizontal) -->
                                <!-- Elemen untuk gambar -->
                                <div class="form-group">
                                    <label for="InputImage">Upload Image</label>
                                    <input type="file" name="image" class="form-control-file" id="InputImage"
                                        accept="image/*">
                                </div>
                                <!-- Tambahkan elemen <img> untuk menampilkan preview gambar -->
                                <img id="imagePreview" src="{{ asset('/storage/lte/dist/img/' . $machine->image) }}"
                                alt="{{ $machine->image }}"
                                style="max-width: 100%; max-height: 1000px; display: block; margin: 0 auto;">
                                <!-- Menambahkan properti display dan margin -->
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
                                        <input type="text" name="purchase_date"
                                            class="form-control datetimepicker-input" data-target="#purchasedate"
                                            placeholder="Input Selected Date" value="{{$machine->purchase_date}}" />
                                        <div class="input-group-append" data-target="#purchasedate"
                                            data-toggle="purchasedate">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputPurchasePrice">Purchase Price (Rp)</label>
                                    <input type="text" name="purchase_price" class="form-control"
                                        id="InputPurchasePrice" placeholder="Input Purchase Price (Rp)" value="{{$machine->purchase_price}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputDepreciationAge">Depreciation Age</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" name="depreciation_age" class="form-control"
                                                id="InputDepreciationAge" placeholder="Input Depreciation Age" value="{{$machine->depreciation_age}}" required>
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
                                                placeholder="Input Used Age" value="{{$machine->used_age}}" required>
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
                                            <input type="text" name="mach_hour" class="form-control"
                                                id="InputMachHour" placeholder="Input Mach. Hour" value="{{$machine->mach_hour}}" required>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="vertical-center" style="font-size: 20px;">hour/day</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputDaysPerYear">Days per Year</label>
                                    <input type="text" name="days_per_year" class="form-control"
                                        id="InputDaysPerYear" placeholder="Input Days per Year" value="{{$machine->days_per_year}}" required>
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
                                                id="InputBankInterestPercent" placeholder="Input Bank Interest Percent" value="{{$machine->bank_interest_percent}}"
                                                required>
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
                                            <input type="text" name="floor_area" class="form-control"
                                                id="InputFloorArea" placeholder="Input Floor Area" value="{{$machine->floor_area}}" required>
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
                                                id="InputMaintenanceFactor" placeholder="Input Maintenance Factor" value="{{$machine->maintenance_factor}}"
                                                required>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="vertical-center" style="font-size: 20px;">%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputMaintenanceCostYear">Maintenance Cost/Year (Rp)</label>
                                    <input type="text" name="maintenance_cost_year" class="form-control"
                                        id="InputMaintenanceCostYear" placeholder="Input Maintenance Cost/Year" value="{{$machine->maintenance_cost_year}}" required>
                                    <h7 class="nominal">*Nominal</h7>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <!-- Bagian Bawah - Bagian Ketiga (Horizontal) -->
                                <!-- Elemen untuk Floor Price, Power Consumption, Electric Price/kWh, Labor Cost, dan Machine Price -->
                                <div class="form-group">
                                    <label for="InputFloorPrice">Floor Price (Rp/M²/Year)</label>
                                    <input type="text" name="floor_price" class="form-control" id="InputFloorPrice"
                                        placeholder="Input Floor Price" value="{{$machine->floor_price}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputPowerConsumption">Power Consumption</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="text" name="power_consumption" class="form-control"
                                                id="InputPowerConsumption" placeholder="Input Power Consumption" value="{{$machine->power_consumption}}" required>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="vertical-center" style="font-size: 20px;">kW</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputElectricPrice">Electric Price/kWh (Rp)</label>
                                    <input type="text" name="electric_price" class="form-control"
                                        id="InputElectricPrice" placeholder="Input Electric Price/kWh" value="{{$machine-> electric_price}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputLaborCost">Labor Cost (Rp)</label>
                                    <input type="text" name="labor_cost" class="form-control" id="InputLaborCost"
                                        placeholder="Input Labor Cost" value="{{$machine->labor_cost}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputMachinePrice">Machine Price (Rp)</label>
                                    <input type="text" name="machine_price" class="form-control"
                                        id="InputMachinePrice" placeholder="Input Machine Price" value="{{$machine->machine_price}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputTotalMach">Total Mach</label>
                                    <input type="text" name="total_mach" class="form-control"
                                        id="InputTotalMach" placeholder="Input Total Mach" value="{{$machine->total_mach}}" readonly required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <!-- Bagian Bawah - Bagian Keempat (Horizontal) -->
                                <!-- Elemen untuk Depreciation Cost, Bank Interest, Area Cost, Electrical Cost, Maintenance Cost, dan Mach. Cost/Hour -->
                                <div class="form-group">
                                    <label for="InputDepreciationCost">Depreciation Cost</label>
                                    <input type="text" name="depreciation_cost" class="form-control"
                                        id="InputDepreciationCost" placeholder="Input Depreciation Cost" value="{{$machine->depreciation_cost}}" required
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="InputBankInterest">Bank Interest</label>
                                    <input type="text" name="bank_interest" class="form-control"
                                        id="InputBankInterest" placeholder="Input Bank Interest" value="{{$machine->bank_interest}}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="InputAreaCost">Floor Cost</label>
                                    <input type="text" name="area_cost" class="form-control" id="InputAreaCost"
                                        placeholder="Input Area Cost" value="{{$machine->area_cost}}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="InputElectricalCost">Electrical Cost</label>
                                    <input type="text" name="electrical_cost" class="form-control"
                                        id="InputElectricalCost" placeholder="Input Electrical Cost" value="{{$machine->electrical_cost}}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="InputMaintenanceCost">Maintenance Cost</label>
                                    <input type="text" name="maintenance_cost" class="form-control"
                                        id="InputMaintenanceCost" placeholder="Input Maintenance Cost" value="{{$machine->maintenance_cost}}" required readonly>
                                </div>
                                <div class="form-group">
                                    <label for="InputMachCostPerHour">Mach Cost/Hour</label>
                                    <input type="text" name="mach_cost_per_hour" class="form-control"
                                        id="InputMachCostPerHour" placeholder="Input Mach. Cost/Hour" value="{{$machine->mach_cost_per_hour}}" required readonly>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-custom">Edit</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk mengubah judul berdasarkan halaman
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            updateTitle('Edit Machine');

            // Mendapatkan elemen select Plant
            var plantSelect = document.querySelector('.select2');

            // Mendapatkan elemen input ID
            var idMachineInput = document.querySelector('#InputIDMachine');

            // Daftar Plant dan nomor urut terakhir
            var plants = {
                'MDC': 0,
                'SUPPORT': 0,
                'EDU': 0,
                'WF': 0,
                'STP': 0,
                'MA': 0,
                'FNC': 0
            };

            // Mendengarkan perubahan dalam elemen select Plant
            plantSelect.addEventListener('change', function() {
                var selectedPlant = plantSelect.value;

                if (selectedPlant in plants) {
                    plants[selectedPlant]++; // Menambahkan nomor urut
                    var id = selectedPlant + pad(plants[selectedPlant], 3); // Membuat ID
                    idMachineInput.value = id; // Mengatur nilai input ID
                }
            });

            // Fungsi untuk mengisi nomor dengan nol jika kurang dari tiga digit
            function pad(number, length) {
                var str = number.toString();
                while (str.length < length) {
                    str = '0' + str;
                }
                return str;
            }

            // Mendapatkan elemen input gambar
            var imageInput = document.querySelector('#InputImage');

            // Mendapatkan elemen gambar preview
            var imagePreview = document.querySelector('#imagePreview');

            // Mendengarkan perubahan pada input gambar
            imageInput.addEventListener('change', function() {
                if (imageInput.files && imageInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                    };

                    reader.readAsDataURL(imageInput.files[0]);
                }
            });

            // Data group ID dan nama sesuai dengan yang diberikan
            var groupData = {
                '8': 'ASSY EL MDC',
                '1': 'ASSY MDC',
                '45': 'ASSY WF',
                '46': 'BEND CNC WF',
                '47': 'BEND MAN WF',
                '54': 'BEND PIPE WF',
                '88': 'BW CT',
                '2': 'BW MDC',
                '32': 'BW WAP',
                '39': 'BW WBS',
                '48': 'BW WF',
                '49': 'CUT WF',
                '85': 'DESIGN',
                '3': 'DRILL MDC',
                '33': 'DRILL WAP',
                '40': 'DRILL WBS',
                '50': 'DRILL WF',
                '26': 'EDM WAD',
                '9': 'ENG',
                '51': 'FTW WF',
                '52': 'GR CUT WF',
                '10': 'HK',
                '29': 'HOBB WAD',
                '34': 'HTM',
                '16': 'IT',
                '11': 'LOG',
                '65': 'LW CNC MDC',
                '78': 'LW CNC SMK',
                '76': 'LW CNC STP',
                '27': 'LW CNC WAD',
                '64': 'LW MAN WAD',
                '72': 'LW MANUAL STP',
                '7': 'LW MDC',
                '35': 'LW WAP',
                '41': 'LW WBS',
                '84': 'MILL CNC MAHO',
                '79': 'MILL CNC SMK',
                '83': 'MILL CNC STARRAG',
                '77': 'MILL CNC STP',
                '62': 'MILL CNC VICTOR',
                '28': 'MILL CNC WAD',
                '38': 'MILL CNC WAP',
                '5': 'MILL MAN MDC',
                '37': 'MILL MAN WAP',
                '73': 'MILL MANUAL STP',
                '37': 'MILL WAP',
                '42': 'MILL WBS',
                '82': 'MILL YCM MDC',
                '81': 'MILLING SMK',
                '15': 'MN',
                '17': 'MT',
                '56': 'PACKING WF',
                '57': 'PAINTING WF',
                '13': 'PPIC',
                '59': 'PUN CNC WF',
                '58': 'PUN MAN WF',
                '18': 'QC',
                '60': 'ROOL WF',
                '86': 'SALVAGNINI',
                '12': 'SAW',
                '22': 'SF GR CT',
                '75': 'SF GR STP',
                '30': 'SLOT WAD',
                '61': 'SPOT WELD WF',
                '19': 'TC',
                '23': 'TL GR CT',
                '63': 'TMK',
                '80': 'TURNING',
                '24': 'UN GR CT',
                '6': 'UN GR MDC',
                '74': 'UN GR STP',
                '31': 'W CUT WAD',
                '4': 'WELD MDC',
                '43': 'WELD WAP',
                '44': 'WELD WF'
            };

            // Mendapatkan elemen input ID dan Name
            var groupIDInput = document.querySelector('#InputGroupID');
            var groupNameInput = document.querySelector('#InputGroupName');
            var plantSelect = document.querySelector('#select-plant');

            // Mendengarkan perubahan dalam elemen input atau dropdown
            plantSelect.addEventListener('change', updateGroupName);
            groupIDInput.addEventListener('input', updateGroupName);
            groupNameInput.addEventListener('input', updateGroupID);

            function updateGroupName() {
                var selectedID = groupIDInput.value;
                var selectedName = groupData[selectedID];
                if (selectedName) {
                    groupNameInput.value = selectedName;
                } else {
                    groupNameInput.value = '';
                }
            }

            function updateGroupID() {
                var selectedName = groupNameInput.value;
                for (var id in groupData) {
                    if (groupData[id] === selectedName) {
                        groupIDInput.value = id;
                        return; // Menghentikan pencarian setelah menemukan id yang sesuai
                    }
                }
            }

            // Mendapatkan elemen input Time Start, Time Finish, dan Mach. Hour
            var timeStartInput = document.querySelector('#InputStartTime');
            var timeFinishInput = document.querySelector('#InputEndTime');
            var machHourInputHDP = document.querySelector('#InputHPD');
            var machHourInput = document.querySelector('#InputMachHour');

            // Mendengarkan perubahan dalam elemen input Time Start dan Time Finish
            timeStartInput.addEventListener('change', updateMachHour);
            timeFinishInput.addEventListener('change', updateMachHour);

            function updateMachHour() {
                var startTime = timeStartInput.value;
                var finishTime = timeFinishInput.value;

                if (startTime && finishTime) {
                    // Parsing jam mulai dan jam selesai ke objek Date
                    var startDate = new Date('1970-01-01T' + startTime);
                    var finishDate = new Date('1970-01-01T' + finishTime);

                    // Menghitung selisih waktu dalam milidetik
                    var timeDiff = finishDate - startDate;

                    // Menghitung jam
                    var hours = Math.floor(timeDiff / (1000 * 60 * 60));

                    // Mengisi nilai "hour/day" pada input Mach. Hour
                    machHourInputHDP.value = hours + ' hour/day';

                    // // Isi otomatis nilai "Mach.. Hour" menggunakan hasil dari "Mach. Hour"
                    machHourInput.value = hours;
                }
            }

            // Data group ID dan nama sesuai yang diberikan
            var seqData = {
                '1': 'SAW;CUT',
                '2': 'PUNC;LW MKN;',
                '3': 'BEND;MILL MKN',
                '4': 'WELD;GRD;HOB;EDM;SLOT',
                '5': 'LW/MILL WF;BW/DRL/HTM',
                '6': 'FTW;HRD;WELD MKN',
                '7': 'PAINT;ASS MEK',
                '8': 'ASS WF',
                '9': 'PACK',
            };

            // Mendapatkan elemen input ID dan Name
            var seqIDInput = document.querySelector('#InputSeqID');
            var seqNameInput = document.querySelector('#InputSeqName');
            var seqSelect = document.querySelector(
                '#InputSeqName'); // Menambahkan ID yang sesuai dengan elemen InputSeqName

            // Mendengarkan perubahan dalam elemen input atau dropdown
            seqSelect.addEventListener('change', updateSeqID);
            seqIDInput.addEventListener('input', updateSeqName);

            function updateSeqID() {
                var selectedName = seqSelect.value;
                for (var id in seqData) {
                    if (seqData[id] === selectedName) {
                        seqIDInput.value = id;
                        return; // Menghentikan pencarian setelah menemukan id yang sesuai
                    }
                }
            }

            function updateSeqName() {
                var selectedID = seqIDInput.value;
                var selectedName = seqData[selectedID];
                if (selectedName) {
                    seqNameInput.value = selectedName;
                } else {
                    seqNameInput.value = '';
                }
            }

            // Mendapatkan elemen input Used Age
            var usedAgeInput = document.getElementById('InputUsedAge');

            // Mendengarkan perubahan dalam elemen input
            usedAgeInput.addEventListener('input', function() {
                // Menghapus karakter yang bukan angka
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Mendapatkan elemen input "Days per Year"
            var daysPerYearInput = document.querySelector('#InputDaysPerYear');

            // Mendengarkan perubahan dalam elemen input "Days per Year"
            daysPerYearInput.addEventListener('input', function() {
                // Hapus karakter yang bukan angka menggunakan ekspresi reguler
                var numericValue = this.value.replace(/\D/g, '');

                // Setel nilai elemen input menjadi angka yang valid atau nilai default 276
                this.value = numericValue || '276';
            });

            // Menerapkan nilai default saat halaman dimuat
            daysPerYearInput.value = '276';

            // Mendapatkan elemen input "Bank Interest Percent"
            var bankInterestPercentInput = document.querySelector('#InputBankInterestPercent');

            // Mendengarkan perubahan dalam elemen input "Bank Interest Percent"
            bankInterestPercentInput.addEventListener('input', function() {
                // Hapus karakter selain angka dan titik desimal
                this.value = this.value.replace(/[^0-9.]/g, '');

            });

            // Mendapatkan elemen input "Floor Area"
            var floorAreaInput = document.querySelector('#InputFloorArea');

            // Mendengarkan perubahan dalam elemen input "Floor Area"
            floorAreaInput.addEventListener('input', function() {
                // Hapus karakter selain angka
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Mendapatkan elemen input "Bank Interest Percent"
            var maintenanceFactorInput = document.querySelector('#InputMaintenanceFactor');

            // Mendengarkan perubahan dalam elemen input "Bank Interest Percent"
            maintenanceFactorInput.addEventListener('input', function() {
                // Hapus karakter selain angka dan titik desimal
                this.value = this.value.replace(/[^0-9.]/g, '');

            });

            // Menambahkan event listener untuk mengawasi input Maintenance Cost
            document.getElementById('InputMaintenanceCostYear').addEventListener('input', function(e) {
                // Mengambil nilai input
                let inputValue = e.target.value;

                // Menghapus karakter selain angka (menggunakan regular expression)
                inputValue = inputValue.replace(/\D/g, '');

                // Mengubah nilai input ke dalam format rupiah dengan pemisah ribuan
                e.target.value = formatRupiah(inputValue, 'Rp. ');
            });

            // Menambahkan event listener untuk mengawasi input Floor Price
            document.getElementById('InputFloorPrice').addEventListener('input', function(e) {
                // Mengambil nilai input
                let inputValue = e.target.value;

                // Menghapus karakter selain angka (menggunakan regular expression)
                inputValue = inputValue.replace(/\D/g, '');

                // Mengubah nilai input ke dalam format rupiah dengan pemisah ribuan
                e.target.value = formatRupiah(inputValue, 'Rp. ');
            });

            // Mendapatkan elemen input "Power Consumption"
            var powerConsumptionInput = document.querySelector('#InputPowerConsumption');

            // Mendengarkan perubahan dalam elemen input "Floor Area"
            powerConsumptionInput.addEventListener('input', function() {
                // Hapus karakter selain angka
                this.value = this.value.replace(/[^0-9]/g, '');
            });

            // Menambahkan event listener untuk mengawasi input Electric Price
            document.getElementById('InputElectricPrice').addEventListener('input', function(e) {
                // Mengambil nilai input
                let inputValue = e.target.value;

                // Menghapus karakter selain angka (menggunakan regular expression)
                inputValue = inputValue.replace(/\D/g, '');

                // Mengubah nilai input ke dalam format rupiah dengan pemisah ribuan
                e.target.value = formatRupiah(inputValue, 'Rp. ');
            });

            // Menambahkan event listener untuk mengawasi input Labor Cost
            document.getElementById('InputLaborCost').addEventListener('input', function(e) {
                // Mengambil nilai input
                let inputValue = e.target.value;

                // Menghapus karakter selain angka (menggunakan regular expression)
                inputValue = inputValue.replace(/\D/g, '');

                // Mengubah nilai input ke dalam format rupiah dengan pemisah ribuan
                e.target.value = formatRupiah(inputValue, 'Rp. ');
            });

            // Menambahkan event listener untuk mengawasi input Machine Price
            document.getElementById('InputMachinePrice').addEventListener('input', function(e) {
                // Mengambil nilai input
                let inputValue = e.target.value;

                // Menghapus karakter selain angka (menggunakan regular expression)
                inputValue = inputValue.replace(/\D/g, '');

                // Mengubah nilai input ke dalam format rupiah dengan pemisah ribuan
                e.target.value = formatRupiah(inputValue, 'Rp. ');
            });

            var purchasePriceInput = document.getElementById('InputPurchasePrice');
            var depreciationAgeInput = document.getElementById('InputDepreciationAge');
            var depreciationCostInput = document.getElementById('InputDepreciationCost');
            var maintenanceCostInput = document.getElementById('InputMaintenanceCost');
            var maintenanceCostYearInput = document.getElementById('InputMaintenanceCostYear')
            var machCostPerHourInput = document.getElementById('InputMachCostPerHour');
            var totalMachInput = document.getElementById('InputTotalMach');
            var bankInterestInput = document.getElementById('InputBankInterest');
            var areaCostInput = document.getElementById('InputAreaCost');
            var electricalCostInput = document.getElementById('InputElectricalCost');
            var laborCostInput = document.getElementById('InputLaborCost');
            var machTotalInput = document.getElementById('InputTotalMach');

            // Fungsi untuk menghapus semua karakter selain angka
            function extractNumber(value) {
                return value.replace(/\D/g, '');
            }

            // Fungsi untuk mengubah angka ke format mata uang Rupiah
            function formatRupiah(angka) {
                var rupiah = 'Rp. ' + angka.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
                return rupiah;
            }


            // Fungsi untuk menghitung dan memperbarui Depreciation Cost
            // Fungsi untuk menghitung dan memperbarui Depreciation Cost
            function updateDepreciationCost() {
                // Mengambil nilai Purchase Price dan Depreciation Age dalam bentuk angka
                var purchasePrice = parseFloat(extractNumber(purchasePriceInput.value));
                var machHour = parseFloat(extractNumber(machHourInput.value));
                var daysPerYear = parseFloat(extractNumber(daysPerYearInput.value));
                var usedAge = parseFloat(extractNumber(usedAgeInput.value));

                // Periksa apakah nilai yang dimasukkan adalah angka yang valid
                if (!isNaN(purchasePrice) && !isNaN(usedAge) && !isNaN(machHour) && !isNaN(daysPerYear)) {
                    // Hitung Depreciation Cost berdasarkan rumus Depresiasi Garis Lurus
                    var depreciationCost = (((1.5 * purchasePrice) - (0.1 * purchasePrice)) / (usedAge * (
                        machHour * daysPerYear)));
                    // Tampilkan hasil perhitungan pada input Depreciation Cost dalam format Rupiah tanpa desimal .00
                    depreciationCostInput.value = formatRupiah(depreciationCost.toFixed(0));
                    calculateMachCostPerHour();
                } else {
                    // Jika input tidak valid, atur nilai Depreciation Cost menjadi kosong
                    depreciationCostInput.value = '';
                }
            }

            // Event listener untuk input Purchase Price
            purchasePriceInput.addEventListener('input', function(e) {
                // Mengambil nilai input dan membersihkannya dari karakter selain angka
                var inputValue = extractNumber(e.target.value);

                // Ubah nilai input ke dalam format mata uang Rupiah dan kembalikan ke input
                e.target.value = formatRupiah(inputValue);

                // Otomatis perbarui Depreciation Cost
                updateDepreciationCost();
            });

            // Event listener untuk input usedAge
            usedAgeInput.addEventListener('input', function(e) {
                // Menghapus karakter yang bukan angka
                this.value = this.value.replace(/[^0-9]/g, '');

                // Otomatis perbarui Depreciation Cost
                updateDepreciationCost();
            });

            // Event listener untuk input usedAge
            machHourInput.addEventListener('input', function(e) {
                // Menghapus karakter yang bukan angka
                this.value = this.value.replace(/[^0-9]/g, '');

                // Otomatis perbarui Depreciation Cost
                updateDepreciationCost();
            });
            // Inisialisasi Depreciation Cost saat halaman dimuat
            updateDepreciationCost();


            // Fungsi untuk menghitung bank interest
            function calculateBankInterest() {
                // Mengambil nilai Purchase Price, Bank Interest Percent, Mach. Hour, dan Days per Year dalam bentuk angka
                var purchasePrice = parseFloat(extractNumber(purchasePriceInput.value));
                var bankInterestPercent = parseFloat(bankInterestPercentInput.value);
                var machHour = parseFloat(extractNumber(machHourInput.value));
                var daysPerYear = parseFloat(extractNumber(daysPerYearInput.value));

                // Periksa apakah nilai yang dimasukkan adalah angka yang valid
                if (!isNaN(purchasePrice) && !isNaN(bankInterestPercent) && !isNaN(machHour) && !isNaN(
                        daysPerYear) && bankInterestPercent >= 0) {
                    // Hitung bank interest berdasarkan rumus yang diberikan
                    var bankInterest = ((purchasePrice * bankInterestPercent) / (2 * 100 * (machHour *
                        daysPerYear)));

                    // Tampilkan hasil perhitungan pada input Bank Interest dalam format Rupiah tanpa desimal .00
                    document.getElementById('InputBankInterest').value = formatRupiah(bankInterest.toFixed(0));

                    calculateMachCostPerHour();
                } else {
                    // Jika input tidak valid, atur nilai Bank Interest menjadi kosong
                    document.getElementById('InputBankInterest').value = '';
                }
            }

            // Event listener untuk input Bank Interest Percent
            bankInterestPercentInput.addEventListener('input', function(e) {
                // Menghapus karakter selain angka dan titik desimal
                this.value = this.value.replace(/[^0-9.]/g, '');

                // Otomatis perbarui perhitungan Bank Interest
                calculateBankInterest();
            });
            // Inisialisasi perhitungan Bank Interest saat halaman dimuat
            calculateBankInterest();

            // Fungsi untuk menghitung area cost
            function calculateAreaCost() {
                // Mengambil nilai Floor Area, Floor Price, Mach. Hour, dan Days per Year dalam bentuk angka
                var floorArea = parseFloat(extractNumber(floorAreaInput.value));
                var floorPrice = parseFloat(extractNumber(document.getElementById('InputFloorPrice')
                    .value));
                var machHour = parseFloat(extractNumber(machHourInput.value));
                var daysPerYear = parseFloat(extractNumber(daysPerYearInput.value));

                // Periksa apakah nilai yang dimasukkan adalah angka yang valid
                if (!isNaN(floorArea) && !isNaN(floorPrice) && !isNaN(machHour) && !isNaN(daysPerYear) &&
                    floorArea >= 0 && floorPrice >= 0) {
                    // Hitung area cost berdasarkan rumus yang diberikan
                    var areaCost = (floorArea * floorPrice) / (machHour * daysPerYear);

                    // Tampilkan hasil perhitungan pada input Area Cost dalam format Rupiah tanpa desimal .00
                    document.getElementById('InputAreaCost').value = formatRupiah(areaCost.toFixed(0));

                    calculateMachCostPerHour();
                } else {
                    // Jika input tidak valid, atur nilai Area Cost menjadi kosong
                    document.getElementById('InputAreaCost').value = '';
                }
            }

            // Event listener untuk input Floor Area
            floorAreaInput.addEventListener('input', function() {
                // Menghapus karakter selain angka
                this.value = this.value.replace(/[^0-9]/g, '');

                // Otomatis perbarui perhitungan Area Cost
                calculateAreaCost();
            });

            // Event listener untuk input Floor Price
            document.getElementById('InputFloorPrice').addEventListener('input', function(e) {
                // Mengambil nilai input dan membersihkannya dari karakter selain angka
                var inputValue = extractNumber(e.target.value);

                // Ubah nilai input ke dalam format mata uang Rupiah dan kembalikan ke input
                e.target.value = formatRupiah(inputValue);

                // Otomatis perbarui perhitungan Area Cost
                calculateAreaCost();
            });
            // Inisialisasi perhitungan Area Cost saat halaman dimuat
            calculateAreaCost();


            // Fungsi untuk menghitung electrical cost
            function calculateElectricalCost() {
                // Mengambil nilai Power Consumption dan Electric Price dalam bentuk angka
                var powerConsumption = parseFloat(extractNumber(powerConsumptionInput.value));
                var electricPrice = parseFloat(extractNumber(document.getElementById('InputElectricPrice')
                    .value));

                // Periksa apakah nilai yang dimasukkan adalah angka yang valid
                if (!isNaN(powerConsumption) && !isNaN(electricPrice) && powerConsumption >= 0 &&
                    electricPrice >=
                    0) {
                    // Hitung electrical cost berdasarkan rumus yang diberikan
                    var electricalCost = powerConsumption * electricPrice;

                    // Tampilkan hasil perhitungan pada input Electrical Cost dalam format Rupiah tanpa desimal .00
                    document.getElementById('InputElectricalCost').value = formatRupiah(electricalCost
                        .toFixed(0));

                    calculateMachCostPerHour();
                } else {
                    // Jika input tidak valid, atur nilai Electrical Cost menjadi kosong
                    document.getElementById('InputElectricalCost').value = '';
                }
            }

            // Event listener untuk input Power Consumption
            powerConsumptionInput.addEventListener('input', function() {
                // Menghapus karakter selain angka
                this.value = this.value.replace(/[^0-9]/g, '');

                // Otomatis perbarui perhitungan Electrical Cost
                calculateElectricalCost();
            });

            // Event listener untuk input Electric Price
            document.getElementById('InputElectricPrice').addEventListener('input', function(e) {
                // Mengambil nilai input dan membersihkannya dari karakter selain angka
                var inputValue = extractNumber(e.target.value);

                // Ubah nilai input ke dalam format mata uang Rupiah dan kembalikan ke input
                e.target.value = formatRupiah(inputValue);

                // Otomatis perbarui perhitungan Electrical Cost
                calculateElectricalCost();
            });
            // Inisialisasi perhitungan Electrical Cost saat halaman dimuat
            calculateElectricalCost();

            // Fungsi untuk menghitung maintenance cost
            function calculateMaintenanceCost() {
                // Mengambil nilai Maintenance Factor, Purchase Price, Mach. Hour, dan Days per Year dalam bentuk angka
                var maintenanceFactor = parseFloat(extractNumber(document.getElementById('InputMaintenanceFactor')
                    .value));
                var purchasePrice = parseFloat(extractNumber(purchasePriceInput.value));
                var machHour = parseFloat(extractNumber(machHourInput.value));
                var daysPerYear = parseFloat(extractNumber(daysPerYearInput.value));

                // Periksa apakah nilai yang dimasukkan adalah angka yang valid
                if (!isNaN(maintenanceFactor) && !isNaN(purchasePrice) && !isNaN(machHour) && !isNaN(
                        daysPerYear) && maintenanceFactor >= 0) {
                    // Hitung maintenance cost berdasarkan rumus yang diberikan
                    var maintenanceCost = (maintenanceFactor * purchasePrice) / (100 * (machHour *
                        daysPerYear));

                    // Tampilkan hasil perhitungan pada input Maintenance Cost dalam format Rupiah tanpa desimal .00
                    document.getElementById('InputMaintenanceCost').value = formatRupiah(maintenanceCost.toFixed(
                        0));

                    calculateMachCostPerHour();
                } else {
                    // Jika input tidak valid, atur nilai Maintenance Cost menjadi kosong
                    document.getElementById('InputMaintenanceCost').value = '';
                }
            }


            // Event listener untuk input Maintenance Factor
            document.getElementById('InputMaintenanceFactor').addEventListener('input', function(e) {
                // Menghapus karakter selain angka dan titik desimal
                this.value = this.value.replace(/[^0-9.]/g, '');


                // Otomatis perbarui perhitungan Maintenance Cost
                calculateMaintenanceCost();
            });

            // Inisialisasi perhitungan Maintenance Cost saat halaman dimuat
            calculateMaintenanceCost();

            function calculateMachCostPerHour() {
                var depreciationCost = parseFloat(extractNumber(depreciationCostInput.value));
                var bankInterest = parseFloat(extractNumber(bankInterestInput.value));
                var areaCost = parseFloat(extractNumber(areaCostInput.value));
                var electricalCost = parseFloat(extractNumber(electricalCostInput.value));
                var maintenanceCost = parseFloat(extractNumber(maintenanceCostInput.value));

                // Periksa apakah semua nilai yang diperlukan adalah angka yang valid
                if (!isNaN(depreciationCost) && !isNaN(bankInterest) && !isNaN(areaCost) && !isNaN(
                        electricalCost) && !isNaN(maintenanceCost)) {
                    // Hitung machCostPerHour sesuai dengan rumus yang diberikan
                    var machCostPerHour = depreciationCost + bankInterest + areaCost + electricalCost +
                        maintenanceCost;

                    // Tampilkan hasil perhitungan pada input Mach. Cost per Hour dalam format Rupiah tanpa desimal .00
                    machCostPerHourInput.value = formatRupiah(machCostPerHour.toFixed(0));

                } else {
                    // Jika input tidak valid, atur nilai Mach. Cost per Hour menjadi kosong
                    machCostPerHourInput.value = '';
                }
            }

            function calculateMachTotal() {
                var depreciationCost = parseFloat(extractNumber(depreciationCostInput.value));
                var bankInterest = parseFloat(extractNumber(bankInterestInput.value));
                var areaCost = parseFloat(extractNumber(areaCostInput.value));
                var electricalCost = parseFloat(extractNumber(electricalCostInput.value));
                var maintenanceCost = parseFloat(extractNumber(maintenanceCostInput.value));
                var laborCost = parseFloat(extractNumber(laborCostInput.value));

                // Periksa apakah semua nilai yang diperlukan adalah angka yang valid
                if (!isNaN(depreciationCost) && !isNaN(bankInterest) && !isNaN(areaCost) && !isNaN(
                        electricalCost) && !isNaN(maintenanceCost) && !isNaN(laborCost)) {
                    // Hitung machCostPerHour sesuai dengan rumus yang diberikan
                    var machTotal = depreciationCost + bankInterest + areaCost + electricalCost +
                        maintenanceCost + laborCost;

                    // Tampilkan hasil perhitungan pada input Mach. Cost per Hour dalam format Rupiah tanpa desimal .00
                    machTotalInput.value = formatRupiah(machTotal.toFixed(0));

                } else {
                    // Jika input tidak valid, atur nilai Mach. Cost per Hour menjadi kosong
                    machTotalInput.value = '';
                }
            }

            // Event listener untuk semua input yang diperlukan
            depreciationCostInput.addEventListener('input', calculateMachCostPerHour,calculateMachTotal);
            bankInterestInput.addEventListener('input', calculateMachCostPerHour,calculateMachTotal);
            areaCostInput.addEventListener('input', calculateMachCostPerHour,calculateMachTotal);
            electricalCostInput.addEventListener('input', calculateMachCostPerHour,calculateMachTotal);
            maintenanceCostInput.addEventListener('input', calculateMachCostPerHour,calculateMachTotal);
            laborCostInput.addEventListener('input',calculateMachTotal)


            // Inisialisasi perhitungan Mach Cost per Hour saat halaman dimuat
            calculateMachCostPerHour();
            calculateMachTotal();
        });
    </script>
@endsection
