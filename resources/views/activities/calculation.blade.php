@extends('activities.activities')
@section('content')
    <style>
        tbody tr {
            height: 40px;
            /* Set the desired height for each row */
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Calculation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Calculation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container">
                        <h1>Select Order Number</h1>
                        <form id="calculation-form">
                            @csrf
                            <div class="form-group">
                                <label for="order_id"></label>
                                <input list="order_numbers" id="order_id" name="order_id" class="form-control"
                                    placeholder="-- Select Order Number --">
                                <datalist id="order_numbers">
                                    @foreach ($orders as $id => $orderNumber)
                                        <option value="{{ $orderNumber }}" data-id="{{ $id }}"></option>
                                    @endforeach
                                </datalist>
                            </div>
                        </form>

                        <div id="calculation-result" style="display: none;">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Total Cost Table -->
                                    <div class="table-responsive rounded table-smaller">
                                        <table class="table table-bordered table-striped rounded">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Jenis</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Presentase</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Sales Order</td>
                                                    <td class="text-right">
                                                        <input type="number" id="totalsales" class="form-control" hidden>
                                                        <span id="displayTotalSales"></span>
                                                    </td>
                                                    <td class="text-right">-</td>
                                                </tr>
                                                <tr data-toggle="modal" data-target="#materialCostModal">
                                                    <td>Material Cost</td>
                                                    <td class="text-right">
                                                        <input type="number" id="totalMaterialCost" class="form-control"
                                                            hidden>
                                                        <span id="displayTotalMaterialCost"></span>
                                                    </td>
                                                    <td id="materialCostPercentage" class="text-right"></td>
                                                </tr>
                                                <tr data-toggle="modal" data-target="#laborCostModal">
                                                    <td>Labor Cost</td>
                                                    <td class="text-right">
                                                        <input type="number" id="totalLaborCost" class="form-control"
                                                            hidden>
                                                        <span id="displayTotalLaborCost"></span>
                                                    </td>
                                                    <td id="laborCostPercentage" class="text-right"></td>
                                                </tr>
                                                <tr data-toggle="modal" data-target="#machineCostModal">
                                                    <td>Machine Cost</td>
                                                    <td class="text-right">
                                                        <input type="number" id="totalMachineCost" class="form-control"
                                                            hidden>
                                                        <span id="displayTotalMachineCost"></span>
                                                    </td>
                                                    <td id="machineCostPercentage" class="text-right"></td>
                                                </tr>
                                                <tr data-toggle="modal" data-target="#standardPartCostModal">
                                                    <td>Standard Part Cost</td>
                                                    <td class="text-right">
                                                        <input type="number" id="totalStandardPartCost"
                                                            class="form-control" hidden>
                                                        <span id="displayTotalStandardPartCost"></span>
                                                    </td>
                                                    <td id="standardPartCostPercentage" class="text-right"></td>
                                                </tr>
                                                <tr data-toggle="modal" data-target="#subconCostModal">
                                                    <td>Sub-Contract Cost</td>
                                                    <td class="text-right">
                                                        <input type="number" id="totalSubContractCost" class="form-control"
                                                            hidden>
                                                        <span id="displayTotalSubContractCost"></span>
                                                    </td>
                                                    <td id="subContractCostPercentage" class="text-right"></td>
                                                </tr>
                                                <tr data-toggle="modal" data-target="#overheadCostModal">
                                                    <td>Overhead Manufacture Cost</td>
                                                    <td class="text-right">
                                                        <input type="number" id="totalOverheadCost" class="form-control"
                                                            hidden>
                                                        <span id="displayTotalOverheadCost"></span>
                                                    </td>
                                                    <td id="overheadCostPercentage" class="text-right"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    {{-- Tabel Result --}}
                                    <div class="table-responsive rounded table-smaller">
                                        <table class="table table-bordered table-striped rounded">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Jenis</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Presentase</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>COGS</td>
                                                    <td id="COGS" class="text-right"></td>
                                                    <td id="cogsPercentage" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>Gross Profit Margin</td>
                                                    <td id="GPM" class="text-right"></td>
                                                    <td id="gpmPercentage" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>OH Organisasi</td>
                                                    <td id="OHorg" class="text-right"></td>
                                                    <td id="ohorgPercentage" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>Net Operating Income</td>
                                                    <td id="NOI" class="text-right"></td>
                                                    <td id="noiPercentage" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>Pend / Biaya non Oper</td>
                                                    <td id="BNP" class="text-right"></td>
                                                    <td id="bnpPercentage" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                    <td>Laba Sebelum pajak</td>
                                                    <td id="LSP" class="text-right"></td>
                                                    <td id="lspPercentage" class="text-right"></td>
                                                </tr>
                                                <tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modals -->
                    <!-- Material Cost Modal -->
                    <div class="modal fade" id="materialCostModal" tabindex="-1"
                        aria-labelledby="materialCostModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="materialCostModalLabel">Material Cost Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <!-- Print Button -->
                                    <button type="button" class="btn btn-primary btn-custom"
                                        onclick="printTable('material-table', 'Material Cost Details', 'materialCostModal')">Print</button>
                                </div>
                                <div class="modal-body">
                                    <!-- Material Cost Table -->
                                    <div class="table-responsive rounded table-smaller">
                                        <table id="material-table" class="table table-bordered table-striped rounded">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Jenis</th>
                                                    <th scope="col">Satuan</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Barcode ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data dynamically inserted here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Standard Part Cost Modal -->
                    <div class="modal fade" id="standardPartCostModal" tabindex="-1"
                        aria-labelledby="standardPartCostModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="standardPartCostModalLabel">Standard Part Cost Details
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <!-- Print Button -->
                                    <button type="button" class="btn btn-primary btn-custom"
                                        onclick="printTable('standard-part-table', 'Standard Part Details', 'standardPartCostModal')">Print</button>
                                </div>
                                <div class="modal-body">
                                    <!-- Standard Part Cost Table -->
                                    <div class="table-responsive rounded table-smaller">
                                        <table id="standard-part-table"
                                            class="table table-bordered table-striped rounded">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Nama Barang</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Jenis</th>
                                                    <th scope="col">Satuan</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Total</th>
                                                    <th scope="col">Barcode ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data dynamically inserted here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Labor Cost Modal -->
                    <div class="modal fade" id="laborCostModal" tabindex="-1" aria-labelledby="laborCostModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="laborCostModalLabel">Labor Cost Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <!-- Print Button -->
                                    <button type="button" class="btn btn-primary btn-custom"
                                        onclick="printTable('labor-costs-table', 'Labor Cost Details', 'laborCostModal')">Print</button>
                                </div>
                                <div class="modal-body">
                                    <!-- Labor Cost Table -->
                                    <div class="table-responsive rounded table-smaller">
                                        <table id="labor-costs-table" class="table table-bordered table-striped rounded">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Item</th>
                                                    <th scope="col">Item Number</th>
                                                    <th scope="col">Machine</th>
                                                    <th scope="col">Labor Cost Real</th>
                                                    <th scope="col">Process Cost</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Finished At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data dynamically inserted here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Machine Cost Modal -->
                    <div class="modal fade" id="machineCostModal" tabindex="-1" aria-labelledby="machineCostModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="machineCostModalLabel">Machine Cost Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <!-- Print Button -->
                                    <button type="button" class="btn btn-primary btn-custom"
                                        onclick="printTable('machine-costs-table', 'Machine Cost Details', 'machineCostModal')">Print</button>
                                </div>
                                <div class="modal-body">
                                    <!-- Machine Cost Table -->
                                    <div class="table-responsive rounded table-smaller">
                                        <table id="machine-costs-table"
                                            class="table table-bordered table-striped rounded">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Item</th>
                                                    <th scope="col">Item Number</th>
                                                    <th scope="col">Machine</th>
                                                    <th scope="col">Est. Machine Cost</th>
                                                    <th scope="col">Machine Cost Real</th>
                                                    <th scope="col">Process Cost</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Finished At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data dynamically inserted here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Overhead Manufacture Cost Modal -->
                    <div class="modal fade" id="overheadCostModal" tabindex="-1"
                        aria-labelledby="overheadCostModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="overheadCostModalLabel">Overhead Manufacture Cost Details
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <!-- Print Button -->
                                    <button type="button" class="btn btn-primary btn-custom"
                                        onclick="printTable('overheads-table', 'Overhead Manufacture Details', 'overheadCostModal')">Print</button>

                                </div>
                                <div class="modal-body">
                                    <!-- Overhead Cost Table -->
                                    <div class="table-responsive rounded table-smaller">
                                        <table id="overheads-table" class="table table-bordered table-striped rounded">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Deskripsi Overhead Manufacture</th>
                                                    <th scope="col">Biaya</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data dynamically inserted here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- SubCOn Cost Modal -->
                    <div class="modal fade" id="subconCostModal" tabindex="-1" aria-labelledby="subconCostModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="subconCostModalLabel">Sub-Contract Cost Details
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                    <!-- Print Button -->
                                    <button type="button" class="btn btn-primary btn-custom"
                                        onclick="printTable('subcon-table', 'Sub-Contract Details', 'subconCostModal')">Print</button>
                                </div>
                                <div class="modal-body">
                                    <!-- Subcon Cost Table -->
                                    <div class="table-responsive rounded table-smaller">
                                        <table id="subcon-table" class="table table-bordered table-striped rounded">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Nomor Item</th>
                                                    <th scope="col">Vendor</th>
                                                    <th scope="col">Deskripsi</th>
                                                    <th scope="col">Jumlah</th>
                                                    <th scope="col">Satuan</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data dynamically inserted here -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var overheadTable = $('#overhead-table').DataTable();
            var costTable = $('#cost-table').DataTable();

            $('#order_id').on('input', function() {
                var inputValue = $(this).val();
                var orderId = null;

                // Match the input value to a datalist option
                $('#order_numbers option').each(function() {
                    if ($(this).val() === inputValue) {
                        orderId = $(this).data('id');
                        return false; // Break the loop
                    }
                });

                if (orderId) {
                    fetchCalculationData(orderId);
                } else {
                    $('#calculation-result').hide();
                }
            });


            function fetchCalculationData(orderId) {
                $.ajax({
                    url: '{{ route('calculations.calculate') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        order_id: orderId
                    },
                    success: function(response) {
                        if (response && response.totalSales !== undefined) {
                            $('#calculation-result').show();
                            updateCalculationResults(response);
                        } else {
                            $('#calculation-result').hide();
                            alert('No data found for the selected order.');
                        }
                    },
                    error: function(response) {
                        console.log('Error:', response);
                        alert('An error occurred while fetching the calculation data.');
                    }
                });
            }

            function updateCalculationResults(response) {
                setInputValues(response);
                setDisplayValues(response);

                var parsedValues = parseResponseValues(response);
                var percentages = calculatePercentages(parsedValues);

                logParsedValues(parsedValues);
                logCalculationSteps(parsedValues, percentages);

                setCalculationResults(parsedValues);
                setPercentageValues(percentages);

                updateTables(response);
            }

            function setInputValues(response) {
                $('#totalSales').val(response.totalSales);
                $('#totalMaterialCost').val(response.totalMaterialCost);
                $('#totalLaborCost').val(response.totalLaborCost); // Corrected key
                $('#totalMachineCost').val(response.totalMachineCost); // Corrected key
                $('#totalStandardPartCost').val(response.totalStandardPartCost);
                $('#totalSubContractCost').val(response.totalSubContractCost);
                $('#totalOverheadCost').val(response.totalOverheadCost);
            }

            function setDisplayValues(response) {
                $('#displayTotalSales').text(formatRupiah(response.totalSales));
                $('#displayTotalMaterialCost').text(formatRupiah(response.totalMaterialCost));
                $('#displayTotalLaborCost').text(formatRupiah(response.totalLaborCost)); // Corrected key
                $('#displayTotalMachineCost').text(formatRupiah(response.totalMachineCost)); // Corrected key
                $('#displayTotalStandardPartCost').text(formatRupiah(response.totalStandardPartCost));
                $('#displayTotalSubContractCost').text(formatRupiah(response.totalSubContractCost));
                $('#displayTotalOverheadCost').text(formatRupiah(response.totalOverheadCost));
            }

            function parseResponseValues(response) {
                return {
                    totalSales: parseFloat(response.totalSales.replace(/,/g, '')) || 0,
                    totalMaterialCost: parseFloat(response.totalMaterialCost.replace(/,/g, '')) || 0,
                    totalMachineCost: parseFloat(response.totalMachineCost.replace(/,/g, '')) || 0,
                    totalLaborCost: parseFloat(response.totalLaborCost.replace(/,/g, '')) || 0,
                    totalSubContractCost: parseFloat(response.totalSubContractCost.replace(/,/g, '')) || 0,
                    totalStandardPartCost: parseFloat(response.totalStandardPartCost.replace(/,/g, '')) || 0,
                    totalOverheadCost: parseFloat(response.totalOverheadCost.replace(/,/g, '')) || 0,
                };
            }

            function calculatePercentages(parsedValues) {
                var totalSales = parsedValues.totalSales;
                return {
                    materialCostPercentage: (parsedValues.totalMaterialCost / totalSales) * 100 || 0,
                    laborCostPercentage: (parsedValues.totalLaborCost / totalSales) * 100 || 0,
                    machineCostPercentage: (parsedValues.totalMachineCost / totalSales) * 100 || 0,
                    standardPartCostPercentage: (parsedValues.totalStandardPartCost / totalSales) * 100 || 0,
                    subContractCostPercentage: (parsedValues.totalSubContractCost / totalSales) * 100 || 0,
                    overheadCostPercentage: (parsedValues.totalOverheadCost / totalSales) * 100 || 0,
                };
            }

            function logParsedValues(parsedValues) {
                console.log("Parsed Values:", parsedValues);
            }

            function logCalculationSteps(parsedValues, percentages) {
                var COGS = parsedValues.totalMaterialCost + parsedValues.totalMachineCost + parsedValues
                    .totalLaborCost + parsedValues.totalSubContractCost + parsedValues.totalStandardPartCost +
                    parsedValues.totalOverheadCost;
                var GPM = parsedValues.totalSales - COGS;
                var OHorg = parsedValues.totalSales * 0.1;
                var NOI = GPM - OHorg;
                var BNP = parsedValues.totalSales * 0.02;
                var LSP = NOI - BNP;

                console.log("COGS:", COGS);
                console.log("GPM:", GPM);
                console.log("OHorg:", OHorg);
                console.log("NOI:", NOI);
                console.log("BNP:", BNP);
                console.log("LSP:", LSP);
            }

            function setCalculationResults(parsedValues) {
                var COGS = parsedValues.totalMaterialCost + parsedValues.totalMachineCost + parsedValues
                    .totalLaborCost + parsedValues.totalSubContractCost + parsedValues.totalStandardPartCost +
                    parsedValues.totalOverheadCost;
                var GPM = parsedValues.totalSales - COGS;
                var OHorg = parsedValues.totalSales * 0.1;
                var NOI = GPM - OHorg;
                var BNP = parsedValues.totalSales * 0.02;
                var LSP = NOI - BNP;

                $('#COGS').text(formatRupiah(COGS));
                $('#GPM').text(formatRupiah(GPM));
                $('#OHorg').text(formatRupiah(OHorg));
                $('#NOI').text(formatRupiah(NOI));
                $('#BNP').text(formatRupiah(BNP));
                $('#LSP').text(formatRupiah(LSP));
            }

            function setPercentageValues(percentages) {
                $('#materialCostPercentage').text(percentages.materialCostPercentage.toFixed(3) + '%');
                $('#laborCostPercentage').text(percentages.laborCostPercentage.toFixed(3) + '%');
                $('#machineCostPercentage').text(percentages.machineCostPercentage.toFixed(3) + '%');
                $('#standardPartCostPercentage').text(percentages.standardPartCostPercentage.toFixed(3) + '%');
                $('#subContractCostPercentage').text(percentages.subContractCostPercentage.toFixed(3) + '%');
                $('#overheadCostPercentage').text(percentages.overheadCostPercentage.toFixed(3) + '%');
            }

            function updateTables(response) {
                console.log('Response:', response);
                console.log('Overheads:', response.overheads);
                console.log('Processing Data:', response.processingData);
                console.log('Material Data:', response.material);
                console.log('Sub Contract Data:', response.subcon);

                updateOverheadTable(response.overheads);
                updateSubConTable(response.subcon);
                updateLaborTable(response.processingData);
                updateMachineTable(response.processingData);

                const processingData = response.processingData;
                // Separate Material Data into Material and Standard Part
                const materialData = response.material.filter(item => item.jenis === 'materials');
                const partData = response.material.filter(item => item.jenis === 'parts');

                updateMaterialTable(materialData);
                updateStandardPartTable(partData);
            }


            function updateOverheadTable(data) {
                var columns = ['description', 'jumlah'];
                var currencyColumns = ['jumlah'];
                updateTable('#overheads-table', data, columns, currencyColumns);
            }

            function updateSubConTable(subcon) {
                var columns = ['item_no', 'vendor', 'description', 'qty', 'unit', 'price_unit', 'total_price'];
                var currencyColumns = ['price_unit', 'total_price'];
                updateTable('#subcon-table', subcon, columns, currencyColumns);
            }

            function updateLaborTable(processingData) {
                processingData.forEach(function(row) {
                    row.process_cost = row.labor_cost_real + (row.mach_cost_real ||
                        0); // mach_cost_real might not exist in this context
                });

                var columns = ['item_add.item', 'item_number', 'machine', 'labor_cost_real', 'process_cost',
                    'status', 'finished_at'
                ];
                var currencyColumns = ['labor_cost_real', 'process_cost'];
                updateTable('#labor-costs-table', processingData, columns, currencyColumns);
            }

            function updateMachineTable(processingData) {
                processingData.forEach(function(row) {
                    row.process_cost = row.labor_cost_real + row.mach_cost_real;
                });

                var columns = ['item_add.item', 'item_number', 'machine', 'mach_cost', 'mach_cost_real',
                    'process_cost', 'status', 'finished_at'
                ];
                var currencyColumns = ['mach_cost', 'mach_cost_real', 'process_cost'];
                updateTable('#machine-costs-table', processingData, columns, currencyColumns);
            }


            function updateMaterialTable(materialData) {
                var columns = ['created_at', 'material', 'jumlah', 'jenis', 'satuan', 'harga', 'total',
                    'barcode_id'];
                var currencyColumns = ['total', 'harga'];
                updateTable('#material-table', materialData, columns, currencyColumns);
            }

            function updateStandardPartTable(partData) {
                var columns = ['created_at', 'material', 'jumlah', 'jenis', 'satuan', 'harga', 'total',
                    'barcode_id'];
                var currencyColumns = ['total', 'harga'];
                updateTable('#standard-part-table', partData, columns, currencyColumns);
            }

            function formatDate(dateString) {
                if (!dateString) return '-';
                const date = new Date(dateString);
                const options = {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                };
                return new Intl.DateTimeFormat('en-GB', options).format(date);
            }

            // Function to generate QR code
            function generateQRCode(value, cell) {
                if (!value) return;
                var qrDiv = document.createElement('div');
                new QRCode(qrDiv, {
                    text: value,
                    width: 64,
                    height: 64
                });
                cell.appendChild(qrDiv);
            }

            function updateTable(tableId, data, columns, currencyColumns = []) {
                var tbody = document.querySelector(tableId + ' tbody');
                tbody.innerHTML = '';

                data.forEach(item => {
                    var row = document.createElement('tr');

                    columns.forEach(column => {
                        var cell = document.createElement('td');
                        var value = column.split('.').reduce((obj, key) => obj && obj[key], item);

                        if (column === 'created_at' || column === 'finished_at') {
                            cell.textContent = formatDate(value);
                        } else if (column === 'barcode_id') {
                            generateQRCode(value, cell);
                        } else {
                            if (currencyColumns.includes(column)) {
                                cell.textContent = formatRupiah(parseFloat(value));
                                cell.classList.add('text-right');
                            } else {
                                cell.textContent = value !== null && value !== undefined ? value :
                                    '-';
                            }
                        }
                        row.appendChild(cell);
                    });

                    tbody.appendChild(row);
                });
            }


            // Helper function to format numbers as Rupiah
            function formatRupiah(num) {
                return 'Rp. ' + num.toLocaleString(undefined, {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).replace(/,/g, '.');
            }

            // Helper function to update the page title
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }
            // Call the update functions with the example data
            updateOverheadTable(overheadData);
            updateProcessingDataTable(processingData);
            updateMaterialTable(processingData);
            // Call the function when the "Calculation" page is loaded
            updateTitle('Calculation');
        });
    </script>

    <script>
        function printTable(tableId, tableName, modalId) {
            var table = document.getElementById(tableId).outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = `
        <html>
        <head>
            <title>${tableName}</title>
            <style>
                /* Styling for print */
                table {
                    width: 100%;
                    border-collapse: collapse;
                }
                th, td {
                    padding: 8px;
                    text-align: left;
                    border: 1px solid #ddd;
                }
                th {
                    background-color: #f2f2f2;
                }
                h2 {
                    text-align: center;
                    margin-bottom: 20px;
                }
            </style>
        </head>
        <body>
            <h1 class="text-center mb-3"><strong>${tableName}</strong></h1>
            ${table}
        </body>
        </html>
        `;

            window.print();

            // Close the modal after printing
            var myModalEl = document.getElementById(modalId);
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();

            // Restore the original page content
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
