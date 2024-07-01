@extends('report.report')
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
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Overhead Manufacture</h3>
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
                                                <th>So No.</th>
                                                <th>Product</th>
                                                <th>D O D</th>
                                                <th>No of Product</th>
                                                <th>Tanggal</th>
                                                <th>Referensi</th>
                                                <th>Deskripsi</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                                $overhead = \App\Models\Overhead::get();
                                            @endphp
                                            @foreach ($overhead as $m)
                                                <tr>
                                                    <td>{{ $m->id }}</td>
                                                    <td>{{ $m->order_number }}</td>
                                                    <td>{{ $m->customer }}</td>
                                                    <td>{{ $m->so_no }}</td>
                                                    <td>{{ $m->product }}</td>
                                                    <td>{{ $m->dod }}</td>
                                                    <td>{{ $m->no_product }}</td>
                                                    <td>{{ $m->tanggal }}</td>
                                                    <td>{{ $m->ref }}</td>
                                                    <td>{{ $m->description }}</td>
                                                    <td>{{ $m->jumlah }}</td>
                                                    <td>{{ $m->keterangan }}</td>
                                                    <td>{{ $m->info }}</td>
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
        updateTitle('Overhead Manufacture');
    </script>
@endsection
