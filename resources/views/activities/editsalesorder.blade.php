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
                        <h1 class="m-0">Edit Sales Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.salesorder') }}">Sales Order</a></li>
                            <li class="breadcrumb-item active">Add Sales Order</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.updatesalesorder') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input class="form-control" type="hidden" id="id" name="id" value="{{ $salesorder->id }}">
                    <input class="form-control" type="hidden" id="so_number" name="so_number"
                        value="{{ $salesorder->so_number }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Sales Order Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="quotation_no" class="form-label">Quotation No.</label>
                                                <select name="quotation_no" id="quotation_no"
                                                    onchange="fetchQuotationData()" class="form-control select2"
                                                    style="width: 100%;" required>
                                                    <option selected="selected" disabled>-- Select Quotation ---</option>
                                                    @foreach ($quotation as $q)
                                                        <option value="{{ $q->quotation_no }}"
                                                            @if ($q->quotation_no === $salesorderJoin[0]->quotation_no) selected @endif>
                                                            {{ $q->quotation_no }}</option>
                                                    @endforeach
                                                </select>
                                                @error('quotation_no')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="po_number" class="form-label">PO No.</label>
                                                <input type="text" name="po_number" class="form-control" id="po_number"
                                                    placeholder=" PO No." value="{{ $salesorderJoin[0]->po_number }}"
                                                    required>
                                                @error('po_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="company_name" class="form-label">Company Name</label>
                                                <input type="text" name="company_name" class="form-control"
                                                    id="company_name" placeholder=" Company Name"
                                                    value="{{ $salesorderJoin[0]->company_name }}" required>
                                                @error('company_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                    placeholder=" Name" value="{{ $salesorderJoin[0]->name }}" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="so_number" class="form-label">SO No.</label>
                                                <input type="text" name="so_number" class="form-control" id="so_number"
                                                    placeholder=" SO No." value="{{ $salesorderJoin[0]->so_number }}"
                                                    required>
                                                @error('so_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" name="date" class="form-control" id="date"
                                                    placeholder="Select Date" value="{{ $salesorderJoin[0]->date }}"
                                                    required>
                                                @error('date')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea name="address" class="form-control" id="address" placeholder=" Address" oninput="capitalizeName(this)"
                                                    required>{{ $salesorderJoin[0]->address }}</textarea>
                                                @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" name="phone" class="form-control" id="phone"
                                                    placeholder=" Phone" value="{{ $salesorderJoin[0]->phone }}"
                                                    required>
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="order_unit" class="form-label">Order Unit</label>
                                                <select class="form-control select2" name="order_unit" id="order_unit"
                                                    style="width: 100%;">
                                                    <option selected="selected" required disabled selected>-- Select Order
                                                        Unit --</option>
                                                    @foreach ($order_unit as $ou)
                                                        <option value="{{ $ou->id_order_unit }}"
                                                            @if ($ou->id_order_unit === $salesorderJoin[0]->order_unit) selected @endif>
                                                            {{ $ou->code_order }}</option>
                                                    @endforeach
                                                </select>
                                                @error('order_unit')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="sow_no" class="form-label">SOW No.</label>
                                                <input type="text" name="sow_no" class="form-control" id="sow_no"
                                                    placeholder=" SOW No." value="{{ $salesorderJoin[0]->sow_no }}"
                                                    required>
                                                @error('sow_no')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tax_address" class="form-label">Tax Address</label>
                                                <textarea name="tax_address" class="form-control" id="tax_address" placeholder=" Tax Address"
                                                    oninput="capitalizeName(this)" required> {{ $salesorderJoin[0]->tax_address }}</textarea>
                                                @error('tax_address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="npwp" class="form-label">NPWP</label>
                                                <input type="text" name="npwp" class="form-control" id="npwp"
                                                    placeholder="__.___.___._-___.___"
                                                    value="{{ $salesorderJoin[0]->npwp }}">
                                                @error('npwp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fax" class="form-label">Fax</label>
                                                <input type="text" name="fax" class="form-control" id="fax"
                                                    placeholder=" Fax" value="{{ $salesorderJoin[0]->fax }}" required>
                                                @error('fax')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" name="email" class="form-control" id="email"
                                                    placeholder="Email" value="{{ $salesorderJoin[0]->email }}">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group" required>
                                                <label for="confirmation" class="form-label">Confirmation</label>
                                                <div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="meet"
                                                            value="Meet" required
                                                            {{ $salesorderJoin[0]->confirmation == 'Meet' ? 'checked' : '' }}>
                                                        <label for="meet" class="form-check-label">Meet</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="byphone"
                                                            value="by Phone" required
                                                            {{ $salesorderJoin[0]->confirmation == 'by Phone' ? 'checked' : '' }}>
                                                        <label for="byphone" class="form-check-label">by Phone</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="confirm_email"
                                                            value="Email" required
                                                            {{ $salesorderJoin[0]->confirmation == 'Email' ? 'checked' : '' }}>
                                                        <label for="confirm_email" class="form-check-label">Email</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="confirm_fax"
                                                            value="Fax" required
                                                            {{ $salesorderJoin[0]->confirmation == 'Fax' ? 'checked' : '' }}>
                                                        <label for="confirm_fax" class="form-check-label">Fax</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="radio" name="confirmation" id="note"
                                                            value="Note" required
                                                            {{ $salesorderJoin[0]->confirmation == 'Note' ? 'checked' : '' }}>
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
                                                            value="New" required
                                                            {{ $salesorderJoin[0]->type == 'New' ? 'checked' : '' }}>
                                                        <label for="new" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">New</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="repeat"
                                                            value="Repeat" required
                                                            {{ $salesorderJoin[0]->type == 'Repeat' ? 'checked' : '' }}>
                                                        <label for="repeat" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Repeat</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="prototype"
                                                            value="Prototype" required
                                                            {{ $salesorderJoin[0]->type == 'Prototype' ? 'checked' : '' }}>
                                                        <label for="prototype" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Prototype</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="repair"
                                                            value="Repair" required
                                                            {{ $salesorderJoin[0]->type == 'Repair' ? 'checked' : '' }}>
                                                        <label for="repair" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Repair</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="resharpening"
                                                            value="Resharpening" required
                                                            {{ $salesorderJoin[0]->type == 'Resharpening' ? 'checked' : '' }}>
                                                        <label for="resharpening" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Resharpening</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="harden"
                                                            value="Harden" required
                                                            {{ $salesorderJoin[0]->type == 'Harden' ? 'checked' : '' }}>
                                                        <label for="harden" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Harden</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="painting"
                                                            value="Painting" required
                                                            {{ $salesorderJoin[0]->type == 'Painting' ? 'checked' : '' }}>
                                                        <label for="painting" class="form-check-label radio-label"
                                                            style="margin-right: 35px;">Painting</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" name="type" id="others"
                                                            value="Others" required
                                                            {{ $salesorderJoin[0]->type == 'Others' ? 'checked' : '' }}>
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
                                                        class="btn btn-primary btn-custom btn-xs">
                                                        <a href="javascript:void(0)" class="text-light font-18"
                                                            title="Add Product" id="addBtn"><i
                                                                class="fa fa-plus"></i></a>
                                                    </button>
                                                </label>
                                                <div class="table-responsive" style="max-width: 100%;">
                                                    <table class="table" id="soadd-table"
                                                        style="width: 100%; overflow-x: auto;">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 20px" class="fixed-column">No</th>
                                                                <th class="col-sm-2">No Katalog</th>
                                                                <th class="col-md-6">Nama Katalog</th>
                                                                <th style="width:100px;">Unit Price</th>
                                                                <th style="width:80px;">Qty</th>
                                                                <th style="width:80px;">Unit</th>
                                                                <th style="width:80px;">Disc (%)</th>
                                                                <th>Amount</th>
                                                                <th class="col-sm-6">Product Type</th>
                                                                <th class="col-sm-2">Order No.</th>
                                                                <th class="col-sm-6">Specification</th>
                                                                <th class="col-sm-2">KBLI</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($salesorderJoin as $key => $item)
                                                                <tr>
                                                                    <input type="hidden" name="soadd[]"
                                                                        value="{{ $item->id }}">
                                                                    <td hidden class="ids">{{ $item->id }}</td>
                                                                    <td class="row-index text-center fixed-column">
                                                                        {{ ++$key }}</td>
                                                                        <td>
                                                                            <input list="katalog-options" class="form-control" name="item[]" id="item" value="{{ $item->item }}" style="width:100px" oninput="updateItemDesc(this)">
                                                                            <datalist id="katalog-options">
                                                                                @foreach ($no_katalog as $u)
                                                                                    <option value="{{ $u->no_katalog }}" data-name="{{ $u->nama_katalog }}" data-price="{{ $u->price }}">
                                                                                        {{ $u->no_katalog }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </datalist>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" style="min-width:200px" type="text" id="item_desc" name="item_desc[]" value="{{ $item->item_desc }}">
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control unit_price" style="min-width:200px" type="text" id="unit_price" name="unit_price[]" value="{{ $item->unit_price }}">
                                                                        </td>
                                                                    <td><input class="form-control qty" style="width:80px"
                                                                            type="number" id="qty" name="qty[]"
                                                                            value="{{ $item->qty }}">
                                                                    </td>
                                                                    <td><select class="form-control" name="unit[]"
                                                                            id="unit" style="width:110px">
                                                                            <option selected="selected" required disabled
                                                                                selected>-- Unit --
                                                                            </option>
                                                                            @foreach ($unit as $u)
                                                                                <option value="{{ $u->unit }}"
                                                                                    @if ($u->unit === $item->unit) selected @endif>
                                                                                    {{ $u->unit }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><input
                                                                            class="form-control disc"style="min-width:80px"
                                                                            type="text" id="disc" name="disc[]"
                                                                            value="{{ $item->disc }}">
                                                                    </td>
                                                                    <td><input class="form-control total"
                                                                            style="width:150px" type="text"
                                                                            id="amount" name="amount[]"
                                                                            value="{{ $item->amount }}" readonly></td>
                                                                    <td><select class="form-control select2"
                                                                            name="product_type[]" id="product_type"
                                                                            style="min-width:210px">
                                                                            <option selected="selected" required disabled>
                                                                                --
                                                                                Select Product Type --</option>
                                                                            @foreach ($producttype as $pt)
                                                                                <option value="{{ $pt->product_name }}"
                                                                                    @if ($pt->product_name === $item->product_type) selected @endif>
                                                                                    {{ $pt->product_name }}</option>
                                                                            @endforeach
                                                                        </select></td>
                                                                    <td><input class="form-control"
                                                                            style="min-width:120px" type="text"
                                                                            id="order_no" name="order_no[]"
                                                                            value="{{ $item->order_no }}" required>
                                                                    </td>
                                                                    <td><input class="form-control"style="min-width:200px"
                                                                            type="text" id="spec" name="spec[]"
                                                                            value="{{ $item->spec }}" required>
                                                                    </td>
                                                                    <td><select class="form-control select2"
                                                                            name="kbli[]" id="kbli"
                                                                            style="min-width:150px">
                                                                            <option selected="selected" required disabled>
                                                                                --
                                                                                Select KBLI --</option>
                                                                            @foreach ($kbli as $k)
                                                                                <option value="{{ $k->kbli_code }}"
                                                                                    @if ($k->kbli_code === $item->kbli) selected @endif>
                                                                                    {{ $k->kbli_code }} -
                                                                                    {{ $k->description }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                    <td><a href="javascript:void(0)"
                                                                            class="text-danger font-18 remove"
                                                                            title="Delete Product"><i
                                                                                class="fa fa-trash"></i></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" class="form-control" id="description" placeholder=" Description" required>{{ $salesorderJoin[0]->description }}</textarea>
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
                                                                    value="Photo" required
                                                                    {{ $salesorderJoin[0]->sample == 'Photo' ? 'checked' : '' }}>
                                                                <label for="photo" class="form-check-label radio-label"
                                                                    style="margin-right: 5px;">Photo</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="sample" id="2dd"
                                                                    value="2D Drawing" required
                                                                    {{ $salesorderJoin[0]->sample == '2D Drawing' ? 'checked' : '' }}>
                                                                <label for="2dd" class="form-check-label radio-label"
                                                                    style="margin-right: 5px;">2D Drawing</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="sample" id="3dd"
                                                                    value="3D Drawing" required
                                                                    {{ $salesorderJoin[0]->sample == '3D Drawing' ? 'checked' : '' }}>
                                                                <label for="3dd" class="form-check-label radio-label"
                                                                    style="margin-right: 5px;">3D Drawing</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="sample" id="sample"
                                                                    value="Sample" required
                                                                    {{ $salesorderJoin[0]->sample == 'Sample' ? 'checked' : '' }}>
                                                                <label for="sample" class="form-check-label radio-label"
                                                                    style="margin-right: 5px;">Sample</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" name="sample" id="none"
                                                                    value="None" required
                                                                    {{ $salesorderJoin[0]->sample == 'None' ? 'checked' : '' }}>
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
                                                                    value="in ATMI" required
                                                                    {{ $salesorderJoin[0]->ass_type == 'in ATMI' ? 'checked' : '' }}>
                                                                <label for="aia"
                                                                    class="form-check-label radio-label">Assy in
                                                                    ATMI</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="ass_type" id="aosl"
                                                                    value="on Shipping Location" required
                                                                    {{ $salesorderJoin[0]->ass_type == 'on Shipping Location' ? 'checked' : '' }}>
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
                                                                    value="QC Sheet" required
                                                                    {{ $salesorderJoin[0]->qc_statement == 'QC Sheet' ? 'checked' : '' }}>
                                                                <label for="qcs"
                                                                    class="form-check-label radio-label">QC Sheet</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="qc_statement" id="atr"
                                                                    value="Assy Test Report" required
                                                                    {{ $salesorderJoin[0]->qc_statement == 'Assy Test Report' ? 'checked' : '' }}>
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
                                                                    value="Cartoon Packing" required
                                                                    {{ $salesorderJoin[0]->packing_type == 'Cartoon Packing' ? 'checked' : '' }}>
                                                                <label for="cp"
                                                                    class="form-check-label radio-label">Cartoon
                                                                    Packing</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="packing_type" id="wp"
                                                                    value="Wood Packing" required
                                                                    {{ $salesorderJoin[0]->packing_type == 'Wood Packing' ? 'checked' : '' }}>
                                                                <label for="wp"
                                                                    class="form-check-label radio-label">Wood
                                                                    Packing</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="packing_type" id="sp"
                                                                    value="Special Packing" required
                                                                    {{ $salesorderJoin[0]->packing_type == 'Special Packing' ? 'checked' : '' }}>
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
                                                                    value="COD" required
                                                                    {{ $salesorderJoin[0]->top == 'COD' ? 'checked' : '' }}>
                                                                <label for="cod"
                                                                    class="form-check-label radio-label">COD</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="top" id="cbd"
                                                                    value="CBD" required
                                                                    {{ $salesorderJoin[0]->top == 'CBD' ? 'checked' : '' }}>
                                                                <label for="cbd"
                                                                    class="form-check-label radio-label">CBD</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="top" id="net"
                                                                    value="NET" required
                                                                    {{ $salesorderJoin[0]->top == 'NET' ? 'checked' : '' }}>
                                                                <label for="net"
                                                                    class="form-check-label radio-label">NET</label>
                                                                <input style="width: 32px; margin-left: 5px;"
                                                                    type="text" name="net_days" id="net_days"
                                                                    value="{{ $salesorderJoin[0]->net_days }}">
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
                                                                    value="Include" required
                                                                    {{ $salesorderJoin[0]->ptp == 'Include' ? 'checked' : '' }}>
                                                                <label for="includeptp"
                                                                    class="form-check-label radio-label">Include</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="ptp" id="excludeptp"
                                                                    value="Exclude" required
                                                                    {{ $salesorderJoin[0]->ptp == 'Exclude' ? 'checked' : '' }}>
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
                                                        <input type="date" name="dod" class="form-control"
                                                            id="dod" placeholder="Select Date" required
                                                            value="{{ $salesorderJoin[0]->dod }}">
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
                                                            oninput="capitalizeName(this)" required>{{ $salesorderJoin[0]->shipping_address }}</textarea>
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
                                                <label for="ship_date" class="form-label">Shipping Date</label>
                                                <input type="date" name="ship_date" class="form-control"
                                                    id="ship_date" placeholder="Select Date" required
                                                    value="{{ $salesorderJoin[0]->ship_date }}">
                                                @error('ship_date')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="fob" class="form-label">FOB</label>
                                                <select class="form-control select2" name="fob" id="fob"
                                                    style="width: 100%;">
                                                    <option selected="selected" required disabled selected>-- Select FOB --
                                                    </option>
                                                    <option value="1"
                                                        {{ $salesorderJoin[0]->fob == '1' ? 'selected' : '' }}>Shipping
                                                        Point</option>
                                                    <option value="2"
                                                        {{ $salesorderJoin[0]->fob == '2 ' ? 'selected' : '' }}>
                                                        Destination</option>
                                                    {{ $salesorderJoin[0]->top == 'NET' ? 'checked' : '' }}
                                                </select>
                                                @error('fob')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="salesman" class="form-label">Salesman</label>
                                                <input list="salesman-options" class="form-control" name="salesman" id="salesman" value="{{ old('salesman', $salesorderJoin[0]->salesman) }}" style="width: 100%;" required>
                                                
                                                <datalist id="salesman-options">
                                                    <!-- Empty option for default selection -->
                                                    <option value="" disabled {{ old('salesman') == null ? 'selected' : '' }}>-- Select Salesman --</option>
                                                    
                                                    @foreach ($user as $u)
                                                        @if ($u->unit === 'MA')
                                                            <!-- Options for salesmen -->
                                                            <option value="{{ $u->name }}">{{ $u->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </datalist>
                                            
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
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="vertical-center"
                                                                style="font-size: 18px; margin-top: 12%">
                                                                <b>DP</b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-9" style="margin-top: 20%">
                                                            <input type="text" name="discount_percent"
                                                                class="form-control" id="discount_percent"
                                                                placeholder="Discount"
                                                                value="{{ $salesorderJoin[0]->discount_percent }}">
                                                        </div>
                                                        <div class="col-md-3" style="margin-top: 20%">
                                                            <div class="vertical-center" style="font-size: 18px;">
                                                                %</div>
                                                        </div>
                                                        <div class="col-md-12" style="margin-top: 8%">
                                                            <select class="form-control" name="tax_type" id="tax_type">
                                                                <option value="Select Tax Type" disabled selected>-- Select
                                                                    Tax Type --</option>
                                                                @foreach ($tax_type as $t)
                                                                    <option value="{{ $t->id_tax }}"
                                                                        @if ($t->id_tax === $salesorderJoin[0]->tax_type) selected @endif>
                                                                        {{ $t->id_tax }}|
                                                                        {{ $t->tax }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('tax_type')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-9" style="margin-top: 47%">
                                                            <input type="text" name="dp_percent" class="form-control"
                                                                id="dp_percent" placeholder="DP"
                                                                value="{{ $salesorderJoin[0]->dp_percent }}">
                                                        </div>
                                                        <div class="col-md-3" style="margin-top: 46%">
                                                            <div class="vertical-center" style="font-size: 18px;">
                                                                %</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control total" style="margin-bottom: 8%"
                                                            type="text" id="subtotal" name="subtotal"
                                                            value="{{ $salesorderJoin[0]->subtotal }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control discount" style="margin-bottom: 8%"
                                                            type="text" id="discount" name="discount"
                                                            value="{{ $salesorderJoin[0]->discount }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" style="margin-bottom: 8%"type="text"
                                                            id="tax" name="tax"
                                                            value="{{ $salesorderJoin[0]->tax }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="freight" style="margin-bottom: 8%"
                                                            class="form-control" id="freight"
                                                            placeholder="Input Freight" required
                                                            value="{{ $salesorderJoin[0]->freight }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" style="margin-bottom: 8%"
                                                            type="text" id="total_amount" name="total_amount"
                                                            value="{{ $salesorderJoin[0]->total_amount }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" id="dp"
                                                            name="dp" value="{{ $salesorderJoin[0]->dp }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-custom">Update Sales Order</button>
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
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <script>
        function fetchQuotationData() {
            var quotationNo = document.getElementById('quotation_no').value;

            $.ajax({
                url: 'get-quotation-data/' + quotationNo,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var quotationData = data.quotation;
                    var quotationJoinData = data.quotationJoin;

                    document.getElementById('company_name').value = quotationData.company_name;
                    document.getElementById('name').value = quotationData.name;
                    document.getElementById('date').value = quotationData.date;
                    document.getElementById('address').value = quotationData.address;
                    document.getElementById('phone').value = quotationData.phone;
                    document.getElementById('tax_address').value = quotationData.tax_address;
                    document.getElementById('npwp').value = quotationData.npwp;
                    document.getElementById('fax').value = quotationData.fax;
                    document.getElementById('email').value = quotationData.email;
                    document.getElementById('description').value = quotationData.description;

                    $("#soadd-table tbody tr").remove();
                    for (var i = 0; i < quotationJoinData.length; i++) {
                        var itemData = quotationJoinData[i];

                        $("#soadd-table tbody").append(`
                        <tr>
                            <input type="hidden" name="quotationadd[]" value="${itemData.id}">
                            <td hidden class="ids">${itemData.id}</td>
                            <td class="row-index text-center fixed-column">${i+1}</td>
                             <td class="row-index text-center fixed-column">${i+1}</td>
                            <td>
                                                                    <input list="katalog-options" class="form-control" name="item[]" id="item" value="${itemData.item}" style="width:100px" oninput="updateItemDesc(this)">
                                                                    <datalist id="katalog-options">
                                                                        @foreach ($no_katalog as $u)
                                                                            <option value="{{ $u->no_katalog }}" data-name="{{ $u->nama_katalog }}" data-price="{{ $u->price }}">
                                                                                {{ $u->no_katalog }}
                                                                            </option>
                                                                        @endforeach
                                                                    </datalist>
                                                                </td>
                            <td><input class="form-control" style="min-width:200px" type="text" id="item_desc" name="item_desc[]" value="${itemData.item_desc}"></td>
                            <td>
                                                                    <input class="form-control unit_price" style="min-width:200px" type="text" id="unit_price" name="unit_price[]" value="${formatCurrency(itemData.unit_price)}">
                                                                </td>
                            <td><input class="form-control qty" style="width:80px" type="number" id="qty" name="qty[]" value="${itemData.qty}"></td>
                            <td><select class="form-control" name="unit[]" id="unit"style="width:110px">
                                    <option selected="selected" required>${itemData.unit}</option>
                                        @foreach ($unit as $u)
                                            <option value="{{ $u->unit }}">{{ $u->unit }}</option>
                                        @endforeach
                                </select>
                            </td>
                            <td><input class="form-control disc"style="min-width:80px"type="text" id="disc" name="disc[]" value="${itemData.disc}"></td>
                            <td><input class="form-control total" style="width:150px" type="text" id="amount" name="amount[]" value="${formatCurrency(itemData.amount)}" readonly></td>
                            <td><select class="form-control select2"
                                                                        name="product_type[]" id="product_type"
                                                                        style="min-width:210px">
                                                                        <option selected="selected" required disabled>--
                                                                            Select Product Type --</option>
                                                                        @foreach ($producttype as $pt)
                                                                            <option value="{{ $pt->product_name }}">
                                                                                {{ $pt->product_name }}</option>
                                                                        @endforeach
                                                                    </select></td>
                                                                <td><input class="form-control" style="min-width:120px"
                                                                        type="text" id="order_no" name="order_no[]"
                                                                        required>
                                                                </td>
                                                                <td><input class="form-control"style="min-width:200px"
                                                                        type="text" id="spec" name="spec[]"
                                                                        required>
                                                                </td>
                                                                <td><select class="form-control select2" name="kbli[]"
                                                                        id="kbli" style="min-width:150px">
                                                                        <option selected="selected" required disabled>--
                                                                            Select KBLI --</option>
                                                                        @foreach ($kbli as $k)
                                                                            <option value="{{ $k->kbli_code }}">
                                                                                {{ $k->kbli_code }} -
                                                                                {{ $k->description }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                            <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Delete Product">
                                <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>`);
                    }

                    setRadioButton('confirmation', quotationData.confirmation);
                    setRadioButton('type', quotationData.type);
                    setRadioButton('sample', quotationData.sample);
                    setRadioButton('ass_type', quotationData.ass_type);
                    setRadioButton('qc_statement', quotationData.qc_statement);
                    setRadioButton('packing_type', quotationData.packing_type);
                    setRadioButton('top', quotationData.top);
                    setRadioButton('ptp', quotationData.ptp);

                    document.getElementById('net_days').value = quotationData.net_days;
                    document.getElementById('shipping_address').value = quotationData.shipping_address;
                    document.getElementById('salesman').value = quotationData.salesman;
                    document.getElementById('subtotal').value = formatCurrency(quotationData.subtotal);
                    document.getElementById('discount_percent').value = quotationData.discount_percent;
                    document.getElementById('discount').value = formatCurrency(quotationData.discount);
                    document.getElementById('tax_type').value = quotationData.tax_type;
                    document.getElementById('tax').value = formatCurrency(quotationData.tax);
                    document.getElementById('freight').value = quotationData.freight;
                    document.getElementById('total_amount').value = formatCurrency(quotationData.total_amount);

                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Fungsi untuk mengubah nilai ke dalam format mata uang (IDR)
        function formatCurrency(value) {
            // Gunakan toLocaleString() dengan opsi currency untuk format IDR
            var formattedValue = parseFloat(value).toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            });

            return formattedValue;
        }

        function setRadioButton(radioGroupName, selectedValue) {
            var radioButtons = document.getElementsByName(radioGroupName);

            for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].value === selectedValue) {
                    radioButtons[i].checked = true;
                } else {
                    radioButtons[i].checked = false;
                }
            }
        }

        var rowIdx = 1;

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

            calc_total();
            // Fungsi untuk mengubah judul berdasarkan halaman
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            // Panggil fungsi ini saat halaman dimuat
            updateTitle('Edit Sales Order');

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

                // Batasi nilai input hingga 99
                cleanedValue = Math.min(1000, cleanedValue);

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
                var rowCount = $("#soadd-table tbody tr").length;
                $("#soadd-table tbody").append(`
                <tr id="R${rowCount + 1}">
                    <td class="row-index text-center fixed-column"><p> ${rowCount + 1}</p></td>
                     <td>
                                                                    <input list="katalog-options" class="form-control" name="item[]" id="item" style="width:100px" oninput="updateItemDesc(this)">
                                                                    <datalist id="katalog-options">
                                                                        @foreach ($no_katalog as $u)
                                                                            <option value="{{ $u->no_katalog }}" data-name="{{ $u->nama_katalog }}" data-price="{{ $u->price }}">
                                                                                {{ $u->no_katalog }}
                                                                            </option>
                                                                        @endforeach
                                                                    </datalist>
                                                                </td>
                            <td><input class="form-control" style="min-width:200px" type="text" id="item_desc" name="item_desc[]"></td>
                            <td>
                                                                    <input class="form-control unit_price" style="min-width:200px" type="text" id="unit_price" name="unit_price[]">
                                                                </td>
                            <td><input class="form-control qty" style="width:80px" type="number" id="qty" name="qty[]" ></td>
                            <td><select class="form-control" name="unit[]" id="unit"style="width:110px">
                                    <option selected="selected" required></option>-- Unit --</option>
                                        @foreach ($unit as $u)
                                            <option value="{{ $u->unit }}">{{ $u->unit }}</option>
                                        @endforeach
                                </select>
                            </td>
                            <td><input class="form-control disc"style="min-width:80px"type="text" id="disc" name="disc[]"></td>
                            <td><input class="form-control total" style="width:150px" type="text" id="amount" name="amount[]"  readonly></td>
                            <td><select class="form-control select2"
                                                                        name="product_type[]" id="product_type"
                                                                        style="min-width:210px">
                                                                        <option selected="selected" required disabled>--
                                                                            Select Product Type --</option>
                                                                        @foreach ($producttype as $pt)
                                                                            <option value="{{ $pt->product_name }}">
                                                                                {{ $pt->product_name }}</option>
                                                                        @endforeach
                                                                    </select></td>
                                                                <td><input class="form-control" style="min-width:120px"
                                                                        type="text" id="order_no" name="order_no[]"
                                                                        required>
                                                                </td>
                                                                <td><input class="form-control"style="min-width:200px"
                                                                        type="text" id="spec" name="spec[]"
                                                                        required>
                                                                </td>
                                                                <td><select class="form-control select2" name="kbli[]"
                                                                        id="kbli" style="min-width:150px">
                                                                        <option selected="selected" required disabled>--
                                                                            Select KBLI --</option>
                                                                        @foreach ($kbli as $k)
                                                                            <option value="{{ $k->kbli_code }}">
                                                                                {{ $k->kbli_code }} -
                                                                                {{ $k->description }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                    <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash"></i></a></td>
                </tr>`);
            });
            
            $("#soadd-table tbody").on("click", ".remove", function() {
                // Mendapatkan total produk di dalam tabel
                var totalProducts = $("#soadd-table tbody tr").length;

                if (totalProducts > 1) {
                    // Mendapatkan semua baris setelah baris yang berisi tombol yang diklik
                    var child = $(this).closest("tr").nextAll();

                    // Menghapus baris saat ini.
                    $(this).closest("tr").remove();

                    // Mengurangi total jumlah baris sebanyak 1.
                    rowIdx--;

                    // Iterasi melintasi semua baris yang didapatkan untuk mengubah indeks
                    child.each(function() {
                        // Mendapatkan id <tr>.
                        var id = $(this).attr("id");

                        // Mendapatkan elemen <p> di dalam kelas .row-index.
                        var idx = $(this).children(".row-index").children("p");

                        // Mendapatkan nomor baris dari id <tr>.
                        var dig = parseInt(id.substring(1));

                        // Mengubah indeks baris.
                        idx.html(`${dig - 1}`);

                        // Mengubah id baris.
                        $(this).attr("id", `R${dig - 1}`);
                    });

                    // Memanggil fungsi untuk menghitung total.
                    calc_total();
                } else {
                    // Alert jika hanya tersisa satu produk.
                    alert("Tidak dapat menghapus produk jika hanya tersisa satu.");
                }
            });


            $(document).on('click', '.delete_quotation', function() {
                var _this = $(this).parents('tr');
                $('.e_id').val(_this.find('.ids').text());

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

            document.getElementById('dp_percent').addEventListener('input', function() {
                // Mengambil nilai dari input discount_percent
                var dpInput = document.getElementById('dp_percent');

                // Menghapus karakter selain angka
                var dpValue = dpInput.value.replace(/\D/g, '');

                // Memastikan nilai berada dalam rentang 0 hingga 100
                var dp = Math.min(100, Math.max(0, parseFloat(dpValue))) || 0;

                // Menetapkan nilai yang sudah diformat ke input discount_percent
                dpInput.value = dp;

                // Memanggil fungsi calc_total
                calc_total();
            });

            $("#soadd-table tbody").on("change keyup", ".unit_price, .qty, .disc, .dp_percent", function() {
                var row = $(this).closest("tr");
                var unit_price_raw = row.find(".unit_price").val().replace(/\D/g, '');
                var unit_price = parseFloat(unit_price_raw) || 0;
                var qty = parseFloat(row.find(".qty").val()) || 0;
                var total_sementara = unit_price * qty;

                // Mengambil nilai disc dan memastikan berada dalam rentang 0-100
                var disc = parseFloat(row.find(".disc").val()) || 0;
                disc = Math.min(100, Math.max(0, disc));

                // Mengambil nilai dp_percent dan memastikan berada dalam rentang 0-100
                var dpPercent = parseFloat(row.find(".dp_percent").val()) || 0;
                dpPercent = Math.min(100, Math.max(0, dpPercent));

                var discount_product = (disc / 100) * total_sementara;
                var amount = total_sementara - discount_product;
                var dp_product = (dpPercent / 100) * amount;

                // Pastikan amount dan dp_product tidak NaN
                amount = isNaN(amount) ? 0 : amount;
                dp_product = isNaN(dp_product) ? 0 : dp_product;

                // Menetapkan nilai pada elemen HTML dengan format rupiah
                row.find(".disc").val(disc);
                row.find(".unit_price").val(formatRupiahHelper(unit_price));
                row.find(".total").val(formatRupiahHelper(amount));
                row.find(".dp_percent").val(formatRupiahHelper(dpPercent));
                calc_total();
            });
            // Mendapatkan elemen input amount
            var amountInput = document.getElementById('amount');

            // Menambahkan event listener untuk memformat nilai saat terjadi perubahan
            amountInput.addEventListener('change', function() {
                // Mengambil nilai input amount
                var inputValue = amountInput.value;

                // Menghapus karakter 'Rp', ',', dan '.' dari nilai input
                var cleanedValue = inputValue.replace(/[^\d]/g, '');

                // Mengonversi nilai input ke format rupiah
                var formattedValue = formatRupiah(cleanedValue);

                // Menetapkan nilai yang sudah dikonversi ke input amount
                amountInput.value = formattedValue;
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
                var discount_percent = parseFloat($("#discount_percent").val()) || 0;
                var dp_percent = parseFloat($("#dp_percent").val().replace(/\D/g, '')) || 0;
                var tax = 0;
                var freight = parseFloat($("#freight").val().replace(/\D/g, '')) || 0;

                // Menghitung subtotal
                $("#soadd-table tbody tr").each(function() {
                    var row = $(this);
                    var amount = parseFloat(row.find(".total").val().replace(/\D/g, '')) || 0;
                    subtotal += amount;
                });

                // Menghitung discount
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

                // Menghitung total_amount
                var total_amount = (subtotal - discount) + tax + freight;
                var dp = (dp_percent / 100) * total_amount;

                // Menetapkan nilai pada elemen HTML
                $("#subtotal").val(formatRupiahHelper(subtotal.toFixed(2)));
                $("#discount").val(formatRupiahHelper(discount.toFixed(2)));
                $("#tax").val(formatRupiahHelper(tax.toFixed(2)));
                $("#freight").val(formatRupiahHelper(freight.toFixed(2)));
                $("#total_amount").val(formatRupiahHelper(total_amount.toFixed(2)));
                $("#dp").val(formatRupiahHelper(dp.toFixed(2)));
            }


            document.getElementById('discount_percent').addEventListener('input', function() {
                calc_total();
            });

            document.getElementById('tax_type').addEventListener('change', function() {
                calc_total();
            });

            // document.getElementById('freight').addEventListener('input', function() {
            //     calc_total();
            // });
        });
    </script>
    <script>
        function updateItemDesc(inputElement) {
    // Get the input value
    var inputValue = inputElement.value;

    // Find the matching option in the datalist (if using datalist)
    var options = document.getElementById('katalog-options').options;
    var selectedOption = Array.from(options).find(option => option.value === inputValue);

    if (selectedOption) {
        // Get the data-name and data-price attributes from the selected option
        var nameKatalog = selectedOption.getAttribute('data-name');
        var price = selectedOption.getAttribute('data-price');

        // Find the corresponding item_desc and price input fields
        var inputDesc = inputElement.closest('td').nextElementSibling.querySelector('input[name="item_desc[]"]');
        var inputPrice = inputElement.closest('td').nextElementSibling.nextElementSibling.querySelector('input[name="unit_price[]"]');

        // Set the value of the input fields to the name_katalog and price
        inputDesc.value = nameKatalog || ''; // Set to empty string if name_katalog is not available
        inputPrice.value = price || ''; // Set to empty string if price is not available
    }
}

    </script>
@endsection
