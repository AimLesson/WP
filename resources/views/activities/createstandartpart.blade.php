@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Standart Part</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.standartpart') }}">Standart Part</a>
                            </li>
                            <li class="breadcrumb-item active">Add Standart Part</li>
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
                        <h3 class="card-title">Standart Part Details</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('activities.storestandartpart') }}" method="POST">
                            @csrf

                            <!-- Order Information -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="order_number" class="form-label">Order</label>
                                        <select name="order_number" id="order_number" onchange="fetchOrderData()"
                                            class="form-control select2" style="width: 100%;" required>
                                            <option selected="selected" disabled>-- Select Order --</option>
                                            @foreach ($orders as $o)
                                                <option value="{{ $o->order_number }}">{{ $o->order_number }}</option>
                                            @endforeach
                                        </select>
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

                            <!-- Item Information -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no_item" class="form-label">Item</label>
                                        <select name="no_item" id="no_item" onchange="fetchItemData()"
                                            class="form-control select2" style="width: 100%;" required>
                                            <option selected="selected" disabled>-- Select Item --</option>
                                            @foreach ($items as $ia)
                                                <option value="{{ $ia->no_item }}">{{ $ia->no_item }}</option>
                                            @endforeach
                                        </select>
                                        @error('no_item')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="dod_item" class="form-label">Date Wanted</label>
                                        <input type="date" name="dod_item" class="form-control" id="dod_item"
                                            placeholder="Date Wanted" required>
                                        @error('dod_item')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="material" class="form-label">Material</label>
                                        <input type="text" name="material" class="form-control" id="material"
                                            placeholder="Material" required>
                                        @error('material')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.Item Information -->

                            <!-- Additional Item Information -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="item" class="form-label">Item Name</label>
                                        <input type="text" name="item" class="form-control" id="item"
                                            placeholder="Item Name" required>
                                        @error('item')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="drawing_no" class="form-label">Drawing Number</label>
                                        <input type="text" name="drawing_no" class="form-control" id="drawing_no"
                                            placeholder="Drawing Number" required>
                                        @error('drawing_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nos" class="form-label">Number Of Pieces</label>
                                        <input type="text" name="nos" class="form-control" id="nos"
                                            placeholder="Number Of Pieces" required>
                                        @error('nos')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="issued_item" class="form-label">Issued Date</label>
                                        <input type="date" name="issued_item" class="form-control" id="issued_item"
                                            placeholder="Issued Date" required>
                                        @error('issued_item')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.Additional Item Information -->

                            <h3>Standart Part Input</h3>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="addRow()">Add Row</button>
                            </div>
                            <table class="table table-bordered" id="itemsTable">
                                <thead>
                                    <tr>
                                        <th>Part No</th>
                                        <th>Part Name</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Price per Unit</th>
                                        <th>Total Price</th>
                                        <th>Additional Info</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="no_barcode[]" class="form-control"
                                                onchange="fetchPartData(this)" required>
                                                <option value="">-- Select Part --</option>
                                                @foreach ($standardParts as $o)
                                                    <option value="{{ $o->no_barcode }}">{{ $o->no_barcode }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" class="form-control" name="part_name[]" required readonly></td>
                                        <td><input type="number" class="form-control qty" name="qty[]" min="1"
                                                required></td>
                                        <td><input type="text" class="form-control" name="unit[]" required readonly></td>
                                        <td><input type="number" class="form-control price_unit" step="0.01"
                                                name="price_unit[]" min="0" required readonly></td>
                                        <td><input type="number" class="form-control total_price" step="0.01"
                                                name="total_price[]" min="0" required readonly></td>
                                        <td>
                                            <textarea class="form-control" name="info[]"></textarea>
                                        </td>
                                        <td><input type="date" class="form-control" name="date[]" required></td>
                                        <td><button type="button" class="btn btn-danger btn-remove"
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
        $(document).ready(function() {
            $('#order_number').on('change', function() {
                var orderNumber = $(this).val();

                // Clear the items select box
                $('#no_item').empty();
                $('#no_item').append('<option selected="selected" disabled>-- Select Item --</option>');

                if (orderNumber) {
                    $.ajax({
                        url: '/items-by-order/' + orderNumber,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, item) {
                                $('#no_item').append('<option value="' + item.no_item +
                                    '">' + item.no_item + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + status + error);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        function fetchPartData(element) {
            var no_barcode = element.value;
            var row = $(element).closest('tr');
    
            $.ajax({
                url: '/standartpart/' + no_barcode,
                type: 'GET',
                success: function(data) {
                    if (data) {
                        row.find('input[name="part_name[]"]').val(data.nama_barang);
                        row.find('input[name="unit[]"]').val(data.satuan);
                        row.find('input[name="price_unit[]"]').val(data.harga);
                        row.find('input[name="total_price[]"]').val(data.total);
                        row.find('textarea[name="info[]"]').val(data.keterangan);
                        // Map other fields as necessary
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to fetch data',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        toast: true,
                    });
                }
            });
        }
    
        function addRow() {
            var table = document.getElementById("itemsTable").getElementsByTagName('tbody')[0];
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
    
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("select");
            element1.name = "no_barcode[]";
            element1.classList.add("form-control");
            element1.required = true;
            element1.onchange = function() { fetchPartData(this); };
            cell1.appendChild(element1);
    
            // Populate options dynamically
            @foreach ($standardParts as $o)
                var option = document.createElement("option");
                option.value = "{{ $o->no_barcode }}";
                option.text = "{{ $o->no_barcode }}";
                element1.appendChild(option);
            @endforeach
    
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.name = "part_name[]";
            element2.classList.add("form-control");
            element2.required = true;
            element2.readOnly = true;
            cell2.appendChild(element2);
    
            var cell3 = row.insertCell(2);
            var element3 = document.createElement("input");
            element3.type = "number";
            element3.name = "qty[]";
            element3.min = "1";
            element3.classList.add("form-control", "qty");
            element3.required = true;
            cell3.appendChild(element3);
    
            var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.name = "unit[]";
            element4.classList.add("form-control");
            element4.required = true;
            element4.readOnly = true;
            cell4.appendChild(element4);
    
            var cell5 = row.insertCell(4);
            var element5 = document.createElement("input");
            element5.type = "number";
            element5.step = "0.01";
            element5.name = "price_unit[]";
            element5.min = "0";
            element5.classList.add("form-control", "price_unit");
            element5.required = true;
            element5.readOnly = true;
            cell5.appendChild(element5);
    
            var cell6 = row.insertCell(5);
            var element6 = document.createElement("input");
            element6.type = "number";
            element6.step = "0.01";
            element6.name = "total_price[]";
            element6.min = "0";
            element6.classList.add("form-control", "total_price");
            element6.required = true;
            element6.readOnly = true;
            cell6.appendChild(element6);
    
            var cell7 = row.insertCell(6);
            var element7 = document.createElement("textarea");
            element7.name = "info[]";
            element7.classList.add("form-control");
            cell7.appendChild(element7);

            var cell8 = row.insertCell(7);
            var element1 = document.createElement("input");
            element1.type = "date";
            element1.name = "date[]";
            element1.classList.add("form-control");
            element1.required = true;
            cell8.appendChild(element1);
    
            var cell9 = row.insertCell(8);
            var removeButton = document.createElement("button");
            removeButton.type = "button";
            removeButton.classList.add("btn", "btn-danger");
            removeButton.innerHTML = "Remove";
            removeButton.onclick = function() { removeRow(this); };
            cell9.appendChild(removeButton);
        }
    
        function removeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
    
        function updateTotalPrice() {
            $('#itemsTable tbody tr').each(function() {
                var qty = $(this).find('.qty').val();
                var price = $(this).find('.price_unit').val();
                var total = (qty * price).toFixed(2);
                $(this).find('.total_price').val(total);
            });
        }
    
        $(document).on('input', '.qty, .price_unit', function() {
            updateTotalPrice();
        });
    
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
    
            $('#order_number').change(function() {
                var selectedOrderNumber = $(this).val();
                var orders = @json($orders);
    
                var selectedOrder = orders.find(function(order) {
                    return order.order_number === selectedOrderNumber;
                });
    
                $('#so_number').val(selectedOrder ? selectedOrder.so_number : '');
                $('#product').val(selectedOrder ? selectedOrder.product : '');
                $('#company_name').val(selectedOrder ? selectedOrder.customer : '');
                $('#dod').val(selectedOrder ? selectedOrder.dod : '');
            });
    
            $('#no_item').change(function() {
                var selectedItemNumber = $(this).val();
                var items = @json($items);
    
                var selectedItem = items.find(function(item) {
                    return item.no_item === selectedItemNumber;
                });
    
                $('#dod_item').val(selectedItem ? selectedItem.dod_item : '');
                $('#material').val(selectedItem ? selectedItem.material : '');
                $('#item').val(selectedItem ? selectedItem.item : '');
                $('#drawing_no').val(selectedItem ? selectedItem.drawing_no : '');
                $('#nos').val(selectedItem ? selectedItem.nos : '');
                $('#issued_item').val(selectedItem ? selectedItem.issued_item : '');
            });
    
            updateTitle('Add BOM');
        });
    </script>
    
@endsection
