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

                            @if ($order)
                                <!-- Display Order details -->
                                <div class="mt-4">
                                    <h3>Order Details</h3>
                                    <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                                    <p><strong>Issued:</strong> {{ $order->order_date }}</p>
                                    <p><strong>Date Wanted:</strong> {{ $order->dod }}</p>
                                    <p><strong>Number SO:</strong> {{ $order->so_number }}</p>
                                    <p><strong>Customer:</strong> {{ $order->customer }}</p>
                                    <p><strong>Product:</strong> {{ $order->product }}</p>
                                    <p><strong>Number of Product:</strong> {{ $order->qty }}</p>
                                    <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                                    <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
                                </div>
                            @endif

                            <table id="productionsheet" class="table table-head-fixed text-nowrap mt-4">
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
                                                {!! QrCode::size(50)->generate($m->barcode_id) !!}
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

<!-- Include DataTables CSS and JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
    $(document).ready(function() {
    $('#productionsheet').DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "scrollX": true,
        "buttons": [
            {
                extend: 'print',
                className: 'btn-custom',
                customize: function (win) {
                    
                    // Add custom header and company info
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            `
                                <div class="header print-only" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
                                    <div class="logo-kiri" style="display: flex; align-items: center;">
                                        <img src="{{ asset('lte/dist/img/ptatmisolo.png') }}" alt="Logo PT. ATMI Solo" class="logo" style="height: 100px;">
                                    </div>
                                    <div class="company-info" style="text-align: center; flex-grow: 1; margin-left: 20px;">
                                        <b>PT. ATMI SOLO</b>
                                        <p>Jl. Adisucipto / Jl. Mojo No. 1 Karangasem, Laweyan, Surakarta 57145<br>
                                            Phone: +62 271 714466 - Fax: +62 271 714390<br>
                                            PO BOX 215 Surakarta 57145, Jawa Tengah, Indonesia<br>
                                            Email: marketing@atmi.co.id - Website: http://www.atmi.co.id</p>
                                    </div>
                                    <div class="logo-kanan" style="display: flex; align-items: center;">
                                        <img src="{{ asset('lte/dist/img/atmipro.png') }}" alt="Logo ATMI Pro" class="logo" style="height: 100px; margin-left: 10px;">
                                        <img src="{{ asset('lte/dist/img/truv.jpg') }}" alt="Logo ISO" class="logo" style="height: 100px; margin-left: 10px;">
                                    </div>
                                </div>
                                <br>
                            `
                        );

                    // Clone the table content including QR codes
                    var table = $('#productionsheet').clone(true, true);
                    // Remove any unwanted elements like buttons from the cloned table
                    table.find('button').remove();
                    
                    // Append the cloned table to the print document body
                    $(win.document.body).append(table);

                    // Style the table in the print view
                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            },
            {
                extend: 'excel',
                className: 'btn-custom'
            },
            {
                extend: 'colvis',
                className: 'btn-custom'
            }
        ]
    }).buttons().container().appendTo('#productionsheet_wrapper .col-md-6:eq(0)');

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
    });
</script>

@endsection
