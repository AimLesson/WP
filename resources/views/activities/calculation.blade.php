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
                                <label for="order_id">Order Number</label>
                                <select name="order_id" id="order_id" class="form-control" required>
                                    <option value="" disabled selected>-- Select Order Number --</option>
                                    @foreach($orders as $id => $orderNumber)
                                        <option value="{{ $id }}">{{ $orderNumber }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    
                        <div id="calculation-result" style="display: none;">
                            <h2>Calculation Result</h2>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Total Sales</th>
                                    <td id="totalSales"></td>
                                </tr>
                                <tr>
                                    <th>Total Material Cost</th>
                                    <td id="totalMaterialCost"></td>
                                </tr>
                                <tr>
                                    <th>Total Processing Cost</th>
                                    <td id="totalProcessingCost"></td>
                                </tr>
                                <tr>
                                    <th>Total Sub-Contract Cost</th>
                                    <td id="totalSubContractCost"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                });
            } else {
                $('#calculation-result').hide();
            }
        });
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
