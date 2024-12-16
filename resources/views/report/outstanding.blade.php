@extends('report.report')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Outstanding Process</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item active">Outstanding Process</li>
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
                                <h3 class="card-title">Outstanding Process</h3>
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
                                            <th>Customer</th>
                                            <th>Order Date</th>
                                            <th>No. SO</th>
                                            <th>D O D</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Machine Cost</th>
                                            <th>COGS</th>
                                            <th>Labor Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $m )
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->order_number }}</td>
                                                <td>{{ $m->customer }}</td>
                                                <td>{{ $m->order_date }}</td>
                                                <td>{{ $m->so_number }}</td>
                                                <td>{{ $m->dod }}</td>
                                                <td>{{ $m->product_type }}</td>
                                                <td>{{ $m->qty }}</td>
                                                <td>{{ isset($m->wip) ? 'Rp ' . number_format($m->wip->total_machine_cost, 0, ',', '.') : '-' }}</td>
                                                <td>{{ isset($m->wip) ? 'Rp ' . number_format($m->wip->cogs, 0, ',', '.') : '-' }}</td>
                                                <td>{{ isset($m->wip) ? 'Rp ' . number_format($m->wip->total_labor_cost, 0, ',', '.') : '-' }}</td>
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
        updateTitle('Outstanding');
    </script>
@endsection
