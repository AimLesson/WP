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
                            <div class="card p-3 m-3">
                                @if ($order)
                                    <!-- Display Order details -->
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                                            <p><strong>Issued:</strong> {{ $order->order_date }}</p>
                                            <p><strong>Date Wanted:</strong> {{ $order->dod }}</p>
                                            <p><strong>Number SO:</strong> {{ $order->so_number }}</p>
                                            <p><strong>Customer:</strong> {{ $order->customer }}</p>
                                        </div>
                                        <div class="col-md-5">
                                            <p><strong>Product:</strong> {{ $order->product }}</p>
                                            <p><strong>Number of Product:</strong> {{ $order->qty }}</p>
                                            <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                                            <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                              <!-- Add print button -->
                            <button onclick="printProductionSheet()" class="btn btn-secondary float-justify mb-3">
                                <i class="fas fa-print"></i> Print Production Sheet
                            </button>

                            
                            <table id="productionsheet" class="table table-head-fixed text-nowrap mt-4">
                                <thead>
                                    <tr>
                                        <th>Check</th>
                                        <th>Cost Palace</th>
                                        <th>Finish Date</th>
                                        <th>Operation</th>
                                        <th>Estimated Time</th>
                                        <th>Used Time</th>
                                        <th>Finished Date</th>
                                        <th>Operator</th>
                                        <th>QR Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usedtime as $m)
                                    <tr>
                                        <td>
                                            @if($m->barcode_id)
                                            <div class="qr-code" data-barcode="{{ $m->barcode_id }}">
                                                {!! QrCode::size(100)->generate($m->barcode_id) !!}
                                            </div>
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
    function printProductionSheet() {
        // Get the order details and table content
        const orderDetails = document.querySelector('.card.p-3.m-3').innerHTML;
        const tableContent = document.getElementById('productionsheet').innerHTML;
        
        // Create print window content
        const printContent = `
            <!DOCTYPE html>
            <html>
            <head>
                <title>Production Sheet</title>
                <style>
                    @media print {
                        .no-print {
                            display: none !important;
                        }
                    }
                    
                    body {
                        font-family: Arial, sans-serif;
                        padding: 20px;
                    }
                    
                    .header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    
                    .order-details {
                        margin-bottom: 30px;
                    }
                    
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-top: 20px;
                    }
                    
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    
                    th {
                        background-color: #f2f2f2;
                    }
                    
                    .qr-code {
                        width: 100px;
                        height: 100px;
                    }
                    
                    @page {
                        size: landscape;
                    }
                </style>
            </head>
            <body>
                <div class="header">
                    <h1>Production Sheet</h1>
                </div>
                
                <div class="col-md-5">
                    ${orderDetails}
                </div>
                
                <table>
                    ${tableContent}
                </table>
            </body>
            </html>
        `;
        
        // Create and open print window
        const printWindow = window.open('', '_blank');
        printWindow.document.write(printContent);
        printWindow.document.close();
        
        // Wait for images to load before printing
        printWindow.onload = function() {
            printWindow.print();
            printWindow.onafterprint = function() {
                printWindow.close();
            };
        };
    }
    </script>
    
    
<script>
   $(document).ready(function() {
    $('#productionsheet').DataTable({
        responsive: false,
        lengthChange: false,
        autoWidth: false,
        scrollX: true,
        buttons: [
//             {
//                 extend: 'print',
//                 className: 'btn-custom',
//                 customize: function (win) {
//     var currentDateTime = new Date();
//     var formattedDateTime = currentDateTime.toLocaleString('en-GB', { hour: '2-digit', minute: '2-digit', day: '2-digit', month: '2-digit', year: 'numeric' });

//     // Add custom header and company info
//     $(win.document.body)
//         .css('font-size', '10pt')
//         .css('font-family', 'Arial, sans-serif') // Ensure a consistent font family
//         .prepend(
//             `
//                 <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 20px; border-bottom: 1px solid #000;">
//                     <div>
//                         <p style="font-weight: bold;">PT ATMI SOLO</p>
//                         <p>St. Michael Surakarta</p>
//                     </div>
//                     <div>
//                         <p>${formattedDateTime}</p>
//                     </div>
//                 </div>
//                 <div style="margin-top: 20px;">
//                     <table style="width: 100%; border-collapse: collapse;">
//                         <tr>
//                             <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">ORDER NUMBER</td>
//                             <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->order_number : '' }}</td>
//                             <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">ASSEMBLY DRAWING</td>
//                             <td style="border: 1px solid #000; padding: 5px;"></td>
//                         </tr>
//                         <tr>
//                             <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">ISSUED</td>
//                             <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->order_date : '' }}</td>
//                             <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">CUSTOMER</td>
//                             <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->customer : '' }}</td>
//                         </tr>
//                         <tr>
//                             <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">DATE WANTED</td>
//                             <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->dod : '' }}</td>
//                             <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">PRODUCT</td>
//                             <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->product : '' }}</td>
//                         </tr>
//                         <tr>
//                             <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">No SO</td>
//                             <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->so_number : '' }}</td>
//                             <td style="border: 1px solid #000; padding: 5px; font-weight: bold;">NO OF PRODUCTS</td>
//                             <td style="border: 1px solid #000; padding: 5px;">: {{ $order ? $order->qty : '' }}</td>
//                         </tr>
//                     </table>
//                 </div>
//             `
//         );

//     // Style table elements
//     $(win.document.body).find('table')
//         .addClass('table table-bordered')
//         .css('font-size', 'inherit')
//         .css('border-collapse', 'collapse');

//     $(win.document.body).find('th, td')
//         .css('border', '1px solid #000')
//         .css('padding', '8px')
//         .css('text-align', 'left')
//         .css('font-weight', 'normal'); // Explicitly set normal weight

//     $(win.document.body).find('th')
//         .css('font-weight', 'bold') // Bold only for table headers
//         .css('color', '#000');

//     // Ensure SVG QR codes are properly included in the print document
//     $(document).ready(function() {
//     $('#productionsheet').find('svg').each(function() {
//         var originalSVG = $(this); // Reference the original SVG
//         var clonedSVG = originalSVG.clone(); // Clone the SVG
//         clonedSVG.attr('width', '50px'); // Set the width
//         clonedSVG.attr('height', '50px'); // Set the height

//         // Ensure the cloned SVG is inserted back without losing functionality
//         originalSVG.closest('td').html(clonedSVG);
//     });
//     });
// }
//             },
//             {
//                 extend: 'excel',
//                 className: 'btn-custom'
//             },
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
