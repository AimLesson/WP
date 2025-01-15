@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Material</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Material</li>
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
                        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                        <a href="{{ route('activities.creatematerial') }}" class="btn btn-primary mb-3">
                            <i class="fas fa-plus"></i> Add
                        </a> @endif
                         <!-- Filter Form -->
                          <form method="GET" action="{{ route('activities.material') }}" class="mb-3">
                            <div class="form-group row">
                                <label for="order_number" class="col-sm-2 col-form-label">Filtered by Order Number:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="order_number" id="order_number" class="form-control"
                                           value="{{ request('order_number') }}" placeholder="Enter Order Number">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                    <a href="{{ route('activities.material') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Material (Plan)</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Order Number</th>
                                            <th>Part Number</th>
                                            <th>Part Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>Date</th>
                                            <th>Item Name</th>
                                            <th>No Item</th>
                                            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($material as $m)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $m->order_number }}</td>
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->part_name }}</td>
                                                <td>{{ $m->qty }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->price, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->total, 0, ',', '.') }}</td>
                                                <td>{{ $m->date }}</td>
                                                <td>{{ $m->item_name }}</td>
                                                <td>{{ $m->item_no }}</td>
                                                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                                                <td>
                                                    <a href="{{ route('activities.editmaterial', $m->order_number) }}" class="btn-xs btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <button class="btn-xs btn-danger" data-toggle="modal" data-target="#modal-hapus{{ $m->id }}">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </td>
                                                @endif
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $m->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Standart Part</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete <b>{{ $m->part_name }}?</b></p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form action="{{ route('activities.deletestandartpart', $m->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger btn-remove">Delete</button>
                                                            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        window.addEventListener('DOMContentLoaded', (event) => {
            var errorAlert = '{{ session('error') }}';
            if (errorAlert !== '') {
                Swal.fire({
                    icon: 'error',
                    title: errorAlert,
                    position: 'top-end', // Toast position
                    showConfirmButton: false, // No button needed
                    timer: 5000, // Display for 5 seconds
                    toast: true, // Show as a toast
                });
            }

            var successAlert = '{{ session('success') }}';
            if (successAlert !== '') {
                Swal.fire({
                    icon: 'success',
                    text: successAlert,
                    position: 'top-end', // Toast position
                    showConfirmButton: false, // No button needed
                    timer: 5000, // Display for 5 seconds
                    toast: true, // Show as a toast
                });
            }
        });
    </script>
@endsection
