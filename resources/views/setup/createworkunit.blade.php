@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Work Unit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.workunit') }}">Work Unit</a></li>
                            <li class="breadcrumb-item active">Add Work Unit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.storeworkunit') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Work Unit Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">Work Unit</label>
                                        <input type="text" name="work_unit" class="form-control uppercase-input" id="exampleInputName"
                                            placeholder="Insert Work Unit" required>
                                        @error('work_unit')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Group</label>
                                        <input type="text" name="group" class="form-control uppercase-input" id="exampleInputUsername"
                                            placeholder="Insert Group Name" required>
                                        @error('group')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Information</label>
                                        <input type="text" name="information" class="form-control" id="exampleInputUsername"
                                            placeholder="Insert Information" required>
                                        @error('information')
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
   <!-- Letakkan skrip JavaScript di bagian bawah halaman atau sebelum tag </body> -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var inputElements = document.querySelectorAll('.uppercase-input');

        inputElements.forEach(function (inputElement) {
            inputElement.addEventListener('input', function () {
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
        updateTitle('Add Work Unit');
    </script>
@endsection
