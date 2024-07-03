@extends('activities.activities')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Processing</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                        <li class="breadcrumb-item active">Edit Processing</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Processing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('activities.updateprocessing', $processing->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="order_number">Order Number</label>
                                    <input type="text" name="order_number" class="form-control" value="{{ $processing->order_number }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_item">Item Number</label>
                                    <input type="text" name="no_item" class="form-control" value="{{ $processing->item_number }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nop">NOP</label>
                                    <input type="number" name="nop" class="form-control" value="{{ $processing->nop }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="machine_name">Machine</label>
                                    <input type="text" name="machine_name" class="form-control" value="{{ $processing->machine }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="operation">Operation</label>
                                    <input type="text" name="operation" class="form-control" value="{{ $processing->operation }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="est_time">Estimated Time</label>
                                    <input type="number" name="est_time" class="form-control" value="{{ $processing->estimated_time }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="dod">Date Wanted</label>
                                    <input type="date" name="dod" class="form-control" value="{{ $processing->date_wanted }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="machine_cost">Machine Cost</label>
                                    <input type="number" name="machine_cost" class="form-control" value="{{ $processing->mach_cost }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input type="number" name="total" class="form-control" value="{{ $processing->total }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
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
@endsection
