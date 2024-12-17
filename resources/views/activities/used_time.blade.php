@extends('activities.activities')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Used Time</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Used Time</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('activities.used_time') }}" method="GET">
                                    <div class="form-group">
                                        <label for="order_number" class="form-label">Order</label>
                                        <input name="order_number" id="order_number" class="form-control" list="order_list"
                                            style="width: 10%;" required value="{{ session('order_number') }}"
                                            placeholder="-- Select Order --">
                                        <datalist id="order_list">
                                            @foreach ($orders as $o)
                                                <option value="{{ $o->order_number }}">
                                                    {{ $o->order_number }}
                                                </option>
                                            @endforeach
                                        </datalist>
                                    </div>

                                    <div class="form-group">
                                        <label for="item_number" class="form-label">Item</label>
                                        <select name="item_number" id="item_number" class="form-control select2"
                                            style="width: 10%;" required>
                                            <option disabled>-- Select Item --</option>
                                            @foreach ($items as $i)
                                                <option value="{{ $i->item_number }}"
                                                    {{ session('item_number') == $i->item_number ? 'selected' : '' }}>
                                                    {{ $i->item_number }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                    <button type="button" class="btn btn-secondary btn-custom" id="scan-qr-btn">Scan QR
                                        Code</button>
                                </form>
                                <form action="{{ route('activities.clear_filters') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary btn-custom">Reset Filter</button>
                                </form>
                                <div id="reader" style="width: 100%; display: none;"></div>
                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Used Time Data</h3>
                            </div>
                            <div class="card-body">
                                <table id='usedtime' class="table table-head-fixed text-nowrap ">
                                    <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Item Number</th>
                                            <th style="display: none;">QR ID</th>
                                            <th>Date Wanted</th>
                                            <th>Operator</th>
                                            <th>Machine</th>
                                            <th>Operation</th>
                                            <th>Estimated Time</th>
                                            <th>Duration</th>
                                            <th>Pending At</th>
                                            <th>Started At</th>
                                            <th>Finished At</th>
                                            <th>Status</th>
                                            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usedtime as $ut)
                                            <tr data-barcode-id="{{ $ut->barcode_id }}">
                                                <td>{{ $ut->order_number }}</td>
                                                <td>{{ $ut->item_number }}</td>
                                                <td>{{ $ut->barcode_id }}</td>
                                                <td>{{ $ut->date_wanted }}</td>
                                                <td>{{ $ut->user_name }}</td>
                                                <td>{{ $ut->machine }}</td>
                                                <td>{{ $ut->operation }}</td>
                                                <td>{{ gmdate('H:i:s', $ut->estimated_time * 3600) }}</td>
                                                <td><span id="duration-{{ $ut->id }}">{{ gmdate('H:i:s', $ut->duration) }}</span></td>
                                                <td>{{ $ut->pending_at }}</td>
                                                <td>{{ $ut->started_at }}</td>
                                                <td>{{ $ut->finished_at }}</td>
                                                <td>{{ ucfirst($ut->status) }}</td>
                                                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                                    <td>
                                                        <div class="button-container">
                                                            <form action="{{ route('activities.update_status', $ut->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="action" value="start">
                                                                <input type="hidden" name="user_name" value="{{ $user->name }}">
                                                                <button type="submit" class="btn btn-success btn-start" {{ ($ut->status != 'pending' && $ut->status != 'queue') || $ut->status == 'finished' ? 'disabled' : '' }}>Start</button>
                                                            </form>
                                                            <form action="{{ route('activities.update_status', $ut->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="action" value="pending">
                                                                <input type="hidden" name="user_name" value="{{ $user->name }}">
                                                                <button type="submit" class="btn btn-warning btn-reset" {{ $ut->status == 'pending' || $ut->status == 'finished' || $ut->status == 'queue' ? 'disabled' : '' }}>Pending</button>
                                                            </form>
                                                            <form action="{{ route('activities.update_status', $ut->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="action" value="finish">
                                                                <input type="hidden" name="user_name" value="{{ $user->name }}">
                                                                <button type="submit" class="btn btn-danger btn-remove" {{ $ut->status == 'finished' || $ut->status == 'queue' ? 'disabled' : '' }}>Finish</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            // Trigger change event on order_number input if there's a selected value
            var selectedOrderNumber = $('#order_number').val();
            if (selectedOrderNumber) {
                loadItemsByOrder(selectedOrderNumber); // Trigger the AJAX call to load items for the selected order
            }

            $('#order_number').on('change', function () {
                var orderNumber = $(this).val();
                $('#item_number').empty();
                $('#item_number').append('<option selected="selected" disabled>-- Select Item --</option>');

                if (orderNumber) {
                    loadItemsByOrder(orderNumber); // Load items when order is selected
                }
            });

            function loadItemsByOrder(orderNumber) {
                $.ajax({
                    url: '/items-by-order/' + orderNumber,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        $.each(data, function (key, item) {
                            // Only append items that have a non-empty item number
                            if (item.no_item && item.no_item.trim() !== '') {
                                $('#item_number').append('<option value="' + item.no_item +
                                    '"' +
                                    (item.no_item == "{{ session('item_number') }}" ?
                                        ' selected' : '') + '>' +
                                    item.no_item + '</option>');
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error: ' + status + error);
                    }
                });
            }

            // QR Code Scanning Logic
            $('#scan-qr-btn').on('click', function () {
                $('#reader').show();
                console.log("QR scan button clicked. Initializing Html5Qrcode...");
                const html5QrCode = new Html5Qrcode("reader");

                const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                    console.log(`Code matched = ${decodedText}`, decodedResult);
                    $('#reader').hide();

                    console.log("Stopping Html5Qrcode...");
                    html5QrCode.stop().then((ignore) => {
                        console.log("Html5Qrcode stopped successfully.");
                        console.log(`Scanned QR Code Value: ${decodedText}`);
                        filterTableByQrCode(decodedText);
                    }).catch((err) => {
                        console.error("Error stopping Html5Qrcode:", err);
                    });
                };

                const config = {
                    fps: 10,
                    qrbox: {
                        width: 250,
                        height: 250,
                    },
                };

                html5QrCode.start(
                    { facingMode: "environment" },
                    config,
                    qrCodeSuccessCallback
                ).catch((err) => {
                    console.error("Error starting Html5Qrcode:", err);
                });
            });

            function filterTableByQrCode(barcode_id) {
                console.log(`Filtering table for barcode ID: ${barcode_id}`);
                let found = false;

                // Iterate through each row and compare barcodes
                $('tbody tr').each(function () {
                    var rowBarcodeId = $(this).data('barcode-id'); // Use data attribute
                    console.log(`Row barcode ID: ${rowBarcodeId}`);

                    // Normalize and compare
                    if (rowBarcodeId && rowBarcodeId.trim().toLowerCase() === barcode_id.trim().toLowerCase()) {
                        $(this).show(); // Show matching row
                        found = true;
                    } else {
                        $(this).hide(); // Hide non-matching rows
                    }
                });

                // Handle no match
                if (!found) {
                    const allBarcodes = [];
                    $('tbody tr').each(function () {
                        allBarcodes.push($(this).data('barcode-id') || 'undefined');
                    });

                    console.warn(`No matching barcode. Scanned: ${barcode_id}, Table barcodes: ${allBarcodes.join(', ')}`);
                    Swal.fire({
                        icon: 'error',
                        title: 'No Match Found',
                        text: `Scanned: ${barcode_id}. Available barcodes: ${allBarcodes.join(', ')}`,
                    });
                }
            }


            // Alerts for session messages
            window.addEventListener('DOMContentLoaded', (event) => {
                var errorAlert = '{{ session('error') }}';
                if (errorAlert !== '') {
                    Swal.fire({
                        icon: 'error',
                        title: errorAlert,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        toast: true,
                    });
                }

                var successAlert = '{{ session('success') }}';
                if (successAlert !== '') {
                    Swal.fire({
                        icon: 'success',
                        text: successAlert,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                        toast: true,
                    });
                }

                function updateTitle(pageTitle) {
                    document.title = pageTitle;
                }

                updateTitle('Used Time');

                @foreach ($usedtime as $ut)
                    @if ($ut->status == 'started')
                        startTimer({{ $ut->id }}, {{ $ut->duration }}, "{{ $ut->started_at }}");
                    @endif
                @endforeach

                function startTimer(id, initialDuration, startedAt) {
                    const startTime = new Date(startedAt).getTime();
                    const durationElement = document.getElementById('duration-' + id);

                    setInterval(function () {
                        const now = new Date().getTime();
                        const elapsedTime = Math.floor((now - startTime) / 1000) + initialDuration;
                        durationElement.textContent = new Date(elapsedTime * 1000).toISOString().substr(11, 8);
                    }, 1000);
                }
            });
        });
    </script>

@endsection
