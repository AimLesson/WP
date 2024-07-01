@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Company Info</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.companyinfo') }}">Company Info</a></li>
                            <li class="breadcrumb-item active"> Edit Company Info</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="containerfluid-">
                @php
                    // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                    $company_info = \App\Models\companyinfo::get();
                @endphp
                @foreach ($company_info as $ci)
                    <form action="{{ route('setup.updatecompanyinfo', ['id' => $ci->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Content 1 --}}
                        <div class="card card-primary">
                            <div class="row">
                                <!-- Kolom pertama -->
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <!-- Input 1 -->
                                        <div class="form-group">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" name="company_name" class="form-control" id="company_name"
                                                placeholder="Insert Company Name" value="{{$ci->company_name}}" required>
                                            @error('company_name')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Input 2 -->
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control" id="address"
                                                placeholder="Insert Address" value="{{$ci->address}}" required>
                                            @error('address')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Input 3 -->
                                        <div class="form-group">
                                            <label for="machines_type">Machine Type</label>
                                            <input type="text" name="machines_type" class="form-control" id="machines_type"
                                                placeholder="Insert Machines Type" value="{{$ci->machines_type}}" required>
                                            @error('machines_type')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <!-- Input 4 -->
                                        <div class="form-group">
                                            <label for="production_director">Production Director</label>
                                            <input type="text" name="production_director" class="form-control"
                                                id="production_director" placeholder="Insert Production Director" value="{{$ci->production_director}}" required>
                                            @error('production_director')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <!-- Kolom kedua -->
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="col-md-4">
                                            <!-- Bagian Atas - Bagian Ketiga (Horizontal) -->
                                            <!-- Elemen untuk gambar -->
                                            <div class="form-group">
                                                <label for="image">Upload Image</label>
                                                <input type="file" name="image" class="form-control-file"
                                                    id="image" accept="image/*">
                                            </div>
                                            <!-- Tambahkan elemen <img> untuk menampilkan preview gambar -->
                                            <img id="imagePreview" src="#" alt=""
                                                style="max-width: 100%; max-height: 200px; display: block; margin: 0 auto;">
                                            <!-- Menambahkan properti display dan margin -->
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                        @endforeach
            </div>

    </div>
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
    </script>
    <script>
        // Mendapatkan elemen input gambar
        var imageInput = document.querySelector('#image');

        // Mendapatkan elemen gambar preview
        var imagePreview = document.querySelector('#imagePreview');

        // Mendengarkan perubahan pada input gambar
        imageInput.addEventListener('change', function() {
            if (imageInput.files && imageInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(imageInput.files[0]);
            }
        });

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Edit Company Info');
    </script>
@endsection
