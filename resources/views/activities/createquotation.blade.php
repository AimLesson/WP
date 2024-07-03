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
            /* Background color of the fixed column */
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
            /* Sesuaikan dengan ukuran bulatan radio button */
        }
    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Quotation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.quotation') }}">Quotation</a></li>
                            <li class="breadcrumb-item active">Add Quotation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.storequotation') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Quotation Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="quotation_no" class="form-label">Quotation No.</label>
                                                <input type="text" name="quotation_no" class="form-control"
                                                    id="quotation_no" placeholder=" Quotation No." required>
                                                @error('quotation_no')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="company_name" class="form-label">Company Name</label>
                                                <input style="margin-left: 10px; margin-top:7px" class="form-check-input"
                                                    type="checkbox" id="addcompany" name="addcompany">
                                                <label style="margin-left: 25px; font-weight:500" for="addcompany"
                                                    class="form-label">New</label>
                                                <input type="text" name="company_name" class="form-control"
                                                    style="display: none" id="addcompany_text" placeholder=" Company Name">

                                                <select name="company_name" class="form-control select2"
                                                    style="display: block" id="company_name_select" required>
                                                    <option selected disabled>Select Company</option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{ $customer->company }}">
                                                            {{ $customer->company }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('company_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder=" Name" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" name="date" class="form-control" id="date"
                                                    placeholder="Select Date" required>
                                                @error('date')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea name="address" class="form-control" id="address" placeholder=" Address" oninput="capitalizeName(this)"
                                                    required></textarea>
                                                @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="npwp" class="form-label">NPWP</label>
                                                <input type="text" name="npwp" class="form-control" id="npwp"
                                                    placeholder="__.___.___._-___.___">
                                                @error('npwp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" name="phone" class="form-control" id="phone"
                                                    placeholder=" Phone" required>
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fax" class="form-label">Fax</label>
                                                <input type="text" name="fax" class="form-control" id="fax"
                                                    placeholder=" Fax">
                                                @error('fax')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tax_address" class="form-label">Tax Address</label>
                                                <textarea name="tax_address" class="form-control" id="tax_address" placeholder=" Tax Address"
                                                    oninput="capitalizeName(this)" required></textarea>
                                                @error('tax_address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder=" Email">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group" required>
                                                <label for="confirmation" class="form-label">Confirmation</label>
                                                <div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="meet"
                                                            value="Meet" checked required>
                                                        <label for="meet" class="form-check-label">Meet</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="byphone"
                                                            value="by Phone" required>
                                                        <label for="byphone" class="form-check-label">by Phone</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="confirm-email"
                                                            value="Email" required>
                                                        <label for="confirm-email" class="form-check-label">Email</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="confirm-fax"
                                                            value="Fax" required>
                                                        <label for="confirm-fax" class="form-check-label">Fax</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="note"
                                                            value="Note" required>
                                                        <label for="note" class="form-check-label">Note</label>
                                                    </div>
                                                </div>
                                                @error('confirmation')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" required>
                                                <label for="type" class="form-label">Type</label>
                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="new"
                                                            value="New" checked required>
                                                        <label for="new" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">New</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="repeat"
                                                            value="Repeat" required>
                                                        <label for="repeat" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Repeat</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="prototype"
                                                            value="Prototype" required>
                                                        <label for="prototype" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Prototype</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="repair"
                                                            value="Repair" required>
                                                        <label for="repair" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Repair</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="resharpening"
                                                            value="Resharpening" required>
                                                        <label for="resharpening" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Resharpening</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="harden"
                                                            value="Harden" required>
                                                        <label for="harden" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Harden</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="painting"
                                                            value="Painting" required>
                                                        <label for="painting" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Painting</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="others"
                                                            value="Others" required>
                                                        <label for="others" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Others</label>
                                                    </div>
                                                </div>
                                                @error('type')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="Produk"
                                                    style="display: flex; justify-content: space-between; align-items: center;"
                                                    class="form-label">
                                                    Produk
                                                    <button type="button" id="add-product-row"
                                                        class="btn btn-primary btn-xs">
                                                        <a href="javascript:void(0)" class="text-light font-18"
                                                            title="Add Product" id="addBtn"><i
                                                                class="fa fa-plus"></i></a>
                                                    </button>
                                                </label>
                                                <div class="table-responsive" style="max-width: 100%;">
                                                    <table class="table" id="quotationadd-table"
                                                        style="width: 100%; overflow-x: auto;">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 20px" class="fixed-column">No</th>
                                                                <th class="col-sm-2">Item</th>
                                                                <th class="col-md-6">Item Description</th>
                                                                <th style="width:80px;">Qty</th>
                                                                <th style="width:80px;">Unit</th>
                                                                <th style="width:100px;">Unit Price</th>
                                                                <th style="width:80px;">Disc (%)</th>
                                                                <th>Amount</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="row-index text-center fixed-column">1</td>
                                                                <td><input class="form-control" style="min-width:120px"
                                                                        type="text" id="item" name="item[]">
                                                                </td>
                                                                <td><input class="form-control"style="min-width:200px"
                                                                        type="text" id="item_desc" name="item_desc[]">
                                                                </td>
                                                                <td><input class="form-control qty" style="width:80px"
                                                                        type="number" id="qty" name="qty[]">
                                                                </td>
                                                                <td><select class="form-control" name="unit[]"
                                                                        id="unit" style="width:100px">
                                                                        <option selected="selected" required disabled
                                                                            selected>
                                                                        </option>
                                                                        @foreach ($unit as $u)
                                                                            <option value="{{ $u->unit }}">
                                                                                {{ $u->unit }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td><input class="form-control unit_price"
                                                                        style="width:120px" type="text"
                                                                        id="unit_price" name="unit_price[]"></td>
                                                                <td><input class="form-control disc"style="min-width:80px"
                                                                        type="text" id="disc" name="disc[]"
                                                                        value="0">
                                                                </td>
                                                                <td><input class="form-control total" style="width:150px"
                                                                        type="text" id="amount" name="amount[]"
                                                                        value="0" readonly></td>
                                                                <td><a href="javascript:void(0)"
                                                                        class="text-danger font-18 remove"
                                                                        title="Delete Product"><i
                                                                            class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" class="form-control" style="height: 145px" id="description" placeholder=" Description"
                                                    required></textarea>
                                                @error('description')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group" required>
                                                        <label for="sample" class="form-label">Sample Reference</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="sample" id="photo"
                                                                    value="Photo" required>
                                                                <label for="photo" class="form-check-label radio-label"
                                                                    style="margin-right: 5px;">Photo</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="sample" id="2dd"
                                                                    value="2D Drawing" required>
                                                                <label for="2dd" class="form-check-label radio-label"
                                                                    style="margin-right: 5px;">2D Drawing</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="sample" id="3dd"
                                                                    value="3D Drawing" required>
                                                                <label for="3dd" class="form-check-label radio-label"
                                                                    style="margin-right: 5px;">3D Drawing</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="sample" id="sample"
                                                                    value="Sample" required>
                                                                <label for="sample" class="form-check-label radio-label"
                                                                    style="margin-right: 5px;">Sample</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="sample" id="none"
                                                                    value="None" required>
                                                                <label for="none" class="form-check-label radio-label"
                                                                    style="margin-right: 5px;">None</label>
                                                            </div>
                                                        </div>
                                                        @error('sample')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" required>
                                                        <label for="ass_type" class="form-label">Assy Type</label>
                                                        <div>
                                                            <div class="form-check">
                                                                <input type="radio" name="ass_type" id="aia"
                                                                    value="in ATMI" required>
                                                                <label for="aia"
                                                                    class="form-check-label radio-label">Assy in
                                                                    ATMI</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="ass_type" id="aosl"
                                                                    value="on Shipping Location" required>
                                                                <label for="aosl"
                                                                    class="form-check-label radio-label">Assy on Shipping
                                                                    Location</label>
                                                            </div>
                                                        </div>
                                                        @error('ass_type')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" required>
                                                        <label for="qc_statement" class="form-label">QC Statement</label>
                                                        <div>
                                                            <div class="form-check">
                                                                <input type="radio" name="qc_statement" id="qcs"
                                                                    value="QC Sheet" required>
                                                                <label for="qcs"
                                                                    class="form-check-label radio-label">QC Sheet</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="qc_statement" id="atr"
                                                                    value="Assy Test Report" required>
                                                                <label for="atr"
                                                                    class="form-check-label radio-label">Assy Test
                                                                    Report</label>
                                                            </div>
                                                        </div>
                                                        @error('qc_statement')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group" required>
                                                        <label for="packing_type" class="form-label">Packing Type</label>
                                                        <div>
                                                            <div class="form-check">
                                                                <input type="radio" name="packing_type" id="cp"
                                                                    value="Cartoon Packing" required>
                                                                <label for="cp"
                                                                    class="form-check-label radio-label">Cartoon
                                                                    Packing</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="packing_type" id="wp"
                                                                    value="Wood Packing" required>
                                                                <label for="wp"
                                                                    class="form-check-label radio-label">Wood
                                                                    Packing</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="packing_type" id="sp"
                                                                    value="Special Packing" required>
                                                                <label for="sp"
                                                                    class="form-check-label radio-label">Special
                                                                    Packing</label>
                                                            </div>
                                                        </div>
                                                        @error('packing_type')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group" required>
                                                        <label for="top" class="form-label">Payment</label>
                                                        <div>
                                                            <div class="form-check">
                                                                <input type="radio" name="top" id="cod"
                                                                    value="COD" required>
                                                                <label for="cod"
                                                                    class="form-check-label radio-label">COD</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="top" id="cbd"
                                                                    value="CBD" required>
                                                                <label for="cbd"
                                                                    class="form-check-label radio-label">CBD</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="top" id="net"
                                                                    value="NET" required>
                                                                <label for="net"
                                                                    class="form-check-label radio-label">NET</label>
                                                                <input style="width: 32px; margin-left: 5px;"
                                                                    type="text" name="net_days" id="net_days"
                                                                    value="30">
                                                            </div>
                                                        </div>
                                                        @error('top')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group" required>
                                                        <label for="ptp" class="form-label">Packing & Transport
                                                            Price</label>
                                                        <div>
                                                            <div class="form-check">
                                                                <input type="radio" name="ptp" id="includeptp"
                                                                    value="Include" required>
                                                                <label for="includeptp"
                                                                    class="form-check-label radio-label">Include</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="ptp" id="excludeptp"
                                                                    value="Exclude" required>
                                                                <label for="excludeptp"
                                                                    class="form-check-label radio-label">Exclude</label>
                                                            </div>
                                                        </div>
                                                        @error('ptp')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="dod" class="form-label">DOD</label>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <input type="text" name="dod" class="form-control"
                                                                    id="dod" placeholder="Input DOD">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="vertical-center" style="font-size: 15px;">
                                                                    weeks</div>
                                                            </div>
                                                        </div>
                                                        @error('dod')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="shipping_address" class="form-label">Shipping
                                                            Address</label>
                                                        <textarea name="shipping_address" class="form-control" id="shipping_address" placeholder=" Shipping Address"
                                                            oninput="capitalizeName(this)" required></textarea>
                                                        @error('shipping_address')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="file" class="form-label">Upload File</label>
                                                <input type="file" name="file" class="form-control-file"
                                                    id="file">
                                            </div>
                                            <img id="filePreview" src="#" alt=""
                                                style="max-width: 100%; max-height: 200px; display: block; margin: 0 auto;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="valid" class="form-label">Valid Until</label>
                                                <input type="date" name="valid" class="form-control" id="valid"
                                                    placeholder="Select Date" required>
                                                @error('valid')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mdp" class="form-label">Miminum Down Payment</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="text" name="mdp" class="form-control"
                                                            id="mdp" value="0" placeholder="Input Miminum DP">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="vertical-center" style="font-size: 15px;">
                                                            %</div>
                                                    </div>
                                                </div>
                                                @error('mdp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="salesman" class="form-label">Salesman</label>
                                                <select class="form-control select2" name="salesman" id="salesman"
                                                    style="width: 100%;">
                                                    <option selected="selected" required disabled selected>--
                                                        Select
                                                        Salesman --
                                                    </option>
                                                    @foreach ($user as $u)
                                                        @if ($u->unit === 'MA')
                                                            <option value="{{ $u->name }}">
                                                                {{ $u->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('salesman')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="vertical-center"
                                                                style="font-size: 18px; margin-top: 5px">
                                                                <b>Subtotal</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="vertical-center"
                                                                style="font-size: 18px; margin-top: 12%">
                                                                <b>Discount</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="vertical-center"
                                                                style="font-size: 18px; margin-top: 14%">
                                                                <b>Tax</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="vertical-center"
                                                                style="font-size: 18px; margin-top: 12%">
                                                                <b>Freight</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="vertical-center"
                                                                style="font-size: 18px; margin-top: 12%">
                                                                <b>Total Amount</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-9" style="margin-top: 20%">
                                                            <input type="text" name="discount_percent" value="0"
                                                                class="form-control" id="discount_percent"
                                                                placeholder="Input Discount">
                                                        </div>
                                                        <div class="col-md-3" style="margin-top: 22%">
                                                            <div class="vertical-center" style="font-size: 18px;">
                                                                %</div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" style="margin-top: 6.5%">
                                                            <select class="form-control" name="tax_type" id="tax_type">
                                                                <option value="Select Tax Type" disabled selected>-- Select
                                                                    Tax Type --</option>
                                                                @foreach ($tax_type as $t)
                                                                    <option value="{{ $t->id_tax }}">
                                                                        {{ $t->id_tax }}|
                                                                        {{ $t->tax }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('tax_type')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control total" type="text" id="subtotal"
                                                            name="subtotal" value="0" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control discount" style="margin-top: 8%"
                                                            type="text" id="discount" name="discount" value="0"
                                                            readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" style="margin-top: 7%" type="text"
                                                            id="tax" name="tax" value="0" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="freight" class="form-control"
                                                            id="freight" placeholder="Input Freight" required
                                                            oninput="formatRupiah(this)">

                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" id="total_amount"
                                                            name="total_amount" value="0" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-custom">Add Quotation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            var errorAlert = '{{ session('error') }}';
            if (errorAlert !== '') {
                Swal.fire({
                    icon: 'error',
                    title: errorAlert,
                    position: 'top-end', // Mengubah posisi ke tengah
                    showConfirmButton: false, // Menampilkan tombol OK
                    timer: 5000,
                    toast: true,
                });
            }

            // Menampilkan pesan keberhasilan dari sesi menggunakan SweetAlert
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
            // Fungsi untuk mengubah judul berdasarkan halaman
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            // Panggil fungsi ini saat halaman dimuat
            updateTitle('Add Quotation');


            // Fungsi untuk mengatur tampilan input dan select berdasarkan status checkbox
            function toggleCompanyInput() {
                var checkbox = document.getElementById('addcompany');
                var inputText = document.getElementById('addcompany_text');
                var selectCompany = document.getElementById('company_name_select');
                var nameInput = document.getElementById('name');
                var phoneInput = document.getElementById('phone');
                var addressInput = document.getElementById('address');
                var taxAddressInput = document.getElementById('tax_address');
                var emailInput = document.getElementById('email');
                var faxInput = document.getElementById('fax');
                var npwpInput = document.getElementById('npwp');

                // Jika checkbox dipilih, tampilkan input, kosongkan kolom lain, dan sembunyikan select
                if (checkbox.checked) {
                    inputText.style.display = 'block';
                    selectCompany.style.display = 'none';

                    // Kosongkan kolom name, phone, address, tax address, email, fax, dan npwp
                    nameInput.value = '';
                    phoneInput.value = '';
                    addressInput.value = '';
                    taxAddressInput.value = '';
                    emailInput.value = '';
                    faxInput.value = '';
                    npwpInput.value = '';
                } else {
                    // Jika checkbox tidak dipilih, sembunyikan input dan tampilkan select
                    inputText.style.display = 'none';
                    selectCompany.style.display = 'block';
                }
            }

            // Menambahkan event listener untuk memanggil fungsi saat checkbox berubah
            document.getElementById('addcompany').addEventListener('change', toggleCompanyInput);

            document.getElementById('company_name_select').addEventListener('change', function() {
                var selectedCompany = this.value; // Mendapatkan nilai perusahaan yang dipilih

                // Menggunakan data dari customers yang sudah ada untuk mengisi kolom-kolom lainnya
                var customers = <?php echo json_encode($customers); ?>; // Mengonversi data PHP ke JSON
                var selectedCustomer = customers.find(function(customer) {
                    return customer.company === selectedCompany;
                });

                // Memasukkan nilai ke dalam kolom-kolom lainnya
                document.getElementById('name').value = selectedCustomer ? selectedCustomer.name : '';
                document.getElementById('npwp').value = selectedCustomer ? selectedCustomer.npwp : '';
                document.getElementById('phone').value = selectedCustomer ? selectedCustomer.phone : '';
                document.getElementById('address').value = selectedCustomer ? selectedCustomer.address : '';
                document.getElementById('tax_address').value = selectedCustomer ? selectedCustomer
                    .tax_address : '';
                document.getElementById('fax').value = selectedCustomer ? selectedCustomer.fax : '';
                document.getElementById('email').value = selectedCustomer ? selectedCustomer.email : '';
                document.getElementById('shipping_address').value = selectedCustomer ? selectedCustomer
                    .shipment : '';
            });


            // Ambil elemen input
            var qtyInput = document.getElementById('qty');

            // Tambahkan event listener untuk mendengarkan input
            qtyInput.addEventListener('input', function() {
                // Hapus karakter selain angka menggunakan regex
                var cleanedValue = qtyInput.value.replace(/\D/g, '');

                // Pastikan angka 0 tidak berada di depan
                if (cleanedValue.length > 1 && cleanedValue.charAt(0) === '0') {
                    cleanedValue = cleanedValue.slice(1);
                }

                // Setel nilai input yang telah dibersihkan
                qtyInput.value = cleanedValue;
            });

            // Mendapatkan elemen input NPWP
            const npwpInput = document.getElementById("npwp");

            // Menambahkan event listener untuk memvalidasi input
            npwpInput.addEventListener("input", function() {
                // Hapus semua karakter non-digit dari input
                let npwpValue = npwpInput.value.replace(/\D/g, "");

                // Batasi input hanya menerima 15 digit angka
                if (npwpValue.length > 15) {
                    npwpValue = npwpValue.slice(0, 15);
                }

                // Format input sesuai dengan "99.999.999.9-999.999"
                const formattedNPWP = npwpValue.replace(/(\d{2})(\d{3})(\d{3})(\d{1})(\d{3})(\d{3})/,
                    "$1.$2.$3.$4-$5.$6");

                // Setel nilai input yang diformat
                npwpInput.value = formattedNPWP;
            });

            // Mendapatkan elemen input gambar
            var imageInput = document.querySelector('#file');

            // Mendapatkan elemen gambar preview
            var imagePreview = document.querySelector('#filePreview');

            // Mendengarkan perubahan pada input gambar
            imageInput.addEventListener('change', function() {
                if (imageInput.files && imageInput.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                    };

                    reader.readAsDataURL(imageInput.files[0]);
                }
            });

            var rowIdx = 1;
            $("#addBtn").on("click", function() {
                // Adding a row inside the tbody.
                $("#quotationadd-table tbody").append(`
                    <tr id="R${++rowIdx}">
                        <td class="row-index text-center fixed-column"><p> ${rowIdx}</p></td>
                        <td><input class="form-control" style="min-width:120px" type="text" id="item" name="item[]"></td>
                        <td><input class="form-control"style="min-width:200px" type="text" id="item_desc" name="item_desc[]"></td>
                        <td><input class="form-control qty" style="width:80px" type="number" id="qty" name="qty[]" min="0"></td>
                        <td><select class="form-control" name="unit[]" id="unit" style="width:100px">
                                                                            <option selected="selected" required disabled
                                                                                selected>
                                                                            </option>
                                                                            @foreach ($unit as $u)<option value="{{ $u->unit }}">
                                                                                    {{ $u->unit }}</option> @endforeach
                                                                        </select></td>
                        <td><input class="form-control unit_price" style="width:120px" type="text" id="unit_price" name="unit_price[]"></td>
                        <td><input class="form-control disc"style="min-width:80px" type="text" id="disc" name="disc[]" value="0"></td>
                        <td><input class="form-control total" style="width:150px" type="text" id="amount" name="amount[]" value="0" readonly></td>
                        <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>`);
            });

            $("#quotationadd-table tbody").on("click", ".remove", function() {
                // Getting all the rows next to the row
                // containing the clicked button
                var child = $(this).closest("tr").nextAll();
                // Iterating across all the rows
                // obtained to change the index
                child.each(function() {
                    // Getting <tr> id.
                    var id = $(this).attr("id");

                    // Getting the <p> inside the .row-index class.
                    var idx = $(this).children(".row-index").children("p");

                    // Gets the row number from <tr> id.
                    var dig = parseInt(id.substring(1));

                    // Modifying row index.
                    idx.html(`${dig - 1}`);

                    // Modifying row id.
                    $(this).attr("id", `R${dig - 1}`);
                });

                // Removing the current row.
                $(this).closest("tr").remove();

                // Decreasing total number of rows by 1.
                rowIdx--;
            });

            // Mendapatkan elemen input tax_type
            var taxTypeInput = document.getElementById('tax_type');

            // Menambahkan event listener untuk memanggil fungsi calc_total saat nilai tax_type berubah
            taxTypeInput.addEventListener('change', function() {
                // Memanggil fungsi calc_total setelah perubahan nilai tax_type
                calc_total();
            });

            // Event listener untuk biaya pengiriman
            document.getElementById('freight').addEventListener('change', function() {
                // Menghilangkan karakter selain angka
                var freight_raw = this.value.replace(/\D/g, '');
                // Mengonversi ke format rupiah
                var formattedFreight = formatRupiahHelper(freight_raw);
                // Menetapkan nilai pada elemen HTML dengan format rupiah
                this.value = formattedFreight;
                // Memanggil fungsi calc_total setelah perubahan nilai
                calc_total();
            });

            document.getElementById('freight').addEventListener('keyup', function() {
                // Menghilangkan karakter selain angka
                var freight_raw = this.value.replace(/\D/g, '');
                // Mengonversi ke format rupiah
                var formattedFreight = formatRupiahHelper(freight_raw);
                // Menetapkan nilai pada elemen HTML dengan format rupiah
                this.value = formattedFreight;
                // Memanggil fungsi calc_total setelah perubahan nilai
                calc_total();
            });

            document.getElementById('discount_percent').addEventListener('input', function() {
                // Mengambil nilai dari input discount_percent
                var discountInput = document.getElementById('discount_percent');

                // Menghapus karakter selain angka
                var discountValue = discountInput.value.replace(/\D/g, '');

                // Memastikan nilai berada dalam rentang 0 hingga 100
                var discount = Math.min(100, Math.max(0, parseFloat(discountValue))) || 0;

                // Menetapkan nilai yang sudah diformat ke input discount_percent
                discountInput.value = discount;

                // Memanggil fungsi calc_total
                calc_total();
            });

            $("#quotationadd-table tbody").on("change keyup", ".unit_price, .qty, .disc", function() {
                var row = $(this).closest("tr");
                var unit_price_raw = row.find(".unit_price").val().replace(/\D/g,
                    ''); // Menghilangkan karakter selain angka
                var unit_price = parseFloat(unit_price_raw) || 0;
                var qty = parseFloat(row.find(".qty").val()) || 0;
                var total_sementara = unit_price * qty;

                // Mengambil nilai disc dan memastikan berada dalam rentang 0-100
                var disc = parseFloat(row.find(".disc").val()) || 0;
                disc = Math.min(100, Math.max(0, disc));

                var discount_product = (disc / 100) * total_sementara;
                var amount = total_sementara - discount_product; // Menggunakan discount_product

                // Pastikan amount tidak NaN
                amount = isNaN(amount) ? 0 : amount;

                // Menetapkan nilai pada elemen HTML dengan format rupiah
                row.find(".disc").val(disc); // Menetapkan nilai disc setelah diperiksa
                row.find(".unit_price").val(formatRupiahHelper(unit_price));
                row.find(".total").val(formatRupiahHelper(amount));
                calc_total();
            });

            function formatRupiah(input) {
                // Menghilangkan karakter selain angka
                var nominal = input.value.replace(/\D/g, '');

                // Mengonversi ke format rupiah
                var formattedNominal = formatRupiahHelper(nominal);

                // Menetapkan nilai yang sudah dikonversi ke input
                input.value = formattedNominal;
            }

            function formatRupiahHelper(angka) {
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

            function calc_total() {
                var subtotal = 0;
                var discount_percent = parseFloat($("#discount_percent").val().replace(/\D/g, '')) || 0;
                var tax = 0;
                var freight = parseFloat($("#freight").val().replace(/\D/g, '')) || 0;

                // Menghitung subtotal
                $("#quotationadd-table tbody tr").each(function() {
                    var total_str = $(this).find(".total").val().replace(/\D/g,
                        ''); // Menghilangkan karakter selain angka
                    subtotal += parseFloat(total_str) || 0;
                });

                var discount = (discount_percent / 100) * subtotal;

                // Menghitung tax
                var taxType = parseInt($("#tax_type").val()) || 0;
                switch (taxType) {
                    case 1:
                        tax = (0.11) * (subtotal - discount);
                        break;
                    case 2:
                        tax = (0.025) * (subtotal - discount);
                        break;
                    case 3:
                        tax = (0.02) * (subtotal - discount);
                        break;
                    case 4:
                        tax = 0;
                        break;
                    case 5:
                        tax = (0.011) * (subtotal - discount); // 1.1 %
                        break;
                    default:
                        tax = 0;
                        break;
                }
                // Menghitung tax dengan mempertahankan dua digit desimal
                tax = parseFloat(tax.toFixed(2));
                // Menghitung total_amount
                var total_amount = (subtotal - discount) + (tax + freight);

                // Menetapkan nilai pada elemen HTML
                $("#subtotal").val(formatRupiahHelper(subtotal.toFixed(2)));
                $("#discount").val(formatRupiahHelper(discount.toFixed(2)));
                $("#tax").val(formatRupiahHelper(tax.toFixed(2)));
                $("#freight").val(formatRupiahHelper(freight.toFixed(2)));
                $("#total_amount").val(formatRupiahHelper(total_amount.toFixed(2)));
            }
        });
    </script>
@endsection
