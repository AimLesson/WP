@extends('activities.activities')
@section('content')
    <style>
        .print-only {
            display: none;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            .print-only {
                display: block !important;
            }

            body {
                font-family: Arial, sans-serif;
                width: 21cm;
                height: 29.7cm;
                padding: 0.5cm;
                margin: auto;
                /* Menengahkan body */
            }


            .card-body table {
                border-collapse: collapse;
                /* Menggabungkan batas sel tabel */
                width: 100%;
                /* Menentukan lebar tabel 100% dari parent (card-body) */
            }


            .card-body th {
                background-color: #f2f2f2;
                /* Menambahkan warna latar belakang pada header tabel */
            }

            .logo-container {
                display: flex;
                align-items: center;
            }

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 0vh;
                /* Menentukan tinggi container sesuai tinggi viewport */
            }

            .col-md-12 {
                width: 96%;
                /* Menentukan lebar 100% dari container */
                height: 30px;
                /* Menentukan tinggi container */
                background-color: rgb(146, 217, 255);
                /* Warna latar belakang biru */
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo-kiri,
            .company-info,
            .logo-kanan {
                display: flex;
                align-items: center;
                text-align: center;
                padding: 5px;
            }

            .logo-kiri img {
                max-width: 120px;
                max-height: 120px;
            }

            .vertical-line {
                border-left: 3px solid rgb(20, 118, 171);
                /* Sesuaikan warna dan ketebalan garis sesuai kebutuhan Anda */
                height: 100px;
                /* Sesuaikan tinggi garis sesuai kebutuhan Anda */
                margin: 8px;
                /* Sesuaikan margin sesuai kebutuhan Anda */
            }

            .logo-kanan img {
                max-width: 100px;
                max-height: 100px;
            }

            .logo-kanan {
                display: flex;
                flex-direction: row;
            }

            .logo-kanan img:not(:last-child) {
                margin-right: 10px;
            }

            .company-info {
                width: 1000px;
                display: flex;
                flex-direction: column;
                align-items: center;
                max-width: 1000px;
                border: 1px solid #000;
                /* Menambahkan border dengan ketebalan 2px dan warna hitam */
                border-radius: 10px;
                /* Sesuaikan dengan lebar kolom info perusahaan */
            }

            .company-info b {
                font-size: 15px;
                /* Memperbesar tulisan "PT. ATMI SOLO" */
                border-bottom: 2px solid black;
                /* Menambah garis hitam di bawah tulisan "PT. ATMI SOLO" */
                width: 100%;
                text-align: left;
                /* Membuat garis sepanjang kolom */
                box-sizing: border-box;
                /* Memastikan padding tidak mempengaruhi lebar */
            }

            .company-info p {
                font-size: 12px;
                text-align: left;
                margin-bottom: 5px;
                margin-top: 5px;
                /* Jarak antar baris */
                width: 100%;
                /* Membuat garis sepanjang kolom */
                box-sizing: border-box;
                /* Memastikan padding tidak mempengaruhi lebar */
            }

            .title {
                text-align: center;
                font-size: 24px;
                margin-bottom: 10px;
            }

            .report-info {
                text-align: left;
                margin-bottom: 20px;
            }


            /* Mengatur ukuran kertas cetak menjadi A4 landscape */
            @page {
                size: A4 portrait;
                margin: 0;
                /* Menambahkan margin top 100px pada setiap halaman */
            }

            /* Semua elemen yang ingin Anda sembunyikan pada saat mencetak */
            body * {
                visibility: visible;
            }

            /* Hanya elemen dengan kelas .cetak akan ditampilkan saat mencetak */
            .cetak,
            .cetak * {
                visibility: visible;
            }

            /* Mengatur ukuran dan tata letak elemen yang akan dicetak */
            .cetak {
                position: absolute;
                left: 0;
                top: 0;
            }

            * {
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }

        }
    </style>
    <div class="content-wrapper" style="background-color: rgb(255, 255, 255);">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Item</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.item') }}">Item</a></li>
                            <li class="breadcrumb-item active">View Item</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="header print-only">
            <div class="logo-kiri">
                <img src="{{ asset('lte/dist/img/ptatmisolo.png') }}" alt="Logo PT. ATMI Solo" class="logo">
                <div class="vertical-line"></div>
                <div class="company-info">
                    <b>PT. ATMI SOLO</b>
                    <p>Jl. Adisucipto / Jl. Mojo No. 1 Karangasem, Laweyan, Surakarta 57145<br>
                        Phone: +62 271 714466 - Fax: +62 271 714390<br>
                        PO BOX 215 Surakarta 57145, Jawa Tengah, Indonesia<br>
                        Email: marketing@atmi.co.id - Website: http://www.atmi.co.id</p>
                </div>
                <div class="logo-kanan">
                    <img src="{{ asset('lte/dist/img/atmipro.png') }}" alt="Logo ATMI Pro" class="logo">
                    <img src="{{ asset('lte/dist/img/truv.jpg') }}" alt="Logo ISO" class="logo">
                </div>
            </div>
            <br>

        </div>

        <div class="container print-only" style="background-color: rgb(255, 255, 255);margin-bottom:30px;">
            <div class="col-md-12" style="text-align: center;">
                <h4 style="margin-top:7px;">ITEM</h4>

            </div>
        </div>
        <section class="content" style="background-color: rgb(255, 255, 255);">
            <div class="container-fluid" style="background-color: rgb(255, 255, 255);">
                <div class="row">
                    <div class="col-md-12" style="background-color: rgb(255, 255, 255);">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-auto float-right ml-auto no-print">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-white">CSV</button>
                                        <button class="btn btn-white">PDF</button>
                                        <button class="btn btn-white" onclick="printPage()">Print</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 m-b-20 no-print">
                                        <img src="{{ URL::to('assets/img/logo2.png') }}" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <h6>Company Name :</h6>
                                            <li><b>{{ $itemJoin[0]->company_name }}</b></li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-6 m-b-20 no-print">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Item {{ $itemJoin[0]->so_number }}
                                            </h3>
                                            {{-- <ul class="list-unstyled">
                                                <li>Create Date:
                                                    <span>{{ date('d F, Y', strtotime($itemJoin[0]->date)) }}</span>
                                                </li>

                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                                <h5 class="print-only" style="text-align: right; font-weight:bold;">
                                    {{ $itemJoin[0]->so_number }}</h5>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Order No</th>
                                            <th>Item No</th>
                                            <th class="d-none d-sm-table-cell">Item</th>
                                            <th>DOD</th>
                                            <th>Issued</th>
                                            <th>QTY</th>
                                            <th>Ass Drawing</th>
                                            <th>Drawing No</th>
                                            <th>Material</th>
                                            <th>Weight</th>
                                            <th>Length</th>
                                            <th>Width</th>
                                            <th>Thickness</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($itemJoin as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->order_number }}</td>
                                                <td>{{ $item->no_item }}</td>
                                                <td class="d-none d-sm-table-cell">{{ $item->item }}</td>
                                                <td>{{$item->dod_item}}</td>
                                                <td>{{$item->issued_item}}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->ass_drawing }}</td>
                                                <td>{{ $item->drawing_no }}</td>
                                                <td>{{ $item->material }}</td>
                                                <td>{{ $item->weight }} kg</td>
                                                <td>{{ $item->length }} mm</td>
                                                <td>{{ $item->width }} mm</td>
                                                <td>{{ $item->thickness }} mm</td>
                                                <td>{{$item->status}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>
                                    <div class="row invoice-payment">
                                        <div class="col-sm-7">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="m-b-20">
                                                <div class="table-responsive no-border">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th>DOD</th>
                                                                <td class="text-right dod">
                                                                    {{ $itemJoin[0]->dod }}
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-info">
                                        <h5>Product</h5>
                                        <b><p class="">{{ $itemJoin[0]->product }}</p></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            var errorAlert = '{{ session('error') }}';
            if (errorAlert !== '') {
                Swal.fire({
                    icon: 'error',
                    title: errorAlert,
                    position: 'top-end', // Mengubah posisi ke tengah
                    showConfirmButton: false, // Menampilkan tombol OK
                    timer: 5000,
                    toast: true,
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

            // Fungsi untuk mengubah nilai ke dalam format mata uang (IDR)
            function formatCurrency(value) {
                // Gunakan toLocaleString() dengan opsi currency untuk format IDR
                var formattedValue = parseFloat(value).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

                return formattedValue;
            }

            // Panggil fungsi ini saat halaman "barcode" dimuat
            updateTitle(' View Item');
        });
    </script>
    <script>
        function printPage() {
            window.print();
        }
    </script>
@endsection
