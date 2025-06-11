@extends('activities.activities')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Used Time Record</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('activities.used_time') }}">Used Time</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Display success/error messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Used Time Record - ID: {{ $usedtime->id }}</h3>
                            <div class="card-tools">
                                <a href="{{ route('activities.used_time') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('activities.updateusedtime', $usedtime->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="card-body">
                                <div class="row">
                                    <!-- Order Number -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="order_number">Order Number <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('order_number') is-invalid @enderror" 
                                                   id="order_number" 
                                                   name="order_number" 
                                                   value="{{ old('order_number', $usedtime->order_number) }}" 
                                                   required readonly>
                                            @error('order_number')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Item Number -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="item_number">Item Number <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('item_number') is-invalid @enderror" 
                                                   id="item_number" 
                                                   name="item_number" 
                                                   value="{{ old('item_number', $usedtime->item_number) }}" 
                                                   required readonly>
                                            @error('item_number')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Date Wanted -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_wanted">Date Wanted <span class="text-danger">*</span></label>
                                            <input type="date" 
                                                   class="form-control @error('date_wanted') is-invalid @enderror" 
                                                   id="date_wanted" 
                                                   name="date_wanted" 
                                                   value="{{ old('date_wanted', $usedtime->date_wanted) }}" 
                                                   required readonly>
                                            @error('date_wanted')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Operator -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_name">Operator <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('user_name') is-invalid @enderror" 
                                                   id="user_name" 
                                                   name="user_name" 
                                                   value="{{ old('user_name', $usedtime->user_name) }}" 
                                                   required readonly>
                                            @error('user_name')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Machine -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="machine">Machine <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('machine') is-invalid @enderror" 
                                                   id="machine" 
                                                   name="machine" 
                                                   value="{{ old('machine', $usedtime->machine) }}" 
                                                   required readonly>
                                            @error('machine')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Operation -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="operation">Operation <span class="text-danger">*</span></label>
                                            <input type="text" 
                                                   class="form-control @error('operation') is-invalid @enderror" 
                                                   id="operation" 
                                                   name="operation" 
                                                   value="{{ old('operation', $usedtime->operation) }}" 
                                                   required readonly>
                                            @error('operation')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Estimated Time -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="estimated_time">Estimated Time (Hours) <span class="text-danger">*</span></label>
                                            <input type="number" 
                                                   step="0.01" 
                                                   min="0" 
                                                   class="form-control @error('estimated_time') is-invalid @enderror" 
                                                   id="estimated_time" 
                                                   name="estimated_time" 
                                                   value="{{ old('estimated_time', $usedtime->estimated_time) }}" 
                                                   required>
                                            @error('estimated_time')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control @error('status') is-invalid @enderror" 
                                                    id="status" 
                                                    name="status" 
                                                    required>
                                                <option value="">Select Status</option>
                                                <option value="pending" {{ old('status', $usedtime->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="queue" {{ old('status', $usedtime->status) == 'queue' ? 'selected' : '' }}>Queue</option>
                                                <option value="in_progress" {{ old('status', $usedtime->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="finished" {{ old('status', $usedtime->status) == 'finished' ? 'selected' : '' }}>Finished</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Pending At -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pending_at">Pending At</label>
                                            <input type="datetime-local" 
                                                   class="form-control @error('pending_at') is-invalid @enderror" 
                                                   id="pending_at" 
                                                   name="pending_at" 
                                                   value="{{ old('pending_at', $usedtime->pending_at ? \Carbon\Carbon::parse($usedtime->pending_at)->format('Y-m-d\TH:i') : '') }}">
                                            @error('pending_at')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Started At -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="started_at">Started At</label>
                                            <input type="datetime-local" 
                                                   class="form-control @error('started_at') is-invalid @enderror" 
                                                   id="started_at" 
                                                   name="started_at" 
                                                   value="{{ old('started_at', $usedtime->started_at ? \Carbon\Carbon::parse($usedtime->started_at)->format('Y-m-d\TH:i') : '') }}">
                                            @error('started_at')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Finished At -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="finished_at">Finished At</label>
                                            <input type="datetime-local" 
                                                   class="form-control @error('finished_at') is-invalid @enderror" 
                                                   id="finished_at" 
                                                   name="finished_at" 
                                                   value="{{ old('finished_at', $usedtime->finished_at ? \Carbon\Carbon::parse($usedtime->finished_at)->format('Y-m-d\TH:i') : '') }}">
                                            @error('finished_at')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Duration (Read-only display) -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Current Duration</label>
                                            <input type="text" 
                                                   class="form-control" 
                                                   value="{{ gmdate('H:i:s', $usedtime->duration) }}" 
                                                   readonly>
                                            <small class="text-muted">Durasi akan dihitung secara otomatis berdasarkan waktu mulai dan selesai</small>
                                        </div>
                                    </div>

                                    <!-- Barcode ID (Hidden) -->
                                    <input type="hidden" name="barcode_id" value="{{ $usedtime->barcode_id }}">
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-custom btn-primary">
                                            <i class="fas fa-save"></i> Update Record
                                        </button>
                                        <a href="{{ route('activities.used_time') }}" class="btn btn-secondary ml-2">
                                            <i class="fas fa-times"></i> Cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Auto-calculate duration when start and finish times change
    $('#started_at, #finished_at').on('change', function() {
        var startTime = $('#started_at').val();
        var finishTime = $('#finished_at').val();
        
        if (startTime && finishTime) {
            var start = new Date(startTime);
            var finish = new Date(finishTime);
            
            if (finish > start) {
                var diffInMs = finish - start;
                var diffInSec = Math.floor(diffInMs / 1000);
                var hours = Math.floor(diffInSec / 3600);
                var minutes = Math.floor((diffInSec % 3600) / 60);
                var seconds = diffInSec % 60;
                
                var duration = String(hours).padStart(2, '0') + ':' + 
                              String(minutes).padStart(2, '0') + ':' + 
                              String(seconds).padStart(2, '0');
                
                // Update the duration display
                $('input[readonly]').val(duration);
            }
        }
    });
});
</script>
@endpush
@endsection