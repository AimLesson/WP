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
                        <div class="table-responsive rounded">
                            <table class="table table-bordered table-striped rounded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Category</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sales Order</td>
                                        <td>
                                            <input type="number" id="inputTotalSales" class="form-control" hidden>
                                            <span id="displayTotalSales"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Material Cost</td>
                                        <td>
                                            <input type="number" id="totalMaterialCost" class="form-control" hidden>
                                            <span id="displayTotalMaterialCost"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Labor Cost</td>
                                        <td>
                                            <input type="number" id="totalProcessingCost" class="form-control" hidden>
                                            <span id="displayTotalProcessingCost"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Machine Cost</td>
                                        <td>
                                            <input type="number" id="inputTotalMachineCost" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Standard Part Cost</td>
                                        <td>
                                            <span id="displayTotalStandardPartCost"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sub-Contract Cost</td>
                                        <td>
                                            <input type="number" id="totalSubContractCost" class="form-control" hidden>
                                            <span id="displayTotalSubContractCost"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Overhead Manufacture Cost</td>
                                        <td>
                                            <span id="displayTotalOverheadCost"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button id="calculateButton" class="btn btn-primary mb-4">Calculate</button>

                        <div class="table-responsive rounded">
                            <table id="overhead-table" class="table table-bordered table-striped rounded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data will be dynamically inserted here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- New Calculation Result Table -->
                        <div class="table-responsive rounded mt-4">
                            <table class="table table-bordered table-striped rounded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Category</th>
                                        <th scope="col">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>COGS</td>
                                        <td id="COGS"></td>
                                    </tr>
                                    <tr>
                                        <td>Gross Profit Margin</td>
                                        <td id="GPM"></td>
                                    </tr>
                                    <tr>
                                        <td>OH Organisasi</td>
                                        <td id="OHorg"></td>
                                    </tr>
                                    <tr>
                                        <td>Net Operating Income</td>
                                        <td id="NOI"></td>
                                    </tr>
                                    <tr>
                                        <td>Pend / Biaya non Oper</td>
                                        <td id="BNP"></td>
                                    </tr>
                                    <tr>
                                        <td>Laba Sebelum pajak</td>
                                        <td id="LSP"></td>
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
                    $('#calculation-result').show();

                    // Set the input values without formatting
                    $('#inputTotalSales').val(response.inputTotalSales);
                    $('#totalMaterialCost').val(response.totalMaterialCost);
                    $('#totalProcessingCost').val(response.totalProcessingCost);
                    $('#totalSubContractCost').val(response.totalSubContractCost);
                    $('#totalStandardPartCost').val(response.totalStandardPartCost);
                    $('#totalOverheadCost').val(response.totalStandardPartCost);

                    // Format numbers for display
                    $('#displayTotalSales').text(formatNumber(response.inputTotalSales));
                    $('#displayTotalMaterialCost').text(formatNumber(response.totalMaterialCost));
                    $('#displayTotalProcessingCost').text(formatNumber(response.totalProcessingCost));
                    $('#displayTotalSubContractCost').text(formatNumber(response.totalSubContractCost));
                    $('#displayTotalStandardPartCost').text(formatNumber(response.totalStandardPartCost));
                    $('#displayTotalOverheadCost').text(formatNumber(response.totalOverheadCost));


                    // Update overhead table
                    var overheadTableBody = $('#overhead-table tbody');
                    overheadTableBody.empty();
                    response.overheads.forEach(function(overhead) {
                        var row = '<tr>' +
                            '<td>' + overhead.product + '</td>' +
                            '<td>' + overhead.description + '</td>' +
                            '<td>' + overhead.jumlah + '</td>' +
                            '<td>' + overhead.cost + '</td>' +
                            '</tr>';
                        overheadTableBody.append(row);
                    });
                },
                error: function(response) {
                    console.log('Error:', response);
                }
            });
        } else {
            $('#calculation-result').hide();
        }
    });

    $('#calculateButton').click(function() {
        // Ensure all values are numbers
        var totalSales = parseFloat($('#displayTotalSales').val()) || 0;
        var totalMaterialCost = parseFloat($('#displayTotalMaterialCost').val()) || 0;
        var totalProcessingCost = parseFloat($('#displayTotalProcessingCost').val()) || 0;
        var totalSubContractCost = parseFloat($('#displayTotalSubContractCost').val()) || 0;
        var totalMachineCost = parseFloat($('#inputTotalMachineCost').val()) || 0;
        var totalStandardPartCost = parseFloat($('#displayTotalStandardPartCost').val()) || 0;
        var totalOverheadCost = parseFloat($('#displayTotalOverheadCost').val()) || 0;

        var COGS = totalMaterialCost + totalProcessingCost + totalSubContractCost + totalMachineCost + totalStandardPartCost + totalOverheadCost;
        var GPM = totalSales - COGS;
        var OHorg = totalSales * 0.1;
        var NOI = GPM - OHorg;
        var BNP = totalSales * 0.02;
        var LSP = NOI - BNP;

        $('#COGS').text(formatNumber(COGS));
        $('#GPM').text(formatNumber(GPM));
        $('#OHorg').text(formatNumber(OHorg));
        $('#NOI').text(formatNumber(NOI));
        $('#BNP').text(formatNumber(BNP));
        $('#LSP').text(formatNumber(LSP));
    });

    // Initialize DataTable
    $('#overhead-table').DataTable();
});

// Helper function to format numbers with commas
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

</script>

<script>
    // Function to update the page title
    function updateTitle(pageTitle) {
        document.title = pageTitle;
    }

    // Call the function when the "Calculation" page is loaded
    updateTitle('Calculation');
</script>
@endsection
