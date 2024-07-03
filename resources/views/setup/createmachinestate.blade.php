@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Machine State</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.ordermachine') }}">Machine State</a></li>
                            <li class="breadcrumb-item active">Add Machine State Form</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.storemachinestate') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Machine State</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">Code</label>
                                        <input type="text" name="code" class="form-control" id="exampleInputName"
                                            placeholder="Insert Code" value="{{ $nextId }}" readonly required>
                                        @error('code')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">State</label>
                                        <input type="text" name="state" class="form-control" id="exampleInputUsername"
                                            placeholder="Insert State" required>
                                        @error('state')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Info</label>
                                        <input type="text" name="info" class="form-control" id="exampleInputUsername"
                                            placeholder="Insert Info">
                                        @error('info')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
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
        updateTitle('Add Machine State');
    </script>
@endsection
