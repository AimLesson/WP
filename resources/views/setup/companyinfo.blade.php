@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Company Info</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item active">Company Info</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Company Information Section -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">PT ATMI Solo</h3>
                    </div>
                    <div class="card-body text-">
                        
                        <img src="{{ asset('lte/dist/img/ptatmisolo.png') }}" alt="PT ATMI Solo Logo" class="img-fluid mb-3" style="max-width: 700px; display: block; margin: 0 auto;">
                        
                        <p><strong>Company Name:</strong> PT ATMI Solo</p>
                        <p><strong>Established:</strong> 1968</p>
                        <p><strong>Location:</strong> Jl. Adisucipto No. 99, Solo, Central Java, Indonesia</p>
                        <p><strong>Industry:</strong> Manufacturing, Vocational Education</p>
                        <p><strong>About Us:</strong> </p>
                        <p>PT ATMI Solo, also known as Akademi Teknik Mesin Industri, was established in 1968. The company operates in the manufacturing sector and also serves as a vocational education institution. ATMI Solo focuses on producing high-quality, precision-engineered components and offers specialized training programs to develop skilled professionals in the field of industrial engineering.</p>
                        <p><strong>Vision:</strong> To be a leading institution in manufacturing and technical education, fostering innovation and excellence.</p>
                        <p><strong>Mission:</strong> 
                            <ul>
                                <li>1. Provide high-quality, industry-relevant training and education.</li>
                                <li>2. Deliver precision-engineered products and solutions.</li>
                                <li>3. Promote continuous improvement and innovation.</li>
                                <li>4. Contribute to the development of skilled professionals in the engineering sector.</li>
                            </ul>
                        </p>
                    </div>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        // Mendapatkan elemen input gambar
        var imageInput = document.querySelector('#InputImage');

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

        // Panggil fungsi ini saat halaman "Company Info" dimuat
        updateTitle('Company Info');
    </script>
@endsection
