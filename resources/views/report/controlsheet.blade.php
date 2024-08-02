@extends('report.report')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Control Sheet</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                        <li class="breadcrumb-item active">Control Sheet</li>
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
                            <h3 class="card-title">Control Sheet</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Form to filter by order number -->
                            <form method="GET" action="{{ route('controlsheet') }}">
                                <div class="form-group">
                                    <label for="order_number">Order Number:</label>
                                    <input type="text" id="order_number" name="order_number" class="form-control" value="{{ old('order_number', $orderNumber) }}">
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

                            <table id="controlsheet" class="table table-head-fixed text-nowrap mt-4">
                                <thead>
                                    <tr>
                                        <th>Item Number</th>
                                        <th>SN</th>
                                        <th>Drawing Number</th>
                                        <th>NOS.</th>
                                        <th>Nama Item</th>
                                        @php
                                            // Find the maximum number of processes for any item
                                            $maxProcesses = $items->map(function($item) {
                                                return $item->processingAdds->count();
                                            })->max();
                                        @endphp

                                        <!-- Create headers for each process column -->
                                        @for ($i = 1; $i <= $maxProcesses; $i++)
                                            <th>Process {{ $i }}</th>
                                        @endfor

                                        <th>Date Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->no_item }}</td>
                                            <td>-</td>
                                            <td>{{ $item->drawing_no }}</td>
                                            <td>{{ $item->nos }}</td>
                                            <td>{{ $item->item }}</td>

                                            @php
                                                $processingAdds = $item->processingAdds;
                                                $processNames = $processingAdds->pluck('operation')->toArray();
                                                $statuses = $processingAdds->pluck('status')->toArray();
                                            @endphp

                                            <!-- Create a cell for each process, up to the max number of processes -->
                                            @for ($i = 0; $i < $maxProcesses; $i++)
                                                @php
                                                    $processName = $processNames[$i] ?? '-';
                                                    $status = $statuses[$i] ?? 'queue'; // Default to 'queue' if not set
                                                    $statusClass = 'text-white'; // Default text color

                                                    switch ($status) {
                                                        case 'Started':
                                                            $statusClass = 'bg-success'; // Green background
                                                            break;
                                                        case 'pending':
                                                            $statusClass = 'bg-warning'; // Yellow background
                                                            break;
                                                        case 'finished':
                                                            $statusClass = 'bg-primary'; // Blue background
                                                            break;
                                                        default:
                                                            $statusClass = 'bg-secondary'; // Grey background for 'queue'
                                                            break;
                                                    }
                                                @endphp
                                                <td class="{{ $statusClass }}">{{ $processName }}</td>
                                            @endfor

                                            <td>{{ $item->processingAdds->first()->date_out ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Add CSS for status colors -->
                        <style>
                            .bg-success {
                                background-color: #28a745 !important;
                            }
                            .bg-warning {
                                background-color: #ffc107 !important;
                            }
                            .bg-primary {
                                background-color: #007bff !important;
                            }
                            .bg-secondary {
                                background-color: #6c757d !important;
                            }
                            .text-white {
                                color: #ffffff !important;
                            }

                            @media print {
                            table.dataTable {
                                background-color: #007bff; /* Background color for the table */
                            }
                            table.dataTable td, table.dataTable th {
                                background-color: #007bff; /* Background color for table cells */
                            }
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons -->
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">


<script>
    $(document).ready(function() {
        $("#controlsheet").DataTable({
            responsive: false,
            lengthChange: false,
            autoWidth: false,
            scrollX: true,
            buttons: [
                {
                    extend: 'print',
                    className: 'btn-custom',
                    customize: function (win) {
                        var currentDateTime = new Date();
                        var formattedDateTime = currentDateTime.toLocaleString('en-GB', { hour: '2-digit', minute: '2-digit', day: '2-digit', month: '2-digit', year: 'numeric' });

                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                `
                                <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #000;">
                                    <div>
                                        <p><strong>PT ATMI SOLO</strong></p>
                                        <p>St. Michael Surakarta</p>
                                    </div>
                                    <div>
                                        <p>` + formattedDateTime + `</p>
                                    </div>
                                </div>
                                <div style="margin-top: 20px;">
                                    <table style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 5px; background-color: #d9edf7;"><strong>ORDER NUMBER</strong></td>
                                            <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->order_number : '' }}</td>
                                            <td style="border: 1px solid #000; padding: 5px; background-color: #d9edf7;"><strong>ASSEMBLY DRAWING</strong></td>
                                            <td style="border: 1px solid #000; padding: 5px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 5px; background-color: #d9edf7;"><strong>ISSUED</strong></td>
                                            <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->order_date : '' }}</td>
                                            <td style="border: 1px solid #000; padding: 5px; background-color: #d9edf7;"><strong>CUSTOMER</strong></td>
                                            <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->customer : '' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 5px; background-color: #d9edf7;"><strong>DATE WANTED</strong></td>
                                            <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->dod : '' }}</td>
                                            <td style="border: 1px solid #000; padding: 5px; background-color: #d9edf7;"><strong>PRODUCT</strong></td>
                                            <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->product : '' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 5px; background-color: #d9edf7;"><strong>No SO</strong></td>
                                            <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->so_number : '' }}</td>
                                            <td style="border: 1px solid #000; padding: 5px; background-color: #d9edf7;"><strong>NO OF PRODUCTS</strong></td>
                                            <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->qty : '' }}</td>
                                        </tr>
                                    </table>
                                </div>
                                `
                            );

                        // Add table styles
                        $(win.document.body).find('table')
                            .addClass('table table-bordered')
                            .css('font-size', 'inherit')
                            .css('width', '100%')
                            .css('border-collapse', 'collapse');

                        $(win.document.body).find('th, td')
                            .css('border', '1px solid #000')
                            .css('padding', '8px')
                            .css('text-align', 'left');

                        $(win.document.body).find('th')
                            .css('background-color', '#28a745')
                            .css('color', '#000');

                        // Specific status styles
                        $(win.document.body).find('td.bg-success')
                            .css('background-color', '#28a745')
                            .css('color', '#ffffff');
                        $(win.document.body).find('td.bg-warning')
                            .css('background-color', '#ffc107')
                            .css('color', '#ffffff');
                        $(win.document.body).find('td.bg-primary')
                            .css('background-color', '#007bff')
                            .css('color', '#ffffff');
                        $(win.document.body).find('td.bg-secondary')
                            .css('background-color', '#6c757d')
                            .css('color', '#ffffff');

                        // Add print-specific styles
                        var printStyles = `
                            <style>
                                .bg-success {
                                    background-color: #28a745 !important;
                                    color: #ffffff !important;
                                }
                                .bg-warning {
                                    background-color: #ffc107 !important;
                                    color: #ffffff !important;
                                }
                                .bg-primary {
                                    background-color: #007bff !important;
                                    color: #ffffff !important;
                                }
                                .bg-secondary {
                                    background-color: #6c757d !important;
                                    color: #ffffff !important;
                                }
                            </style>
                        `;
                        $(win.document.head).append(printStyles);
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
        }).buttons().container().appendTo('#controlsheet_wrapper .col-md-6:eq(0)');

    // Update title
    function updateTitle(pageTitle) {
        document.title = pageTitle;
    }

    updateTitle('Control Sheet');
});

</script>
@endsection
