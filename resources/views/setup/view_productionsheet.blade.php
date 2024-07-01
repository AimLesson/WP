@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Production Sheet</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item active">View Production Sheet</li>
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
                                <p style="text-align: center">PT ATMI SOLO</p>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="col-md-2" style="border: 1px solid; text-align: center;">
                                    <p>7:55</p>
                                    <p>13/06/2023</p>
                                </div>
                                <div class="col-md-2"style="border: 1px solid; text-align: center;">
                                    <p>SN : 75</p>
                                    <p>NS : 82</p>
                                </div>
                                <div class="col-md-4"style="border: 1px solid; text-align: center;">
                                    <p>ISO 9001:2015</p>
                                    <p>PRODUCTION SHEET</p>
                                </div>
                                <div class="col-md-2"style="text-align: center">
                                    <p>Dokumen : </p>
                                    <p>Revisi ke : </p>
                                    <p>Tanggal terbit : </p>
                                </div>
                                <div class="col-md-2" style="text-align: left">
                                    <p>8.5.2.F1</p>
                                    <p>0</p>
                                    <p>11.10.2016</p>
                                </div>
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
        updateTitle('View Production Sheet');
    </script>
@endsection
