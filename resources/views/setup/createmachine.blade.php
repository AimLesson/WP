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
                        <h1 class="m-0">Add Machine</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.machine') }}">Machine</a></li>
                            <li class="breadcrumb-item active">Add Machine</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.storemachine') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Machine Form</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Bagian Atas - Bagian Pertama (Horizontal) -->
                                            <div class="form-group">
                                                <label>Plant</label>
                                                <select class="form-control select2" name="plant" id="select-plant"
                                                    style="width: 100%;">
                                                    <option selected="selected" disabled selected>-- Select a Plant --
                                                    </option>
                                                    @php
                                                        // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                                        $plan = \App\Models\plan::get();
                                                    @endphp
                                                    @foreach ($plan as $singlePlan)
                                                        <option value="{{ $singlePlan->plan_name }}">
                                                            {{ $singlePlan->plan_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- Elemen ID, Machine, Machine Type, Group, dan Location -->
                                            <div class="form-group">
                                                <label for="InputIDMachine">ID</label>
                                                <input type="text" name="id_machine" class="form-control"
                                                    id="InputIDMachine" placeholder="Input ID" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputMachine">Machine</label>
                                                <input type="text" name="machine_name" class="form-control"
                                                    id="InputMachine" placeholder="Input Machine" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputMachineType">Machine Type</label>
                                                <input type="text" name="machine_type" class="form-control"
                                                    id="InputMachineType" placeholder="Input Machine Type" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputGroup">Group (ID/NAME)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <select class="form-control select2" name="group_name"
                                                            id="InputGroupName" style="width: 100%;" required>
                                                            <option selected="selected" disabled>-- Select Group --</option>
                                                            @foreach ($planJoin as $singlePlan)
                                                                <option data-plan="{{ $singlePlan->plan_name }}"
                                                                    value="{{ $singlePlan->group }}">
                                                                    {{ $singlePlan->group }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" name="group_id" class="form-control"
                                                            id="InputGroupID" placeholder="ID" maxlength="2" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputLocation">Location</label>
                                                <input type="text" name="location" class="form-control"
                                                    id="InputLocation" placeholder="Input Location" required>
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
                                                            id="InputStartTime" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="time" name="end_time" class="form-control"
                                                            id="InputEndTime" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" name="mach_hour" class="form-control"
                                                            id="InputHPD" placeholder="hour/day" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputGroupSeq">Group Seq</label>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input type="text" name="groupseq_id" class="form-control"
                                                            id="InputSeqID" placeholder="ID" maxlength="1" required>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control select2" name="groupseq_name"
                                                            id="InputSeqName" style="width: 100%;" required>
                                                            <option selected="selected" disabled>-- Select Group Seq --
                                                            </option>
                                                            <option value="SAW;CUT">SAW;CUT</option>
                                                            <option value="PUNC;LW MKN;">PUNC; LW MKN;</option>
                                                            <option value="BEND;MILL MKN">BEND;MILL MKN</option>
                                                            <option value="WELD;GRD;HOB;EDM;SLOT">WELD;GRD;HOB;EDM;SLOT
                                                            </option>
                                                            <option value="LW/MILL WF;BW/DRL/HTM">LW/MILL WF;BW/DRL/HTM
                                                            </option>
                                                            <option value="FTW;HRD;WELD MKN">FTW;HRD;WELD MKN</option>
                                                            <option value="PAINT;ASS MEK">PAINT;ASS MEK</option>
                                                            <option value="ASS WF">ASS WF</option>
                                                            <option value="PACK">PACK</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputMachineStatus">Machine Status</label>
                                                <select class="form-control select2" name="machine_state"
                                                    id="InputMachineStatus" style="width: 100%;" required>
                                                    <option selected="selected" disabled selected>-- Select a Machine State
                                                        --
                                                    </option>
                                                    @php
                                                        // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                                        $machine_state = \App\Models\machinestate::get();
                                                    @endphp
                                                    @foreach ($machine_state as $singleState)
                                                        <option value="{{ $singleState->state }}">
                                                            {{ $singleState->state }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputProcess">Process</label>
                                                <input type="text" name="process" class="form-control"
                                                    id="InputProcess" placeholder="Input Process" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <!-- Bagian Atas - Bagian Ketiga (Horizontal) -->
                                            <!-- Elemen untuk gambar -->
                                            <div class="form-group">
                                                <label for="InputImage">Upload Image</label>
                                                <input type="file" name="image" class="form-control-file"
                                                    id="InputImage" accept="image/*">
                                            </div>
                                            <!-- Tambahkan elemen <img> untuk menampilkan preview gambar -->
                                            <img id="imagePreview" src="#" alt=""
                                                style="max-width: 100%; max-height: 200px; display: block; margin: 0 auto;">
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
                                                <div class="input-group date" id="purchasedate"
                                                    data-target-input="nearest">
                                                    <input type="text" name="purchase_date"
                                                        class="form-control datetimepicker-input"
                                                        data-target="#purchasedate" placeholder="Input Selected Date" />
                                                    <div class="input-group-append" data-target="#purchasedate"
                                                        data-toggle="purchasedate">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputPurchasePrice">Purchase Price (Rp)</label>
                                                <input type="text" name="purchase_price" class="form-control"
                                                    id="InputPurchasePrice" placeholder="Input Purchase Price (Rp)"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputDepreciationAge">Depreciation Age</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="depreciation_age"
                                                            class="form-control" id="InputDepreciationAge"
                                                            placeholder="Input Depreciation Age" required>
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
                                                        <input type="text" name="used_age" class="form-control"
                                                            id="InputUsedAge" placeholder="Input Used Age" required>
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
                                                            id="InputMachHour" placeholder="Input Mach. Hour" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="vertical-center" style="font-size: 20px;">hour/day
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputDaysPerYear">Days per Year</label>
                                                <input type="text" name="days_per_year" class="form-control"
                                                    id="InputDaysPerYear" placeholder="Input Days per Year" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <!-- Bagian Bawah - Bagian Kedua (Horizontal) -->
                                            <!-- Elemen untuk Bank Interest Percent, Floor Area, Maintenance Factor, dan Maintenance Cost/Year -->
                                            <div class="form-group">
                                                <label for="InputBankInterestPercent">Bank Interest Percent</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="bank_interest_percent"
                                                            class="form-control" id="InputBankInterestPercent"
                                                            placeholder="Input Bank Interest Percent" required>
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
                                                            id="InputFloorArea" placeholder="Input Floor Area" required>
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
                                                        <input type="text" name="maintenance_factor"
                                                            class="form-control" id="InputMaintenanceFactor"
                                                            placeholder="Input Maintenance Factor" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="vertical-center" style="font-size: 20px;">%</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputMaintenanceCostYear">Maintenance Cost/Year (Rp)</label>
                                                <input type="text" name="maintenance_cost_year" class="form-control"
                                                    id="InputMaintenanceCostYear"
                                                    placeholder="Input Maintenance Cost/Year" readonly required>
                                                <h7 class="nominal">*Nominal</h7>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <!-- Bagian Bawah - Bagian Ketiga (Horizontal) -->
                                            <!-- Elemen untuk Floor Price, Power Consumption, Electric Price/kWh, Labor Cost, dan Machine Price -->
                                            <div class="form-group">
                                                <label for="InputFloorPrice">Floor Price (Rp/M²/Year)</label>
                                                <input type="text" name="floor_price" class="form-control"
                                                    id="InputFloorPrice" placeholder="Input Floor Price" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputPowerConsumption">Power Consumption</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="power_consumption"
                                                            class="form-control" id="InputPowerConsumption"
                                                            placeholder="Input Power Consumption" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="vertical-center" style="font-size: 20px;">kW</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputElectricPrice">Electric Price/kWh (Rp)</label>
                                                <input type="text" name="electric_price" class="form-control"
                                                    id="InputElectricPrice" placeholder="Input Electric Price/kWh"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputLaborCost">Labor Cost (Rp)</label>
                                                <input type="text" name="labor_cost" class="form-control"
                                                    id="InputLaborCost" placeholder="Input Labor Cost" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputMachinePrice">Machine Price (Rp)</label>
                                                <input type="text" name="machine_price" class="form-control"
                                                    id="InputMachinePrice" placeholder="Input Machine Price" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputTotalMach">Total Mach</label>
                                                <input type="text" name="total_mach" class="form-control"
                                                    id="InputTotalMach" placeholder="Input Total Mach" readonly required>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <!-- Bagian Bawah - Bagian Keempat (Horizontal) -->
                                            <!-- Elemen untuk Depreciation Cost, Bank Interest, Area Cost, Electrical Cost, Maintenance Cost, dan Mach. Cost/Hour -->
                                            <div class="form-group">
                                                <label for="InputDepreciationCost">Depreciation Cost</label>
                                                <input type="text" name="depreciation_cost" class="form-control"
                                                    id="InputDepreciationCost" placeholder="Input Depreciation Cost"
                                                    required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputBankInterest">Bank Interest</label>
                                                <input type="text" name="bank_interest" class="form-control"
                                                    id="InputBankInterest" placeholder="Input Bank Interest" required
                                                    readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputAreaCost">Floor Cost</label>
                                                <input type="text" name="area_cost" class="form-control"
                                                    id="InputAreaCost" placeholder="Input Floor Cost" required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputElectricalCost">Electrical Cost</label>
                                                <input type="text" name="electrical_cost" class="form-control"
                                                    id="InputElectricalCost" placeholder="Input Electrical Cost" required
                                                    readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputMaintenanceCost">Maintenance Cost</label>
                                                <input type="text" name="maintenance_cost" class="form-control"
                                                    id="InputMaintenanceCost" placeholder="Input Maintenance Cost"
                                                    required readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputMachCostPerHour">Mach Cost/Hour</label>
                                                <input type="text" name="mach_cost_per_hour" class="form-control"
                                                    id="InputMachCostPerHour" placeholder="Input Mach. Cost/Hour" required
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-custom">Add</button>
                                </div>
                            </div>
                        </div>
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

            updateTitle('Add Machine');

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


            // // // Mendapatkan elemen input ID dan Name
            // // var groupIDInput = document.querySelector('#InputGroupID');
            // // var groupNameInput = document.querySelector('#InputGroupName');
            // // var plantSelect = document.querySelector('#select-plant');

            // // // Mendengarkan perubahan dalam elemen input atau dropdown
            // // plantSelect.addEventListener('change', updateGroupName);
            // // groupIDInput.addEventListener('input', updateGroupName);
            // // groupNameInput.addEventListener('input', updateGroupID);

            // // function updateGroupName() {
            // //     var selectedID = groupIDInput.value;
            // //     var selectedName = groupData[selectedID];
            // //     if (selectedName) {
            // //         groupNameInput.value = selectedName;
            // //     } else {
            // //         groupNameInput.value = '';
            // //     }
            // // }

            // function updateGroupID() {
            //     var selectedName = groupNameInput.value;
            //     for (var id in groupData) {
            //         if (groupData[id] === selectedName) {
            //             groupIDInput.value = id;
            //             return; // Menghentikan pencarian setelah menemukan id yang sesuai
            //         }
            //     }
            // }

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
            function updateDepreciationCost() {
                // Mengambil nilai Purchase Price dan Depreciation Age dalam bentuk angka
                var purchasePrice = parseFloat(extractNumber(purchasePriceInput.value));
                var machHour = parseFloat(extractNumber(machHourInput.value));
                var daysPerYear = parseFloat(extractNumber(daysPerYearInput.value));
                var usedAge = parseFloat(extractNumber(usedAgeInput.value));

                // Periksa apakah nilai yang dimasukkan adalah angka yang valid
                if (!isNaN(purchasePrice) && !isNaN(usedAge) && !isNaN(machHour) && !isNaN(daysPerYear)) {
                    // Hitung Depreciation Cost berdasarkan rumus Depresiasi Garis Lurus
                    // var depreciationCost = (((1.5 * purchasePrice) - (0.1 * purchasePrice)) / (usedAge * (
                    //     machHour * daysPerYear)));

                    var depreciationCost = (purchasePrice / (usedAge * (machHour * daysPerYear)))
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
                    var bankInterest = ((purchasePrice * bankInterestPercent) / (2 * (machHour * daysPerYear)));

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
                    var maintenanceCost = ((maintenanceFactor / 100) * purchasePrice) / (machHour * daysPerYear);

                    // Tampilkan hasil perhitungan pada input Maintenance Cost dalam format Rupiah tanpa desimal .00
                    document.getElementById('InputMaintenanceCost').value = formatRupiah(maintenanceCost.toFixed(
                        0));

                    calculateMachCostPerHour();
                } else {
                    // Jika input tidak valid, atur nilai Maintenance Cost menjadi kosong
                    document.getElementById('InputMaintenanceCost').value = '';
                }
            }

            // Fungsi untuk menghitung maintenance cost year
            function calculateMaintenanceCostYear() {
                // Mengambil nilai Maintenance Factor, Purchase Price,  dalam bentuk angka
                var maintenanceFactor = parseFloat(extractNumber(document.getElementById('InputMaintenanceFactor')
                    .value));
                var purchasePrice = parseFloat(extractNumber(purchasePriceInput.value));

                // Periksa apakah nilai yang dimasukkan adalah angka yang valid
                if (!isNaN(maintenanceFactor) && !isNaN(purchasePrice) && maintenanceFactor >= 0) {
                    // Hitung maintenance cost berdasarkan rumus yang diberikan
                    var maintenanceCostYear = (purchasePrice * (maintenanceFactor / 100));

                    // Tampilkan hasil perhitungan pada input Maintenance Cost dalam format Rupiah tanpa desimal .00
                    document.getElementById('InputMaintenanceCostYear').value = formatRupiah(maintenanceCostYear
                        .toFixed(
                            0));

                    calculateMachCostPerHour();
                } else {
                    // Jika input tidak valid, atur nilai Maintenance Cost menjadi kosong
                    document.getElementById('InputMaintenanceCostYear').value = '';
                }
            }


            // Event listener untuk input Maintenance Factor
            document.getElementById('InputMaintenanceFactor').addEventListener('input', function(e) {
                // Menghapus karakter selain angka dan titik desimal
                this.value = this.value.replace(/[^0-9.]/g, '');


                // Otomatis perbarui perhitungan Maintenance Cost
                calculateMaintenanceCost();
                calculateMaintenanceCostYear();
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
            depreciationCostInput.addEventListener('input', calculateMachCostPerHour, calculateMachTotal);
            bankInterestInput.addEventListener('input', calculateMachCostPerHour, calculateMachTotal);
            areaCostInput.addEventListener('input', calculateMachCostPerHour, calculateMachTotal);
            electricalCostInput.addEventListener('input', calculateMachCostPerHour, calculateMachTotal);
            maintenanceCostInput.addEventListener('input', calculateMachCostPerHour, calculateMachTotal);
            laborCostInput.addEventListener('input', calculateMachTotal)


            // Inisialisasi perhitungan Mach Cost per Hour saat halaman dimuat
            calculateMachCostPerHour();
            calculateMachTotal();
        });
    </script>
    <!-- Tambahkan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Fungsi untuk mengatur nilai input "group_id" berdasarkan pilihan "group_name"
        function setGroupId() {
            var selectedGroup = $('#InputGroupName').val();

            // Lakukan pencarian nilai "group_id" berdasarkan "group_name" dalam data planJoin
            var matchingPlan = {!! json_encode($planJoin) !!}.find(plan => plan.group === selectedGroup);

            // Jika ditemukan, set nilai "group_id" sesuai dengan data yang cocok
            if (matchingPlan) {
                $('#InputGroupID').val(matchingPlan.group_id);
            } else {
                // Jika tidak ditemukan, kosongkan nilai "group_id"
                $('#InputGroupID').val('');
            }
        }

        // Event listener untuk perubahan pada dropdown "group_name"
        $('#InputGroupName').on('change', function() {
            setGroupId();
        });

        // Event listener untuk perubahan pada input "group_id"
        $('#InputGroupID').on('input', function() {
            var inputGroupId = $(this).val();

            // Lakukan pencarian nilai "group_name" berdasarkan "group_id" dalam data planJoin
            var matchingPlan = {!! json_encode($planJoin) !!}.find(plan => plan.group_id === inputGroupId);

            // Jika ditemukan, set nilai "group_name" sesuai dengan data yang cocok
            if (matchingPlan) {
                $('#InputGroupName').val(matchingPlan.group).trigger('change');
            } else {
                // Jika tidak ditemukan, kosongkan nilai "group_name"
                $('#InputGroupName').val('').trigger('change');
            }
        });

        // Panggil fungsi saat halaman dimuat untuk menetapkan nilai awal
        $(document).ready(function() {
            setGroupId();
        });
    </script>

    <script>
        // Menggunakan jQuery untuk menangani perubahan pada dropdown "Plan"
        $('#select-plant').change(function() {
            // Mengambil nilai yang dipilih dari dropdown "Plan"
            var selectedPlan = $(this).val();

            // Menyaring opsi pada dropdown "Group" berdasarkan "Plan" yang dipilih
            $('#InputGroupName option').each(function() {
                if ($(this).data('plan') == selectedPlan || selectedPlan == "") {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });

            // Mereset nilai dropdown "Group" ke opsi pertama
            $('#InputGroupName').val('').trigger('change');
        });

        // Menggunakan Select2 untuk memberikan fungsionalitas dropdown yang lebih baik
        $('.select2').select2();
    </script>

    <script>
        // Listen for changes in the Purchase Price input
        document.getElementById('InputPurchasePrice').addEventListener('input', function() {
            // Get the value of the Purchase Price input
            var purchasePrice = this.value;
            // Set the value of the Machine Price input to be the same as the Purchase Price
            document.getElementById('InputMachinePrice').value = purchasePrice;
        });
    </script>
@endsection
