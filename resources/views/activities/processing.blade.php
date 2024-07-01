@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Processing</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Processing</li>
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
                        <a href="{{ route('activities.createprocessing') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i> Add
                        </a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Processing Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="quotation" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Number Of Piece</th>
                                            <th>Place</th>
                                            <th>Operation</th>
                                            <th>Estimated Time</th>
                                            <th>Date Wanted</th>
                                            <th>Barcode ID</th>
                                            <th>Mach. Cost</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($processing as $it) 
                                            <tr>
                                                <td hidden class="ids">{{ $it->id }}</td>
                                                <td hidden class="so_number">{{ $it->so_number }}</td>
                                                <td>
                                                    <a href="{{ url('activities/processing/view/' . $it->order_number) }}">{{ $it->order_number }}</a>
                                                </td>
                                                <td>{{ $it->nos }}</td>
                                                <td>{{ $it->place }}</td>
                                                <td>{{ $it->operation}}</td>
                                                <td>{{ $it->estimated_time }}</td>
                                                <td>{{ $it->date_wanted }}</td>
                                                <td>{{ $it->barcode_id }}</td>
                                                <td>{{ $it->mach_cost }}</td>
                                                <td>
                                                    <a href="{{ url('activities/processing/edit/' . $it->order_number) }}"
                                                        class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                        Edit</a>
                                                    <a href="#" data-toggle="modal" data-target="#modal-hapus{{ $it->id }}"
                                                        class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $it->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Process</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete
                                                                <b>{{ $it->so_number }} - {{ $it->company_name }}?</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form action="{{ route('activities.destroyprocessing', ['id' => $it->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
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
        // Function to update the page title
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Call this function when the "Processing" page loads
        updateTitle('Processing');
    </script>
@endsection
