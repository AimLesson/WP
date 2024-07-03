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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Overhead Manufacture</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('activities.updateoverhead_manufacture', $overhead->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="tanggal">Date</label>
                                    <input type="date" name="tanggal" class="form-control" value="{{ $overhead->tanggal }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="so_no">SO Number</label>
                                    <input type="text" name="so_no" class="form-control" value="{{ $overhead->so_no }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="order_number">Order Number</label>
                                    <input type="text" name="order_number" class="form-control" value="{{ $overhead->order_number }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="ref">Reference</label>
                                    <input type="text" name="ref" class="form-control" value="{{ $overhead->ref }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control" value="{{ $overhead->description }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Amount</label>
                                    <input type="number" name="jumlah" class="form-control" value="{{ $overhead->jumlah }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Remark</label>
                                    <input type="text" name="keterangan" class="form-control" value="{{ $overhead->keterangan }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="info">Info</label>
                                    <input type="text" name="info" class="form-control" value="{{ $overhead->info }}">
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
