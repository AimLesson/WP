@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Overhead Manufacture</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Overhead Manufacture</li>
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
                        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                        <a href="{{ route('activities.createoverhead_manufacture') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i> Add
                        </a>
                        @endif
                        
                       <!-- Filter Form -->
                    <form method="GET" action="{{ route('activities.overhead_manufacture') }}" class="form-inline mb-3">
                        <div class="form-group mr-2">
                            <label for="order_number" class="mr-2">Order Number:</label>
                            <input type="text" name="order_number" id="order_number" class="form-control" value="{{ request('order_number') }}" placeholder="Enter Order Number">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                            <a href="{{ route('activities.overhead_manufacture') }}" class="btn btn-secondary">Reset</a>
                        </div>
                    </form>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Overhead Manufacture</h3>
                            </div>
                            <div class="card-body">
                                @if($data->isEmpty())
                                    <p>No records found for the provided order number. Showing all records instead:</p>

                                    @php
                                        $data = \App\Models\Overhead::all();
                                    @endphp 
                                @endif
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order Number</th>
                                            <th>Tanggal</th>
                                            <th>Reference</th>
                                            <th>Descriptions</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Info</th>
                                            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $m)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $m->order_number }}</td>
                                                <td>{{ \Carbon\Carbon::parse($m->tanggal)->format('d-m-y') }}</td>
                                                <td>{{ $m->ref }}</td>
                                                <td>{{ $m->description }}</td>
                                                <td>{{ formatRupiah($m->jumlah) }}</td>
                                                <td>{{ $m->keterangan }}</td>
                                                <td>{{ $m->info }}</td>
                                                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                                <td>
                                                    <a href="{{ route('activities.editoverhead_manufacture', $m->order_number) }}" class="btn-xs btn-warning">
                                                        <i class="fas fa-pen"></i> Edit
                                                    </a>
                                                    <button class="btn-xs btn-danger" data-toggle="modal" data-target="#modal-hapus{{ $m->id }}">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </td>
                                                @endif
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $m->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Overhead Manufacture</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete <b>{{ $m->description }}?</b></p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form action="{{ route('activities.deleteoverhead_manufacture', $m->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger btn-remove">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorAlert = '{{ session('error') }}';
            if (errorAlert !== '') {
                Swal.fire({
                    icon: 'error',
                    title: errorAlert,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                });
            }

            var successAlert = '{{ session('success') }}';
            if (successAlert !== '') {
                Swal.fire({
                    icon: 'success',
                    text: successAlert,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                });
            }

            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            updateTitle('Overhead Manufacture');
        });
    </script>
@endsection
