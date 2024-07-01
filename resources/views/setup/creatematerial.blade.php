@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Material</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.material') }}">Material</a></li>
                            <li class="breadcrumb-item active">Add Material</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.storematerial') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Material Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">ID Material</label>
                                        <input type="text" name="id_material" class="form-control" id="exampleInputName"
                                            placeholder="Insert ID Material" required>
                                        @error('id_material')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Material</label>
                                        <input type="text" name="material" class="form-control" id="exampleInputUsername"
                                            placeholder="Insert Material Name" required>
                                        @error('material')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputLength">Panjang</label>
                                            <div class="input-group">
                                                <input type="number" name="length" class="form-control" id="exampleInputLength" placeholder="Masukkan Panjang" value="0" step="0.1">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">mm</span>
                                                </div>
                                            </div>
                                            @error('length')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputWidth">Lebar</label>
                                            <div class="input-group">
                                                <input type="number" name="width" class="form-control" id="exampleInputWidth" placeholder="Masukkan Lebar" value="0" step="0.1">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">mm</span>
                                                </div>
                                            </div>
                                            @error('width')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    
                                        <div class="form-group col-md-4">
                                            <label for="exampleInputThickness">Ketebalan</label>
                                            <div class="input-group">
                                                <input type="number" name="thickness" class="form-control" id="exampleInputThickness" placeholder="Masukkan Ketebalan" value="0" step="0.1">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">mm</span>
                                                </div>
                                            </div>
                                            @error('thickness')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
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
        updateTitle('Add Material');
    </script>
@endsection