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
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                                <div class="card-body">
                                    <!-- Form to filter by order number -->
                                    <form method="GET" action="{{ route('controlsheet') }}">
                                        <div class="form-group">
                                            <label for="order_number">Order Number:</label>
                                            <input type="text" id="order_number" name="order_number" class="form-control" value="{{ old('order_number', $orderNumber) }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </form>

                                    @if ($order)
                                        <!-- Display Order details -->
                                        <div class="mt-4">
                                            <h3>Order Details</h3>
                                            <p><strong>Order Number:</strong> {{ $order->order_number }}</p>
                                            <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                                            <p><strong>Order Date:</strong> {{ $order->order_date }}</p>
                                            <!-- Add more order details as needed -->
                                        </div>
                                    @endif

                                    <table id="machine" class="table table-head-fixed text-nowrap mt-4">
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
                                </style>






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

    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Control Sheet');
    </script>
@endsection
