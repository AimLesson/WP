@extends('report.report')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Perhitungan WIP</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item active">Perhitungan WIP</li>
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
                                <h3 class="card-title">Perhitungan WIP</h3>
                            </div>
                            
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No So</th>
                                            <th>Tanggal SO</th>
                                            <th>No Order</th>
                                            <th>Pelanggan</th>
                                            <th>Jumlah</th>
                                            <th>Harga Per Unit</th>
                                            <th>Diskon</th>
                                            <th>Total Harga</th>
                                            <th>Nilai Outstanding</th>
                                            <th>Saldo Awal WIP</th>
                                            <th>Bahan Baku Material</th>
                                            <th>Bahan Baku Sparepart</th>
                                            <th>Bahan Baku Potongan Pembelian</th>
                                            <th>Bahan Baku Retur Pembelian</th>
                                            <th>Bahan Baku Angkut Pembelian</th>
                                            <th>Tenaga Kerja</th>
                                            <th>Biaya Fabrikasi Listrik</th>
                                            <th>Biaya Fabrikasi BBM</th>
                                            <th>Biaya Fabrikasi Supplies</th>
                                            <th>Biaya Fabrikasi MN</th>
                                            <th>Biaya Fabrikasi Sub Contr</th>
                                            <th>Biaya Fabrikasi Kimia</th>
                                            <th>Biaya Fabrikasi BKL Lain</th>
                                            <th>Biaya Fabrikasi Bunga</th>
                                            <th>Biaya Fabrikasi Telpon</th>
                                            <th>Biaya Fabrikasi R&D</th>
                                            <th>Biaya Fabrikasi Penyusutan Mesin</th>
                                            <th>Biaya Fabrikasi Penyusutan Inventaris</th>
                                            <th>Biaya Fabrikasi Perdin</th>
                                            <th>Biaya Fabrikasi Packing</th>
                                            <th>Biaya Fabrikasi Angkut</th>
                                            <th>Total</th>
                                            <th>WIP OUT</th>
                                            <th>Saldo Akhir WIP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                            // database perlu dibuat baru
                                            $order = \App\Models\Delivered::get();
                                        @endphp
                                        @foreach ($order as $m)
                                        
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->order_number }}</td>
                                                <td>{{ $m->customer }}</td>
                                                <td>{{ $m->product }}</td>
                                                <td>{{ $m->cost_material }}</td>
                                                <td>{{ $m->cost_std }}</td>
                                                <td>{{ $m->cost_mach }}</td>
                                                <td>{{ $m->cost_labor }}</td>
                                                <td>{{ $m->cost_subcon }}</td>
                                                <td>{{ $m->cost_ohm }}</td>
                                                <td>{{ $m->amount }}</td>
                                                <td>{{ $m->state }}</td>
                                                <td>{{ $m->so_amount }}</td>
                                                <td>{{ $m->date_order }}</td>
                                                <td>{{ $m->date_finish }}</td>
                                                <td>{{ $m->date_delivery }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                <td>{{ $m->date_by }}</td>
                                                {{-- <td>{{$m->total_mach}}</td> --}}
                                            </tr>
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
        updateTitle('Perhitungan WIP');
    </script>
@endsection
