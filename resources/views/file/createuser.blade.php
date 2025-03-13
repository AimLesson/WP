@extends('file.file')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('file') }}">File</a></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form User</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName"
                                            placeholder="Name" required>
                                        @error('name')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Username</label>
                                        <input type="text" name="username" class="form-control" id="exampleInputUsername"
                                            placeholder="Username" required>
                                        @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail"
                                            placeholder="Email" required>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUnit">Unit</label>
                                        <select name="unit" class="form-control" id="exampleInputUnit" required>
                                            <option value="Select Unit" disabled selected>-- Select Unit --</option>
                                            <option value="acc">ACC</option>
                                            <option value="all">ALL</option>
                                            <option value="edu">EDU</option>
                                            <option value="fin">FIN</option>
                                            <option value="hdc">HDC</option>
                                            <option value="hrd">HRD</option>
                                            <option value="ma">MA</option>
                                            <option value="mdc">MDC</option>
                                            <option value="mec">MEC</option>
                                            <option value="secr">SECR</option>
                                            <option value="wf">WF</option>
                                        </select>
                                        @error('unit')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword" placeholder="Password" required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputRole">Role</label>
                                        <select name="role" class="form-control" id="exampleInputRole" required>
                                            <option value="Select Role" disabled selected>-- Select Role --</option>
                                            <option value="admin">Admin</option>
                                            <option value="superadmin">Superadmin</option>
                                            <option value="user">User</option>
                                        </select>
                                        @error('role')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Menu Permissions</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-sm btn-primary" id="selectAllMenus">Select All</button>
                                        <button type="button" class="btn btn-sm btn-secondary" id="deselectAllMenus">Deselect All</button>
                                    </div>
                                </div>
                                <div class="card-body" style="max-height: 400px; overflow-y: auto;">
                                    <div class="form-group">
                                        <label>Accessible Menu Items:</label>
                                        <div class="menu-permissions">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_quotation" name="permissions[]" value="quotation">
                                                <label class="custom-control-label" for="menu_quotation">Quotation</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_salesorder" name="permissions[]" value="salesorder">
                                                <label class="custom-control-label" for="menu_salesorder">Sales Order</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_order" name="permissions[]" value="order">
                                                <label class="custom-control-label" for="menu_order">Order</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_customer" name="permissions[]" value="customer">
                                                <label class="custom-control-label" for="menu_customer">Customer</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_item" name="permissions[]" value="item">
                                                <label class="custom-control-label" for="menu_item">Item</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_processing" name="permissions[]" value="processing">
                                                <label class="custom-control-label" for="menu_processing">Processings</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_standartpart" name="permissions[]" value="standartpart">
                                                <label class="custom-control-label" for="menu_standartpart">Standart Part</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_subcontract" name="permissions[]" value="subcontract">
                                                <label class="custom-control-label" for="menu_subcontract">Sub. Cont.</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_overhead" name="permissions[]" value="overhead_manufacture">
                                                <label class="custom-control-label" for="menu_overhead">Over Head Manufacture</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_material" name="permissions[]" value="material">
                                                <label class="custom-control-label" for="menu_material">Material</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_used_time" name="permissions[]" value="used_time">
                                                <label class="custom-control-label" for="menu_used_time">Used Time</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_qc" name="permissions[]" value="qc">
                                                <label class="custom-control-label" for="menu_qc">QC Approval</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_closeorder" name="permissions[]" value="closeorder">
                                                <label class="custom-control-label" for="menu_closeorder">Finished Process</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_calculation" name="permissions[]" value="calculation">
                                                <label class="custom-control-label" for="menu_calculation">Calculation</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_copy_order" name="permissions[]" value="copy_order">
                                                <label class="custom-control-label" for="menu_copy_order">Copy Order</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input menu-item" id="menu_delivery" name="permissions[]" value="deliveryprocess">
                                                <label class="custom-control-label" for="menu_delivery">Delivery Process</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary btn-custom">Add User</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Function to check if unit and role have been selected
        function validateForm() {
            var unit = document.getElementById('exampleInputUnit').value;
            var role = document.getElementById('exampleInputRole').value;

            if (unit === 'Select Unit' || role === 'Select Role') {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please select Unit and Role before adding user!'
                });
                return false; // Prevent form submission
            }

            return true; // Continue form submission if unit and role have been selected
        }

        // Function to update page title
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Call this function when the "barcode" page loads
        updateTitle('Add User');

        // Select/Deselect all menu items
        document.getElementById('selectAllMenus').addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('.menu-item');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
            });
        });

        document.getElementById('deselectAllMenus').addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('.menu-item');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        });
    </script>
@endsection