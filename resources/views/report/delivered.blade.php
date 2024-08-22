@extends('report.report')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Delivered</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item active">Delivered</li>
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
                                <h3 class="card-title">Delivered</h3>
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
                                                <th>Total Sales Order</th>
                                                <th>Total Material Cost</th>
                                                <th>Total Labor Cost</th>
                                                <th>Total Machine Cost</th>
                                                <th>Total Standart Part Cost</th>
                                                <th>Total Sub Contract Cost</th>
                                                <th>Total Overhead Cost</th>
                                                <th>COGS</th>
                                                <th>Gross Profit Margin</th>
                                                <th>OH Organisasi</th>
                                                <th>Net Operating Income</th>
                                                <th>Biaya Non Operational</th>
                                                <th>Laba Sebelum Pajak</th>
                                                <th>Last Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                // Query to fetch WIP data where the associated order status is not "Finished"
                                                $order = \App\Models\WIP::whereHas('order', function ($query) {
                                                    $query->delivered();
                                                })->get();
                                            @endphp
                                            @foreach ($order as $m)
                                                <tr>
                                                    <td>{{ $m->id }}</td>
                                                    <td>{{ $m->order_number }}</td>
                                                    <td>{{ formatRupiah($m->total_sales) }}</td>
                                                    <td>{{ formatRupiah($m->total_material_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_labor_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_machine_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_standard_part_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_sub_contract_cost) }}</td>
                                                    <td>{{ formatRupiah($m->total_overhead_cost) }}</td>
                                                    <td>{{ formatRupiah($m->cogs) }}</td>
                                                    <td>{{ formatRupiah($m->gpm) }}</td>
                                                    <td>{{ formatRupiah($m->oh_org) }}</td>
                                                    <td>{{ formatRupiah($m->noi) }}</td>
                                                    <td>{{ formatRupiah($m->bnp) }}</td>
                                                    <td>{{ formatRupiah($m->lsp) }}</td>
                                                    <td>{{ $m->updated_at }}</td>
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
        updateTitle('Delivered');
    </script>
@endsection
