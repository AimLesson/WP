@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Standart Part</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Standart Part</li>
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
                        <a href="{{ route('activities.createstandartpart') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i> Add
                        </a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Standart Part</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Part Number</th>
                                            <th>Action</th>
                                            <th>Part Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>Date</th>
                                            <th>Item Name</th>
                                            <th>No Item</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $standart_part = \App\Models\Standart_part::get();
                                        @endphp
                                        @foreach ($standart_part as $m)
                                            <tr>
                                                <td>{{ $m->order_number }}</td>
                                                <td>{{ $m->id }}</td>
                                                <td>
                                                    <a href="{{ route('activities.editstandartpart', $m->id) }}"
                                                        class="btn-xs btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <form action="{{ route('activities.deletestandartpart', $m->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-xs btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
                                                    </form>

                                                </td>
                                                <td>{{ $m->part_name }}</td>
                                                <td>{{ $m->qty }}</td>
                                                <td>{{ $m->price }}</td>
                                                <td>{{ $m->total }}</td>
                                                <td>{{ $m->date }}</td>
                                                <td>{{ $m->item_name }}</td>
                                                <td>{{ $m->item_no }}</td>
                                            </tr>
                                            <!-- Modal for delete confirmation -->
                                            <div class="modal fade" id="modal-hapus{{ $m->no_barcode }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-hapusLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal-hapusLabel">Delete
                                                                Confirmation</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this item?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cancel</button>
                                                            <a href="#" class="btn btn-danger">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
        $(document).ready(function() {
            $('#fetchDataButton').click(function() {
                $.ajax({
                    url: "{{ route('fetch.data') }}",
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        alert(response.message);
                        location.reload(); // Reload the page to see the updates
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        console.error('Response:', xhr.responseText);
                        alert('An error occurred while fetching data.');
                    }
                });
            });
        });

        // Function to update the title based on the page
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Call this function when the "Standart Part" page is loaded
        updateTitle('Standart Part');
    </script>
@endsection
