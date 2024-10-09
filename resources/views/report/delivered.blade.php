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
                <!-- Date Range Filter Form -->
                <div class="row">
                    <div class="col-12">
                        <form method="GET" action="{{ route('report.delivered') }}">
                            <div class="form-row">
                                <div class="col">
                                    <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                                </div>
                                <div class="col">
                                    <select class="form-control" name="order_type">
                                        <option value="">All</option>
                                        <option value="WF" {{ request('order_type') == 'WF' ? 'selected' : '' }}>WF</option>
                                        <option value="MDC" {{ request('order_type') == 'MDC' ? 'selected' : '' }}>MDC</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="{{ route('report.delivered') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br>

                <!-- FG Data Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Delivered</h3>
                            </div>

                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap table-bordered">
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
                                            <th>Material Cost</th>
                                            <th>Labor Cost</th>
                                            <th>Machine Cost</th>
                                            <th>Standard Part Cost</th>
                                            <th>Sub Contract Cost</th>
                                            <th>Overhead Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $m)
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
                                                <td>{{ $m->wip_date }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="2" class="text-right">Total:</th>
                                            <th>{{ formatRupiah($totalMaterialCost) }}</th>
                                            <th>{{ formatRupiah($totalLaborCost) }}</th>
                                            <th>{{ formatRupiah($totalMachineCost) }}</th>
                                            <th>{{ formatRupiah($totalStandardPartCost) }}</th>
                                            <th>{{ formatRupiah($totalSubContractCost) }}</th>
                                            <th>{{ formatRupiah($totalOverheadCost) }}</th>
                                            <th>{{ formatRupiah($totalWIP) }}</th>
                                            <th>{{ formatRupiah($totalSales) }}</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
