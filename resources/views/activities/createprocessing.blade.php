@extends('activities.activities')
@section('content')
    <style>
        .vertical-center {
            display: flex;
            align-items: center;
            justify-content: left;
            height: 100%;
        }

        .fixed-column {
            position: sticky;
            left: 0;
            background-color: white;
            z-index: 1;
        }

        .radio-label input[type="radio"] {
            position: absolute;
            left: 0;
            top: 0;
            margin: 0;
        }

        .radio-label {
            position: relative;
            padding-left: 5px;
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Process</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.item') }}">Processings</a></li>
                            <li class="breadcrumb-item active">Add Process</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.storeprocessing') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Process Form</h3>
                            </div>
                            <div class="card-body">
                                <!-- Order Information -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_number" class="form-label">Order</label>
                                            <select name="order_number" id="order_number" class="form-control select2" style="width: 100%;" required>
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
                                            <input type="text" name="so_number" class="form-control" id="so_number" placeholder="SO Number" required>
                                            @error('so_number')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product" class="form-label">Product</label>
                                            <input type="text" name="product" class="form-control" id="product" placeholder="Product" required>
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
                                            <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Company Name" required>
                                            @error('company_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dod" class="form-label">DOD</label>
                                            <input type="date" name="dod" class="form-control" id="dod" placeholder="Date of Delivery" required>
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
                                            <select name="no_item" id="no_item" class="form-control select2" style="width: 100%;" required>
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
                                            <input type="date" name="dod_item" class="form-control" id="dod_item" placeholder="Date Wanted" required>
                                            @error('dod_item')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="material" class="form-label">Material</label>
                                            <input type="text" name="material" class="form-control" id="material" placeholder="Material" required>
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
                                            <input type="text" name="item" class="form-control" id="item" placeholder="Item Name" required>
                                            @error('item')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="drawing_no" class="form-label">Drawing Number</label>
                                            <input type="text" name="drawing_no" class="form-control" id="drawing_no" placeholder="Drawing Number" required>
                                            @error('drawing_no')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nos" class="form-label">Number Of Pieces</label>
                                            <input type="text" name="nos" class="form-control" id="nos" placeholder="Number Of Pieces" required>
                                            @error('nos')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="issued_item" class="form-label">Issued Date</label>
                                            <input type="date" name="issued_item" class="form-control" id="issued_item" placeholder="Issued Date" required>
                                            @error('issued_item')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Additional Item Information -->
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-custom" onclick="addRow()">Add Row</button>
                                </div>
                                <table class="table table-bordered" id="itemsTable">
                                    <thead>
                                        <tr>
                                            <th>Number of Pieces</th>
                                            <th>Machine</th>
                                            <th>Operation</th>
                                            <th>Estimated Time (Hours)</th>
                                            <th>Date Wanted</th>
                                            <th>Machine Cost</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="number" class="form-control" name="nop[]" required></td>
                                            <td>
                                                <select name="machine_name[]" class="form-control select2" style="width: 100%;" required>
                                                    <option selected="selected" disabled>-- Select Machine --</option>
                                                    @foreach ($machine as $o)
                                                        <option value="{{ $o->machine_name }}">{{ $o->machine_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control" name="operation[]" required></td>
                                            <td><input type="number" class="form-control est_time" name="est_time[]" required></td>
                                            <td><input type="date" class="form-control" name="dod[]" required></td>
                                            <td><input type="number" class="form-control machine_cost" name="machine_cost[]" required></td>
                                            <td><input type="number" class="form-control total" name="total[]" required readonly></td>
                                            <td><button type="button" class="btn btn-danger btn-remove" onclick="removeRow(this)">Remove</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-custom">Submit</button>
                                    <button type="reset" class="btn btn-success btn-reset">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.Main content -->
    </div>

    <script>
        document.getElementById('order_number').addEventListener('change', function() {
            var selectedOrderNumber = this.value;
            var orders = @json($orders);

            var selectedOrder = orders.find(function(order) {
                return order.order_number === selectedOrderNumber;
            });

            document.getElementById('so_number').value = selectedOrder ? selectedOrder.so_number : '';
            document.getElementById('product').value = selectedOrder ? selectedOrder.product : '';
            document.getElementById('company_name').value = selectedOrder ? selectedOrder.customer : '';
            document.getElementById('dod').value = selectedOrder ? selectedOrder.dod : '';
        });

        document.getElementById('no_item').addEventListener('change', function() {
            var selectedItemNumber = this.value;
            var items = @json($items);

            var selectedItem = items.find(function(item) {
                return item.no_item === selectedItemNumber;
            });

            document.getElementById('dod_item').value = selectedItem ? selectedItem.dod_item : '';
            document.getElementById('material').value = selectedItem ? selectedItem.material : '';
            document.getElementById('item').value = selectedItem ? selectedItem.item : '';
            document.getElementById('drawing_no').value = selectedItem ? selectedItem.drawing_no : '';
            document.getElementById('nos').value = selectedItem ? selectedItem.nos : '';
            document.getElementById('issued_item').value = selectedItem ? selectedItem.issued_item : '';
        });

        function addRow() {
            var table = document.getElementById("itemsTable").getElementsByTagName('tbody')[0];
            var row = table.insertRow(table.rows.length);
            row.innerHTML = `
                <td><input type="number" class="form-control" name="nop[]" required></td>
                <td>
                    <select name="machine_name[]" class="form-control select2" style="width: 100%;" required>
                        <option selected="selected" disabled>-- Select Machine --</option>
                        @foreach ($machine as $o)
                            <option value="{{ $o->machine_name }}">{{ $o->machine_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" class="form-control" name="operation[]" required></td>
                <td><input type="number" class="form-control est_time" name="est_time[]" required></td>
                <td><input type="date" class="form-control" name="dod[]" required></td>
                <td><input type="number" class="form-control machine_cost" name="machine_cost[]" required></td>
                <td><input type="number" class="form-control total" name="total[]" required readonly></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
            `;
            $('.select2').select2();
        }

        function removeRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        document.addEventListener('input', function(event) {
            if (event.target.classList.contains('est_time') || event.target.classList.contains('machine_cost')) {
                var row = event.target.closest('tr');
                var estTime = row.querySelector('.est_time').value;
                var machineCost = row.querySelector('.machine_cost').value;
                row.querySelector('.total').value = estTime * machineCost;
            }
        }, false);

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
