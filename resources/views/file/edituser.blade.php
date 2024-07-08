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
                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Edit User</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">Nama</label>
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="form-control" id="exampleInputName" placeholder="Nama" required>
                                        @error('name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Username</label>
                                        <input type="text" name="username" value="{{ $user->username }}"
                                            class="form-control" id="exampleInputNama" placeholder="Username" required>
                                        @error('username')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Email</label>
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="form-control" id="exampleInputEmail" placeholder="Email" required>
                                        @error('email')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUnit">Unit</label>
                                        <select name="unit" class="form-control" id="exampleInputUnit" required>
                                            <option value="acc" @if($user->unit == 'ACC') selected @endif>ACC</option>
                                            <option value="all" @if($user->unit == 'ALL') selected @endif>ALL</option>
                                            <option value="edu" @if($user->unit == 'EDU') selected @endif>EDU</option>
                                            <option value="fin" @if($user->unit == 'FIN') selected @endif>FIN</option>
                                            <option value="hdc" @if($user->unit == 'HDC') selected @endif>HDC</option>
                                            <option value="hrd" @if($user->unit == 'HRD') selected @endif>HRD</option>
                                            <option value="ma" @if($user->unit == 'MA') selected @endif>MA</option>
                                            <option value="mdc" @if($user->unit == 'MDC') selected @endif>MDC</option>
                                            <option value="mec" @if($user->unit == 'MEC') selected @endif>MEC</option>
                                            <option value="secr" @if($user->unit == 'SECR') selected @endif>SECR</option>
                                            <option value="wf" @if($user->unit == 'WF') selected @endif>WF</option>
                                        </select>
                                        @error('unit')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword" placeholder="Password">
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputRole">Role</label>
                                        <select name="role" class="form-control" id="exampleInputRole" required>
                                            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                            <option value="superadmin" @if($user->role == 'superadmin') selected @endif>Superadmin</option>
                                            <option value="user" @if($user->role == 'user') selected @endif>User</option>
                                        </select>
                                        @error('role')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-custom">Save</button>
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

        
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Edit User');
    </script>
@endsection
