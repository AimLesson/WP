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
                                        <select name="order_number" id="order_number" class="form-control select2" style="width: 100%;" required>
                                            <option selected="selected" disabled>-- Select Order --</option>
                                            @foreach ($orders as $o)
                                                <option value="{{ $o->order_number }}">{{ $o->order_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="item_number" class="form-label">Item</label>
                                        <select name="item_number" id="item_number" class="form-control select2" style="width: 100%;" required>
                                            <option selected="selected" disabled>-- Select Item --</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                </form>
                            </div>
                        </div>
                    
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Used Time Data</h3>
                            </div>
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Item Number</th>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usedtime as $ut)
                                            <tr>
                                                <td>{{ $ut->order_number }}</td>
                                                <td>{{ $ut->item_number }}</td>
                                                <td>{{ $ut->date_wanted }}</td>
                                                <td>{{ $ut->user_name }}</td>
                                                <td>{{ $ut->machine }}</td>
                                                <td>{{ $ut->operation }}</td>
                                                <td>{{ gmdate('H:i:s', $ut->estimated_time * 3600) }}</td>
                                                <td>
                                                    <span id="duration-{{ $ut->id }}">{{ gmdate('H:i:s', $ut->duration) }}</span>
                                                </td>
                                                <td>{{ $ut->pending_at }}</td>
                                                <td>{{ $ut->started_at }}</td>
                                                <td>{{ $ut->finished_at }}</td>
                                                <td>{{ ucfirst($ut->status) }}</td>
                                                <td>
                                                    <div class="button-container">
                                                        <form action="{{ route('activities.update_status', $ut->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="action" value="start">
                                                            <input type="hidden" name="user_name" value="{{ $user->name }}">
                                                            <button type="submit" class="btn btn-success btn-start"
                                                                {{ $ut->status != 'pending' && $ut->status != 'queue' || $ut->status == 'finished' ? 'disabled' : '' }}>Start</button>
                                                        </form>
                                                        <form action="{{ route('activities.update_status', $ut->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="action" value="pending">
                                                            <input type="hidden" name="user_name" value="{{ $user->name }}">
                                                            <button type="submit" class="btn btn-warning btn-reset"
                                                                {{ $ut->status == 'pending' || $ut->status == 'finished' || $ut->status == 'queue' ? 'disabled' : '' }}>Pending</button>
                                                        </form>
                                                        <form action="{{ route('activities.update_status', $ut->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="action" value="finish">
                                                            <input type="hidden" name="user_name" value="{{ $user->name }}">
                                                            <button type="submit" class="btn btn-danger btn-remove"
                                                                {{ $ut->status == 'finished' || $ut->status == 'queue' ? 'disabled' : '' }}>Finish</button>
                                                        </form>
                                                    </div>
                                                </td>
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
    <script>
        $('#order_number').on('change', function() {
    var orderNumber = $(this).val();
    $('#item_number').empty();
    $('#item_number').append('<option selected="selected" disabled>-- Select Item --</option>');

    if (orderNumber) {
        $.ajax({
            url: '/items-by-order/' + orderNumber,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $.each(data, function(key, item) {
                    $('#item_number').append('<option value="' + item.no_item + '">' + item.no_item + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + error);
            }
        });
    }
});


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

                setInterval(function() {
                    const now = new Date().getTime();
                    const elapsedTime = Math.floor((now - startTime) / 1000) + initialDuration;
                    durationElement.textContent = new Date(elapsedTime * 1000).toISOString().substr(11, 8);
                }, 1000);
            }
        });
    </script>
@endsection
