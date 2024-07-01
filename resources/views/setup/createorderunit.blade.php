@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Order Unit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.orderunit') }}">Order Unit</a></li>
                            <li class="breadcrumb-item active">Add Order Unit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.storeorderunit') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Order Type Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">ID</label>
                                        <input type="text" name="id_order_unit" class="form-control" id="exampleInputName"
                                            placeholder="Insert Id Order Type" value="{{ $nextId }}" readonly required>
                                        @error('id_order_unit')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div><div class="form-group">
                                        <label for="exampleInputUsername">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputUsername"
                                            placeholder="Insert Code Name" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Code Order</label>
                                        <input type="text" name="code_order" class="form-control" id="exampleInputUsername"
                                            placeholder="Insert Code Order" required>
                                        @error('code_order')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk memeriksa apakah unit dan role telah dipilih
        function validateForm() {
            var unit = document.getElementById('exampleInputUnit').value;
            var role = document.getElementById('exampleInputRole').value;

            if (unit === 'pilihunit' || role === 'pilihrole') {
                alert('Silakan pilih Unit dan Role sebelum menambahkan pengguna!');
                return false; // Mencegah pengiriman formulir
            }

            return true; // Lanjutkan pengiriman formulir jika unit dan role telah dipilih
        }

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Add Order Unit');
    </script>
@endsection
