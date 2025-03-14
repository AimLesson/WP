@extends('activities.activities')
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
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
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
                        {{-- <a href="{{ route('activities.createorder') }}" class="btn btn-primary mb-3"><i
                            class="fas fa-plus"></i>
                        Add</a> --}}

                      {{--   <!-- Filter Form -->
                        <form action="{{ route('activities.order') }}" method="GET" class="mb-3">
                            <div class="form-group row">
                                <label for="order_number" class="col-auto">Filtered by Order No.</label>
                                <div class="col-auto">
                                    <input type="text" name="order_number" id="order_number" class="form-control"
                                        placeholder="Enter Order No." value="{{ request('order_number') }}">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                    <a href="{{ route('activities.order') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form> --}}

                        <form method="GET" action="{{ route('activities.order') }}" class="mb-4 p-3 border rounded shadow-sm bg-light">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="order_number" class="fw-bold">Filtered by Order No.</label>
                                    <input type="text" class="form-control" id="order_number" name="order_number" 
                                           value="{{ request('order_number') }}" placeholder="Enter order number">
                                </div>
                                <div class="col-md-3">
                                    <label for="start_date" class="fw-bold">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" 
                                           value="{{ request('start_date') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="end_date" class="fw-bold">End Date</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" 
                                           value="{{ request('end_date') }}">
                                </div>
                                <div class="col-md-3 d-flex align-items-end"> <!-- This ensures vertical alignment -->
                                    <div class="d-flex gap-2 w-100"> <!-- Full width for the button container -->
                                        <button type="submit" class="btn btn-primary btn-custom flex-grow-1">
                                            <i class="bi bi-filter"></i> Filter
                                        </button>
                                        <a href="{{ route('activities.order') }}" class="btn btn-secondary flex-grow-1">
                                            <i class="bi bi-x-circle"></i> Reset
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        


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
                                            <th>No</th>
                                            <th>Order No.</th>
                                            <th>Customer</th>
                                            <th>Date Order</th>
                                            <th>SO No.</th>
                                            <th>Product</th>
                                            <th>QTY</th>
                                            <th>DOD</th>
                                            <th>Sale Price</th>
                                            <th>State</th>
                                            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $o)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a
                                                        href="{{ url('activities/order/view/' . $o->order_number) }}">{{ $o->order_number }}</a>
                                                </td>
                                                <td>{{ $o->customer }}</td>
                                                <td>{{ $o->order_date }}</td>
                                                <td>{{ $o->so_number }}</td>
                                                <td>{{ $o->product }}</td>
                                                <td>{{ $o->qty }}</td>
                                                <td>{{ $o->dod }}</td>
                                                <td>{{ 'Rp. ' . number_format($o->sale_price, 0, ',', '.') }}</td>
                                                <td>{{ $o->order_status }}</td>
                                                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                                    <td>
                                                        <a href="{{ route('activities.editorder', ['id' => $o->id]) }}"
                                                            class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                            Edit</a>
                                                        <a href="{{ route('activities.deleteorder', ['id' => $o->id]) }}"
                                                            data-toggle="modal"
                                                            data-target="#modal-hapus{{ $o->id }}"
                                                            class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                            Delete</a>
                                                    </td>
                                                @endif
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $o->id }}">
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
                                                            <p>Are you sure to delete
                                                                <b>{{ $o->order_number }}?</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('activities.deleteorder', ['id' => $o->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-remove">Delete</button>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const successAlert = '{{ session('success') }}';
            const errorAlert = '{{ session('error') }}';

            if (successAlert) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: successAlert,
                    position: 'top-end',
                    timer: 3000,
                    toast: true,
                    showConfirmButton: false
                });
            }

            if (errorAlert) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorAlert,
                    position: 'top-end',
                    timer: 3000,
                    toast: true,
                    showConfirmButton: false
                });
            }
            // Fungsi untuk mengubah nilai ke dalam format mata uang (IDR)
            function formatCurrency(value) {
                // Gunakan toLocaleString() dengan opsi currency untuk format IDR
                var formattedValue = parseFloat(value).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

                return formattedValue;
            }

            // Mengambil elemen HTML yang menampilkan total_amount di dalam tabel
            var salePriceElements = document.querySelectorAll('.sale_price');

            // Iterasi melalui setiap elemen dan mengonversi nilainya ke format rupiah
            salePriceElements.forEach(function(salePriceElement) {
                var salePrice = salePriceElement.textContent.trim();
                var formattedSalePrice = formatCurrency(salePrice);
                salePriceElement.textContent = formattedSalePrice;
            });

            // Mengambil nilai total_amount dan tax
            var salePrice = salePriceElement.textContent.trim();

            // Mengonversi nilai total_amount dan tax ke format rupiah
            var formattedSalePrice = formatCurrency(salePrice);

            // Menetapkan nilai yang sudah dikonversi ke elemen HTML
            salePriceElement.textContent = formattedSalePrice;


            // Fungsi untuk mengubah judul berdasarkan halaman
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            // Panggil fungsi ini saat halaman "barcode" dimuat
            updateTitle('Order');
        });
    </script>
@endsection
