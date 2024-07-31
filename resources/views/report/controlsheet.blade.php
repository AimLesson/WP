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
                                                        $processNames = $item->processingAdds->pluck('operation')->toArray();
                                                    @endphp

                                                    <!-- Create a cell for each process, up to the max number of processes -->
                                                    @for ($i = 0; $i < $maxProcesses; $i++)
                                                        <td>{{ $processNames[$i] ?? '-' }}</td>
                                                    @endfor

                                                    <td>{{ $item->processingAdds->first()->date_out ?? '-' }}</td>
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

    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Control Sheet');
    </script>
@endsection
