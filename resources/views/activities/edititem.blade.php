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
                        <h1 class="m-0">Edit Items</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.item') }}">Items</a></li>
                            <li class="breadcrumb-item active">Edit Items</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.updateitem') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Items Form</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_number">Order Number</label>
                                            <input type="text" name="order_number" class="form-control" value="{{ old('order_number', $item->order_number) }}" readonly>
                                            @error('order_number')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="so_number">SO Number</label>
                                            <input type="text" name="so_number" class="form-control" value="{{ old('so_number', $item->so_number) }}" readonly>
                                            @error('so_number')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product" class="form-label">Product</label>
                                            <input type="text" name="product" class="form-control" id="product"
                                                placeholder="Input Product" value="{{ $itemJoin[0]->product }}" required readonly>
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
                                                placeholder="Company Name" value="{{ $itemJoin[0]->company_name }}"
                                                required readonly>
                                            @error('company_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dod" class="form-label">DOD</label>
                                            <input type="date" name="dod" class="form-control" id="dod"
                                                placeholder="SO No." value="{{ $itemJoin[0]->dod }}" required readonly>
                                            @error('dod')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Produk"
                                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom:0px;"
                                            class="form-label">
                                            Produk
                                            <button type="button" id="add-product-row" class="btn btn-primary btn-custom btn-xs">
                                                <a href="javascript:void(0)" class="text-light font-18" title="Add Product"
                                                    id="addBtn"><i class="fa fa-plus"></i></a>
                                            </button>
                                        </label>
                                        <div class="table-responsive" style="max-width: 100%;">
                                            <table class="table" id="soadd-table" style="width: 100%; overflow-x: auto;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:80px">ID Item</th>
                                                        <th style="width:80px">No Item</th>
                                                        <th class="col-sm-2">Item Name</th>
                                                        <th class="col-sm-2">Date Wanted</th>
                                                        <th class="col-md-6">Material</th>
                                                        <th style="width:80px">NOS</th>
                                                        <th style="width:80px">NOB</th>
                                                        <th class="col-sm-2">Issued</th>
                                                        <th class="col-md-6">Ass Drawing</th>
                                                        <th class="col-md-6">Drawing No</th>
                                                        <th style="width:80px;">Weight(kg)</th>
                                                        <th style="width:100px;">Length(mm)</th>
                                                        <th style="width:80px;">Width(mm)</th>
                                                        <th>Thickness(mm)</th>
                                                        <th>Material Cost</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($itemJoin as $key => $item)
                                                        <tr>
                                                            <input type="hidden" name="itemadd[]"
                                                                value="{{ $item->id }}">
                                                            <td hidden class="ids">{{ $item->id }}</td>
                                                            <td><input class="form-control" style="width:50px"
                                                                    type="text" id="id_item" name="id_item[]"
                                                                    value="{{ $item->id_item }}">
                                                            </td>
                                                            <td><input class="form-control" style="min-width:120px"
                                                                    type="text" id="no_item" name="no_item[]"
                                                                    value="{{ $item->no_item }}">
                                                            </td>
                                                            <td><input class="form-control" style="min-width:120px"
                                                                    type="text" id="item" name="item[]"
                                                                    value="{{ $item->item }}">
                                                            </td>
                                                            <td><input class="form-control" style="min-width:120px"
                                                                    type="date" id="dod_item" name="dod_item[]"
                                                                    value="{{ $item->dod_item }}">
                                                            </td>
                                                            <td><select class="form-control select2 material"
                                                                    style="width:180px" type="text" id="material"
                                                                    name="material[]">
                                                                    <option selected="selected" required disabled>
                                                                        --Material--
                                                                    </option>
                                                                    @foreach ($standardParts as $m)
                                                                        <option value="{{ $m->nama_barang }}"
                                                                            @if ($m->nama_barang === $item->material) selected @endif>
                                                                            {{ $m->nama_barang }}</option>
                                                                    @endforeach
                                                                    <option value="Rangkaian">
                                                                        Rangkaian
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td><input class="form-control nos" style="width:80px"
                                                                    type="text" id="nos" name="nos[]"
                                                                    value="{{ $item->nos }}">
                                                            </td>
                                                            <td><input class="form-control nob" style="width:80px"
                                                                    type="text" id="nob" name="nob[]"
                                                                    value="{{ $item->nob }}">
                                                            </td>
                                                            <td><input class="form-control" style="min-width:120px"
                                                                    type="date" id="issued_item" name="issued_item[]"
                                                                    value="{{ $item->issued_item }}">
                                                            </td>
                                                            <td><input class="form-control"style="min-width:200px"
                                                                    type="text" id="ass_drawing" name="ass_drawing[]"
                                                                    value="{{ $item->ass_drawing }}">
                                                            </td>
                                                            <td><input class="form-control"style="min-width:200px"
                                                                    type="text" id="drawing_no" name="drawing_no[]"
                                                                    value="{{ $item->drawing_no }}">
                                                            </td>
                                                            <td><input class="form-control weigth" style="width:80px"
                                                                    type="number" id="weight" name="weight[]"
                                                                    value="{{ $item->weight }}" step="0.01"
                                                                    value="0"></td>
                                                            <td><input class="form-control length"style="width:80px"
                                                                    type="number" id="length" name="length[]"
                                                                    value="{{ $item->length }}" step="0.01"
                                                                    value="0">
                                                            </td>
                                                            <td><input class="form-control width" style="width:80px"
                                                                    type="number" id="width" name="width[]"
                                                                    value="{{ $item->width }}" step="0.01"
                                                                    value="0">
                                                            </td>
                                                            <td><input class="form-control thickness" style="width:80px"
                                                                    type="number" id="thickness" name="thickness[]"
                                                                    value="{{ $item->thickness }}" step="0.01"
                                                                    value="0">
                                                            </td>
                                                            <td><a href="javascript:void(0)"
                                                                    class="text-danger font-18 remove"
                                                                    title="Delete Product"><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-custom">Edit Item</button>
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
    <script>
        var rowIdx = 1;

        window.addEventListener('DOMContentLoaded', (event) => {

            document.getElementById('order_number').addEventListener('change', function() {
                var selectedOrder = this.value; // Mendapatkan nilai perusahaan yang dipilih

                // Menggunakan data dari customers yang sudah ada untuk mengisi kolom-kolom lainnya
                var order = <?php echo json_encode($order); ?>; // Mengonversi data PHP ke JSON
                var selectedOrder = order.find(function(order) {
                    return order.order_number === selectedOrder;
                });

                // Memasukkan nilai ke dalam kolom-kolom lainnya
                document.getElementById('so_number').value = selectedOrder ? selectedOrder.so_number :
                    '';
                document.getElementById('product').value = selectedOrder ? selectedOrder.product :
                    '';
                document.getElementById('company_name').value = selectedOrder ? selectedOrder.customer :
                    '';
                document.getElementById('dod').value = selectedOrder ? selectedOrder.dod :
                    '';

            });

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
            updateTitle('Edit Items');


            $("#addBtn").on("click", function() {
                // Adding a row inside the tbody.
                $("#soadd-table tbody").append(`
                <tr id="R${++rowIdx}">
                    <td>
                <input class="row-index form-control" style="width:50px" type="text" id="id_item${rowIdx}" name="id_item[]" value="${rowIdx}">
            </td>
                    <td><input class="form-control" style="min-width:120px"
                                                            type="text" id="no_item" name="no_item[]">
                                                    </td>
                    <td><input class="form-control" style="min-width:120px" type="text" id="item" name="item[]"></td>
                    <td><input class="form-control" style="min-width:120px" type="date" id="dod_item" name="dod_item[]"></td>
                    <td><select class="form-control select2 material"
                                                                style="width:180px" type="text" id="material"
                                                                name="material[]">
                                                                <option selected="selected" required disabled>--Material--</option>
                                                                @foreach ($material as $m)
                                                                <option value="{{ $m->material }}">{{ $m->material }}</option>
                                                                @endforeach
                                                            </select></td>
                    <td><input class="form-control qty" style="width:80px" type="number" id="qty" name="qty[]"></td><td>
                        <input class="form-control"style="min-width:80px"
                                                                type="text" id="nos" name="nos[]">
                                                        </td>
                                                        <td><input class="form-control"style="min-width:80px"
                                                                type="text" id="nob" name="nob[]">
                                                        </td>

                                                        <td><input class="form-control" style="min-width:120px" type="date" id="issued_item" name="issued_item[]"></td>
                                                        <td><input class="form-control"style="min-width:200px"
                                                                type="text" id="ass_drawing" name="ass_drawing[]">
                                                        </td>
                                                        <td><input class="form-control"style="min-width:200px"
                                                                type="text" id="drawing_no" name="drawing_no[]">
                                                        </td>
                    <td><input class="form-control weight" style="width:100px"type="number" id="weight" name="weight[]" step="0.01" value="0"></td>
                    <td><input class="form-control length"style="min-width:100px"type="number" id="length" name="length[]" step="0.01" value="0"></td>
                    <td><input class="form-control width" style="width:100px" type="number" id="width" name="width[]" step="0.01" value="0" ></td>
                    <td><input class="form-control thickness" style="width:100px" type="number" id="thickness" name="thickness[]" step="0.01" value="0"></td>
                    <td><a href="javascript:void(0)"class="text-danger font-18 remove"title="Delete Product"><i class="fa fa-trash"></i></a></td>
                </tr>`);

                updateRowIndexes();
            });

            function updateRowIndexes() {
                $("#soadd-table tbody tr").each(function(index) {
                    var newIdx = index + 1;
                    $(this).find(".row-index").html(`<p>${newIdx}</p>`);
                    $(this).attr("id", `R${newIdx}`);
                });
            }

            $("#soadd-table tbody").on("click", ".remove", function() {
                // Getting all the rows next to the row
                // containing the clicked button
                var child = $(this).closest("tr").nextAll();
                // Iterating across all the rows
                // obtained to change the index
                child.each(function(index) {
                    var idx = $(this).find(".row-index");
                    var newIdx = index + 1;
                    idx.html(newIdx);
                    $(this).attr("id", `R${newIdx}`);
                });

                // Removing the current row.
                $(this).closest("tr").remove();

                // Decreasing total number of rows by 1.
                rowIdx--;

                updateRowIndexes();
            });



        });
    </script>
@endsection
