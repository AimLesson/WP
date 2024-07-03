@extends('tables.tables')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Delivery</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tables') }}">Tables</a></li>
                            <li class="breadcrumb-item active">Delivery</li>
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
                                <h3 class="card-title">Delivery</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Action</th>
                                            <th>Image</th>
                                            <th>Tanggal</th>
                                            <th>No SO.</th>
                                            <th>Pelanggan</th>
                                            <th>Jumlah</th>
                                            <th>Packing</th>
                                            <th>Tahap</th>
                                            <th>Status</th>
                                            <th>Angkutan</th>
                                            <th>No. Pol</th>
                                            <th>Tgl Pesan</th>
                                            <th>Sopir</th>
                                            <th>No Hp</th>
                                            <th>No. Surat Jalan</th>
                                            <th>Tgl. Surat Jalan Kembali</th>
                                            <th>P12</th>
                                            <th>P13</th>
                                            <th>P14</th>
                                            <th>P15</th>
                                            <th>P16</th>
                                            <th>State</th>
                                            <th>D D D </th>
                                        </tr>
                                    </thead>
                                    
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
        updateTitle('Delivery');
    </script>
@endsection
