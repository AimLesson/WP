@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Katalog</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.katalog') }}">Katalog</a></li>
                            <li class="breadcrumb-item active">Add Katalog</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.storekatalog') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Katalog Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">No Katalog</label>
                                        <input type="text" name="no_katalog" class="form-control" id="exampleInputName"
                                            placeholder="Insert No Katalog" required>
                                        @error('no_katalog')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Nama Katalog</label>
                                        <input type="text" name="nama_katalog" class="form-control" id="exampleInputUsername"
                                            placeholder="Insert Katalog Name" required>
                                        @error('nama_katalog')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPrice">Price</label>
                                        <input type="text" name="price" class="form-control" id="exampleInputPrice"
                                            placeholder="Insert Price" required>
                                        @error('price')
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
    <!-- Letakkan skrip JavaScript di bagian bawah halaman atau sebelum tag </body> -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inputElements = document.querySelectorAll('.uppercase-input');

            inputElements.forEach(function(inputElement) {
                inputElement.addEventListener('input', function() {
                    // Mengubah nilai input menjadi huruf besar
                    this.value = this.value.toUpperCase();
                });
            });
        });
    </script>


    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Add Katalog');
    </script>
@endsection