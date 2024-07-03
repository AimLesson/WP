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
                        <h1 class="m-0">Add Used Time</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.standartpart') }}">Used Time</a></li>
                            <li class="breadcrumb-item active">Add Used Time</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.storestandartpart') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Used Time Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="order_number" class="form-label">Order</label>
                                                <select name="order_number" id="order_number" onchange="fetchOrderData()"
                                                    class="form-control select2" style="width: 100%;" required>
                                                    <option selected="selected" disabled>-- Select Order --</option>
                                                    @foreach ($order as $o)
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
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="no_item" class="form-label">Item</label>
                                                <select name="no_item" id="no_item" onchange="fetchItemData()"
                                                    class="form-control select2" style="width: 100%;" required>
                                                    <option selected="selected" disabled>-- Select Item --</option>
                                                    @foreach ($itemadd as $ia)
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
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Produk"
                                                    style="display: flex; justify-content: space-between; align-items: center; margin-bottom:0px;"
                                                    class="form-label">
                                                    Produk
                                                    <button type="button" id="add-product-row" class="btn btn-primary btn-xs btn-custom">
                                                        <a href="javascript:void(0)" class="text-light font-18" title="Add Product"
                                                            id="addBtn"><i class="fa fa-plus"></i></a>
                                                    </button>
                                                </label>
                                                <div class="table-responsive" style="max-width: 100%;">
                                                    <table class="table" id="soadd-table" style="width: 100%; overflow-x: auto;">
                                                        <thead>
                                                            <tr>
                                                                <th>Part Number</th>
                                                                <th>Part Name</th>
                                                                <th>Quantity</th>
                                                                <th>Unit</th>
                                                                <th>Price</th>
                                                                <th>Total Price</th>
                                                                <th>Info</th>
                                                                <th>Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input class="form-control" type="text" id="part_no" name="part_no[]"></td>
                                                                <td><input class="form-control" type="text" id="part_name" name="part_name[]"></td>
                                                                <td><input class="form-control" type="number" id="qty" name="qty[]" step="1" min="0"></td>
                                                                <td><input class="form-control" type="text" id="unit" name="unit[]"></td>
                                                                <td><input class="form-control" type="number" id="price" name="price[]" step="0.01" min="0"></td>
                                                                <td><input class="form-control" type="number" id="totalprice" name="totalprice[]" step="0.01" min="0" readonly></td>
                                                                <td><input class="form-control" type="text" id="info" name="info[]"></td>
                                                                <td><input class="form-control" type="date" id="date" name="date[]"></td>
                                                                <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Delete Product"><i class="fa fa-trash"></i></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-custom">Add Used Time</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- SweetAlert and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <script>
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
                var orders = @json($order);

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
                var items = @json($itemadd);

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

            updateTitle('Add Used Time');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#add-product-row').on('click', function() {
                var newRow = `<tr>
                                <td><input class="form-control" type="text" id="part_no" name="part_no[]"></td>
                                <td><input class="form-control" type="text" id="part_name" name="part_name[]"></td>
                                <td><input class="form-control" type="number" id="qty" name="qty[]" step="1" min="0"></td>
                                <td><input class="form-control" type="text" id="unit" name="unit[]"></td>
                                <td><input class="form-control" type="number" id="price" name="price[]" step="0.01" min="0"></td>
                                <td><input class="form-control" type="number" id="totalprice" name="totalprice[]" step="0.01" min="0" readonly></td>
                                <td><input class="form-control" type="text" id="info" name="info[]"></td>
                                <td><input class="form-control" type="date" id="date" name="date[]"></td>
                                <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Delete Product"><i class="fa fa-trash"></i></a></td>
                              </tr>`;
                $('#soadd-table tbody').append(newRow);
            });
    
            $('#soadd-table').on('input', 'input[id^="qty"], input[id^="price"]', function() {
                var $row = $(this).closest('tr');
                var qty = $row.find('input[id^="qty"]').val();
                var price = $row.find('input[id^="price"]').val();
                var totalprice = qty * price;
                $row.find('input[id^="totalprice"]').val(totalprice.toFixed(2));
            });
    
            $('#soadd-table').on('click', '.remove', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
    
@endsection
