@extends('report.report')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Production Sheet</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                        <li class="breadcrumb-item active">Production Sheet</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Production Sheet</h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('report.productionsheet') }}" method="GET">
                                <div class="form-group">
                                    <label for="order_number" class="form-label">Order</label>
                                    <select name="order_number" id="order_number" class="form-control select2"
                                        style="width: 100%;" required>
                                        <option selected="selected" disabled>-- Select Order --</option>
                                        @foreach ($orders as $o)
                                        <option value="{{ $o->order_number }}">{{ $o->order_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="item_number" class="form-label">Item</label>
                                    <select name="item_number" id="item_number" class="form-control select2"
                                        style="width: 100%;" required>
                                        <option selected="selected" disabled>-- Select Item --</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                            </form>
                            <table id="machine" class="table table-head-fixed text-nowrap mt-4">
                                <thead>
                                    <tr>
                                        <th>QR Code</th>
                                        <th>Cost Palace</th>
                                        <th>Finish Date</th>
                                        <th>Operation</th>
                                        <th>Estimated Time</th>
                                        <th>Used Time</th>
                                        <th>Finished Date</th>
                                        <th>Operator</th>
                                        <th>Check</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usedtime as $m)
                                    <tr>
                                        <td>
                                            @if($m->barcode_id)
                                                {!! QrCode::size(100)->generate($m->barcode_id) !!}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $m->machine }}</td>
                                        <td>{{ $m->date_wanted }}</td>
                                        <td>{{ $m->operation }}</td>
                                        <td>{{ $m->estimated_time }}</td>
                                        <td>{{ $m->duration }}</td>
                                        <td>{{ $m->finished_date }}</td>
                                        <td>{{ $m->user_name }}</td>
                                        <td>-</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $('#order_number').on('change', function () {
        var orderNumber = $(this).val();
        $('#item_number').empty();
        $('#item_number').append('<option selected="selected" disabled>-- Select Item --</option>');

        if (orderNumber) {
            $.ajax({
                url: '/items-by-orders/' + orderNumber,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    console.log(data);  // Debug: Log the data to see the response
                    if (data.length > 0) {
                        $.each(data, function (key, item) {
                            $('#item_number').append('<option value="' + item.no_item + '">' + item.no_item + '</option>');
                        });
                    } else {
                        $('#item_number').append('<option disabled>No items found</option>');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);  // Debug: Log the error details
                }
            });
        }
    });

    function updateTitle(pageTitle) {
        document.title = pageTitle;
    }

    updateTitle('Production Sheet');
</script>

@endsection
