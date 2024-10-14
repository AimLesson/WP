@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Finished Process</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Close Orders</li>
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
                                <h3 class="card-title">Close Order </h3>
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
                                            <th style="width: 100%">State</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $o)
                                            <tr>
                                                <td>{{ $o->id }}</td>
                                                <td><a
                                                        href="{{ url('activities/order/view/' . $o->order_number) }}">{{ $o->order_number }}</a>
                                                </td>
                                                <td>{{ $o->customer }}</td>
                                                <td>{{ $o->order_date }}</td>
                                                <td>{{ $o->so_number }}</td>
                                                <td>{{ $o->product }}</td>
                                                <td>{{ $o->qty }}</td>
                                                <td>{{ $o->dod }}</td>
                                                <td>{{ formatRupiah($o->sale_price) }}</td>
                                                <td>
                                                    <form action="{{ route('activities.updateStatusClosed', $o->id) }}" method="POST" class="order-status-form">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="order_status" class="form-control" data-order-id="{{ $o->id }}" placeholder="{{ $o->order_status}}" style="width: 150px; white-space: nowrap;">
                                                            <option value="finished" {{ $o->order_status == 'finished' ? 'selected' : '' }}>Finished</option>
                                                            <option value="pending" {{ $o->order_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="started" {{ $o->order_status == 'started' ? 'selected' : '' }}>Started</option>
                                                        </select>
                                                    </form>
                                                </td>
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
        document.addEventListener('DOMContentLoaded', function () {
            const statusDropdowns = document.querySelectorAll('select[name="order_status"]');

            statusDropdowns.forEach(function (dropdown) {
                dropdown.addEventListener('change', function () {
                    const newStatus = this.value;
                    const orderId = this.getAttribute('data-order-id');

                    // Send the AJAX request to update the order status
                    fetch(`/activities/update-status-closed/${orderId}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ order_status: newStatus })
                    })
                    .then(response => {
                        // Check if the response is OK (HTTP status 200)
                        if (response.ok) {
                            return response.json(); // Parse the JSON response
                        }
                        throw new Error('Network response was not ok');
                    })
                    .then(data => {
                        if (data.success) {
                            // Show success notification
                            Swal.fire({
                                icon: 'success',
                                text: data.message,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                toast: true,
                            });
                        } else {
                            // Show error notification
                            Swal.fire({
                                icon: 'error',
                                text: data.message,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                toast: true,
                            });
                        }
                    })
                    .catch(error => {
                        // Handle any other errors (e.g., network issues)
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            text: 'An error occurred while updating the order status!',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            toast: true,
                        });
                    });
                });
            });
        });
    </script>

@endsection
