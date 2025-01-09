@extends('activities.activities')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Standard Part</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                        <li class="breadcrumb-item active">Edit Standard Part</li>
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
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="m-0">Material Details: {{ $orderNumber }}</h1>
                            </div>
                            <div class="card-body">
                                <form id="bulkEditForm" method="POST" action="{{ route('activities.update_all_standart_part') }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="order_number" value="{{ $orderNumber }}">
                                    <table id="customer" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Item Number</th>
                                                <th>Item Name</th>
                                                <th>Material Number</th>
                                                <th>Material Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total Price</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($standartpart as $pr)
                                                <tr class="processing-row" data-id="{{ $pr->id }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><input type="text" name="item_no[{{ $pr->id }}]" value="{{ $pr->item_no }}" class="form-control" readonly></td>
                                                    <td><input type="text" name="item_name[{{ $pr->id }}]" value="{{ $pr->item_name }}" class="form-control" readonly></td>
                                                    <td><input type="text" name="id[{{ $pr->id }}]" value="{{ $pr->id }}" class="form-control" readonly></td>
                                                    <td><input type="text" name="part_name[{{ $pr->id }}]" value="{{ $pr->part_name }}" class="form-control"></td>
                                                    <td><input type="number" name="qty[{{ $pr->id }}]" value="{{ $pr->qty }}" class="form-control qty-input"></td>
                                                    <td><input type="number" name="price[{{ $pr->id }}]" value="{{ $pr->price }}" class="form-control price-input"></td>
                                                    <td><input type="number" name="total[{{ $pr->id }}]" value="{{ $pr->total }}" class="form-control total-input"></td>
                                                    <td><input type="date" name="date[{{ $pr->id }}]" value="{{ $pr->date }}" class="form-control"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="{{ route('activities.material') }}" class="btn btn-secondary">Back to Material List</a>
                                        <button type="submit" class="btn btn-primary btn-custom">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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
        // Set up AJAX to include CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Handle form submission
        $('#bulkEditForm').on('submit', function(event) {

            // Collect all form data
            var formData = $(this).serialize();
            console.log(formData);  // Log the form data to the console to check

            // Send the data via AJAX
            $.ajax({
                url: "{{ route('activities.update_all_standart_part') }}", // URL to the update route
                method: 'PUT',
                data: formData,
                success: function(response) {
                    alert(response.message);  // Show success message
                    // Optionally, reload or update the page to reflect the changes
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText); // Log the response for debugging
                    alert('Something went wrong! Please try again.');
                }
            });
        });
    });


</script>
@endsection
