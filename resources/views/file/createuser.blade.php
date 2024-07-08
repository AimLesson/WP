@extends('file.file')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('file') }}">File</a></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form User</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName"
                                            placeholder="Name" required>
                                        @error('name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Username</label>
                                        <input type="text" name="username" class="form-control" id="exampleInputUsername"
                                            placeholder="Username" required>
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                            placeholder="Email" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUnit">Unit</label>
                                        <select name="unit" class="form-control" id="exampleInputUnit" required>
                                            <option value="Select Unit" disabled selected>-- Select Unit --</option>
                                            <option value="acc">ACC</option>
                                            <option value="all">ALL</option>
                                            <option value="edu">EDU</option>
                                            <option value="fin">FIN</option>
                                            <option value="hdc">HDC</option>
                                            <option value="hrd">HRD</option>
                                            <option value="ma">MA</option>
                                            <option value="mdc">MDC</option>
                                            <option value="mec">MEC</option>
                                            <option value="secr">SECR</option>
                                            <option value="wf">WF</option>
                                        </select>
                                        @error('unit')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword" placeholder="Password" required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputRole">Role</label>
                                        <select name="role" class="form-control" id="exampleInputRole" required>
                                            <option value="Select Role" disabled selected>-- Select Role --</option>
                                            <option value="administrator">Admin</option>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="user">User</option>
                                        </select>
                                        @error('role')
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
        updateTitle('Add User');
    </script>
@endsection
