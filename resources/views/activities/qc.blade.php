@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Order Approval PPIC</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">QC Approval</li>
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
                        <!-- Filter Form -->
                        <form action="{{ route('activities.qc') }}" method="GET" class="mb-3">
                            <div class="form-group row">
                                <label for="order_number" class="col-auto">Filtered by Order No.</label>
                                <div class="col-auto">
                                    <input type="text" name="order_number" id="order_number" class="form-control"
                                        placeholder="Enter Order No." value="{{ request('order_number') }}">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                    <a href="{{ route('activities.qc') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Close Order </h3>
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
                                            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                                <th style="width: 100%">State</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $o)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="#">{{ $o->order_number }}</a>
                                                </td>
                                                <td>{{ $o->customer }}</td>
                                                <td>{{ $o->order_date }}</td>
                                                <td>{{ $o->so_number }}</td>
                                                <td>{{ $o->product }}</td>
                                                <td>{{ $o->qty }}</td>
                                                <td>{{ $o->dod }}</td>
                                                <td>{{ formatRupiah($o->sale_price) }}</td>
                                                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                                    <td>
                                                        <div class="flex">
                                                            <button type="button" class="btn btn-default me-2"
                                                                onclick="updateStatus({{ $o->id }}, 'approved')">Approve</button>
                                                            <button type="button" class="btn btn-danger btn-custom"
                                                                onclick="updateStatus({{ $o->id }}, 'pending')">Reject</button>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $o->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Quotation</h4>
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
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Order Approval PPIC');
    </script>
    <script>
        function updateStatus(orderId, status) {
            fetch(`/activities/order/${orderId}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Success', data.message, 'success');
                    // Optionally, refresh the table or update the row
                } else {
                    Swal.fire('Error', data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error', 'Something went wrong!', 'error');
            });
        }
    </script>

@endsection
