@extends('report.report')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">HPP</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item active">HPP</li>
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
                                <h3 class="card-title"> <a href="{{ route('report.hpp') }}">All</a> / <a href="{{ route('report.hppmdc') }}">MDC</a> / <a href="{{ route('report.hppwf') }}">WF</a></h3>
                            </div>
                            
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>SO Finish</th>
                                            <th>Cost Material</th>
                                            <th>Cost Labor</th>
                                            <th>Cost Machine</th>
                                            <th>Cost Std Part</th>
                                            <th>Cost Subcon</th>
                                            <th>Cost OHM</th>
                                            <th>COGS</th>
                                            <th>Gross Profit Margin</th>
                                            <th>OH. Org</th>
                                            <th>Net Operating Income</th>
                                            <th>Non Operating Cost</th>
                                            <th>Net Income Before Tax</th>
                                            <th>Tax</th>
                                            <th>Net Income After Tax</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                            $order = \App\Models\Delivered::get();
                                        @endphp
                                        @foreach ($order as $m)
                                            
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
        updateTitle('HPP');
    </script>
@endsection
