@extends('report.report')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Monitor Analisa Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item active">Monitor Analisa Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
<form method="GET" action="{{ route('report.monitoranalisaorder') }}">
    <div class="row mb-4">
        <div class="col-md-3">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate ?? '' }}">
        </div>
        <div class="col-md-3">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate ?? '' }}">
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('report.monitoranalisaorder') }}" class="btn btn-secondary">Reset</a>
        </div>
    </div>
</form>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Monitor Analisa Order</h3>
                            </div>
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order Number</th>
                                            <th>Customer</th>
                                            <th>Sales Order No</th>
                                            <th>Material Cost</th>
                                            <th>Labor Cost</th>
                                            <th>Machine Cost</th>
                                            <th>Sub Contract Cost</th>
                                            <th>Overhead Cost</th>
                                            <th>COGS</th>
                                            <th>Gross Profit Margin</th>
                                            <th>Order Date</th>
                                            <th>DOD</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wipData as $index => $wip)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $wip->order_number }}</td>
                                                <td>{{ $wip->order->customer ?? 'N/A' }}</td>
                                                <td>{{ $wip->order->so_number ?? 'N/A' }}</td>
                                                <td>{{ $wip->total_material_cost ? 'Rp ' . number_format($wip->total_material_cost, 0, ',', '.') : 'Rp 0' }}</td>
                                                <td>{{ $wip->total_labor_cost ? 'Rp ' . number_format($wip->total_labor_cost, 0, ',', '.') : 'Rp 0' }}</td>
                                                <td>{{ $wip->total_machine_cost ? 'Rp ' . number_format($wip->total_machine_cost, 0, ',', '.') : 'Rp 0' }}</td>
                                                <td>{{ $wip->total_sub_contract_cost ? 'Rp ' . number_format($wip->total_sub_contract_cost, 0, ',', '.') : 'Rp 0' }}</td>
                                                <td>{{ $wip->total_overhead_cost ? 'Rp ' . number_format($wip->total_overhead_cost, 0, ',', '.') : 'Rp 0' }}</td>
                                                <td>{{ $wip->cogs ? 'Rp ' . number_format($wip->cogs, 0, ',', '.') : 'Rp 0' }}</td>
                                                <td>{{ $wip->gpm ? 'Rp ' . number_format($wip->gpm, 0, ',', '.') : 'Rp 0' }}</td>
                                                <td>{{ $wip->order->order_date ?? 'N/A' }}</td>
                                                <td>{{ $wip->order->dod ?? 'N/A' }}</td>
                                                <td>{{ $wip->order->product ?? 'N/A' }}</td>
                                                <td>{{ $wip->order->qty ?? 'N/A' }}</td>
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
        </section>
    </div>
    <script>
        // Update page title
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }
        updateTitle('Monitor Analisa Order');
    </script>
@endsection
