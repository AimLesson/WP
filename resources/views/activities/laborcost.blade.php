@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Labor Cost</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Labor Cost</li>
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
                    <div class="card-body">
                        <table id="machine" class="table table-head-fixed text-nowrap">
                            {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                            <thead>
                                <tr>
                                    <th rowspan="2" align="center">No</th>
                                    <th colspan="2">Period</th>
                                    <th colspan="3">Labor Cost</th>
                                    <th colspan="3">Overhead org.</th>
                                    <th colspan="3">Biaya Non Operasional</th>
                                    <th rowspan="2" align="center">Month</th>
                                    <th rowspan="2" align="center">Year</th>
                                    <th rowspan="2" align="center">Info</th>
                                </tr>
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>MDC</th>
                                    <th>WF</th>
                                    <th>Total</th>
                                    <th>MDC</th>
                                    <th>WF</th>
                                    <th>Total</th>
                                    <th>MDC</th>
                                    <th>WF</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                    $data = \App\Models\Overhead::get();
                                @endphp
                                @foreach ($data as $m)
                                    <tr>
                                       
                                        <td>{{ $m->id }}</td>
                                        <td>
                                            <a href="{{ url('activities/standart_part/edit/{order_number}' . $m->id) }}"
                                                class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                Edit</a>
                                            <a href="{{ route('activities.destroyquotation', ['id' => $m->id]) }}"
                                                data-toggle="modal" data-target="#modal-hapus{{ $m->id }}"
                                                class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                Delete</a>
                                        </td>
                                        <td>{{ $m->tanggal }}</td>
                                        <td>{{ $m->ref }}</td>
                                        <td>{{ $m->description }}</td>
                                        <td>{{ $m->jumlah }}</td>
                                        <td>{{ $m->keterangan }}</td>
                                        <td>{{ $m->info }}</td>
                                        
                                        {{-- <td>{{$m->total_mach}}</td> --}}
                                    </tr>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    <!-- /.modal -->
                                @endforeach
                            </tbody>
                        </table>
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
        updateTitle('Labor Cost');
    </script>
@endsection
