@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">KBLI Code</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('file') }}">File</a></li>
                            <li class="breadcrumb-item active">Edit KBLI Code</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.updatekblicode',['id' => $kblicode->id]) }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit KBLI Code Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputKBLICode">KBLI Code</label>
                                        <input type="text" name="kbli_code" class="form-control"
                                            value="{{ old('kbli_code', $kblicode->kbli_code) }}" id="exampleInputKBLICode"
                                            placeholder="Insert KBLI Code" required>
                                        @error('kbli_code')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputDescription">Description</label>
                                        <textarea name="description" class="form-control" id="exampleInputDescription" placeholder="Insert Description"
                                            required>{{ old('description', $kblicode->description) }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update KBLI Code</button>
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
        // Mendapatkan elemen input KBLI Code
        var kbliCodeInput = document.getElementById('exampleInputKBLICode');

        // Mendengarkan perubahan dalam elemen input
        kbliCodeInput.addEventListener('input', function() {
            // Menghapus karakter yang bukan angka
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Fungsi untuk memvalidasi formulir sebelum pengiriman
        function validateForm() {
            var kbliCode = document.getElementById('exampleInputKBLICode').value;
            var description = document.getElementById('exampleInputDescription').value;

            // Periksa apakah kolom KBLI Code dan Description telah diisi
            if (kbliCode.trim() === '') {
                Swal.fire('Error', 'KBLI Code column must be filled in!', 'error');
                return false; // Mencegah pengiriman formulir
            }

            if (description.trim() === '') {
                Swal.fire('Error', 'Description column must be filled in', 'error');
                return false; // Mencegah pengiriman formulir
            }

            // Jika kedua kolom telah diisi, izinkan pengiriman formulir
            return true;
        }
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Edit KBLI Code');
    </script>
@endsection
