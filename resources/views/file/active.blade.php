@extends('file.file')
@section('content')
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Active User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('file') }}">File</a></li>
                            <li class="breadcrumb-item active">Active user</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>
                                    @php
                                        // Mengambil jumlah pengguna menggunakan Eloquent ORM
                                        $jumlah_users = \App\Models\User::where('status', 'online')->count();
                                    @endphp

                                    {{ $jumlah_users }}

                                </h3>

                                <p>Total active user</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user" style="color: white"></i>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            
                            <div class="card-header">
                                <h3 class="card-title">Active User</h3>
                                <div class="card-tools" style="padding-top:5px;">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" id="searchInput" name="table_search"
                                            class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 395px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>

                                            <th>Status</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Unit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            
                                            // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                            $users = \App\Models\User::where('status', 'online')->get();
                                        @endphp

                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    @if ($user->status == 'online')
                                                        <i class="fas fa-circle text-success"></i> Online
                                                    @endif
                                                </td>

                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->unit }}</td>
                                                

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->


            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Active User');
    </script>
@endsection
