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
                            <form method="GET" action="{{ route('controlsheet') }}">
                                <div class="form-group">
                                    <label for="order_number">Order Number:</label>
                                    <input list="order_numbers" id="order_number" name="order_number" class="form-control"
                                        value="{{ old('order_number', $orderNumber) }}">

                                    <datalist id="order_numbers">
                                        @foreach (\App\Models\Order::pluck('order_number') as $orderNumber)
                                            <option value="{{ $orderNumber }}"></option>
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary btn-custom me-2">Filter</button>
                                    <a href="{{ route('controlsheet') }}" class="btn btn-secondary btn-custom">Reset</a>
                                </div>
                            </form>
                                <div class="card p-3 m-3">
                                    @if ($order)
                                        <div class="row">
                                            <!-- Left column for order details -->
                                            <div class="col-md-6">
                                                <div class="card border-light mb-3">
                                                    <div class="card-header bg-light">
                                                        <h5>Order Information</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p><strong>Order Number:</strong> <span data-order-number="{{ $order->order_number }}">{{ $order->order_number }}</span></p>
                                                        <p><strong>Issued Date:</strong> <span data-order-date="{{ $order->order_date }}">{{ $order->order_date }}</span></p>
                                                        <p><strong>Date Wanted:</strong> <span data-date-wanted="{{ $order->dod }}">{{ $order->dod }}</span></p>
                                                        <p><strong>Number SO:</strong> <span data-so-number="{{ $order->so_number }}">{{ $order->so_number }}</span></p>
                                                        <p><strong>Customer:</strong> <span data-customer="{{ $order->customer }}">{{ $order->customer }}</span></p>
                                                        <p><strong>Product:</strong> <span data-product="{{ $order->product }}">{{ $order->product }}</span></p>
                                                        <p><strong>Number of Products:</strong> <span data-qty="{{ $order->qty }}">{{ $order->qty }}</span></p>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Right column for product details -->
                                            <div class="col-md-6">
                                                <div class="card border-light mb-3">
                                                    <div class="card-header bg-light">
                                                        <h5>Product Information</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p><strong>Product:</strong> {{ $order->product }}</p>
                                                        <p><strong>Number of Products:</strong> {{ $order->qty }}</p>
                                                        <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                                                        <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <p>No order details available.</p>
                                    @endif
                                </div>

                                <!-- Color Legend Section -->
                                <div class="card p-3 m-3">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span class="badge bg-success text-white p-2">Started</span> - Process has
                                            started
                                        </div>
                                        <div class="col-md-3">
                                            <span class="badge bg-warning text-white p-2">Pending</span> - Process is
                                            pending
                                        </div>
                                        <div class="col-md-3">
                                            <span class="badge bg-primary text-white p-2">Finished</span> - Process is
                                            finished
                                        </div>
                                        <div class="col-md-3">
                                            <span class="badge bg-secondary text-white p-2">Queue</span> - Process in queue
                                        </div>
                                    </div>
                                </div>
                                
                                <button onclick="printControlSheet()" class="btn btn-secondary float-justify mb-3">
                                    <i class="fas fa-print"></i>Print Control Sheet</button>

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
                                                $maxProcesses = $items
                                                    ->map(function ($item) {
                                                        return $item->processingAdds->count();
                                                    })
                                                    ->max();
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
                                        background-color: #007bff;
                                        /* Background color for the table */
                                    }

                                    table.dataTable td,
                                    table.dataTable th {
                                        background-color: #007bff;
                                        /* Background color for table cells */
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
        function printControlSheet() {
    // Get the current date and time
    const currentDateTime = new Date().toLocaleString('en-GB', {
        hour: '2-digit',
        minute: '2-digit',
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });

    // Create print window
    const printWindow = window.open('', '_blank');
    
    // Get table data and explicitly create the table HTML
    const table = document.getElementById('controlsheet');
    const rows = Array.from(table.querySelectorAll('tbody tr'));
    
    // Create table HTML manually to ensure headers are included
    let tableHTML = `
        <table class="print-table">
            <thead>
                <tr>
                    <th>Item Number</th>
                    <th>SN</th>
                    <th>Drawing Number</th>
                    <th>NOS.</th>
                    <th>Nama Item</th>
                    <th>Process 1</th>
                    <th>Date Out</th>
                </tr>
            </thead>
            <tbody>
    `;

    // Add rows from the original table
    rows.forEach(row => {
        tableHTML += row.outerHTML;
    });

    tableHTML += '</tbody></table>';

    // Count the number of rows
    const noOfItems = rows.length;

    // Get order details
    const orderNumber = document.querySelector('[data-order-number]')?.dataset.orderNumber || '';
    const orderDate = document.querySelector('[data-order-date]')?.dataset.orderDate || '';
    const dateWanted = document.querySelector('[data-date-wanted]')?.dataset.dateWanted || '';
    const soNumber = document.querySelector('[data-so-number]')?.dataset.soNumber || '';
    const customer = document.querySelector('[data-customer]')?.dataset.customer || '';
    const product = document.querySelector('[data-product]')?.dataset.product || '';
    const qty = document.querySelector('[data-qty]')?.dataset.qty || '';

    // Create print content
    const printContent = `
        <!DOCTYPE html>
        <html>
        <head>
            <title>Control Sheet Print</title>
            <style>
                @media print {
                    @page {
                        size: landscape;
                        margin: 1cm;
                    }
                    thead { display: table-header-group !important; }
                    tfoot { display: table-footer-group !important; }
                    tr { page-break-inside: avoid !important; }
                    th { background-color: #f2f2f2 !important; }
                }
                body {
                    font-family: Arial, sans-serif;
                    font-size: 12px;
                    line-height: 1.4;
                    color: #000;
                }
                .header {
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-start;
                    margin-bottom: 20px;
                    padding-bottom: 10px;
                    border-bottom: 1px solid #000;
                }
                .company-info {
                    font-weight: bold;
                }
                .order-details {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }
                .order-details td {
                    border: 1px solid #000;
                    padding: 5px;
                }
                .order-details td:first-child {
                    font-weight: bold;
                    width: 150px;
                }
                .print-table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }
                .print-table th, 
                .print-table td {
                    border: 1px solid #000;
                    padding: 8px;
                    text-align: left;
                }
                .print-table th {
                    background-color: #f2f2f2;
                    font-weight: bold;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
                .bg-success { 
                    background-color: #28a745 !important;
                    color: #fff !important;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
                .bg-warning { 
                    background-color: #ffc107 !important;
                    color: #fff !important;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
                .bg-primary { 
                    background-color: #007bff !important;
                    color: #fff !important;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
                .bg-secondary { 
                    background-color: #6c757d !important;
                    color: #fff !important;
                    -webkit-print-color-adjust: exact !important;
                    print-color-adjust: exact !important;
                }
                .legend {
                    margin-top: 20px;
                    padding: 10px;
                    border: 1px solid #000;
                }
                .legend-item {
                    display: inline-block;
                    margin-right: 20px;
                }
                .legend-color {
                    display: inline-block;
                    width: 20px;
                    height: 20px;
                    margin-right: 5px;
                    vertical-align: middle;
                }
                .footer {
                    margin-top: 10px;
                    text-align: right;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div class="header">
                <div class="company-info">
                    <p>PT ATMI SOLO</p>
                    <p>St. Michael Surakarta</p>
                </div>
                <div class="datetime">
                    <p>${currentDateTime}</p>
                </div>
            </div>

            <table class="order-details">
                <tr>
                    <td>ORDER NUMBER</td>
                    <td>: ${orderNumber}</td>
                    <td>ASSEMBLY DRAWING</td>
                    <td></td>
                </tr>
                <tr>
                    <td>ISSUED</td>
                    <td>: ${orderDate}</td>
                    <td>CUSTOMER</td>
                    <td>: ${customer}</td>
                </tr>
                <tr>
                    <td>DATE WANTED</td>
                    <td>: ${dateWanted}</td>
                    <td>PRODUCT</td>
                    <td>: ${product}</td>
                </tr>
                <tr>
                    <td>No SO</td>
                    <td>: ${soNumber}</td>
                    <td>NO OF PRODUCTS</td>
                    <td>: ${qty}</td>
                </tr>
            </table>
            <div class="legend">
                <div class="legend-item">
                    <span class="legend-color bg-success"></span>Started
                </div>
                <div class="legend-item">
                    <span class="legend-color bg-warning"></span>Pending
                </div>
                <div class="legend-item">
                    <span class="legend-color bg-primary"></span>Finished
                </div>
                <div class="legend-item">
                    <span class="legend-color bg-secondary"></span>Queue
                </div>
            </div>
           
            ${tableHTML}
            <div class="footer">
                NO OF ITEMS = ${noOfItems}
            </div>
        </body>
        </html>
    `;

    // Write content to print window
    printWindow.document.write(printContent);
    printWindow.document.close();

    // Wait for content to load then print
    printWindow.onload = function() {
        printWindow.print();
        // Optional: close the window after printing
        // printWindow.close();
    };
}
    </script>

    <script>
        $(document).ready(function() {
            $("#controlsheet").DataTable({
                responsive: false,
                lengthChange: false,
                autoWidth: false,
                scrollX: true,
                buttons: [
                    // {
                    //     extend: 'print',
                    //     className: 'btn-custom',
                    //     customize: function(win) {
                    //         var currentDateTime = new Date();
                    //         var formattedDateTime = currentDateTime.toLocaleString('en-GB', {
                    //             hour: '2-digit',
                    //             minute: '2-digit',
                    //             day: '2-digit',
                    //             month: '2-digit',
                    //             year: 'numeric'
                    //         });

                    //         $(win.document.body)
                    //             .css('font-size', '10pt')
                    //             .prepend(
                    //                 `
                    //             <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #000;">
                    //                 <div>
                    //                     <p><strong>PT ATMI SOLO</strong></p>
                    //                     <p>St. Michael Surakarta</p>
                    //                 </div>
                    //                 <div>
                    //                     <p>` + formattedDateTime + `</p>
                    //                 </div>
                    //             </div>
                    //             <div style="margin-top: 20px;">
                    //                 <table style="width: 100%; border-collapse: collapse;">
                    //                     <tr>
                    //                         <td style="border: 1px solid #000; padding: 5px;"><strong>ORDER NUMBER</strong></td>
                    //                         <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->order_number : '' }}</td>
                    //                         <td style="border: 1px solid #000; padding: 5px;"><strong>ASSEMBLY DRAWING</strong></td>
                    //                         <td style="border: 1px solid #000; padding: 5px;"></td>
                    //                     </tr>
                    //                     <tr>
                    //                         <td style="border: 1px solid #000; padding: 5px;"><strong>ISSUED</strong></td>
                    //                         <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->order_date : '' }}</td>
                    //                         <td style="border: 1px solid #000; padding: 5px;"><strong>CUSTOMER</strong></td>
                    //                         <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->customer : '' }}</td>
                    //                     </tr>
                    //                     <tr>
                    //                         <td style="border: 1px solid #000; padding: 5px;"><strong>DATE WANTED</strong></td>
                    //                         <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->dod : '' }}</td>
                    //                         <td style="border: 1px solid #000; padding: 5px;"><strong>PRODUCT</strong></td>
                    //                         <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->product : '' }}</td>
                    //                     </tr>
                    //                     <tr>
                    //                         <td style="border: 1px solid #000; padding: 5px;"><strong>No SO</strong></td>
                    //                         <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->so_number : '' }}</td>
                    //                         <td style="border: 1px solid #000; padding: 5px;"><strong>NO OF PRODUCTS</strong></td>
                    //                         <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->qty : '' }}</td>
                    //                     </tr>
                    //                 </table>
                    //             </div>
                    //             `
                    //             );

                    //         // Add table styles
                    //         $(win.document.body).find('table')
                    //             .addClass('table table-bordered')
                    //             .css('font-size', 'inherit')
                    //             .css('width', '100%')
                    //             .css('border-collapse', 'collapse');

                    //         $(win.document.body).find('th, td')
                    //             .css('border', '1px solid #000')
                    //             .css('padding', '8px')
                    //             .css('text-align', 'left');

                    //         $(win.document.body).find('th')
                    //             .css('background-color', '#28a745')
                    //             .css('color', '#000');

                    //         // Specific status styles
                    //         $(win.document.body).find('td.bg-success')
                    //             .css('background-color', '#28a745')
                    //             .css('color', '#ffffff');
                    //         $(win.document.body).find('td.bg-warning')
                    //             .css('background-color', '#ffc107')
                    //             .css('color', '#ffffff');
                    //         $(win.document.body).find('td.bg-primary')
                    //             .css('background-color', '#007bff')
                    //             .css('color', '#ffffff');
                    //         $(win.document.body).find('td.bg-secondary')
                    //             .css('background-color', '#6c757d')
                    //             .css('color', '#ffffff');

                    //         // Add print-specific styles
                    //         var printStyles = `
                    //         <style>
                    //             .bg-success {
                    //                 background-color: #28a745 !important;
                    //                 color: #ffffff !important;
                    //             }
                    //             .bg-warning {
                    //                 background-color: #ffc107 !important;
                    //                 color: #ffffff !important;
                    //             }
                    //             .bg-primary {
                    //                 background-color: #007bff !important;
                    //                 color: #ffffff !important;
                    //             }
                    //             .bg-secondary {
                    //                 background-color: #6c757d !important;
                    //                 color: #ffffff !important;
                    //             }
                    //         </style>
                    //     `;
                    //         $(win.document.head).append(printStyles);
                    //     }
                    // },
                    // {
                    //     extend: 'excel',
                    //     className: 'btn-custom'
                    // },
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
