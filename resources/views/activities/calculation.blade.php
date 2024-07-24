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
                                @foreach($orders as $id => $orderNumber)
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
                                            <input type="number" id="totalStandardPartCost" class="form-control" hidden>
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
        $('#order_id').change(function() {
            var orderId = $(this).val();
            if (orderId) {
                $.ajax({
                    url: '{{ route("calculations.calculate") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        order_id: orderId
                    },
                    success: function(response) {
                        if(response && response.totalSales !== undefined) {
                            $('#calculation-result').show();
    
                            // Set the input values without formatting
                            $('#totalSales').val(response.totalSales);
                            $('#totalMaterialCost').val(response.totalMaterialCost);
                            $('#totalLaborCost').val(response.totalLaborCost); // Corrected key
                            $('#totalMachineCost').val(response.totalMachineCost); // Corrected key
                            $('#totalStandardPartCost').val(response.totalStandardPartCost);
                            $('#totalSubContractCost').val(response.totalSubContractCost);
                            $('#totalOverheadCost').val(response.totalOverheadCost);
    
                            // Format numbers for display
                            $('#displayTotalSales').text(formatRupiah(response.totalSales));
                            $('#displayTotalMaterialCost').text(formatRupiah(response.totalMaterialCost));
                            $('#displayTotalLaborCost').text(formatRupiah(response.totalLaborCost)); // Corrected key
                            $('#displayTotalMachineCost').text(formatRupiah(response.totalMachineCost)); // Corrected key
                            $('#displayTotalStandardPartCost').text(formatRupiah(response.totalStandardPartCost));
                            $('#displayTotalSubContractCost').text(formatRupiah(response.totalSubContractCost));
                            $('#displayTotalOverheadCost').text(formatRupiah(response.totalOverheadCost));
    
                            // Parse float values from response
                            var totalSales = parseFloat(response.totalSales.replace(/,/g, '')) || 0;
                            var totalMaterialCost = parseFloat(response.totalMaterialCost.replace(/,/g, '')) || 0;
                            var totalMachineCost = parseFloat(response.totalMachineCost.replace(/,/g, '')) || 0;
                            var totalLaborCost = parseFloat(response.totalLaborCost.replace(/,/g, '')) || 0;
                            var totalSubContractCost = parseFloat(response.totalSubContractCost.replace(/,/g, '')) || 0;
                            var totalStandardPartCost = parseFloat(response.totalStandardPartCost.replace(/,/g, '')) || 0;
                            var totalOverheadCost = parseFloat(response.totalOverheadCost.replace(/,/g, '')) || 0;
    
                            // Calculate percentages
                            var materialCostPercentage = (totalMaterialCost / totalSales) * 100 || 0;
                            var laborCostPercentage = (totalLaborCost / totalSales) * 100 || 0;
                            var machineCostPercentage = (totalMachineCost / totalSales) * 100 || 0;
                            var standardPartCostPercentage = (totalStandardPartCost / totalSales) * 100 || 0;
                            var subContractCostPercentage = (totalSubContractCost / totalSales) * 100 || 0;
                            var overheadCostPercentage = (totalOverheadCost / totalSales) * 100 || 0;

                            // Debug: Log parsed values
                            console.log("Parsed Total Sales: " + totalSales);
                            console.log("Parsed Total Material Cost: " + totalMaterialCost);
                            console.log("Parsed Total Labor Cost: " + totalLaborCost);
                            console.log("Parsed Total Machine Cost: " + totalMachineCost);
                            console.log("Parsed Total Standard Part Cost: " + totalStandardPartCost);
                            console.log("Parsed Total Sub Contract Cost: " + totalSubContractCost);
                            console.log("Parsed Total Overhead Cost: " + totalOverheadCost);
    
                            var COGS = totalMaterialCost + totalMachineCost + totalLaborCost + totalSubContractCost + totalStandardPartCost + totalOverheadCost;
                            var GPM = totalSales - COGS;
                            var OHorg = totalSales * 0.1;
                            var NOI = GPM - OHorg;
                            var BNP = totalSales * 0.02;
                            var LSP = NOI - BNP;
    
                            // Debug: Log calculation steps
                            console.log("COGS: " + COGS);
                            console.log("GPM: " + GPM);
                            console.log("OHorg: " + OHorg);
                            console.log("NOI: " + NOI);
                            console.log("BNP: " + BNP);
                            console.log("LSP: " + LSP);
    
                            $('#COGS').text(formatRupiah(COGS));
                            $('#GPM').text(formatRupiah(GPM));
                            $('#OHorg').text(formatRupiah(OHorg));
                            $('#NOI').text(formatRupiah(NOI));
                            $('#BNP').text(formatRupiah(BNP));
                            $('#LSP').text(formatRupiah(LSP));

                            // Update percentage columns
                            $('#materialCostPercentage').text(materialCostPercentage.toFixed(2) + '%');
                            $('#laborCostPercentage').text(laborCostPercentage.toFixed(2) + '%');
                            $('#machineCostPercentage').text(machineCostPercentage.toFixed(2) + '%');
                            $('#standardPartCostPercentage').text(standardPartCostPercentage.toFixed(2) + '%');
                            $('#subContractCostPercentage').text(subContractCostPercentage.toFixed(2) + '%');
                            $('#overheadCostPercentage').text(overheadCostPercentage.toFixed(2) + '%');
    
                            // Update overhead table
                            var overheadTableBody = $('#overhead-table tbody');
                            overheadTableBody.empty();
                            response.overheads.forEach(function(overhead) {
                                var row = '<tr>' +
                                    '<td>' + overhead.description + '</td>' +
                                    '<td class="text-right">' + formatRupiah(overhead.jumlah) + '</td>' +
                                    '</tr>';
                                overheadTableBody.append(row);
                            });
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
            } else {
                $('#calculation-result').hide();
            }
        });
    
        // Initialize DataTable
        $('#overhead-table').DataTable();
    });
    
    // Helper function to format numbers as Rupiah
    function formatRupiah(num) {
        return 'Rp. ' + num.toLocaleString(undefined, { minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace(/,/g, '.');
    }

    // Helper function to update the page title
    function updateTitle(pageTitle) {
        document.title = pageTitle;
    }
    
    // Call the function when the "Calculation" page is loaded
    updateTitle('Calculation');
</script>
@endsection
