@extends('activities.activities')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Overhead Manufacture</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                        <li class="breadcrumb-item active">Edit Overhead Manufacture</li>
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
                                <h1 class="m-0">Overhead Manufacture Details: {{ $orderNumber }}</h1>
                            </div>
                            <div class="card-body">
                                <form id="bulkEditForm">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="order_number" value="{{ $orderNumber }}">
                                    <table id="customer" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Reference Number</th>
                                                <th>Amount</th>
                                                <th>Information 1</th>
                                                <th>Information 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($overhead as $pr)
                                                <tr class="processing-row" data-id="{{ $pr->id }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><input type="date" name="tanggal[{{ $pr->id }}]" value="{{ $pr->tanggal }}" class="form-control"></td>
                                                    <td><input type="textarea" name="description[{{ $pr->id }}]" value="{{ $pr->description }}" class="form-control"></td>
                                                    <td><input type="text" name="ref[{{ $pr->id }}]" value="{{ $pr->ref }}" class="form-control"></td>
                                                    <td><input type="number" name="jumlah[{{ $pr->id }}]" value="{{ $pr->jumlah }}" class="form-control"></td>
                                                    <td><input type="textarea" name="keterangan[{{ $pr->id }}]" value="{{ $pr->keterangan }}" class="form-control"></td>
                                                    <td><input type="textarea" name="info[{{ $pr->id }}]" value="{{ $pr->info }}" class="form-control"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="{{ route('activities.overhead_manufacture') }}" class="btn btn-secondary">Back to Overhead List</a>
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
        // When the form is submitted
        $('#bulkEditForm').on('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting the default way

            // Prepare the data to send to the server
            var formData = $(this).serialize(); // Collects all form data

            // Send the data via AJAX
            $.ajax({
                url: "{{ route('activities.update_all_overhead_manufacture') }}", // Route to handle the update
                method: 'PUT',
                data: formData,
                success: function(response) {
                    alert(response.message);  // Show success message
                    // Optionally, reload or update the page to reflect the changes
                },
                error: function(xhr, status, error) {
                    alert('Something went wrong! Please try again.');
                }
            });
        });
    });
</script>
@endsection
