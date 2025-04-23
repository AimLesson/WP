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
                                    <input list="order_list" name="order_number" id="order_number" 
                                           class="form-control" required 
                                           value="{{ isset($orderNumber) ? $orderNumber : '' }}"
                                           placeholder="-- Select Order --">
                                    <datalist id="order_list">
                                        @foreach ($orders as $o)
                                            <option value="{{ $o->order_number }}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="form-group">
                                    <label for="item_number" class="form-label">Item</label>
                                    <select name="item_number" id="item_number" class="form-control select2" style="width: 100%;" required>
                                        <option disabled {{ !isset($itemNumber) ? 'selected' : '' }}>-- Select Item --</option>
                                        @foreach ($items as $item)
                                        <option value="{{ $item->no_item }}" 
                                            {{ isset($itemNumber) && $itemNumber == $item->no_item ? 'selected' : '' }}>
                                            {{ $item->no_item }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                <a href="{{ route('report.productionsheet') }}" class="btn btn-secondary">Reset</a>
                            </form>
                        
                            <div class="card p-3 m-3">
                                @if ($order)
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
                                        <th>QR Code</th>
                                        <th>Cost Place</th>
                                        <th>Finish Date</th>
                                        <th>Operation</th>
                                        <th>Estimated Time</th>
                                        <th>Used Time</th>
                                        <th>Finished date</th>
                                        <th>Operator</th>
                                        <th>Check</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usedtime as $m)
                                    <tr>
                                        <td>
                                            @if($m->barcode_id)
                                            <div class="qr-code" data-barcode="{{ $m->barcode_id }}">
                                                {!! QrCode::size(80)->generate($m->barcode_id) !!}
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
                                        <td></td>
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

    // Clone the table to manipulate it
    const table = document.getElementById('productionsheet').cloneNode(true);

    // Get the selected item number from the dropdown
    const selectedItemNumber = document.getElementById('item_number').value;
    
    // Get item details for the selected item only
    const itemData = {!! $items->toJson() !!};
    const selectedItem = itemData.find(item => item.no_item === selectedItemNumber);

    // Get the newprocessing data for the selected item
    const newprocessingData = {!! $newprocessingData->toJson() !!};

    // Reset the data in unwanted columns in tbody
    const tbody = table.querySelector('tbody');
    Array.from(tbody.rows).forEach(row => {
        row.cells[5].innerText = ""; // Clear duration column
        row.cells[6].innerText = ""; // Clear finished_date column
        row.cells[7].innerText = ""; // Clear user_name column
    });

    // Get the modified table content
    const tableContent = table.innerHTML;

        // time 
        const now = new Date();
        const currentTime = `${now.getHours().toString().padStart(2, '0')}.${now.getMinutes().toString().padStart(2, '0')}`;

        // Create the print content with the production sheet layout
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
    margin: 15px;
    padding: 0;
    font-size: 12px; /* Base font size increased */
}

.header {
    text-align: center;
    margin-bottom: 8px;
}

.details, .table-wrapper {
    width: 100%;
    margin: 0 auto;
    padding: 0;
}

.details {
    font-size: 15px; /* Increased from 14px */
}

.details table {
    width: 100%;
    margin: 0;
    margin-bottom: 8px;
    border-collapse: collapse;
    border: 2px solid black;
    table-layout: fixed;
}

.details td {
    padding: 5px 7px; /* Slightly increased padding */
    font-size: 15px; /* Increased from 14px */
    border: none;
    vertical-align: top;
}

.details td span.bold {
    font-weight: bold;
}

.details:first-child {
    margin-top: 0;
}

.details:last-child {
    margin-bottom: 0;
}

table {
    width: 100%;
    border-collapse: collapse;
    font-size: 15px; /* Increased from 14px */
    margin-top: 8px;
}

th, td {
    border: 1px solid black;
    padding: 6px; /* Increased from 5px */
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

.footer {
    margin-top: 25px;
    width: 100%;
}

.footer table {
    width: 100%;
    border-collapse: collapse;
}

.footer td {
    width: 50%;
    padding: 10px; /* Increased from 8px */
    border: 1px solid black;
    vertical-align: top;
    box-sizing: border-box;
    font-size: 15px; /* Added explicit font size */
}

.date-wanted {
    font-size: 32px; /* Increased from 30px */
    font-weight: bold;
    margin-top: 20px;
}

@page {
    size: portrait;
    margin: 0.5cm; /* Added smaller margins to maximize printable area */
}

.header {
    text-align: center;
    margin-bottom: 8px;
}

.header h3 {
    margin: 0;
    font-size: 20px; /* Increased from 18px */
    font-weight: bold;
}

.header p {
    margin: 0;
    font-size: 14px; /* Increased from 12px */
}

.header-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

.header-table td, .header-table th {
    border: 1px solid black;
    padding: 5px 7px; /* Increased from 4px 6px */
    text-align: left;
    vertical-align: top;
}

.header-table td.title {
    font-weight: bold;
}

.header-table .center {
    text-align: center;
}

.production-title {
    font-weight: bold;
    font-size: 16px; /* Increased from 14px */
    text-align: center;
    margin: 10px 0;
}
                </style>
            </head>
            <body>
               <table class="header-table">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td>${currentTime}</td>
                                </tr>
                                <tr>
                                    <td>{{ now()->format('d-m-Y') }}</td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td>SN : 25</td>
                                </tr>
                                <tr>
                                    <td>NS : 36</td>
                                </tr>
                            </table>
                        </td>
                        <td class="center" rowspan="2">
                            <div class="production-title">ISO 9001:2015</div>
                            <div class="production-title">PRODUCTION SHEET</div>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td>Dokumen</td>
                                    <td>8.5.2.F1</td>
                                </tr>
                                <tr>
                                    <td>Revisi ke</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Tanggal terbit</td>
                                    <td>11.10.2016</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <div class="details">
                <table>
                     @if ($order)
                    <tr>
                        <td><span class="bold">Order Number:</span> {{ $order->order_number }}</td>
                        <td><span class="bold">SO No.:</span> {{ $order->so_number }}</td>
                        <td><span class="bold">PO (ref).:</span> </td> 
                    </tr>
                    <tr>
                        <td><span class="bold">Customer:</span> {{ $order->customer }}</td>
                        <td><span class="bold">Date of Delivery:</span> {{ $order ? \Carbon\Carbon::parse($order->dod)->format('d-m-Y') : '' }}</td>
                        <td><span class="bold">No. of Prod.:</span> {{ $order->qty }}</td>
                    </tr>
                    <tr>
                        <td><span class="bold">Product:</span> {{ $order->product }}</td>
                        <td><span class="bold">Assy. Drawing:</span> ${selectedItem ? selectedItem.ass_drawing : ''}</td> 
                    </tr>
                    @endif
                </table>
            </div>
            <div class="details">
                <table>
                     @if ($order && $item)
                    <tr>
                        <td><span class="bold">Item Number:</span> ${selectedItem ? selectedItem.no_item : ''}</td>
                        <td><span class="bold">Material:</span> ${selectedItem ? selectedItem.material : ''}</td>
                        <td><span class="bold">Item Name:</span> ${selectedItem ? selectedItem.item : ''}</td>
                    </tr>
                    <tr>
                        <td><span class="bold">Drawing Number:</span> ${selectedItem ? selectedItem.drawing_no : ''}</td>
                        <td><span class="bold">No. of Blank:</span> ${selectedItem ? selectedItem.nob : ''}</td>
                        <td><span class="bold">Rack:</span> </td>
                    </tr>
                    <tr>
                        <td><span class="bold">Date Wanted:</span> {{ $order ? \Carbon\Carbon::parse($order->dod)->format('d-m-Y') : '' }}</td>
                        <td><span class="bold">Weight[kg/pce]:</span> ${selectedItem ? selectedItem.weight : ''}</td>
                        <td><span class="bold">Issued:</span> {{ now()->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        ${newprocessingData.map(proc => `
                        <td><span class="bold">No. of Pieces:</span>${proc.nop || ''}</td>
                        `).join('')}
                        <td><span class="bold">Blank Size (mm):</span> 0</td>
                    </tr>
                    @endif
                </table>
            </div>
                <!-- Table Content -->
                <div class="table-wrapper">
                    <table>
                    ${tableContent}
                </table>
                </div>

                <!-- Footer Section -->
                 @if ($order)
                <div class="date-wanted">DATE WANTED: {{ \Carbon\Carbon::parse($order->dod)->format('d-m-Y') }}</div>
                @endif
                <div class="footer">
                    <table>
                        <tr>
                            <td>Issued by PPIC:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Material Taken By:</td>
                            <td></td>
                        </tr>
                         <tr>
                            <td>Delivered By:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Section:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Date:</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </body>
            </html>
        `;

        // Open a new print window
        const printWindow = window.open('', '_blank');
        printWindow.document.write(printContent);
        printWindow.document.close();

        // Ensure the content is loaded before printing
        printWindow.onload = function() {
            printWindow.print();
            printWindow.onafterprint = function() {
                printWindow.close();
            };
        };
    }
</script>

    
    
<script>
//    $(document).ready(function() {
//     $('#productionsheet').DataTable({
//         responsive: false,
//         lengthChange: false,
//         autoWidth: false,
//         scrollX: true,
//         buttons: [
// //             {
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
// //                 className: 'btn-custom'
// //             },
//             {
//                 extend: 'colvis',
//                 className: 'btn-custom'
//             }
//         ]
//     }).buttons().container().appendTo('#productionsheet_wrapper .col-md-6:eq(0)');

$(document).ready(function() {
    $('#order_number').on('input', function() {
        var orderNumber = $(this).val();
        $('#item_number').empty();
        $('#item_number').append('<option selected="selected" disabled>-- Select Item --</option>');

        // Verify if the entered value exists in the datalist
        var exists = false;
        $('#order_list option').each(function() {
            if ($(this).val() === orderNumber) {
                exists = true;
                return false; // Break the loop
            }
        });

        if (exists) {
            $.ajax({
                url: '/items-by-orders/' + orderNumber,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);  // Debug: Log the data to see the response
                    if (data.length > 0) {
                        $.each(data, function(key, item) {
                            $('#item_number').append('<option value="' + item.no_item + '">' + item.no_item + '</option>');
                        });
                    } else {
                        $('#item_number').append('<option disabled>No items found</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' ' + error);
                }
            });
        } else {
            // Clear item select if invalid order number
            $('#item_number').empty();
            $('#item_number').append('<option selected="selected" disabled>-- Select Item --</option>');
        }
    });
});

        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        updateTitle('Production Sheet');
</script>

@endsection
