@extends('report.report')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">WIP Process</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item active">WIP Process</li>
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
                                <h3 class="card-title">WIP Process</h3>
                            </div>

                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <div class="card-body">
                                    <table id="machine" class="table table-head-fixed text-nowrap table-bordered">
                                        {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center align-middle">ID</th>
                                                <th rowspan="2" class="text-center align-middle">Order No.</th>
                                                <th colspan="6" class="text-center align-middle">Total Cost</th>
                                                <th rowspan="2" class="text-center align-middle">WIP</th>
                                                <th rowspan="2" class="text-center align-middle">Total Sales Order</th>
                                                <th rowspan="2" class="text-center align-middle">Last Update</th>
                                            </tr>
                                            <tr>
                                                <th> Material Cost</th>
                                                <th> Labor Cost</th>
                                                <th> Machine Cost</th>
                                                <th> Standart Part Cost</th>
                                                <th> Sub Contract Cost</th>
                                                <th> Overhead Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                // Query to fetch WIP data where the associated order status is not "Finished"
                                                $order = \App\Models\WIP::whereHas('order', function ($query) {
                                                    $query->notfinished();
                                                    $query->notdelivered();
                                                })->get();
                                            @endphp
                                            @foreach ($order as $m)
                                                <tr>
                                                    <td>{{ $m->id }}</td>
                                                    <td>{{ $m->order_number }}</td>
                                                    <td>{{ formatRupiah($m->total_material_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_labor_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_machine_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_standard_part_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_sub_contract_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_overhead_cost) }}</td>
                                                    <td>{{ formatRupiah($m->cogs) }}</td>
                                                    <td>{{ formatRupiah($m->total_sales) }}</td>
                                                    <td>{{ $m->updated_at }}</td>
                                                    {{-- <td>{{$m->total_mach}}</td> --}}
                                                </tr>

                                                <!-- /.modal -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
        updateTitle('WIP Process');
    </script>
@endsection
