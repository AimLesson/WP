@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit SO Target</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.sotarget') }}">SO Target</a></li>
                            <li class="breadcrumb-item active">Edit SO Target</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.updatesotarget',['id' => $sotarget->id])  }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit SO Target Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="customer">Customer</label>
                                        <select name="customer" class="form-control select2" id="select-plant" style="width: 100%;">
                                            <option selected="selected" disabled selected>-- Select a Customer --</option>
                                            @php
                                                // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                                $customer = \App\Models\customer::get();
                                            @endphp
                                            @foreach ($customer as $c)
                                                <option value="{{ $c->name }}" @if ($c->name == $sotarget->customer) selected @endif>{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('customer')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_type">Product Type</label>
                                        <select name="product_type" class="form-control" id="product_type" required>
                                            <option value="select" disabled selected>--> Chose Product Type <-- </option>
                                            <option value="WF Standart Produk" @if ($sotarget->product_type == 'WF Standart Produk') selected @endif>WF Standart Produk</option>
                                            <option value="WF Customized Produk" @if ($sotarget->product_type == 'WF Customized Produk') selected @endif>WF Customized Produk</option>
                                        </select>
                                        @error('product_type')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="total_order">Total Order</label>
                                        <input type="text" name="total_order" class="form-control" id="total_order"
                                            placeholder="Insert Total Order" value="{{$sotarget->total_order}}" required>
                                        @error('total_order')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nominal_value">Nominal Value</label>
                                        <input type="text" name="nominal_value" class="form-control" id="nominal_value"
                                            placeholder="Insert Nominal Value" value="{{$sotarget->nominal_value}}" required>
                                        @error('nominal_value')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <div class="input-group date" id="year" data-target-input="nearest">
                                            <input type="text" name="year" class="form-control datetimepicker-input"
                                                data-target="#purchasedate" placeholder="Input Selected Date" value="{{$sotarget->year}}" />
                                            <div class="input-group-append" data-target="#year"
                                                data-toggle="year">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Edit SO Target</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- Letakkan skrip JavaScript di bagian bawah halaman atau sebelum tag </body> -->


    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Mendapatkan elemen input KBLI Code
        var soinput = document.getElementById('total_order', 'nominal_value', 'year',);

        // Mendengarkan perubahan dalam elemen input
        soinput.addEventListener('input', function() {
            // Menghapus karakter yang bukan angka
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Menambahkan event listener untuk input nilai_nominal
        document.getElementById("nominal_value").addEventListener("input", function(e) {
            // Mengambil nilai input
            let nilaiInput = e.target.value;

            // Menghapus karakter selain angka
            nilaiInput = nilaiInput.replace(/\D/g, '');

            // Mengatur format rupiah
            if (nilaiInput.length > 0) {
                nilaiInput = "Rp " + parseFloat(nilaiInput).toLocaleString("id-ID");
            }

            // Memasukkan nilai yang telah diformat ke dalam input
            e.target.value = nilaiInput;
        });

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Edit SO Target');
    </script>
@endsection
