@extends('tables.tables')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Rekap Order MA</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tables') }}">Tables</a></li>
                            <li class="breadcrumb-item active">Rekap Order MA</li>
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
                                <h3 class="card-title">Rekap Order MA</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer</th>
                                            <th>Product</th>
                                            <th>No. SO</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Total Harga</th>
                                            <th>Tahun</th>
                                            <th>KBLI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                            $rekaporder = \App\Models\Rekaporder::get();
                                        @endphp
                                        @foreach ($rekaporder as $m)
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->customer }}</td>
                                                <td>{{ $m->product }}</td>
                                                <td>{{ $m->so_number }}</td>
                                                <td>{{ $m->qty }}</td>
                                                <td>Rp.{{ $m->harga }}</td>
                                                <td>Rp.{{ $m->total_harga }}</td>
                                                <td>{{ $m->tahun }}</td>
                                                <td>{{ $m->kbli_code }}</td>
                                                
                                                {{-- <td>{{$m->total_mach}}</td> --}}
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $m->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Order</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure delete Order 
                                                                <b>{{ $m->id_machine }} - {{ $m->machine_name }} -
                                                                    {{ $m->machine_type }}?</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('setup.deletemachine', ['id' => $m->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Ya,
                                                                    Hapus</button>
                                                            </form>
                                                        </div>
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
        updateTitle('Rekap Order MA');
    </script>
@endsection
