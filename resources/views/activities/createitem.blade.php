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
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Items</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.item') }}">Items</a></li>
                            <li class="breadcrumb-item active">Add Items</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.storeitem') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Items Form</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_number" class="form-label">Order</label>
                                            <select name="order_number" id="order_number" onchange="fetchOrderData()"
                                                class="form-control select2" style="width: 100%;" required>
                                                <option selected="selected" disabled>-- Select Order ---</option>
                                                @foreach ($order as $o)
                                                    <option value="{{ $o->order_number }}">
                                                        {{ $o->order_number }}</option>
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
                                            <label for="dod" class="form-label">Date Wanted</label>
                                            <input type="date" name="dod" class="form-control" id="dod"
                                                placeholder="Company Name" required>
                                            @error('dod')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">


                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Produk"
                                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom:0px;"
                                            class="form-label">
                                            Produk
                                            <button type="button" id="add-product-row"
                                                class="btn btn-primary btn-xs btn-custom">
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
                                                        <th class="col-md-6">Kode Log</th>
                                                        <th class="col-md-6">Material</th>
                                                        <th class="col-md-6">Shape</th>
                                                        <th style="width:80px">Massa(kg/m³)</th>
                                                        <th style="width:80px">NOS</th>
                                                        <th style="width:80px">NOB</th>
                                                        <th class="col-sm-2">Issued</th>
                                                        <th class="col-md-6">Ass Drawing</th>
                                                        <th class="col-md-6">Drawing No</th>
                                                        <th style="width:100px;">Length(mm)</th>
                                                        <th style="width:80px;">Width(mm)</th>
                                                        <th>Thickness(mm)</th>
                                                        <th style="width:80px;">Weight(kg)</th>
                                                        <th>Material Cost</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input class="row-index form-control" style="width:50px"
                                                                type="text" id="id_item1" name="id_item[]"
                                                                value="1" required></td>
                                                        <td><input class="form-control" style="min-width:120px"
                                                                type="text" id="no_item1" name="no_item[]" required>
                                                        </td>
                                                        <td><input class="form-control" style="min-width:120px"
                                                                type="text" id="item1" name="item[]" required>
                                                        </td>
                                                        <td><input class="form-control" style="min-width:120px"
                                                                type="date" id="dod_item1" name="dod_item[]" required>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select2 kodelog"
                                                                style="width:180px" id="kodelog1" name="kodelog[]"
                                                                required>
                                                                <option selected="selected" required disabled>--Kode Log--
                                                                </option>
                                                                @foreach ($kode_log as $m)
                                                                    <option value="{{ $m->kode_log }}">
                                                                        {{ $m->kode_log }}
                                                                    </option>
                                                                @endforeach
                                                                <option value="Assy">Assy</option>
                                                                <option value="Sub-Assy">Sub-Assy</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select2 material"
                                                                style="width:180px" id="material1" name="material[]">
                                                                <option selected="selected" required disabled>--Material--
                                                                </option>
                                                                @foreach ($standardParts as $m)
                                                                    <option value="{{ $m->nama_barang }}"
                                                                        data-kode-log="{{ $m->kode_log }}">
                                                                        {{ $m->nama_barang }}
                                                                    </option>
                                                                @endforeach
                                                                <option value="Assy">Assy</option>
                                                                <option value="Sub-Assy">Sub-Assy</option>
                                                            </select>
                                                        </td>


                                                        {{-- <td><input class="form-control material-price" style="width:100px"
                                                            type="number" id="mp" name="mp[]"
                                                            step="0.01" value="{{$standardParts->harga}}" readonly></td> --}}
                                                        <td>
                                                            <select class="form-control select2 shape" style="width:180px"
                                                                id="shape1" name="shape[]">
                                                                <option selected="selected" required disabled>--Shape--
                                                                </option>
                                                                {{-- <option value="square">Persegi</option>
                                                                <option value="circle">Lingkaran</option> --}}
                                                                <option value="sheet_metal_non_ss">Sheet Metal Non-SS
                                                                </option>
                                                                <option value="square_block_non_ss">Square Block Non-SS
                                                                </option>
                                                                <option value="square_pipe_non_ss">Square Pipe Non-SS
                                                                </option>
                                                                <option value="round_pipe_non_ss">Round Pipe Non-SS
                                                                </option>
                                                                <option value="sheet_metal_ss">Sheet Metal SS</option>
                                                                <option value="square_block_ss">Square Block SS</option>
                                                                <option value="square_pipe_ss">Square Pipe SS</option>
                                                                <option value="round_pipe_ss">Round Pipe SS</option>

                                                            </select>
                                                        </td>

                                                        <td><input class="form-control massa" style="width:100px"
                                                                type="number" id="massa1" name="massa[]"
                                                                step="0.001" value="0"></td>
                                                        <td><input class="form-control" style="min-width:80px"
                                                                type="text" id="nos1" name="nos[]"
                                                                value="-"></td>
                                                        <td><input class="form-control" style="min-width:80px"
                                                                type="text" id="nob1" name="nob[]"
                                                                value="-"></td>
                                                        <td><input class="form-control" style="min-width:120px"
                                                                type="date" id="issued_item1" name="issued_item[]"
                                                                required>
                                                        </td>
                                                        <td><input class="form-control" style="min-width:200px"
                                                                type="text" id="ass_drawing1" name="ass_drawing[]"
                                                                value="-"></td>
                                                        <td><input class="form-control" style="min-width:200px"
                                                                type="text" id="drawing_no1" name="drawing_no[]"
                                                                value="-"></td>
                                                        <td><input class="form-control length" style="min-width:100px"
                                                                type="number" id="length1" name="length[]"
                                                                step="0.001" value="0"></td>
                                                        <td><input class="form-control width" style="min-width:80px"
                                                                type="number" id="width1" name="width[]"
                                                                step="0.001" value="0"></td>
                                                        <td><input class="form-control thickness" style="min-width:80px"
                                                                type="number" id="thickness1" name="thickness[]"
                                                                step="0.001" value="0"></td>
                                                        <td><input class="form-control weight" style="width:100px"
                                                                type="number" id="weight1" name="weight[]"
                                                                step="0.01" value="0" readonly></td>
                                                        <td><input class="form-control material-cost" style="width:100px"
                                                                type="number" id="material_cost" name="material_cost[]"
                                                                step="0.01" value="0" readonly></td>
                                                        <td><button class="btn btn-danger btn-remove remove"
                                                                type="button">Remove</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="materialPrices" value='@json($standardParts)'>
                                <div class="row">
                                    <div class="card-footer" style="width: 100%;">
                                        <button type="submit"
                                            class="btn btn-primary float-right btn-custom">Save</button>
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
        $(document).ready(function() {
            // When the kode log select element changes
            $('.kodelog').change(function() {
                var selectedKodeLog = $(this).val();
                var correspondingMaterialSelect = $(this).closest('td').next('td').find('.material');

                // If Assy or Sub-Assy is selected, set the material dropdown to match
                if (selectedKodeLog === "Assy" || selectedKodeLog === "Sub-Assy") {
                    correspondingMaterialSelect.val(selectedKodeLog).trigger('change');
                } else {
                    // Reset the material dropdown if a different kode log is selected
                    correspondingMaterialSelect.val(null).trigger('change');
                }
            });
        });
    </script>
    <script>
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
        updateTitle('Add Items');
    </script>

    <script>
        function filterNamaBarang(row) {
            const selectedKodeLog = $(row).find('.kodelog').val();
            const materialDropdown = $(row).find('.material');

            console.log('Filtering materials for kode_log:', selectedKodeLog);

            // Show only the options that match the selected kode_log
            materialDropdown.find('option').each(function() {
                const kodeLogMaterial = $(this).data('kode-log');

                if (
                    (selectedKodeLog === 'Assy' && kodeLogMaterial === 'Assy') ||
                    (selectedKodeLog === 'Sub-Assy' && kodeLogMaterial === 'Sub-Assy') ||
                    (!selectedKodeLog && !kodeLogMaterial) ||
                    // Show if no kode_log is selected and option has no data-kode-log
                    (kodeLogMaterial === selectedKodeLog) // Show if kode_log matches exactly
                ) {
                    $(this).show(); // Show if it matches
                    console.log('Showing option:', $(this).val());
                } else {
                    $(this).hide(); // Hide if it doesn't match
                    console.log('Hiding option:', $(this).val());
                }
            });

            // Reset to the first visible option
            materialDropdown.val(materialDropdown.find('option:visible').first().val());
        }


        // Event listener for kode_log change
        $(document).on('change', '.kodelog', function() {
            const row = $(this).closest('tr');
            console.log('kode_log changed in row:', row.index());
            filterNamaBarang(row);
        });

        // Initialize filtering for existing rows
        filterNamaBarang($('#soadd-table tbody tr').first());

        let rowIdx = 1;

        // Function to get material price based on selected material
        function getMaterialPrice(material) {
            const materialPrices = JSON.parse($('#materialPrices').val());
            const selectedMaterial = materialPrices.find(m => m.nama_barang === material);
            console.log('Material selected:', material, 'Price:', selectedMaterial ? selectedMaterial.harga :
                'Not found');
            return selectedMaterial ? parseFloat(selectedMaterial.harga) : 0;
        }

        function calculateWeight(row) {
            const shape = $(row).find('.shape').val();
            let massa = parseFloat($(row).find('.massa').val());
            const length = parseFloat($(row).find('.length').val());
            const width = parseFloat($(row).find('.width').val());
            const thickness = parseFloat($(row).find('.thickness').val());
            let weight = 0;

            console.log('Calculating weight for row:', row.index(), 'Shape:', shape);

            // Automatically set massa based on shape selection
            if (shape.includes('non_ss')) {
                massa = 7.85; // Non-stainless steel
                console.log('Shape is non-SS, massa set to:', massa);
            } else if (shape.includes('ss')) {
                massa = 7.99; // Stainless steel
                console.log('Shape is SS, massa set to:', massa);
            }

            // Update the massa field automatically
            $(row).find('.massa').val(massa.toFixed(2));

            // Convert mm³ to m³ and use kg/m³ for density (since weight is in kg)
            const materialDensity = massa / 1000000;

            // Calculate weight based on shape
            if (shape === 'square') {
                weight = materialDensity * length * width * thickness;
            } else if (shape === 'circle') {
                const radius = width / 2;
                const volume = Math.PI * radius * radius * thickness;
                weight = materialDensity * volume;
            } else if (shape.includes('sheet_metal') || shape.includes('square_block')) {
                weight = materialDensity * length * width * thickness;
            } else if (shape.includes('square_pipe') || shape.includes('round_pipe')) {
                weight = length; // Placeholder
            }

            console.log('Calculated weight:', weight.toFixed(5));

            $(row).find('.weight').val(weight.toFixed(5));
            return weight;
        }

        // Event listener to auto-fill massa based on selected shape
        $(document).on('change', '.shape', function() {
            const row = $(this).closest('tr');
            console.log('Shape changed in row:', row.index());
            calculateWeight(row);
        });

        function calculateMaterialCost(row) {
            const weight = calculateWeight(row);
            const material = $(row).find('.material').val();
            const kodeLog = $(row).find('.kodelog').val();
            let materialCost = 0;

            // Set material cost to 0 for Rangkaian
            if (kodeLog === 'Assy' || material === 'Assy' || kodeLog === 'Sub-Assy' || material ===
                'Sub-Assy') {
                console.log('Assy or Sub-Assy selected, setting material cost to 0');
                materialCost = 0;
            } else {
                const materialPrice = getMaterialPrice(material);
                materialCost = weight * materialPrice;
            }

            console.log('Calculated material cost for row:', row.index(), 'Cost:', materialCost.toFixed(2));

            $(row).find('.material-cost').val(materialCost.toFixed(2));
        }

        function addListeners(row) {
            $(row).find('.shape, .massa, .length, .width, .thickness, .material').on('input change',
                function() {
                    console.log('Input changed in row:', row.index());
                    calculateMaterialCost(row);
                });

            // Reapply filterNamaBarang function when a new row is added
            $(row).find('.kodelog').on('change', function() {
                filterNamaBarang(row);
            });
        }

        addListeners($('#soadd-table tbody tr'));

        $('#addBtn').click(function() {
            rowIdx++;
            const newRow = `
                <tr>
                    <td><input class="row-index form-control" style="width:50px" type="text" id="id_item${rowIdx}" name="id_item[]" value="${rowIdx}"></td>
                    <td><input class="form-control" style="min-width:120px" type="text" id="no_item${rowIdx}" name="no_item[]"></td>
                    <td><input class="form-control" style="min-width:120px" type="text" id="item${rowIdx}" name="item[]"></td>
                    <td><input class="form-control" style="min-width:120px" type="date" id="dod_item${rowIdx}" name="dod_item[]"></td>
                    <td>
                        <select class="form-control select2 kodelog" style="width:180px" id="kodelog${rowIdx}" name="kodelog[]">
                            <option selected="selected" required disabled>--Kode Log--</option>
                            @foreach ($kode_log as $m)
                                <option value="{{ $m->kode_log }}">{{ $m->kode_log }}</option>
                            @endforeach
                                                                    <option value="Assy">
                                                                        Assy
                                                                    </option>
                                                                    <option value="Sub Assy">
                                                                        Sub-Assy
                                                                    </option>

                        </select>
                    </td>
                    <td>
                        <select class="form-control select2 material" style="width:180px" id="material${rowIdx}" name="material[]">
                            <option selected="selected" required disabled>--Material--</option>
                            @foreach ($standardParts as $m)
                                <option value="{{ $m->nama_barang }}" data-kode-log="{{ $m->kode_log }}">{{ $m->nama_barang }}</option>
                            @endforeach
                                                                    <option value="Assy">
                                                                        Assy
                                                                    </option>
                                                                    <option value="Sub Assy">
                                                                        Sub-Assy
                                                                    </option>

                        </select>
                    </td>
                    <td>
                        <select class="form-control select2 shape" style="width:180px" id="shape${rowIdx}" name="shape[]">
                            <option selected="selected" required disabled>--Shape--</option>
                            <option value="square">Persegi</option>
                            <option value="circle">Lingkaran</option>
                            <option value="sheet_metal_non_ss">Sheet Metal Non-SS</option>
                            <option value="square_block_non_ss">Square Block Non-SS</option>
                            <option value="square_pipe_non_ss">Square Pipe Non-SS</option>
                            <option value="round_pipe_non_ss">Round Pipe Non-SS</option>
                            <option value="sheet_metal_ss">Sheet Metal SS</option>
                            option value="square_block_ss">Square Block SS</option>
                            <option value="square_pipe_ss">Square Pipe SS</option>
                            <option value="round_pipe_ss">Round Pipe SS</option>
                        </select>
                    </td>
                    <td><input class="form-control massa" style="width:100px" type="number" id="massa${rowIdx}" name="massa[]" step="0.01" value="0"></td>
                    <td><input class="form-control" style="min-width:80px" type="text" id="nos${rowIdx}" name="nos[]" value="-"></td>
                    <td><input class="form-control" style="min-width:80px" type="text" id="nob${rowIdx}" name="nob[]" value="-"></td>
                    <td><input class="form-control" style="min-width:120px" type="date" id="issued_item${rowIdx}" name="issued_item[]" required></td>
                    <td><input class="form-control" style="min-width:200px" type="text" id="ass_drawing${rowIdx}" name="ass_drawing[]" value="-"></td>
                    <td><input class="form-control" style="min-width:200px" type="text" id="drawing_no${rowIdx}" name="drawing_no[]" value="-"></td>
                    <td><input class="form-control length" style="min-width:100px" type="number" id="length${rowIdx}" name="length[]" step="0.01" value="0"></td>
                    <td><input class="form-control width" style="min-width:80px" type="number" id="width${rowIdx}" name="width[]" step="0.01" value="0"></td>
                    <td><input class="form-control thickness" style="min-width:80px" type="number" id="thickness${rowIdx}" name="thickness[]" step="0.01" value="0"></td>
                    <td><input class="form-control weight" style="width:100px" type="number" id="weight${rowIdx}" name="weight[]" step="0.01" value="0" readonly></td>
                    <td><input class="form-control material-cost" style="width:100px" type="number" id="material_cost${rowIdx}" name="material_cost[]" step="0.01" value="0" readonly></td>
                    <td><button class="btn btn-danger btn-remove remove" type="button">Remove</button></td>
                </tr>`;

            $('#soadd-table tbody').append(newRow);
            const addedRow = $('#soadd-table tbody tr').last();

            console.log('New row added:', rowIdx);

            addListeners(addedRow);

            // Apply the filtering to the new row
            filterNamaBarang(addedRow);
        });

        $('#soadd-table').on('click', '.remove', function() {
        const row = $(this).closest('tr');
        console.log('Removing row:', row.index());
        row.remove();
        rowIdx--;
        });
        });
    </script>
@endsection
