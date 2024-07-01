@extends('report.report')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">WIP Material</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item active">WIP Material</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">WIP Material</h3>
                            </div>
                            
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order No.</th>
                                            <th>Pemesan</th>
                                            <th>Tanggal Order</th>
                                            <th>No. SO</th>
                                            <th>D O D</th>
                                            <th>Product</th>
                                            <th>Jumlah</th>
                                            <th>Material Cost</th>
                                            <th>COGS</th>
                                            <th>SO Amount</th>
                                            <th>Tanggal Finish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                            $order = \App\Models\Standartpart_sheet::get();
                                            // perlu ganti model database
                                        @endphp
                                        @foreach ($order as $m)
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->order_number }}</td>
                                                <td>{{ $m->customer }}</td>
                                                <td>{{ $m->product }}</td>
                                                <td>{{ $m->so_no }}</td>
                                                <td>{{ $m->dod }}</td>
                                                <td>{{ $m->no_product }}</td>
                                                <td>{{ $m->item_no }}</td>
                                                <td>{{ $m->item_name }}</td>
                                                <td>{{ $m->part_no }}</td>
                                                <td>{{ $m->part_name }}</td>
                                                <td>{{ $m->part_name }}</td>
                                                {{-- <td>{{$m->total_mach}}</td> --}}
                                            </tr>
                                            
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
        updateTitle('WIP Material');
    </script>
@endsection
