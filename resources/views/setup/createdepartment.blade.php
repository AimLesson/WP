@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Department</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.department') }}">Department</a></li>
                            <li class="breadcrumb-item active">Add Department</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="containerfluid-">
                <form action="{{ route('setup.storedepartment') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Department Form</h3>
                        </div>
                        <div class="row">
                            <!-- Kolom pertama -->
                            <div class="col-md-6">

                                <div class="card-body">
                                    <!-- Input 1 -->
                                    <div class="form-group">
                                        <label for="exampleInputNama">Kode</label>
                                        <input type="text" name="kode" class="form-control" id="exampleInputName"
                                            placeholder="Insert Kode" required>
                                        @error('kode')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 2 -->
                                    <div class="form-group">
                                        <label for="work_unit">Work Unit</label>
                                        <select class="form-control select2" name="work_unit" id="work_unit"
                                            style="width: 100%;">
                                            <option selected="selected" required disabled selected>-- Select a Work Unit --
                                            </option>
                                            @php
                                                // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                                $work_unit = \App\Models\workunit::get();
                                            @endphp
                                            @foreach ($work_unit as $wu)
                                                <option value="{{ $wu->work_unit }}">
                                                    {{ $wu->work_unit }}</option>
                                            @endforeach
                                        </select>
                                        @error('work_unit')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 3 -->
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Insert Name" required>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 4 -->
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Insert Email" >
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <!-- Kolom kedua -->
                            <div class="col-md-6">
                                <div class="card-body">
                                    <!-- Input 5 -->
                                    <div class="form-group">
                                        <label for="group">Group</label>
                                        <input type="text" name="group" class="form-control" id="group"
                                            oninput="this.value = this.value.toUpperCase()" placeholder="Insert Group"
                                            readonly required>
                                        @error('group')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 6 -->
                                    <div class="form-group">
                                        <label for="exampleInputUsername">User Novvel</label>
                                        <input type="text" name="user_novvel" class="form-control"
                                            id="exampleInputUsername" placeholder="Insert User Novvel" required>
                                        @error('user_novvel')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 7 -->
                                    <div class="form-group">
                                        <label for="information">Information</label>
                                        <input type="text" name="information" class="form-control" id="information"
                                            oninput="this.value = this.value.toUpperCase()" placeholder="Insert Information"
                                            readonly required>
                                        @error('information')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <!-- Input 8 -->
                                    <div class="form-group">
                                        <label for="exampleInputUsername">NIK</label>
                                        <input type="text" name="nik" class="form-control" id="exampleInputUsername"
                                            placeholder="Insert NIK" >
                                        @error('nik')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
            </div>
            </form>
    </div>
    </section>

    </div>

    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#work_unit').on('change', function() {
                const selectedWorkUnit = $(this).val();
                $.ajax({
                    url: '/ambil-data-workunit/' + selectedWorkUnit,
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        $('#group').val(response.group);
                        $('#information').val(response.information);
                    },
                    error: function(error) {
                        console.error(error);
                        alert('Terjadi kesalahan dalam mengambil data Work Unit.');
                    }
                });
            });
        });

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Add Department');
    </script>
@endsection
