@extends('activities.activities')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Sub Contract</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                        <li class="breadcrumb-item active">Edit Sub Contract</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Sub Contract Details</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('activities.updatesub_contract', $sub_contract->id) }}" method="POST">
                        @csrf
                        
                        <!-- Order Number -->
                        <div class="form-group">
                            <label for="order_number">Order Number</label>
                            <input type="text" name="order_number" class="form-control" value="{{ old('order_number', $sub_contract->order_number) }}" readonly>
                        </div>
                    
                        <!-- Item Number -->
                        <div class="form-group">
                            <label for="no_item">Item Number</label>
                            <input type="text" name="no_item" class="form-control" value="{{ old('no_item', $sub_contract->item_no) }}" readonly>
                        </div>
                    
                        <!-- Products Table -->
                        <table class="table table-bordered" id="itemsTable">
                            <thead>
                                <tr>
                                    <th>DOD</th>
                                    <th>Vendor</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Price per Unit</th>
                                    <th>Total Price</th>
                                    <th>Additional Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="date" class="form-control" name="dod" value="{{ old('dod.0', $sub_contract->dod) }}" required></td>
                                    <td><input type="text" class="form-control" name="vendor" value="{{ old('vendor.0', $sub_contract->vendor) }}"></td>
                                    <td><input type="text" class="form-control" name="description" value="{{ old('description', $sub_contract->description) }}"></td>
                                    <td><input type="number" class="form-control qty" name="qty" value="{{ old('qty.0', $sub_contract->qty) }}"></td>
                                    <td><input type="text" class="form-control" name="unit" value="{{ old('unit.0', $sub_contract->unit) }}"></td>
                                    <td><input type="number" class="form-control price_unit" name="price_unit" value="{{ old('price_unit.0', $sub_contract->price_unit) }}"></td>
                                    <td><input type="number" class="form-control total_price" name="total_price" value="{{ old('total_price.0', $sub_contract->total_price) }}" readonly></td>
                                    <td><textarea class="form-control" name="info">{{ old('info.0', $sub_contract->info) }}</textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- SweetAlert and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- Bootstrap -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>

<script>
    $(document).ready(function() {
        let items = []; // Array to store fetched items

        // Fetch items when the order number changes
        $('#order_number').on('input', function() {
            const orderNumber = $(this).val();
            const $itemDropdown = $('#no_item');
            
            $itemDropdown.empty();
            $itemDropdown.append('<option selected="selected" disabled>-- Select Item --</option>');

            if (orderNumber) {
                $.ajax({
                    url: `/items-by-order/${orderNumber}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        items = data; // Update global items array
                        data.forEach(item => {
                            $itemDropdown.append(`<option value="${item.no_item}">${item.no_item}</option>`);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            }
        });

        // Populate fields based on selected item
        $('#no_item').change(function() {
            const selectedItemNumber = $(this).val();
            const selectedItem = items.find(item => item.no_item === selectedItemNumber);

            $('#dod_item').val(selectedItem?.dod_item || '');
            $('#material').val(selectedItem?.material || '');
            $('#item').val(selectedItem?.item || '');
            $('#drawing_no').val(selectedItem?.drawing_no || '');
            $('#nos').val(selectedItem?.nos || '');
            $('#issued_item').val(selectedItem?.issued_item || '');
        });

        // Update total price dynamically
        $(document).on('input', '.qty, .price_unit', function() {
            $('#itemsTable tbody tr').each(function() {
                const qty = $(this).find('.qty').val();
                const price = $(this).find('.price_unit').val();
                const total = (qty * price).toFixed(2);
                $(this).find('.total_price').val(total);
            });
        });

        // Alert notifications
        const errorAlert = '{{ session('error') }}';
        const successAlert = '{{ session('success') }}';
        if (errorAlert) {
            Swal.fire({
                icon: 'error',
                title: errorAlert,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                toast: true
            });
        }
        if (successAlert) {
            Swal.fire({
                icon: 'success',
                text: successAlert,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                toast: true
            });
        }

        // Update document title
        document.title = 'Edit Sub Contract';
    });

    // Add a new row to the table
    function addRow() {
        const table = $('#itemsTable tbody');
        table.append(`
            <tr>
                <td><input type="date" name="dod" class="form-control" required></td>
                <td><input type="text" name="vendor" class="form-control" required></td>
                <td><input type="text" name="description" class="form-control" required></td>
                <td><input type="number" name="qty" class="form-control qty" min="1" required></td>
                <td><input type="text" name="unit" class="form-control" required></td>
                <td><input type="number" name="price_unit" class="form-control price_unit" step="0.01" min="0" required></td>
                <td><input type="number" name="total_price" class="form-control total_price" step="0.01" min="0" required readonly></td>
                <td><textarea name="info" class="form-control"></textarea></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
            </tr>
        `);
    }

    // Remove a row from the table
    function removeRow(button) {
        $(button).closest('tr').remove();
    }
</script>

@endsection


