@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Used Time</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Used Time</li>
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
                        <a href="{{ route('activities.createused_time') }}" class="btn btn-primary mb-3"><i
                            class="fas fa-plus"></i>
                        Add</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Used Time</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Action</th>
                                                <th>Cost Place</th>
                                                <th>NOS</th>
                                                <th>Est.</th>
                                                <th>Start Date</th>
                                                <th>Time Stamp</th>
                                                <th>Status</th>
                                                <th>Used Time</th>
                                                <th>Date Want.</th>
                                                <th>Finish Date</th>
                                                <th>Finish Time</th>
                                                <th>ID OPT</th>
                                                <th>prc</th>
                                                <th>inp</th>
                                                <th>Date(Stop)</th>
                                                <th>Time(Stop)</th>
                                                <th>Used Time(pend)</th>
                                                <th>Date(Start 2)</th>
                                                <th>Time(Start 2)</th>
                                                <th>no_order</th>
                                                <th>no_items</th>
                                                <th>Barcode ID</th>
                                                <th>U</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                                $data = \App\Models\UsedTime::get();
                                            @endphp
                                            @foreach ($data as $m)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <a href="{{ url('activities/standart_part/edit/' . $m->id) }}"
                                                            class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                            Edit</a>
                                                        <a href="{{ route('activities.destroyquotation', ['id' => $m->id]) }}"
                                                            data-toggle="modal" data-target="#modal-hapus{{ $m->id }}"
                                                            class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                            Delete</a>
                                                    </td>
                                                    <td>{{ $m->cost_place }}</td>
                                                    <td>{{ $m->nos }}</td>
                                                    <td>{{ $m->est }}</td>
                                                    <td>{{ $m->start_date }}</td>
                                                    <td>{{ $m->time_stamp }}</td>
                                                    <td>{{ $m->status }}</td>
                                                    <td>{{ $m->used_time }}</td>
                                                    <td>{{ $m->date_want }}</td>
                                                    <td>{{ $m->finish_date }}</td>
                                                    <td>{{ $m->finish_time }}</td>
                                                    <td>{{ $m->id_opt }}</td>
                                                    <td>{{ $m->prc }}</td>
                                                    <td>{{ $m->inp }}</td>
                                                    <td>{{ $m->date_stop }}</td>
                                                    <td>{{ $m->time_stop }}</td>
                                                    <td>{{ $m->used_time_pend }}</td>
                                                    <td>{{ $m->date_start2 }}</td>
                                                    <td>{{ $m->time_start2 }}</td>
                                                    <td>{{ $m->no_order }}</td>
                                                    <td>{{ $m->no_items }}</td>
                                                    <td>{{ $m->barcode_id }}</td>
                                                    <td>{{ $m->u }}</td>
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
        updateTitle('Used Time');
    </script>
@endsection
