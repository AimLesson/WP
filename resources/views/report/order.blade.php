@extends('report.report')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item active">Order</li>
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
                         <!-- Add Filter Form -->
                         <form method="GET" action="{{ route('report.order') }}" class="form-inline mb-3">
                            <div class="form-group mr-2">
                                <label for="order_number" class="mr-2">Order Number:</label>
                                <input type="text" name="order_number" id="order_number" class="form-control" value="{{ request('order_number') }}" placeholder="Enter Order Number">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                <a href="{{ route('report.order') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap display nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order No</th>
                                            <th>Customers</th>
                                            <th>Order Date</th>
                                            <th>SO. No</th>
                                            <th>Reff Number</th>
                                            <th>KBLI</th>
                                            <th>Jenis Produk</th>
                                            <th>D O D</th>
                                            <th>D O D Adj.</th>
                                            <th>D O D (real)</th>
                                            <th>Finish Date</th>
                                            <th>Product</th>
                                            <th>Order Status</th>
                                            <th>Qty</th>
                                            <th>Sale Price</th>
                                            <th>DPD</th>
                                            <th>HPP</th>
                                            <th>Material</th>
                                            <th>Information 1</th>
                                            <th>Information 2</th>
                                            <th>Sample</th>
                                            <th>Material Cost</th>
                                            <th>Order Finish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $m)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a
                                                    href="{{ url('report/order/view/' . $m->order_number) }}">{{ $m->order_number }}</a>
                                                </td>
                                                <td>{{ $m->customer }}</td>
                                                <td>{{ $m->order_date }}</td>
                                                <td>{{ $m->so_number}}</td>
                                                <td>{{ $m->reff_number}}</td>
                                                <td>{{ $m->kbli_code }}</td>
                                                <td>{{ $m->product_type}}</td>
                                                <td>{{ $m->dod }}</td>
                                                <td>{{ $m->dod_adj }}</td>
                                                <td>{{ $m->dod_forecast }}</td>
                                                <td>{{ $m->finish_date}}</td>
                                                <td>{{ $m->product }} </td>
                                                <td>{{ $m->order_status }}</td>
                                                <td>{{ $m->qty }} </td>
                                                <td>{{ 'Rp. ' . number_format($m->sale_price, 0, ',', '.') }}</td>
                                                <td>{{ $m->dod }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->production_cost, 0, ',', '.')}}</td>
                                                <td>{{ $m->material }}</td>
                                                <td>{{ $m->information }}</td>
                                                <td>{{ $m->information2 }}</td>
                                                <td>{{ $m->sample }}</td>
                                                <td>{{ $m->material_cost }}</td>
                                                <td>{{ $m->dod_adj }}</td>

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
        updateTitle('Order');
    </script>
@endsection
