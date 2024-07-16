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
                                        <td><input type="number" id="inputTotalSales" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Material Cost</td>
                                        <td><input type="number" id="inputTotalMaterialCost" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Labor Cost</td>
                                        <td><input type="number" id="inputTotalLaborCost" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Machine Cost</td>
                                        <td><input type="number" id="inputTotalMachineCost" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Standard Part Cost</td>
                                        <td><input type="number" id="inputTotalStandardPartCost" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Sub-Contract Cost</td>
                                        <td><input type="number" id="inputTotalSubContractCost" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Overhead Manufacture Cost</td>
                                        <td><input type="number" id="inputTotalOverheadManufactureCost" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button id="calculateButton" class="btn btn-primary mb-4">Calculate</button>

                        <div class="table-responsive rounded">
                            <table id="additional-table" class="table table-bordered table-striped rounded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                        <td>COGS</td><!-- COGS= (Material Cost + Labor Cost + Machining Cost + Standard Part Cost + Sub Contract Cost + Overhead Manufacture Cost) - Labor Cost -->
                                        <td id="COGS"></td>
                                    </tr>
                                    <tr>
                                        <td>Gross Profit Margin</td><!-- Gross Profit Margin = Sales Order - COGS -->
                                        <td id="GPM"></td>
                                    </tr>
                                    <tr>
                                        <td>OH Organisasi</td><!-- OH Organisasi = Sales Order * 10% -->
                                        <td id="OHorg"></td>
                                    </tr>
                                    <tr>
                                        <td>Net Operating Income</td><!-- Net Operating Income = Gross Profit Margin - OH Organisasi -->
                                        <td id="NOI"></td>
                                    </tr>
                                    <tr>
                                        <td>Pend / Biaya non Oper</td><!-- Biaya Non Operator = Sales Order * 2% -->
                                        <td id="BNP"></td>
                                    </tr>
                                    <tr>
                                        <td>Laba Sebelum pajak</td><!-- Laba Sebelum Pajak = Net Operating Income - Biaya Non Operator -->
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
                        $('#inputTotalSales').val(response.inputTotalSales);
                        $('#inputTotalMaterialCost').val(response.totalMaterialCost);
                        $('#inputTotalLaborCost').val(response.totalLaborCost);
                        $('#inputTotalMachineCost').val(response.totalMachineCost);
                        $('#inputTotalStandardPartCost').val(response.totalStandardPartCost);
                        $('#inputTotalSubContractCost').val(response.totalSubContractCost);
                        $('#inputTotalOverheadManufactureCost').val(response.totalOverheadManufactureCost);
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
            var totalSales = parseFloat($('#inputTotalSales').val());
            var totalMaterialCost = parseFloat($('#inputTotalMaterialCost').val());
            var totalLaborCost = parseFloat($('#inputTotalLaborCost').val());
            var totalMachineCost = parseFloat($('#inputTotalMachineCost').val());
            var totalStandardPartCost = parseFloat($('#inputTotalStandardPartCost').val());
            var totalSubContractCost = parseFloat($('#inputTotalSubContractCost').val());
            var totalOverheadManufactureCost = parseFloat($('#inputTotalOverheadManufactureCost').val());

            var COGS = (totalMaterialCost + totalLaborCost + totalMachineCost + totalStandardPartCost + totalSubContractCost + totalOverheadManufactureCost) - totalLaborCost;
            var GPM = totalSales - COGS;
            var OHorg = totalSales * 0.1;
            var NOI = GPM - OHorg;
            var BNP = totalSales * 0.02;
            var LSP = NOI - BNP;

            $('#COGS').text(COGS.toFixed(2));
            $('#GPM').text(GPM.toFixed(2));
            $('#OHorg').text(OHorg.toFixed(2));
            $('#NOI').text(NOI.toFixed(2));
            $('#BNP').text(BNP.toFixed(2));
            $('#LSP').text(LSP.toFixed(2));
        });

        // Initialize DataTable
        $('#additional-table').DataTable();
    });
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
