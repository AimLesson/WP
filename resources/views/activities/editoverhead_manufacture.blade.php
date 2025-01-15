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
                                    <input type="hidden" name="order_number" value="{{ $orderNumber }}">
                                    <table id="customer" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Reference Number</th>
                                                <th>Amount</th>
                                                <th>Keterangan</th>
                                                <th>Info</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($overhead as $pr)
                                                <tr class="processing-row" data-id="{{ $pr->id }}">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><input type="date" name="tanggal[{{ $pr->id }}]" value="{{ $pr->tanggal }}" class="form-control" required></td>
                                                    <td><input type="text" name="description[{{ $pr->id }}]" value="{{ $pr->description }}" class="form-control" required></td>
                                                    <td><input type="text" name="ref[{{ $pr->id }}]" value="{{ $pr->ref }}" class="form-control" required></td>
                                                    <td><input type="number" name="jumlah[{{ $pr->id }}]" value="{{ $pr->jumlah }}" class="form-control" required></td>
                                                    <td><input type="text" name="keterangan[{{ $pr->id }}]" value="{{ $pr->keterangan }}" class="form-control"></td>
                                                    <td><input type="text" name="info[{{ $pr->id }}]" value="{{ $pr->info }}" class="form-control"></td>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Ensure CSRF token is properly set
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#bulkEditForm').on('submit', function(event) {
        event.preventDefault();
        
        var formData = $(this).serialize();
        console.log('Form Data:', formData);
        
        // Disable button and show loading state
        $('.btn-custom').prop('disabled', true).text('Saving...');
        
        $.ajax({
        url: '/activities/overhead-manufacture/update-all',
        method: 'PUT',
        data: formData,
        dataType: 'json',
        success: function(response) {
            console.log('Success:', response);
            alert(response.message);
            // Redirect to the overhead manufacture page
            window.location.href = "{{ route('activities.overhead_manufacture') }}";
        },
            error: function(xhr, status, error) {
                console.error('Error Details:', {
                    status: status,
                    error: error,
                    response: xhr.responseText
                });
                
                let errorMessage = 'An error occurred while saving.';
                
                if (xhr.status === 422) {
                    try {
                        let errors = JSON.parse(xhr.responseText).errors;
                        errorMessage = 'Validation errors:\n';
                        Object.keys(errors).forEach(key => {
                            errorMessage += `${key}: ${errors[key].join(', ')}\n`;
                        });
                    } catch (e) {
                        errorMessage = 'Invalid response format';
                    }
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                alert(errorMessage);
            },
            complete: function() {
                // Always re-enable the button
                $('.btn-custom').prop('disabled', false).text('Save Changes');
            }
        });
    });
});
</script>
@endsection
