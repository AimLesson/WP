@extends('activities.activities')
@section('content')
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
                                <select name="order_id" id="order_id" class="form-control">
                                    <option value="" disabled selected>-- Select Order Number --</option>
                                    @foreach ($orders as $id => $orderNumber)
                                        <option value="{{ $id }}">{{ $orderNumber }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>

                        <div id="calculation-result" style="display: none;">
                            <!-- Input Table for Debugging -->
                            <div class="table-responsive rounded table-smaller">
                                <table class="table table-bordered table-striped rounded">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Category</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Sales Order</td>
                                            <td class="text-right">
                                                <input type="number" id="totalSales" class="form-control" hidden>
                                                <span id="displayTotalSales"></span>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Material Cost</td>
                                            <td class="text-right">
                                                <input type="number" id="totalMaterialCost" class="form-control" hidden>
                                                <span id="displayTotalMaterialCost"></span>
                                            </td>
                                            <td id="materialCostPercentage" class="text-right"></td>
                                        </tr>
                                        <tr>
                                            <td>Labor Cost</td>
                                            <td class="text-right">
                                                <input type="number" id="totalLaborCost" class="form-control" hidden>
                                                <span id="displayTotalLaborCost"></span>
                                            </td>
                                            <td id="laborCostPercentage" class="text-right"></td>
                                        </tr>
                                        <tr>
                                            <td>Machine Cost</td>
                                            <td class="text-right">
                                                <input type="number" id="totalMachineCost" class="form-control" hidden>
                                                <span id="displayTotalMachineCost"></span>
                                            </td>
                                            <td id="machineCostPercentage" class="text-right"></td>
                                        </tr>
                                        <tr>
                                            <td>Standard Part Cost</td>
                                            <td class="text-right">
                                                <input type="number" id="totalStandardPartCost" class="form-control"
                                                    hidden>
                                                <span id="displayTotalStandardPartCost"></span>
                                            </td>
                                            <td id="standardPartCostPercentage" class="text-right"></td>
                                        </tr>
                                        <tr>
                                            <td>Sub-Contract Cost</td>
                                            <td class="text-right">
                                                <input type="number" id="totalSubContractCost" class="form-control" hidden>
                                                <span id="displayTotalSubContractCost"></span>
                                            </td>
                                            <td id="subContractCostPercentage" class="text-right"></td>
                                        </tr>
                                        <tr>
                                            <td>Overhead Manufacture Cost</td>
                                            <td class="text-right">
                                                <input type="number" id="totalOverheadCost" class="form-control" hidden>
                                                <span id="displayTotalOverheadCost"></span>
                                            </td>
                                            <td id="overheadCostPercentage" class="text-right"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive rounded table-smaller">
                                <table id="overhead-table" class="table table-bordered table-striped rounded">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Deskripsi Overhead Manufacture</th>
                                            <th scope="col">Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be dynamically inserted here -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="table-responsive rounded table-smaller">
                                <table id="cost-table" class="table table-bordered table-striped rounded">
                                    <thead class="thead-dark">
                                        <tr>
                                            {{-- <th scope="col">Item Name</th>
                                            <th scope="col">Drawing No</th> --}}
                                            <th scope="col">Item Number</th>
                                            <th scope="col">Machine Name</th>
                                            <th scope="col">Machine Cost (Est)</th>
                                            <th scope="col">Machine Cost (Real)</th>
                                            <th scope="col">Labor Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data will be dynamically inserted here -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- New Calculation Result Table -->
                            <div class="table-responsive rounded mt-4 table-smaller">
                                <table class="table table-bordered table-striped rounded">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Category</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Percentage</th>
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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

            $('#order_id').change(function() {
                var orderId = $(this).val();
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
                $('#materialCostPercentage').text(percentages.materialCostPercentage.toFixed(2) + '%');
                $('#laborCostPercentage').text(percentages.laborCostPercentage.toFixed(2) + '%');
                $('#machineCostPercentage').text(percentages.machineCostPercentage.toFixed(2) + '%');
                $('#standardPartCostPercentage').text(percentages.standardPartCostPercentage.toFixed(2) + '%');
                $('#subContractCostPercentage').text(percentages.subContractCostPercentage.toFixed(2) + '%');
                $('#overheadCostPercentage').text(percentages.overheadCostPercentage.toFixed(2) + '%');
            }

            function updateTables(response) {
                // Log the entire response object to inspect its structure
                console.log('Response:', response);

                // Log specific parts of the response to see their values
                console.log('Overheads:', response.overheads);
                console.log('Processing Data:', response.processingData);

                updateOverheadTable(response.overheads);
                updateProcessingDataTable(response.processingData);
            }


            function updateOverheadTable(data) {
                var columns = ['description', 'jumlah'];
                var currencyColumns = ['jumlah']; // Columns that should be formatted as currency
                updateTable('#overhead-table', data, columns, currencyColumns);
            }

            function updateProcessingDataTable(processingData) {
    var columns = ['item_number', 'machine', 'mach_cost', 'mach_cost_real', 'labor_cost_real'];
    var currencyColumns = ['mach_cost', 'mach_cost_real', 'labor_cost_real']; // Columns to format as currency
    updateTable('#cost-table', processingData, columns, currencyColumns);
}

// Function to update HTML table with data
function updateTable(tableId, data, columns, currencyColumns = []) {
    // Find the table's tbody using the provided tableId
    var tbody = document.querySelector(tableId + ' tbody');

    // Clear the existing rows in the table body
    tbody.innerHTML = '';

    // Iterate over the data array and create table rows
    data.forEach(item => {
        // Create a new table row
        var row = document.createElement('tr');

        // Create cells for each column and append to the row
        columns.forEach(column => {
            var cell = document.createElement('td');

            // Format the value as Rupiah if the column is in currencyColumns
            if (currencyColumns.includes(column)) {
                cell.textContent = formatRupiah(parseFloat(item[column])); // Ensuring the value is a number
                cell.classList.add('text-right'); // Add the text-right class for currency columns
            } else {
                cell.textContent = item[column];
            }

            row.appendChild(cell);
        });

        // Append the row to the tbody
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
            // Call the function when the "Calculation" page is loaded
            updateTitle('Calculation');
        });
    </script>
@endsection
