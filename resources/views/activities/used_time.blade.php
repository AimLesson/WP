@extends('activities.activities')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Used Time</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Used Time</li>
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
                        <!-- Filter Form -->
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
                                        <label for="no_item" class="form-label">Item</label>
                                        <select name="no_item" id="no_item" class="form-control select2" style="width: 100%;" required>
                                            <option selected="selected" disabled>-- Select Item --</option>
                                            @foreach ($items as $ia)
                                                <option value="{{ $ia->no_item }}">{{ $ia->no_item }}</option>
                                            @endforeach
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Date Wanted</th>
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
                                                <td>{{ $ut->date_wanted }}</td>
                                                <td>{{ $ut->machine }}</td>
                                                <td>{{ $ut->operation }}</td>
                                                <td>{{ $ut->estimated_time }}</td>
                                                <td>
                                                    <span id="duration-{{ $ut->id }}">{{ gmdate('H:i:s', $ut->duration) }}</span>
                                                </td>
                                                <td>{{ $ut->pending_at }}</td>
                                                <td>{{ $ut->started_at }}</td>
                                                <td>{{ $ut->finished_at }}</td>
                                                <td>{{ ucfirst($ut->status) }}</td>
                                                <td>
                                                    <form action="{{ route('activities.update_status', $ut->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="start">
                                                        <button type="submit" class="btn btn-success btn-start"
                                                            {{ $ut->status != 'pending' || $ut->status == 'finished' ? 'disabled' : '' }}>Start</button>
                                                    </form>
                                                    <form action="{{ route('activities.update_status', $ut->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="pending">
                                                        <button type="submit" class="btn btn-warning btn-reset"
                                                            {{ $ut->status == 'pending' || $ut->status == 'finished' ? 'disabled' : '' }}>Pending</button>
                                                    </form>
                                                    <form action="{{ route('activities.update_status', $ut->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="action" value="finish">
                                                        <button type="submit" class="btn btn-danger btn-remove"
                                                            {{ $ut->status == 'finished' ? 'disabled' : '' }}>Finish</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <!-- Modal for delete confirmation -->
                                            {{-- <div class="modal fade" id="modal-delete-{{ $ut->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this entry?</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form action="{{ route('activities.deleteusedtime', ['id' => $ut->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
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
