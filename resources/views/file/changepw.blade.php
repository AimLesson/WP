@extends('file.file')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Change Password</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('file') }}">File</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('user.updatepw') }}" id="changepw" method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Change Password</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="password_lama">Old Password</label>
                                        <input type="password" name="password_lama" class="form-control" id="password_lama"
                                            placeholder="Input old password" required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_baru">New Password</label>
                                        <input type="password" name="password_baru" class="form-control" id="password_baru"
                                            placeholder="Input new password" required>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_konfirm">Confirm New Password</label>
                                        <input type="password" name="password_konfirm" class="form-control"
                                            id="password_konfirm" placeholder="Input confirm new password">
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("changepw");

            form.addEventListener("submit", function(event) {
                event.preventDefault(); // Mencegah pengiriman formulir segera

                var passwordLama = document.getElementById("password_lama").value;
                var passwordBaru = document.getElementById("password_baru").value;
                var passwordKonfirm = document.getElementById("password_konfirm").value;

                var errorMessages = [];

                // Validasi password lama
                if (passwordLama === "") {
                    alert("Masukkan password lama.");
                }

                // Validasi password baru
                if (passwordBaru === "") {
                    alert("Masukkan password baru.");
                }

                // Validasi konfirmasi password
                if (passwordKonfirm === "") {
                    alert("Masukkan kembali password baru.");
                } else if (passwordBaru !== passwordKonfirm) {
                    alert("Konfirmasi password baru tidak cocok.");
                }

                // Menampilkan pesan kesalahan menggunakan SweetAlert jika ada kesalahan validasi
                if (errorMessages.length > 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: '<ul>' + errorMessages.map(function(message) {
                            return '<li>' + message + '</li>';
                        }).join('') + '</ul>',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000, // Waktu tampilan alert dalam milidetik (misalnya, 3000 untuk 3 detik)
                        timerProgressBar: true,
                        toast: true,
                        width: '20rem', // Ukuran alert
                    });
                } else {
                    // Jika tidak ada kesalahan, formulir dikirimkan
                    form.submit();
                }
            });

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
        });

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Change Password');
    </script>
@endsection
