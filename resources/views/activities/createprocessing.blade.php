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
                                            <input list="order_numbers" id="order_number" name="order_number" class="form-control"
                                            style="width: 100%;" placeholder="-- Select Order --" required>
                                     <datalist id="order_numbers">
                                         @foreach ($orders as $o)
                                             <option value="{{ $o->order_number }}"></option>
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

                                <!-- Item Information -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="no_item" class="form-label">Item</label>
                                            <select name="no_item" id="no_item" class="form-control select2"
                                                style="width: 100%;" required>
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
                                            <input type="date" name="issued_item" class="form-control"
                                                id="issued_item" placeholder="Issued Date" required>
                                            @error('issued_item')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.Additional Item Information -->
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" onclick="addRow()">Add Row</button>
                                </div>
                                <div class="card p-3">
                                    <div style="overflow-x: auto;">
                                        <table class="table table-bordered whitespace-nowrap" id="itemsTable">
                                            <thead>
                                                <tr>
                                                    <th>Number of Pieces</th>
                                                    <th>Machine</th>
                                                    <th>Operation</th>
                                                    <th>Estimated Time (Hours)</th>
                                                    <th>Date Wanted</th>
                                                    <th>Machine Cost/Hour</th>
                                                    <th>Labor Cost/Hour</th>
                                                    <th>Est.Total Machine Cost</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td><input type="number" class="form-control" name="nop[]" required>
                                                </td>
                                                <td>
                                                    <select name="machine_name[]" id="machine_name"
                                                        class="form-control select2" style="width: 200px;" required>
                                                        <option selected="selected" disabled>-- Select Machine --</option>
                                                        @foreach ($machine as $o)
                                                            <option value="{{ $o->machine_name }}">{{ $o->machine_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control operation"
                                                        name="operation[]" id="process" style="width: 200px" readonly required></td>
                                                <td><input type="number" class="form-control est_time" name="est_time[]"
                                                        step="0.1" placeholder="0.5 = 1/2 Jam" required></td>
                                                <td><input type="date" class="form-control" name="dod[]" required>
                                                </td>
                                                <td><input type="number" class="form-control machine_cost"
                                                        name="machine_cost[]" id="mach_cost_per_hour" readonly required>
                                                </td>
                                                <td><input type="number" class="form-control labor_cost"
                                                        name="labor_cost[]" id="labor_cost" readonly required></td>
                                                <td><input type="number" class="form-control total" name="total[]"
                                                        required readonly></td>
                                                <td><button type="button" class="btn btn-danger"
                                                        onclick="removeRow(this)">Remove</button></td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-custom">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- /.Main content -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
       $(document).ready(function() {
    let items = []; // Declare an empty array to hold the fetched items

    // Handle order_number changes
    $('#order_number').on('input', function() {
        var orderNumber = $(this).val();

        // Clear the items select box
        $('#no_item').empty();
        $('#no_item').append('<option selected="selected" disabled>-- Select Item --</option>');

        if (orderNumber) {
            console.log('Fetching items for order number: ' + orderNumber); // Log the selected order number

            $.ajax({
                url: '/items-by-order/' + orderNumber,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    items = data; // Assign the fetched data to the items array
                    console.log('Fetched items:', items); // Log the fetched items array

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

    // Populate other fields when order_number is changed
    $('#order_number').on('input', function() {
        var selectedOrderNumber = $(this).val();
        var orders = @json($orders);

        console.log('Selected order number:', selectedOrderNumber); // Log the selected order number
        console.log('Orders array:', orders); // Log the orders array

        var selectedOrder = orders.find(function(order) {
            return order.order_number === selectedOrderNumber;
        });

        console.log('Selected order:', selectedOrder); // Log the selected order

        $('#so_number').val(selectedOrder ? selectedOrder.so_number : '');
        $('#product').val(selectedOrder ? selectedOrder.product : '');
        $('#company_name').val(selectedOrder ? selectedOrder.customer : '');
        $('#dod').val(selectedOrder ? selectedOrder.dod : '');
    });

    // When no_item is changed, populate the relevant fields based on the selected item
    $('#no_item').change(function() {
        var selectedItemNumber = $(this).val();

        console.log('Selected item number:', selectedItemNumber); // Log the selected item number

        // Find the selected item from the dynamically updated items array
        var selectedItem = items.find(function(item) {
            return item.no_item === selectedItemNumber;
        });

        console.log('Selected item:', selectedItem); // Log the selected item

        // Populate the fields based on the selected item
        $('#dod_item').val(selectedItem ? selectedItem.dod_item : '');
        $('#material').val(selectedItem ? selectedItem.material : '');
        $('#item').val(selectedItem ? selectedItem.item : '');
        $('#drawing_no').val(selectedItem ? selectedItem.drawing_no : '');
        $('#nos').val(selectedItem ? selectedItem.nos : '');
        $('#issued_item').val(selectedItem ? selectedItem.issued_item : '');
    });
});

    </script>

    <script>
        function addRow() {
            const table = document.getElementById('itemsTable').getElementsByTagName('tbody')[0];
            const newRow = table.insertRow();

            newRow.innerHTML = `
                <td><input type="number" class="form-control" name="nop[]" required></td>
                <td>
                    <select name="machine_name[]" class="form-control select2" style="width: 100%;" onchange="updateMachineDetails(this)" required>
                        <option selected="selected" disabled>-- Select Machine --</option>
                        @foreach ($machine as $o)
                            <option value="{{ $o->machine_name }}">{{ $o->machine_name }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" class="form-control" name="operation[]" readonly required></td>
                <td><input type="number" class="form-control" name="est_time[]" step="0.1" required></td>
                <td><input type="date" class="form-control" name="dod[]" required></td>
                <td><input type="number" class="form-control machine_cost" name="machine_cost[]" id="mach_cost_per_hour" readonly required></td>
                <td><input type="number" class="form-control labor_cost" name="labor_cost[]" id="labor_cost" readonly required></td>
                <td><input type="number" class="form-control total" name="total[]" required readonly></td>
                <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button></td>
            `;

            // Reinitialize the select2 plugin for the new select elements
            $(newRow).find('.select2').select2();
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.remove();
        }
    </script>

    <script>
        function updateMachineDetails(selectElement) {
            var selectedMachineName = selectElement.value;

            fetch(`/machine-details?machine_name=${selectedMachineName}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        const row = selectElement.closest('tr');
                        row.querySelector('[name="operation[]"]').value = data.process;
                        let machCost = parseFloat(data.mach_cost_per_hour).toFixed(2);
                        if (!isNaN(machCost) && machCost <= 9999999999) {
                            row.querySelector('[name="machine_cost[]"]').value = machCost;
                            updateTotalPrice();
                        } else {
                            console.error('mach_cost_per_hour value is invalid or out of range:', machCost);
                        }
                        let LaborCost = parseFloat(data.labor_cost).toFixed(2);
                        if (!isNaN(LaborCost) && LaborCost <= 9999999999) {
                            row.querySelector('[name="labor_cost[]"]').value = LaborCost;
                            updateTotalPrice();
                        } else {
                            console.error('labor_cost value is invalid or out of range up:', LaborCost);
                        }
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        document.getElementById('machine_name').addEventListener('change', function() {
            var selectedMachineName = this.value;

            fetch(`/machine-details?machine_name=${selectedMachineName}`)
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        document.getElementById('process').value = data.process;

                        // Ensure the mach_cost_per_hour value is valid
                        let machCost = data.mach_cost_per_hour.toString().trim();
                        if (!isNaN(machCost) && machCost <= 9999999999) {
                            document.getElementById('mach_cost_per_hour').value = machCost;
                        } else {
                            console.error('mach_cost_per_hour value is invalid or out of range:', machCost);
                        }

                        // Ensure the labor_cost value is valid
                        let laborCost = data.labor_cost.toString().trim();
                        if (!isNaN(laborCost) && laborCost <= 9999999999) {
                            document.getElementById('labor_cost').value = laborCost;
                        } else {
                            console.error('labor_cost value is invalid or out of range:', laborCost);
                        }
                    }
                })
                .catch(error => console.error('Error:', error));
        });


        function updateTotalPrice() {
            $('#itemsTable tbody tr').each(function() {
                var qty = parseFloat($(this).find('[name="est_time[]"]').val());
                var price = parseFloat($(this).find('[name="machine_cost[]"]').val());
                var total = (qty * price).toFixed(2);
                if (!isNaN(total)) {
                    $(this).find('[name="total[]"]').val(total);
                } else {
                    $(this).find('[name="total[]"]').val('');
                }
            });
        }

        $(document).on('input', '[name="est_time[]"], [name="machine_cost[]"]', function() {
            updateTotalPrice();
        });
    </script>
@endsection
