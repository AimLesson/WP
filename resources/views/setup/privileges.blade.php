@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Privileges</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item active">Privileges</li>
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
                    <div class="col-12">
                        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i>
                            Add</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">User Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="user" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Unit</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($privileges as $u)
                                            <tr>
                                                <td>{{ $u->name }}</td>
                                                <td>{{ $u->username }}</td>
                                                <td>{{ $u->unit }}</td>
                                                <td>{{ $u->role }}</td>
                                                <td>
                                                    <a href="{{ route('user.edit', ['id' => $u->id]) }}"
                                                        class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                        Edit</a>
                                                    <a href="" data-toggle="modal"
                                                        data-target="#modal-hapus{{ $u->id }}"
                                                        class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $u->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete User</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure delete
                                                                <b>{{ $u->role }} - {{ $u->name }} -
                                                                    {{ $u->username }}?</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form action="{{ route('user.delete', ['id' => $u->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Ya,
                                                                    Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Privileges');
    </script>
@endsection
