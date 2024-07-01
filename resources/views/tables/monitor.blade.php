@extends('tables.tables')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Monitor</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tables') }}">Tables</a></li>
                            <li class="breadcrumb-item active">Monitor</li>
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
                                <h3 class="card-title">Monitor</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Action</th>
                                            <th>Image</th>
                                            <th>Order No</th>
                                            <th>Customer</th>
                                            <th>SO. No</th>
                                            <th>Product</th>
                                            <th>Sheet</th>
                                            <th>Eng</th>
                                            <th>Plan</th>
                                            <th>Pur</th>
                                            <th>P6</th>
                                            <th>P7</th>
                                            <th>P8</th>
                                            <th>P9</th>
                                            <th>P10</th>
                                            <th>P11</th>
                                            <th>P12</th>
                                            <th>P13</th>
                                            <th>P14</th>
                                            <th>P15</th>
                                            <th>P16</th>
                                            <th>State</th>
                                            <th>D D D </th>
                                        </tr>
                                    </thead>
                                    
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
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Monitor');
    </script>
@endsection
