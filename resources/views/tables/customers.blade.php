@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Customer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tables') }}">Table</a></li>
                            <li class="breadcrumb-item active">Customer</li>
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
                        <a href="{{ route('activities.createcustomer') }}" class="btn btn-primary mb-3"><i
                                class="fas fa-plus"></i>
                            Add</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Customer Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Customer No.</th>
                                            <th>Company</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Province</th>
                                            <th>Zip Code</th>
                                            <th>Country</th>
                                            <th>Phone</th>
                                            <th>Fax</th>
                                            <th>Email</th>
                                            <th>NPWP</th>
                                            <th>Tax Address</th>
                                            <th>Shipment</th>
                                            <th>Contact Person</th>
                                            <th>Web Page</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer as $c)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$c->customer_no}}</td>
                                                <td>{{ $c->company }}</td>
                                                <td>{{ $c->name }}</td>
                                                <td>{{ $c->address }}</td>
                                                <td>{{ $c->city }}</td>
                                                <td>{{ $c->province }}</td>
                                                <td>{{ $c->zipcode }}</td>
                                                <td>{{ $c->country }}</td>
                                                <td>{{ $c->phone }}</td>
                                                <td>{{ $c->fax }}</td>
                                                <td>{{ $c->email }}</td>
                                                <td>{{ $c->npwp }}</td>
                                                <td>{{ $c->tax_address }}</td>
                                                <td>{{ $c->shipment }}</td>
                                                <td>{{$c->cp}}</td>
                                                <td>{{ $c->webpage }}</td>
                                                <td>
                                                    <a href="{{ route('activities.editcustomer', ['id' => $c->id]) }}"
                                                        class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                        Edit</a>
                                                    <a href="{{ route('activities.deletecustomer', ['id' => $c->id]) }}"
                                                        data-toggle="modal" data-target="#modal-hapus{{ $c->id }}"
                                                        class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $c->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Customer</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure delete Mr/Mrs.
                                                                <b>{{ $c->name }}</b> from <b>{{ $c->company }}?</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('activities.deletecustomer', ['id' => $c->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
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
        // Menampilkan pesan kesalahan dari sesi menggunakan SweetAlert
        var errorAlert = '{{ session('error') }}';
        if (errorAlert !== '') {
            Swal.fire({
                icon: 'error',
                title: errorAlert,
                position: 'center', // Mengubah posisi ke tengah
                showConfirmButton: true, // Menampilkan tombol OK
                toast: false,
            });
        }

        // Menampilkan pesan keberhasilan dari sesi menggunakan SweetAlert
        var successAlert = '{{ session('success') }}';
        if (successAlert !== '') {
            Swal.fire({
                icon: 'success',
                text: successAlert,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                toast: true,
            });
        }
        
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Customer');
    </script>
@endsection
