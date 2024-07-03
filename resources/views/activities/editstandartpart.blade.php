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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Standard Part</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('activities.updatestandartpart', $standartpart->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="order_number">Order Number</label>
                                    <input type="text" name="order_number" class="form-control" value="{{ $standartpart->order_number }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_item">Item Number</label>
                                    <input type="text" name="no_item" class="form-control" value="{{ $standartpart->item_no }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ $standartpart->date }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="part_name">Part Name</label>
                                    <input type="text" name="part_name" class="form-control" value="{{ $standartpart->part_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" name="qty" class="form-control" value="{{ $standartpart->qty }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="unit">Unit</label>
                                    <input type="text" name="unit" class="form-control" value="{{ $standartpart->unit }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="price_unit">Price per Unit</label>
                                    <input type="number" name="price_unit" class="form-control" value="{{ $standartpart->price }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="total_price">Total Price</label>
                                    <input type="number" name="total_price" class="form-control" value="{{ $standartpart->total }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="info">Info</label>
                                    <input type="text" name="info" class="form-control" value="{{ $standartpart->info }}">
                                </div>
                                <div class="form-group">
                                    <label for="item">Item</label>
                                    <input type="text" name="item" class="form-control" value="{{ $standartpart->item_name }}">
                                </div>
                                <button type="submit" class="btn btn-primary btn-custom">Update</button>
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
