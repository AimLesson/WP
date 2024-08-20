@extends('tables.tables')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Orders</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tables') }}">Tables</a></li>
                            <li class="breadcrumb-item active">Orders</li>
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
                                <h3 class="card-title">Order </h3>
                            </div>

                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Order No.</th>
                                            <th>Customer</th>
                                            <th>Date Order</th>
                                            <th>SO No.</th>
                                            <th>Product</th>
                                            <th>QTY</th>
                                            <th>DOD</th>
                                            <th>Sale Price</th>
                                            <th>State</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $order = \App\Models\Order::get();
                                    @endphp
                                        @foreach ($order as $o)
                                            <tr>
                                                <td >{{ $o->id }}</td>
                                                <td >{{ $o->order_number }}</a></td>
                                                <td>{{ $o->customer }}</td>
                                                <td>{{ $o->order_date }}</td>
                                                <td>{{$o->so_number}}</td>
                                                <td>{{$o->product}}</td>
                                                <td>{{$o->qty}}</td>
                                                <td>{{$o->dod}}</td>
                                                <td >{{ 'Rp. ' . number_format($o->sale_price, 0, ',', '.') }}</td>
                                                <td>{{$o->order_status}}</td>
                                            </tr>
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


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="container text-center">
                                <div class="row align-items-start">
                                  <div class="col-2 ">
                                    <a href="{{ route('tables.orders') }}">Items</a>
                                  </div>
                                  <div class="col">
                                   <a href="{{ route('tables.ordersmaterial') }}">Material</a>
                                  </div>
                                  <div class="col">
                                    <a href="{{route('tables.ordersstandartpart')}}">Standart Part</a>
                                   </div>
                                  <div class="col">
                                    <a href="{{route('tables.orderssubcontr')}}">Sub Contr</a>
                                  </div>
                                  <div class="col">
                                    <a href="{{route('tables.ordersopd')}}">OPD(OHM)</a>
                                  </div>
                                </div>
                              </div>
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item ID</th>
                                            <th>Item No</th>
                                            <th>Date Wanted</th>
                                            <th>Date Wanted(REAL)</th>
                                            <th>DWG No.</th>
                                            <th>Issued</th>
                                            <th>Material</th>
                                            <th>Weight</th>
                                            <th>NOS</th>
                                            <th>NOB</th>
                                            <th>Dimension Length</th>
                                            <th>Dimension Width</th>
                                            <th>Dimension Thicknes</th>
                                            <th>Price of Material</th>
                                            <th>Price of Proccess</th>
                                            <th>Price of Est Process</th>
                                            <th>Price of Product</th>
                                            <th>Time Estimated</th>
                                            <th>Time Real</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                            $order = \App\Models\order::get();
                                        @endphp
                                        @foreach ($order as $m)
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->order_number }}</td>
                                                <td>{{ $m->so_number }}</td>
                                                <td>{{ $m->quotation_number }}</td>
                                                <td>{{ $m->kbli_code }}</td>
                                                <td>{{ $m->reff_number }}</td>
                                                <td>{{ $m->order_date }}</td>
                                                <td>{{ $m->product_type }}</td>
                                                <td>{{ $m->po_number }}</td>
                                                <td>{{ $m->sale_price }}</td>
                                                <td>{{ $m->production_cost}}</td>
                                                <td>{{ $m->information }} years</td>
                                                <td>{{ $m->information2 }} hours/day</td>
                                                <td>{{ $m->information3 }} days</td>
                                                <td>{{ $m->order_status }} %</td>
                                                <td>{{ $m->customer }} M²</td>
                                                <td>{{ $m->product }} %</td>
                                                <td>{{ $m->qty }} kW</td>
                                                <td>{{ $m->dod }}</td>
                                                <td>{{ $m->dod_forecast}}</td>
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
    </div>
    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Orders');
    </script>
@endsection
