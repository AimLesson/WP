@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Overhead Manufacture</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.overhead_manufacture') }}">Overhead Manufacture</a>
                            </li>
                            <li class="breadcrumb-item active">Add Overhead Manufacture</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Overhead Manufacture Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('activities.storeoverhead_manufacture') }}" method="POST">
                            @csrf

                            <!-- Order Information -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="order_number" class="form-label">Order</label>
                                        <input 
                                            type="text" 
                                            list="orderList" 
                                            name="order_number" 
                                            id="order_number" 
                                            class="form-control" 
                                            placeholder="-- Select Order --" 
                                            required
                                        >
                                        <datalist id="orderList">
                                            @foreach ($orders as $o)
                                                <option value="{{ $o->order_number }}">
                                            @endforeach
                                        </datalist>
                                        @error('order_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="so_number" class="form-label">SO Number</label>
                                        <input type="text" name="so_number" class="form-control" id="so_number"
                                            placeholder="SO Number" required>
                                        @error('so_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product" class="form-label">Product</label>
                                        <input type="text" name="product" class="form-control" id="product"
                                            placeholder="Product" required>
                                        @error('product')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.Order Information -->

                            <!-- Additional Order Information -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company_name" class="form-label">Company Name</label>
                                        <input type="text" name="company_name" class="form-control" id="company_name"
                                            placeholder="Company Name" required>
                                        @error('company_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dod" class="form-label">DOD</label>
                                        <input type="date" name="dod" class="form-control" id="dod"
                                            placeholder="Date of Delivery" required>
                                        @error('dod')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.Additional Order Information -->

                            <h3>Details</h3>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary btn-custom" onclick="addRow()">Add Row</button>
                            </div>
                            <table class="table table-bordered" id="itemsTable">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>No</th>
                                        <th>Refrensi</th>
                                        <th>Deskripsi</th>
                                        <th>Biaya</th>
                                        <th>Keterangan</th>
                                        <th>Info</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="date" class="form-control" name="tanggal[]" required></td>
                                        <td><input type="number" class="form-control" name="so_no[]" required></td>
                                        <td><input type="text" class="form-control" name="ref[]" required></td>
                                        <td><input type="text" class="form-control" name="description[]" required></td>
                                        <td><input type="number" class="form-control" name="jumlah[]" required></td>
                                        <td><input type="text" class="form-control" name="keterangan[]" required></td>
                                        <td>
                                            <textarea class="form-control" name="info[]"></textarea>
                                        </td>
                                        <td><button type="button" class="btn btn-danger"
                                                onclick="removeRow(this)">Remove</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-custom">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
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
        //fungsi menambah baris pada tabel dinamis
        function addRow() {
            var table = document.getElementById("itemsTable").getElementsByTagName('tbody')[0];
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "date";
            element1.name = "tanggal[]";
            element1.classList.add("form-control");
            element1.required = true;
            cell1.appendChild(element1);

            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "number";
            element2.name = "so_no[]";
            element2.classList.add("form-control");
            element2.required = true;
            cell2.appendChild(element2);

            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "ref[]";
            element3.classList.add("form-control");
            element3.required = true;
            cell3.appendChild(element3);

            var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "description[]";
            element4.classList.add("form-control");
            element4.required = true;
            cell4.appendChild(element4);

            var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "number";
            element5.name = "jumlah[]";
            element5.classList.add("form-control", "price_unit");
            element5.required = true;
            cell5.appendChild(element5);

            var cell6 = row.insertCell(5);
            var element6 = document.createElement("input");
            element6.type = "text";
            element6.name = "keterangan[]";
            element6.classList.add("form-control");
            element6.required = true;
            cell6.appendChild(element6);

            var cell7 = row.insertCell(6);
            var element7 = document.createElement("textarea");
            element7.name = "info[]";
            element7.classList.add("form-control");
            cell7.appendChild(element7);

            var cell8 = row.insertCell(7);
            var removeButton = document.createElement("button");
            removeButton.type = "button";
            removeButton.classList.add("btn", "btn-danger");
            removeButton.innerHTML = "Remove";
            removeButton.onclick = function() {
                removeRow(this);
            };
            cell8.appendChild(removeButton);
        }

        function removeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        $(document).ready(function() {
            var errorAlert = '{{ session('error') }}';
            if (errorAlert) {
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
            if (successAlert) {
                Swal.fire({
                    icon: 'success',
                    text: successAlert,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    toast: true,
                });
            }

            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            $('#order_number').on('input', function() {
        var selectedOrderNumber = $(this).val();
        var orders = @json($orders);

        var selectedOrder = orders.find(function(order) {
            return order.order_number === selectedOrderNumber;
        });

        if (selectedOrder) {
            $('#so_number').val(selectedOrder.so_number);
            $('#product').val(selectedOrder.product);
            $('#company_name').val(selectedOrder.customer);
            $('#dod').val(selectedOrder.dod);
        } else {
            // Clear fields if no match is found
            $('#so_number').val('');
            $('#product').val('');
            $('#company_name').val('');
            $('#dod').val('');
        }
    });

    // Add blur event to handle validation
    $('#order_number').on('blur', function() {
        var selectedOrderNumber = $(this).val();
        var orders = @json($orders);

        var isValid = orders.some(function(order) {
            return order.order_number === selectedOrderNumber;
        });

        if (!isValid && selectedOrderNumber !== '') {
            // Show error message if invalid order number is entered
            Swal.fire({
                icon: 'error',
                title: 'Invalid Order Number',
                text: 'Please select a valid order number from the list',
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                toast: true
            });
            $(this).val(''); // Clear invalid input
        }
    });

            updateTitle('Add Overhead Manufacture');
        });
    </script>
@endsection
