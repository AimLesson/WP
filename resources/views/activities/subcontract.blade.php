@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sub Contract</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Sub Contract</li>
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
                        <a href="{{ route('activities.createsub_contract') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i> Add
                        </a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sub Contract</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order Number</th>
                                            <th>Item Number</th>
                                            <th>Tanggal</th>
                                            <th>Descriptions</th>
                                            <th>Amount</th>
                                            <th>Unit</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>Info</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $data = \App\Models\sub_contract::get();
                                        @endphp
                                        @foreach ($data as $m)
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->order_number }}</td>
                                                <td>{{ $m->item_no }}</td>
                                                <td>{{ $m->dod }}</td>
                                                <td>{{ $m->description }}</td>
                                                <td>{{ $m->qty }}</td>
                                                <td>{{ $m->unit }}</td>
                                                <td>{{ formatRupiah($m->price_unit) }}</td>
                                                <td>{{ formatRupiah($m->total_price) }}</td>
                                                <td>{{ $m->info }}</td>
                                                <td>
                                                    <a href="{{ route('activities.editsub_contract', $m->id) }}" class="btn-xs btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <a href="{{ route('activities.deletesub_contract', $m->id) }}" data-toggle="modal" data-target="#modal-delete{{ $m->id }}" class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="modal-delete{{ $m->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Sub Contract</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete <b>{{ $m->order_number }}</b>?</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form action="{{ route('activities.deletesub_contract', $m->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger btn-remove">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

        <!-- Edit Modal -->
        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditLabel">Edit Sub Contract</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" method="POST">
                            @csrf
                            @method('POST') <!-- Ensure this remains POST -->
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="order_number">Order Number</label>
                                <input type="text" class="form-control" id="order_number" name="order_number" required>
                            </div>
                            <div class="form-group">
                                <label for="item_no">Item Number</label>
                                <input type="text" class="form-control" id="item_no" name="item_no" required>
                            </div>
                            <div class="form-group">
                                <label for="dod">Tanggal</label>
                                <input type="date" class="form-control" id="dod" name="dod" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descriptions</label>
                                <textarea class="form-control" id="description" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="qty">Amount</label>
                                <input type="number" class="form-control" id="qty" name="qty" required>
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" class="form-control" id="unit" name="unit" required>
                            </div>
                            <div class="form-group">
                                <label for="price_unit">Price</label>
                                <input type="number" class="form-control" id="price_unit" name="price_unit" required>
                            </div>
                            <div class="form-group">
                                <label for="total_price">Total Price</label>
                                <input type="number" class="form-control" id="total_price" name="total_price" required>
                            </div>
                            <div class="form-group">
                                <label for="info">Info</label>
                                <textarea class="form-control" id="info" name="info"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            var errorAlert = '{{ session('error') }}';
            if (errorAlert !== '') {
                Swal.fire({
                    icon: 'error',
                    title: errorAlert,
                    position: 'top-end', // Change position to top-end
                    showConfirmButton: false, // Display OK button
                    timer: 5000,
                    toast: true,
                });
            }

            // Display success message using SweetAlert
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

            // Function to format value as currency (IDR)
            function formatCurrency(value) {
                // Use toLocaleString() with currency options for IDR format
                var formattedValue = parseFloat(value).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

                return formattedValue;
            }

            // Get HTML elements displaying total_amount in the table
            var totalAmountElements = document.querySelectorAll('.totalamount');

            // Iterate through each element and convert value to IDR format
            totalAmountElements.forEach(function(totalAmountElement) {
                var totalAmount = totalAmountElement.textContent.trim();
                var formattedTotalAmount = formatCurrency(totalAmount);
                totalAmountElement.textContent = formattedTotalAmount;
            });

            // Get total_amount and tax values
            var totalAmount = totalAmountElement.textContent.trim();

            // Convert total_amount and tax values to IDR format
            var formattedTotalAmount = formatCurrency(totalAmount);

            // Set converted values to HTML elements
            totalAmountElement.textContent = formattedTotalAmount;

            // Function to update title based on page
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            // Call function when "barcode" page loads
            updateTitle('Sub Contract');
        });

        // Edit button click handler
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    fetch(`{{ url('activities/sub_contract/edit') }}/${id}`)
                        .then(response => response.json())
                        .then(data => {
                            const form = document.getElementById('editForm');
                            form.action = `{{ url('activities/sub_contract/update') }}/${id}`;
                            document.getElementById('order_number').value = data.order_number;
                            document.getElementById('item_no').value = data.item_no;
                            document.getElementById('dod').value = data.dod;
                            document.getElementById('description').value = data.description;
                            document.getElementById('qty').value = data.qty;
                            document.getElementById('unit').value = data.unit;
                            document.getElementById('price_unit').value = data.price_unit;
                            document.getElementById('total_price').value = data.total_price;
                            document.getElementById('info').value = data.info;
                        });
                });
            });
        });

    </script>
@endsection
