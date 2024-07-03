@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Print Production Sheet</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item active">Print Production Sheet</li>
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
                    <a href="{{ route('setup.create_productionsheet') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i>
                        Tambah</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Print Production Sheet</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="machine" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Order Number</th>
                                        <th>Customer</th>
                                        <th>Product</th>
                                        <th>SO No.</th>
                                        <th>DOD</th>
                                        <th>Assy Drawing</th>
                                        <th>PO (ref)</th>
                                        <th>No. of Prod</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                            
                                            // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                            $ps = \App\Models\production_sheet::get();
                                        @endphp
                                    @foreach ($ps as $p)
                                        <tr>
                                            <td>{{$p->order_number}}</td>
                                            <td>{{$p->customer}}</td>
                                            <td>{{$p->product}}</td>
                                            <td>{{$p->so_no}}</td>
                                            <td>{{$p->dod}}</td>
                                            <td>{{$p->assy_drawing}}</td>
                                            <td>{{$p->po_ref}}</td>
                                            <td>{{$p->no_prod}}</td>
                                            <td>
                                                <a href="{{ route('setup.viewps', ['id' => $p->id]) }}"
                                                    class="btn-xs btn-info"><i class="fas fa-eye"></i>
                                                    View</a>
                                                <a href="{{ route('user.edit', ['id' => $p->id]) }}"
                                                    class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                    Edit</a>
                                                <a href="" data-toggle="modal"
                                                    data-target="#modal-hapus{{ $p->id }}"
                                                    class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                    Hapus</a>
                                            </td>
                                        </tr>
                                        
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
<!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
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
    updateTitle('Print Production Sheet');
</script>
@endsection
