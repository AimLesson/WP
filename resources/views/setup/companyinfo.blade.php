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
                        <p><strong>About Us:</strong> PT ATMI Solo, yang juga dikenal sebagai Akademi Teknik Mesin Industri, didirikan pada tahun 1968. Perusahaan ini bergerak di bidang manufaktur dan juga berfungsi sebagai lembaga pendidikan kejuruan. ATMI Solo berfokus pada produksi komponen berkualitas tinggi dan direkayasa secara presisi dan menawarkan program pelatihan khusus untuk mengembangkan profesional yang terampil di bidang teknik industri. </p>
                         <p><strong>Visi:</strong> Terciptanya masyarakat industri yang adil dan sejahtera, menghormati martabat manusia, dan bertanggung jawab atas keseimbangan lingkungan hidup.</p>
                        <p><strong>Misi:</strong> Mendidik kaum muda menjadi tenaga profesional yang mampu membantu perkembangan bangsa menuju masyarakat industri yang adil dan makmur, mempunyai tanggung jawab moral dan sosial yang terumuskan dalam trilogi 3C :</p>
                            <ul>
                                <li>1. Compententia ( keterampilan teknis)</li>
                                <li>2. Conscientia ( Tanggung jawab moral)</li>
                                <li>3. Compassio ( pengurus sosial dan kegiatan industri)</li>
                            </ul>
                        </p>
                        <p><strong>Tujuan PT ATMI SOLO:</strong></p>
                        <p>Menjadi perusahaan perseroan yang : 
                            <ul>
                                <li>- Menjunjung tinggi nilai kejujuran, integritas, etika moral-bisnis.</li>
                                <li>- Mandiri dan menjalankan proses bisnis yang ideal.</li>
                                <li>- Menanggapi secara positif permintaan pelanggan dan pasar tanpa ditunda-tunda.</li>
                                <li>- Menghasilkan produk yang unggul dan kompetitif, memenuhi kepuasan pelanggan.</li>
                                <li>- Berkomitmen tinggi terhadap kualitas, biaya, waktu, serah dan pelayanan.</li>
                                <li>- Mengusahakan pertumbuhan secara terus-menerus, menjamin tercapainya kesejahteraan dan masa depan untuk para Pemegang saham, para Pelanggan, para Karyawan dan Masyarakat.</li>
                                <li>- Mendukung pelaksanaan sistem pendidikan dan training berbasis produksi di Politeknik ATMI Surakarta agar dapat diterapkan secara konsisten.</li>
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
