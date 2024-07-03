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
                        <h1 class="m-0">Edit Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.order') }}">Order</a></li>
                            <li class="breadcrumb-item active">Edit Order</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.updateorder', ['id' => $order->id]) }}" enctype="multipart/form-data"
                    method="POST" onsubmit="return validateForm();">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Order Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="order_number" class="form-label">Order No.</label>
                                                <input type="text" name="order_number" class="form-control"
                                                    id="order_number" placeholder="Input Order No." required
                                                    value="{{ old('order_number', $order->order_number) }}">
                                                @error('order_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="so_number" class="form-label">Sales Order No.</label>
                                                <select name="so_number" id="so_number" class="form-control select2"
                                                    style="width: 100%;" required>
                                                    <option selected="selected" disabled>-- Select SO ---</option>
                                                    @foreach ($so_number as $s)
                                                        <option value="{{ $s->so_number }}"
                                                            @if ($s->so_number == $order->so_number) selected @endif>
                                                            {{ $s->so_number }}</option>
                                                    @endforeach
                                                </select>
                                                @error('po_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="quotation_number" class="form-label">Quotation No.</label>
                                                <select name="quotation_number" id="quotation_number"
                                                    class="form-control select2" style="width: 100%;" required>
                                                    <option selected="selected" disabled>-- Select Quotation --</option>
                                                    @foreach ($quotation_no as $q)
                                                        <option value="{{ $q->quotation_no }}"
                                                            @if ($q->quotation_no == $order->quotation_number) selected @endif>
                                                            {{ $q->quotation_no }}</option>
                                                    @endforeach
                                                </select>
                                                @error('quotation_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="kbli_code" class="form-label">KBLI Code</label>
                                                <select name="kbli_code" id="kbli_code"class="form-control select2"
                                                    style="width: 100%;" required>
                                                    <option selected="selected" disabled>-- Select KBLI Code --</option>
                                                    @foreach ($kbli_code as $k)
                                                        <option value="{{ $k->kbli_code }}"
                                                            @if ($k->kbli_code == $order->kbli_code) selected @endif>
                                                            {{ $k->kbli_code }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kbli_code')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="reff_number" class="form-label">Reff Number</label>
                                                <input type="text" name="reff_number" class="form-control"
                                                    id="reff_number" placeholder="Reff Number" required
                                                    value="{{ old('reff_number', $order->reff_number) }}">
                                                @error('reff_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="order_date" class="form-label">Order Date</label>
                                                <input type="date" name="order_date" class="form-control" id="order_date"
                                                    placeholder="Select Date" required
                                                    value="{{ old('order_date', $order->order_date) }}">
                                                @error('order_date')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="product_type" class="form-label">Product Type</label>
                                                <select name="product_type" id="product_type" class="form-control select2"
                                                    style="width: 100%;" required>
                                                    <option selected="selected" disabled>-- Select Product ---</option>
                                                    @foreach ($producttype as $pt)
                                                        <option value="{{ $pt->product_name }}"
                                                            @if ($pt->product_name == $order->product_type) selected @endif>
                                                            {{ $pt->product_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('date')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="po_number" class="form-label">PO No.</label>
                                                <input type="text" name="po_number" class="form-control"
                                                    id="po_number" placeholder="Input PO No." required
                                                    value="{{old('po_number', $order->po_number) }}">
                                                @error('po_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="sale_price" class="form-label">Sale Price</label>
                                                <input type="text" name="sale_price" class="form-control"
                                                    id="sale_price" placeholder="Input Sale Price" required
                                                    value="{{ old('sale_price', $order->sale_price) }}">
                                                @error('sale_price')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="production_cost" class="form-label">Production Cost</label>
                                                <input type="text" name="production_cost" class="form-control"
                                                    id="production_cost" placeholder="Input Production Cost" required
                                                    value="{{ old('production_cost', $order->production_cost) }}">
                                                @error('production_cost')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="information" class="form-label">Information</label>
                                                <textarea style="height: 124px" name="information" class="form-control" id="information"
                                                    placeholder="Input Information">{{ old('information', $order->information) }}</textarea>
                                                @error('information')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="order_status" class="form-label">Order Status</label>
                                                <input type="text" name="order_status" class="form-control"
                                                    id="order_status" placeholder="Input Order Status" required
                                                    value="{{ old('order_status', $order->order_status) }}">
                                                @error('order_status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="customer" class="form-label">Customer</label>
                                                <input type="text" name="customer" class="form-control"
                                                    id="customers" placeholder="Input Customer" required
                                                    value="{{ old('customer', $order->customer) }}">
                                                @error('customer')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="row ml-1">
                                                <div class="form-group" style="margin-right: 8px; width:300px">
                                                    <label for="product" class="form-label">Product</label>
                                                    <input type="text" name="product" class="form-control"
                                                        id="product" placeholder="Input Product" required
                                                        value="{{ old('product', $order->product) }}">
                                                    @error('product')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group" style="width: 75px">
                                                    <label for="qty" class="form-label">QTY</label>
                                                    <input type="number" name="qty" class="form-control"
                                                        id="qty" placeholder="QTY" required
                                                        value="{{ old('qty', $order->qty) }}">
                                                    @error('qty')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="information2" class="form-label">Information</label>
                                                <textarea style="height: 124px" name="information2" class="form-control" id="information2" placeholder="Information">{{ old('information2', $order->information2) }}</textarea>
                                                @error('information')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dod" class="form-label">DOD</label>
                                                <input type="date" name="dod" class="form-control" id="dod"
                                                    placeholder="Select Date" required value="{{ old('dod', $order->dod) }}">
                                                @error('dod')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="dod_forecast" class="form-label">DOD Forecast</label>
                                                <input type="date" name="dod_forecast" class="form-control"
                                                    id="dod_forecast" placeholder="Select Date" required value="{{ old('dod_forecast', $order->dod_forecast) }}">
                                                @error('dod_forecast')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="sample" class="form-label">Sample</label>
                                                <input type="text" name="sample" class="form-control" id="sample"
                                                    placeholder="Input Sample" required value="{{ old('sample', $order->sample) }}">
                                                @error('sample')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="material" class="form-label">Material</label>
                                                <input type="text" name="material" class="form-control"
                                                    id="material" placeholder="Input Material" required value="{{ old('material', $order->material) }}">
                                                @error('material')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="catalog_number" class="form-label">Catalog No.</label>
                                                <input type="text" name="catalog_number" class="form-control"
                                                    id="catalog_number" placeholder="Input Catalog No" required value="{{ old('catalog_number', $order->catalog_number) }}">
                                                @error('catalog_number')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="material_cost" class="form-label">Material Cost</label>
                                                <input type="text" name="material_cost" class="form-control"
                                                    id="material_cost" placeholder="Input Material Cost" required value="{{ old('material_cost', $order->material_cost) }}">
                                                @error('material_cost')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="dod_adj" class="form-label">DOD Adj.</label>
                                                <input type="date" name="dod_adj" class="form-control" id="dod_adj"
                                                    placeholder="dod_adj" required value="{{ old('dod_adj', $order->dod_adj) }}">
                                                @error('dod_adj')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="information3" class="form-label">Information</label>
                                                <textarea style="height: 39px" name="information3" class="form-control" id="information3" placeholder="Information">{{old('information3',$order->information3)}}</textarea>
                                                @error('information')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-custom">Update Order</button>
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
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {

            document.getElementById('so_number').addEventListener('change', function() {
                var selectedSO = this.value; // Mendapatkan nilai perusahaan yang dipilih

                // Menggunakan data dari customers yang sudah ada untuk mengisi kolom-kolom lainnya
                var so = <?php echo json_encode($so); ?>; // Mengonversi data PHP ke JSON
                var selectedSo = so.find(function(so) {
                    return so.so_number === selectedSO;
                });

                var soadd = <?php echo json_encode($soadd); ?>; // Mengonversi data PHP ke JSON
                var selectedSoadd = soadd.find(function(soadd) {
                    return soadd.so_number === selectedSO;
                });

                // Memasukkan nilai ke dalam kolom-kolom lainnya
                document.getElementById('order_number').value = selectedSo ? selectedSo.so_number : '';
                document.getElementById('quotation_number').value = selectedSo ? selectedSo.quotation_no :
                    '';
                document.getElementById('kbli_code').value = selectedSoadd ? selectedSoadd.kbli : '';
                document.getElementById('product_type').value = selectedSoadd ? selectedSoadd.product_type :
                    '';
                document.getElementById('po_number').value = selectedSo ? selectedSo.po_number : '';
                document.getElementById('sale_price').value = selectedSo ? selectedSo
                    .total_amount : '';
                document.getElementById('customers').value = selectedSo ? selectedSo.name : '';
                document.getElementById('dod').value = selectedSo ? selectedSo.dod : '';
                document.getElementById('order_date').value = selectedSo ? selectedSo.date : '';
                document.getElementById('information').value = selectedSo ? selectedSo.description : '';
            });

            // Fungsi untuk mengubah nilai ke dalam format mata uang (IDR)
            function formatCurrency(value) {
                // Gunakan toLocaleString() dengan opsi currency untuk format IDR
                var formattedValue = parseFloat(value).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

                return formattedValue;
            }

            // Fungsi untuk mengubah judul berdasarkan halaman
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            // Panggil fungsi ini saat halaman "barcode" dimuat
            updateTitle('Edit Order');

        });
    </script>
@endsection
