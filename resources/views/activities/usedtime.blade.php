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
                        <form action="{{ route('activities.used_time') }}" method="GET" class="mb-3">
                            <div class="form-row">
                                <div class="col">
                                    <label for="order_number">Order Number</label>
                                    <select name="order_number" id="order_number" class="form-control">
                                        <option value="">Select Order Number</option>
                                        @foreach($orderNumbers as $orderNumber)
                                            <option value="{{ $orderNumber }}" {{ request('order_number') == $orderNumber ? 'selected' : '' }}>{{ $orderNumber }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="no_item">Item Number</label>
                                    <select name="no_item" id="no_item" class="form-control">
                                        <option value="">Select Item Number</option>
                                        @foreach($itemNumbers as $itemNumber)
                                            <option value="{{ $itemNumber }}" {{ request('no_item') == $itemNumber ? 'selected' : '' }}>{{ $itemNumber }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-primary form-control">Filter</button>
                                </div>
                            </div>
                        </form>
                        <a href="{{ route('activities.createused_time') }}" class="btn btn-primary mb-3">Create Used Time</a>
                        @if($filteredUsedTimes->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Started At</th>
                                        <th>Stopped At</th>
                                        <th>Duration (seconds)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($filteredUsedTimes as $usedTime)
                                        <tr>
                                            <td>{{ $usedTime->processing->order_number }}</td>
                                            <td>{{ ucfirst(str_replace('_', ' ', $usedTime->status)) }}</td>
                                            <td>{{ $usedTime->started_at }}</td>
                                            <td>{{ $usedTime->stopped_at }}</td>
                                            <td>{{ $usedTime->duration }}</td>
                                            <td>
                                                <form action="{{ route('activities.startused_time', $usedTime) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary" {{ $usedTime->status == 'running' ? 'disabled' : '' }}>
                                                        Start
                                                    </button>
                                                </form>
                                                <form action="{{ route('activities.stopused_time', $usedTime) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-warning" {{ $usedTime->status != 'running' ? 'disabled' : '' }}>
                                                        Stop
                                                    </button>
                                                </form>
                                                <form action="{{ route('activities.resetused_time', $usedTime) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Reset
                                                    </button>
                                                </form>
                                                <a href="{{ route('activities.editused_time', $usedTime->processing->order_number) }}" class="btn btn-sm btn-info">Edit</a>
                                                <form action="{{ route('activities.destroyused_time', $usedTime->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No used time records found for the selected order number and item number.</p>
                        @endif
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        // Function to update title based on the page
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Call this function when the "Used Time" page loads
        updateTitle('Used Time');
    </script>
@endsection
