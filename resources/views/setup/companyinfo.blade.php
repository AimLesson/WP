@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Company Info</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item active">Company Info</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @php
                    // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                    $company_info = \App\Models\CompanyInfo::get();
                @endphp
                @foreach ($company_info as $ci)
                    <a href="{{ route('setup.editcompanyinfo', ['id' => $ci->id]) }}" class="btn btn-warning mb-3">
                        <i class="fas fa-pen"></i> Edit
                    </a>
                    {{-- Content 1 --}}
                    <div class="card card-primary">
                        <div class="row">
                            <!-- Kolom pertama -->
                            <div class="col-md-6">
                                <div class="card-body">
                                    <!-- Input 1 -->
                                    <div class="form-group">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" name="company_name" class="form-control" id="company_name"
                                            placeholder="Insert Company Name" value="{{ $ci->company_name }}" readonly required>
                                        @error('company_name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 2 -->
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address"
                                            placeholder="Insert Address" value="{{ $ci->address }}" readonly required>
                                        @error('address')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 3 -->
                                    <div class="form-group">
                                        <label for="machine_type">Machine Type</label>
                                        <input type="text" name="machine_type" class="form-control" id="machine_type"
                                            placeholder="Insert Machine Type" value="{{ $ci->machines_type }}" readonly required>
                                        @error('machine_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 4 -->
                                    <div class="form-group">
                                        <label for="production_director">Production Director</label>
                                        <input type="text" name="production_director" class="form-control"
                                            id="production_director" placeholder="Insert Production Director"
                                            value="{{ $ci->production_director }}" readonly required>
                                        @error('production_director')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 5 -->
                                    <div class="form-group">
                                        <label for="total_turnover">Total Turnover/Omzet</label>
                                        <input type="text" name="total_turnover" class="form-control" id="total_turnover"
                                            placeholder="Insert Turnover" value="{{ $ci->total_turnover }}" readonly required>
                                        @error('total_turnover')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Kolom kedua -->
                            <div class="col-md-6">
                                <div class="card-body">
                                    <!-- Bagian Atas - Bagian Ketiga (Horizontal) -->
                                    <!-- Elemen untuk gambar -->
                                    <div class="form-group">
                                        <!-- Tambahkan elemen <img> untuk menampilkan preview gambar dari database -->
                                        <img id="imagePreview" src="{{ asset('/storage/lte/dist/img/' . $ci->image) }}"
                                            alt="{{ $ci->image }}" style="max-width: 100%; max-height: 1000px; display: block; margin: 0 auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- Content 2 --}}
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Structure Budget</h3>
                    </div>
                    <div class="row">
                        <!-- Kolom pertama -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <!-- Input 1 -->
                                <div class="form-group">
                                    <label for="total_so">Total Sales Order</label>
                                    <input type="text" name="total_so" class="form-control" id="total_so"
                                        placeholder="Insert Total Sales Order" readonly required>
                                    @error('total_so')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 2 -->
                                <div class="form-group">
                                    <label for="direct_material_cost">Direct Material Cost</label>
                                    <input type="text" name="direct_material_cost" class="form-control" id="direct_material_cost"
                                        placeholder="Insert Direct Material Cost" readonly required>
                                    @error('direct_material_cost')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 3 -->
                                <div class="form-group">
                                    <label for="direct_labor_cost">Direct Labor Cost</label>
                                    <input type="text" name="direct_labor_cost" class="form-control" id="direct_labor_cost"
                                        placeholder="Insert Direct Labor Cost" readonly required>
                                    @error('direct_labor_cost')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 4 -->
                                <div class="form-group">
                                    <label for="direct_machining_cost">Direct Machining Cost</label>
                                    <input type="text" name="direct_machining_cost" class="form-control"
                                        id="direct_machining_cost" placeholder="Insert Direct Machining Cost" readonly required>
                                    @error('direct_machining_cost')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 5 -->
                                <div class="form-group">
                                    <label for="cogs">COGS</label>
                                    <input type="text" name="cogs" class="form-control" id="cogs"
                                        placeholder="Insert COGS" readonly required>
                                    @error('cogs')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 6 -->
                                <div class="form-group">
                                    <label for="gross_profit_margin">Gross Profit Margin</label>
                                    <input type="text" name="gross_profit_margin" class="form-control" id="gross_profit_margin"
                                        placeholder="Insert Turnover" readonly required>
                                    @error('gross_profit_margin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 7 -->
                                <div class="form-group">
                                    <label for="oh_manufacture">OH Manufacture</label>
                                    <input type="text" name="oh_manufacture" class="form-control" id="oh_manufacture"
                                        placeholder="Insert OH Manufacture" readonly required>
                                    @error('oh_manufacture')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 8 -->
                                <div class="form-group">
                                    <label for="gross_profit_margin_af">Gross Profit Margin (after OH Manf.)</label>
                                    <input type="text" name="gross_profit_margin_af" class="form-control"
                                        id="gross_profit_margin_af" placeholder="Insert Gross Profit Margin (after OH Manf.)" readonly
                                        required>
                                    @error('gross_profit_margin_af')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 9 -->
                                <div class="form-group">
                                    <label for="oh_organization">OH Organization</label>
                                    <input type="text" name="oh_organization" class="form-control" id="oh_organization"
                                        placeholder="Insert OH Organization" readonly required>
                                    @error('oh_organization')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 10 -->
                                <div class="form-group">
                                    <label for="net_operating_income">Net Operating Income</label>
                                    <input type="text" name="net_operating_income" class="form-control" id="net_operating_income"
                                        placeholder="Insert Net Operating Income" readonly required>
                                    @error('net_operating_income')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 11 -->
                                <div class="form-group">
                                    <label for="non_operating_income">Non-Operating Income / Costs</label>
                                    <input type="text" name="non_operating_income" class="form-control" id="non_operating_income"
                                        placeholder="Insert Non-Operating Income" readonly required>
                                    @error('non_operating_income')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 12 -->
                                <div class="form-group">
                                    <label for="profit_before_tax">Profit Before Tax</label>
                                    <input type="text" name="profit_before_tax" class="form-control" id="profit_before_tax"
                                        placeholder="Insert Profit Before Tax" readonly required>
                                    @error('profit_before_tax')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Kolom kedua -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <!-- Input 1 -->
                                <div class="form-group">
                                    <label for="smtp">SMTP</label>
                                    <input type="text" name="smtp" class="form-control" id="smtp"
                                        placeholder="Insert SMTP" value="mail.atmi.co.id" readonly required>
                                    @error('smtp')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 2 -->
                                <div class="form-group">
                                    <label for="port">PORT</label>
                                    <input type="text" name="port" class="form-control" id="port"
                                        placeholder="Insert Port" value="587" readonly required>
                                    @error('port')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- Input 3 -->
                                <div class="form-group">
                                    <label for="email_company_info">Email</label>
                                    <input type="email" name="email_company_info" class="form-control" id="email_company_info"
                                        placeholder="Insert Email" value="ais@atmi.co.id" readonly required>
                                    @error('email_company_info')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <script>
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

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Company Info');
    </script>
@endsection
