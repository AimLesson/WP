@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Plant View</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.plan') }}">Plant</a></li>
                            <li class="breadcrumb-item active">View Plant</li>
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
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Plant Data</h3>
                            </div>
                            <div class="card-body">
                                @if($planJoin->isNotEmpty())
                                    <form>
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputUsername">Plant Name</label>
                                            <input type="text" name="plan_name" class="form-control" id="exampleInputUsername" value="{{ $planJoin[0]->plan_name }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Group">Group</label>
                                            <div class="table-responsive" style="max-width: 100%;">
                                                <table class="table" id="planadd-table" style="width: 100%; overflow-x: auto;">
                                                    <thead>
                                                        <tr>
                                                            <th style="width:100px">Group ID</th>
                                                            <th>Group Name</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($planJoin->isNotEmpty())
                                                            @foreach($planJoin as $group)
                                                                <tr>
                                                                    <td><input class="form-control" style="width:100px" type="text" id="group_id" name="group_id[]" value="{{ $group->group_id }}" readonly></td>
                                                                    <td><input class="form-control" type="text" id="group" name="group[]" value="{{ $group->group }}" readonly></td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="3">No groups found!</td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <p>Data not found!</p>
                                @endif
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('setup.plan') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection