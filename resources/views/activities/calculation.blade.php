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
                            <select name="order_id" id="order_id" class="form-control" required>
                                <option value="" disabled selected>-- Select Order Number --</option>
                                @foreach($orders as $id => $orderNumber)
                                    <option value="{{ $id }}">{{ $orderNumber }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    <div id="calculation-result" style="display: none;">
                        <!-- Existing Calculation Result Table -->
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
                                        <td id="totalSales"></td>
                                    </tr>
                                    <tr>
                                        <td>Material Cost</td>
                                        <td id="totalMaterialCost"></td>
                                    </tr>
                                    <tr>
                                        <td>Labor Cost</td>
                                        <td id="totalProcessingCost"></td>
                                    </tr>
                                    <tr>
                                        <td>Machine Cost</td>
                                        <td id="totalProcessingCost"></td>
                                    </tr>
                                    <tr>
                                        <td>Standart Part Cost</td>
                                        <td id="totalProcessingCost"></td>
                                    </tr>
                                    <tr>
                                        <td>Sub-Contract Cost</td>
                                        <td id="totalSubContractCost"></td>
                                    </tr>
                                    <tr>
                                        <td>Overhead Manufacture Cost</td>
                                        <td id="totalSubContractCost"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- New DataTable -->
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
                                    <!-- Dynamic rows will be added here -->
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
                                        <td id="newTotalSales"></td>
                                    </tr>
                                    <tr>
                                        <td>Gross Profit Margin</td>
                                        <td id="newTotalMaterialCost"></td>
                                    </tr>
                                    <tr>
                                        <td>OH Organisasi</td>
                                        <td id="newTotalLaborCost"></td>
                                    </tr>
                                    <tr>
                                        <td>Net Operating Income</td>
                                        <td id="newTotalMachineCost"></td>
                                    </tr>
                                    <tr>
                                        <td>Pend / Biaya non Oper</td>
                                        <td id="newTotalStandardPartCost"></td>
                                    </tr>
                                    <tr>
                                        <td>Laba Sebelum pajak</td>
                                        <td id="newTotalSubContractCost"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"></script>
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
                        $('#totalSales').text(response.totalSales);
                        $('#totalMaterialCost').text(response.totalMaterialCost);
                        $('#totalProcessingCost').text(response.totalProcessingCost);
                        $('#totalSubContractCost').text(response.totalSubContractCost);

                        // Populate new calculation result table
                        $('#newTotalSales').text(response.newTotalSales);
                        $('#newTotalMaterialCost').text(response.newTotalMaterialCost);
                        $('#newTotalLaborCost').text(response.newTotalLaborCost);
                        $('#newTotalMachineCost').text(response.newTotalMachineCost);
                        $('#newTotalStandardPartCost').text(response.newTotalStandardPartCost);
                        $('#newTotalSubContractCost').text(response.newTotalSubContractCost);
                        $('#newTotalOverheadManufactureCost').text(response.newTotalOverheadManufactureCost);
                        
                        // Update DataTable
                        var table = $('#additional-table').DataTable();
                        table.clear();
                        response.additionalData.forEach(function(item) {
                            table.row.add([
                                item.name,
                                item.description,
                                item.quantity,
                                item.price
                            ]).draw(false);
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

        // Initialize DataTable
        $('#additional-table').DataTable();
    });
</script>

<script>
    // Fungsi untuk mengubah judul berdasarkan halaman
    function updateTitle(pageTitle) {
        document.title = pageTitle;
    }

    // Panggil fungsi ini saat halaman "barcode" dimuat
    updateTitle('Calculation');
</script>
@endsection
