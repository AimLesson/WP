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
                        <h1 class="m-0">Edit Items</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.item') }}">Items</a></li>
                            <li class="breadcrumb-item active">Edit Items</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.updateitem') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Items Form : {{ $orderNumber}}</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Produk"
                                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom:0px;"
                                            class="form-label">
                                            Produk
                                            <button id="addRowButton" class="btn btn-primary" type="button">Add Row</button>
                                        </label>

                                        <div class="table-responsive" style="max-width: 100%;">
                                            <table class="table" id="soadd-table" style="width: 100%; overflow-x: auto;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:50px;">#</th> <!-- Row number column -->
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
                                                    <input type="hidden" name="order_number" value="{{ $orderNumber }}">
                                                    @foreach ($itemDetails as $index => $detail)
                                                    <tr>
                                                        <td class="row-index">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td>
                                                            <input class="row-index form-control" style="width:50px"
                                                                type="text" id="id_item{{ $index }}" name="id_item[]"
                                                                value="{{ $detail->id_item }}" required>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" style="min-width:120px"
                                                                type="text" id="no_item{{ $index }}" name="no_item[]"
                                                                value="{{ $detail->no_item }}" required>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" style="min-width:120px"
                                                                type="text" id="item{{ $index }}" name="item[]"
                                                                value="{{ $detail->item }}" required>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" style="min-width:120px"
                                                                type="date" id="dod_item{{ $index }}" name="dod_item[]"
                                                                value="{{ $detail->dod_item }}" required>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select2 kodelog" style="width:180px" id="kodelog{{ $index }}" name="kodelog[]" required>
                                                                <option selected="selected" disabled>--Kode Log--</option>
                                                                @foreach ($kode_log as $log)
                                                                <option value="{{ $log->kode_log }}" {{ $detail->kodelog === $log->kode_log ? 'selected' : '' }}>
                                                                    {{ $log->kode_log }}
                                                                </option>
                                                                @endforeach
                                                                <option value="Assy" {{ $detail->kodelog === 'Assy' ? 'selected' : '' }}>Assy</option>
                                                                <option value="Sub-Assy" {{ $detail->kodelog === 'Sub-Assy' ? 'selected' : '' }}>Sub-Assy</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select2 material" style="width:180px" id="material{{ $index }}" name="material[]">
                                                                <option selected="selected" disabled>--Material--</option>
                                                                @foreach ($standardParts as $part)
                                                                <option value="{{ $part->nama_barang }}" data-kode-log="{{ $part->kode_log }}" {{ $detail->material === $part->nama_barang ? 'selected' : '' }}>
                                                                    {{ $part->nama_barang }}
                                                                </option>
                                                                @endforeach
                                                                <option value="Assy" {{ $detail->material === 'Assy' ? 'selected' : '' }}>Assy</option>
                                                                <option value="Sub-Assy" {{ $detail->material === 'Sub-Assy' ? 'selected' : '' }}>Sub-Assy</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control select2 shape" style="width:180px" id="shape{{ $index }}" name="shape[]">
                                                                <option selected="selected" disabled>--Shape--</option>
                                                                <option value="sheet_metal_non_ss" {{ $detail->shape === 'sheet_metal_non_ss' ? 'selected' : '' }}>Sheet Metal Non-SS</option>
                                                                <option value="square_block_non_ss" {{ $detail->shape === 'square_block_non_ss' ? 'selected' : '' }}>Square Block Non-SS</option>
                                                                <option value="square_pipe_non_ss" {{ $detail->shape === 'square_pipe_non_ss' ? 'selected' : '' }}>Square Pipe Non-SS</option>
                                                                <option value="round_pipe_non_ss" {{ $detail->shape === 'round_pipe_non_ss' ? 'selected' : '' }}>Round Pipe Non-SS</option>
                                                                <option value="sheet_metal_ss" {{ $detail->shape === 'sheet_metal_ss' ? 'selected' : '' }}>Sheet Metal SS</option>
                                                                <option value="square_block_ss" {{ $detail->shape === 'square_block_ss' ? 'selected' : '' }}>Square Block SS</option>
                                                                <option value="square_pipe_ss" {{ $detail->shape === 'square_pipe_ss' ? 'selected' : '' }}>Square Pipe SS</option>
                                                                <option value="round_pipe_ss" {{ $detail->shape === 'round_pipe_ss' ? 'selected' : '' }}>Round Pipe SS</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input class="form-control massa" style="width:100px"
                                                                type="number" id="massa{{ $index }}" name="massa[]"
                                                                step="0.001" value="{{ $detail->massa }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control nos" style="min-width:80px"
                                                                type="number" id="nos{{ $index }}" name="nos[]"
                                                                step="0.001" value="{{ $detail->nos }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" style="min-width:80px"
                                                                type="text" id="nob{{ $index }}" name="nob[]"
                                                                value="{{ $detail->nob }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" style="min-width:120px"
                                                                type="date" id="issued_item{{ $index }}" name="issued_item[]"
                                                                value="{{ $detail->issued_item }}" required>
                                                        </td>
                                                        <td>
                                                            <input class="form-control" style="min-width:200px"
                                                                type="text" id="ass_drawing{{ $index }}" name="ass_drawing[]"
                                                                value="{{ $detail->ass_drawing }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control" style="min-width:200px"
                                                                type="text" id="drawing_no{{ $index }}" name="drawing_no[]"
                                                                value="{{ $detail->drawing_no }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control length" style="min-width:100px"
                                                                type="number" id="length{{ $index }}" name="length[]"
                                                                step="0.001" value="{{ $detail->length }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control width" style="min-width:80px"
                                                                type="number" id="width{{ $index }}" name="width[]"
                                                                step="0.001" value="{{ $detail->width }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control thickness" style="min-width:80px"
                                                                type="number" id="thickness{{ $index }}" name="thickness[]"
                                                                step="0.001" value="{{ $detail->thickness }}">
                                                        </td>
                                                        <td>
                                                            <input class="form-control weight" style="width:100px"
                                                                type="number" id="weight{{ $index }}" name="weight[]"
                                                                step="0.01" value="{{ $detail->weight }}" readonly>
                                                        </td>
                                                        <td>
                                                            <input class="form-control material-cost" style="width:100px"
                                                                type="number" id="material_cost{{ $index }}" name="material_cost[]"
                                                                step="0.01" value="{{ $detail->material_cost }}" readonly>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger btn-remove remove"
                                                                type="button">Remove</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
        const kodeLogOptions = @json($kode_log);
        const standardPartsOptions = @json($standardParts);

        function generateKodeLogOptions(selectedValue = '') {
            let options = '<option selected="selected" disabled>--Kode Log--</option>';
            kodeLogOptions.forEach(log => {
                options += `<option value="${log.kode_log}" ${log.kode_log === selectedValue ? 'selected' : ''}>${log.kode_log}</option>`;
            });
            options += `<option value="Assy" ${selectedValue === 'Assy' ? 'selected' : ''}>Assy</option>`;
            options += `<option value="Sub-Assy" ${selectedValue === 'Sub-Assy' ? 'selected' : ''}>Sub-Assy</option>`;
            return options;
        }

        function generateMaterialOptions(selectedValue = '') {
            let options = '<option selected="selected" disabled>--Material--</option>';
            standardPartsOptions.forEach(part => {
                options += `<option value="${part.nama_barang}" data-kode-log="${part.kode_log}" ${part.nama_barang === selectedValue ? 'selected' : ''}>${part.nama_barang}</option>`;
            });
            options += `<option value="Assy" ${selectedValue === 'Assy' ? 'selected' : ''}>Assy</option>`;
            options += `<option value="Sub-Assy" ${selectedValue === 'Sub-Assy' ? 'selected' : ''}>Sub-Assy</option>`;
            return options;
        }

        function filterNamaBarang(row) {
            const selectedKodeLog = $(row).find('.kodelog').val(); // Get selected kode_log
            const materialDropdown = $(row).find('.material'); // Find the material dropdown in the same row

            console.log('Filtering materials for kode_log:', selectedKodeLog);

            // Show only the options that match the selected kode_log
            materialDropdown.find('option').each(function() {
                const kodeLogMaterial = $(this).data('kode-log'); // Get data-kode-log attribute from the option

                // Check if the option should be visible based on selected kode_log
                if (
                    (selectedKodeLog === 'Assy' && kodeLogMaterial === 'Assy') || // Match for 'Assy'
                    (selectedKodeLog === 'Sub-Assy' && kodeLogMaterial === 'Sub-Assy') || // Match for 'Sub-Assy'
                    (!selectedKodeLog && !kodeLogMaterial) || // No kode_log selected, no data-kode-log in option
                    (kodeLogMaterial === selectedKodeLog) // Exact match with kode_log
                ) {
                    $(this).show(); // Show matching options
                } else {
                    $(this).hide(); // Hide non-matching options
                }
            });

            // Automatically set the material dropdown value based on the first visible option
            if (selectedKodeLog === 'Assy' || selectedKodeLog === 'Sub-Assy') {
                materialDropdown.val(selectedKodeLog).trigger('change'); // Set to Assy or Sub-Assy
            } else {
                materialDropdown.val(materialDropdown.find('option:visible').first().val()).trigger('change');
            }
        }

        // Event listener for the kode_log dropdown
        $(document).on('change', '.kodelog', function() {
            const row = $(this).closest('tr'); // Get the current row
            filterNamaBarang(row); // Call the filter function for this row
        });

        function getMaterialPrice(material) {
            // Parse the material prices from the hidden input field
            const materialPrices = JSON.parse($('#materialPrices').val());

            // Find the material in the list by matching `nama_barang`
            const selectedMaterial = materialPrices.find(m => m.nama_barang === material);

            // Log the selected material and its price for debugging
            console.log('Material selected:', material, 'Price:', selectedMaterial ? selectedMaterial.harga : 'Not found');

            // Return the price of the selected material, or 0 if not found
            return selectedMaterial ? parseFloat(selectedMaterial.harga) : 0;
        }

        function calculateWeight(row) {
            const shape = $(row).find('.shape').val(); // Get the selected shape
            let massa = parseFloat($(row).find('.massa').val()); // Get the massa value
            const length = parseFloat($(row).find('.length').val()) || 0; // Get length (default to 0 if empty)
            const width = parseFloat($(row).find('.width').val()) || 0; // Get width (default to 0 if empty)
            const thickness = parseFloat($(row).find('.thickness').val()) || 0; // Get thickness (default to 0 if empty)
            let weight = 0;

            console.log('Calculating weight for row:', row.index(), 'Shape:', shape);

            // Automatically set massa based on shape selection
            if (shape.includes('non_ss')) {
                massa = 7.85; // Non-stainless steel (kg/m³)
                console.log('Shape is non-SS, massa set to:', massa);
            } else if (shape.includes('ss')) {
                massa = 7.99; // Stainless steel (kg/m³)
                console.log('Shape is SS, massa set to:', massa);
            }

            // Update the massa field automatically
            $(row).find('.massa').val(massa.toFixed(2));

            // Convert mm³ to m³ (divide by 1,000,000,000) and use kg/m³ for density
            const materialDensity = massa / 1000000;

            // Calculate weight based on shape
            if (shape === 'square') {
                // Square: length * width * thickness
                weight = materialDensity * length * width * thickness;
            } else if (shape === 'circle') {
                // Circle: π * radius² * thickness
                const radius = width / 2; // Assume width represents the diameter
                const volume = Math.PI * radius * radius * thickness; // Volume in mm³
                weight = materialDensity * volume; // Convert to kg
            } else if (shape.includes('sheet_metal') || shape.includes('square_block')) {
                // Sheet metal or square block: length * width * thickness
                weight = materialDensity * length * width * thickness;
            } else if (shape.includes('square_pipe') || shape.includes('round_pipe')) {
                // Placeholder logic for pipes (can be replaced with actual calculations for pipes)
                weight = length; // This assumes `length` is the main factor; customize if needed
            }

            console.log('Calculated weight:', weight.toFixed(5));

            // Update the weight field in the current row
            $(row).find('.weight').val(weight.toFixed(5));
            return weight;
        }

        $(document).on('change keyup', '.shape, .length, .width, .thickness', function() {
            const row = $(this).closest('tr'); // Get the current row
            calculateWeight(row); // Recalculate the weight for the row
        });

        function calculateMaterialCost(row) {
            const $row = $(row);
            const weight = calculateWeight(row); // Calculate the weight
            const material = $row.find('.material').val(); // Get the selected material
            const kodeLog = $row.find('.kodelog').val(); // Get the selected kode_log

            // Retrieve the NOS (Number of Sets) value dynamically
            const nos = parseFloat($row.find('.nos').val()) || 0; // Default to 0 if empty

            let materialCost = 0;

            // Special condition for 'Assy' and 'Sub-Assy'
            if (kodeLog === 'Assy' || material === 'Assy' || kodeLog === 'Sub-Assy' || material === 'Sub-Assy') {
                console.log('Assy or Sub-Assy selected, setting material cost to 0');
                materialCost = 0;
            } else {
                // Get the material price using the getMaterialPrice function
                const materialPrice = getMaterialPrice(material) || 0;

                console.log('Weight:', weight, 'Material Price:', materialPrice, 'NOS:', nos);

                // Calculate material cost: weight * material price * number of sets (NOS)
                materialCost = weight > 0 && nos > 0 ? (weight * materialPrice * nos) : 0;
            }

            // Log the calculated material cost
            console.log('Calculated material cost for row:', $row.index(), 'Cost:', materialCost.toFixed(2));

            // Update the material cost in the DOM
            $row.find('.material-cost').val(materialCost.toFixed(2));
        }

        $(document).on('change keyup', '.material, .nos, .shape, .length, .width, .thickness', function() {
            const row = $(this).closest('tr'); // Get the current row
            calculateMaterialCost(row); // Recalculate the material cost for the row
        });

        document.addEventListener('DOMContentLoaded', function () {
            const tableBody = document.querySelector('#soadd-table tbody');

            // Function to update row numbers
            function updateRowNumbers() {
                const rows = tableBody.querySelectorAll('tr');
                rows.forEach((row, index) => {
                    const rowIndexCell = row.querySelector('.row-index');
                    if (rowIndexCell) {
                        rowIndexCell.textContent = index + 1; // Update row number
                    }
                });
            }

            // Add event listener to remove buttons
            tableBody.addEventListener('click', function (event) {
                if (event.target.classList.contains('remove')) {
                    event.target.closest('tr').remove(); // Remove row
                    updateRowNumbers(); // Update row numbers after deletion
                }
            });

            // Example: Adding a new row dynamically
            document.querySelector('#addRowButton').addEventListener('click', function () {
            const newRow = `
                <tr>
                    <td class="row-index"></td>
                    <td>
                        <input class="row-index form-control" style="width:50px" type="text" name="id_item[]" required>
                    </td>
                    <td>
                        <input class="form-control" style="min-width:120px" type="text" name="no_item[]" required>
                    </td>
                    <td>
                        <input class="form-control" style="min-width:120px" type="text" name="item[]" required>
                    </td>
                    <td>
                        <input class="form-control" style="min-width:120px" type="date" name="dod_item[]" required>
                    </td>
                    <td>
                        <select class="form-control select2 kodelog" style="width:180px" name="kodelog[]" required>
                            ${generateKodeLogOptions()}
                        </select>
                    </td>
                    <td>
                        <select class="form-control select2 material" style="width:180px" name="material[]">
                            ${generateMaterialOptions()}
                        </select>
                    </td>
                    <td>
                        <select class="form-control select2 shape" style="width:180px" name="shape[]">
                            <option selected="selected" disabled>--Shape--</option>
                                                                <option value="sheet_metal_non_ss">Sheet Metal Non-SS</option>
                                                                <option value="square_block_non_ss">Square Block Non-SS</option>
                                                                <option value="square_pipe_non_ss">Square Pipe Non-SS</option>
                                                                <option value="round_pipe_non_ss">Round Pipe Non-SS</option>
                                                                <option value="sheet_metal_ss">Sheet Metal SS</option>
                                                                <option value="square_block_ss">Square Block SS</option>
                                                                <option value="square_pipe_ss">Square Pipe SS</option>
                                                                <option value="round_pipe_ss">Round Pipe SS</option>
                        </select>
                    </td>
                    <td>
                        <input class="form-control massa" style="width:100px" type="number" name="massa[]" step="0.001">
                    </td>
                    <td>
                        <input class="form-control nos" style="min-width:80px" type="number" name="nos[]" step="0.001">
                    </td>
                    <td>
                        <input class="form-control" style="min-width:80px" type="text" name="nob[]">
                    </td>
                    <td>
                        <input class="form-control" style="min-width:120px" type="date" name="issued_item[]" required>
                    </td>
                    <td>
                        <input class="form-control" style="min-width:200px" type="text" name="ass_drawing[]">
                    </td>
                    <td>
                        <input class="form-control" style="min-width:200px" type="text" name="drawing_no[]">
                    </td>
                    <td>
                        <input class="form-control length" style="min-width:100px" type="number" name="length[]" step="0.001">
                    </td>
                    <td>
                        <input class="form-control width" style="min-width:80px" type="number" name="width[]" step="0.001">
                    </td>
                    <td>
                        <input class="form-control thickness" style="min-width:80px" type="number" name="thickness[]" step="0.001">
                    </td>
                    <td>
                        <input class="form-control weight" style="width:100px" type="number" name="weight[]" step="0.01" readonly>
                    </td>
                    <td>
                        <input class="form-control material-cost" style="width:100px" type="number" name="material_cost[]" step="0.01" readonly>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-remove remove" type="button">Remove</button>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
            updateRowNumbers(); // Update row numbers after addition
});

        });


    </script>
@endsection
