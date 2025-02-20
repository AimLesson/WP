@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Processing</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Processing</li>
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
                        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                        <a href="{{ route('activities.createprocessing') }}" class="btn btn-primary mb-3"><i
                                class="fas fa-plus"></i>
                            Add</a> @endif

                             <!-- Filter Form -->
                        <form method="GET" action="{{ route('activities.processing') }}" class="mb-3">
                            <div class="row">
                                <label for="customer_no" class="col-auto">Order No.</label>
                                <div class="col-md-4">
                                    <input type="text" name="order_number" class="form-control"
                                           placeholder="Filter by Order Number"
                                           value="{{ request()->get('order_number') }}">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                    <a href="{{ route('activities.processing') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Processings Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>QR Code</th>
                                            <th>Order Number</th>
                                            <th>Item Number</th>
                                            <th>Date Wanted</th>
                                            <th>Machine</th>
                                            <th>Operation</th>
                                            <th>Estimated Time</th>
                                            <th>Total Process</th>
                                            <th>Created At</th>
                                            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($processing as $pr)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($pr->barcode_id)
                                                        {!! QrCode::size(100)->generate($pr->barcode_id) !!}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('activities.showprocessing', $pr->order_number) }}">{{ $pr->order_number }}</a></td>
                                                <td>{{ $pr->item_number }}</td>
                                                <td>{{ $pr->date_wanted }}</td>
                                                <td>{{ $pr->machine }}</td>
                                                <td>{{ $pr->operation }}</td>
                                                <td>{{ $pr->estimated_time }}</td>
                                                <td>{{ formatRupiah($pr->mach_cost) }}</td>
                                                <td>{{ $pr->created_at }}</td>
                                                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                                <td>
                                                    <a href="{{ route('activities.showprocessing', $pr->order_number) }}"
                                                        class="btn-xs btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <a href="{{ route('activities.deleteprocessing', $pr->id) }}"
                                                        data-toggle="modal" data-target="#modal-delete{{ $pr->id }}"
                                                        class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                        Delete</a>
                                                </td>
                                                 @endif
                                            </tr>
                                            <div class="modal fade" id="modal-delete{{ $pr->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Processing</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete
                                                                <b>{{ $pr->order_number }}?</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('activities.deleteprocessing', $pr->id) }}"
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
        window.addEventListener('DOMContentLoaded', (event) => {
            var errorAlert = '{{ session('error') }}';
            if (errorAlert !== '') {
                Swal.fire({
                    icon: 'error',
                    title: errorAlert,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                });
            }

            var successAlert = '{{ session('success') }}';
            if (successAlert !== '') {
                Swal.fire({
                    icon: 'success',
                    text: successAlert,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                });
            }

            function formatRupiah(angka) {
                var number_string = angka.toString();
                var split = number_string.split(',');
                var sisa = split[0].length % 3;
                var rupiah = split[0].substr(0, sisa);
                var ribuan = split[0].substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    var separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }

            var totalAmountElements = document.querySelectorAll('.totalamount');

            totalAmountElements.forEach(function(totalAmountElement) {
                var totalAmount = totalAmountElement.textContent.trim();
                var formattedTotalAmount = formatRupiah(totalAmount);
                totalAmountElement.textContent = formattedTotalAmount;
            });

            var totalAmount = totalAmountElement.textContent.trim();
            var formattedTotalAmount = formatRupiah(totalAmount);
            totalAmountElement.textContent = formattedTotalAmount;

            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            updateTitle('Items');
        });
    </script>
@endsection
