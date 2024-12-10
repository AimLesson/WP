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
            max-width: 200px;
            max-height: 150px;
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

        .logo-kanan b {
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
        }

        .company-info b {
            font-size: 20px;
            /* Memperbesar tulisan "PT. ATMI SOLO" */
            /* Menambah garis hitam di bawah tulisan "PT. ATMI SOLO" */
            width: 100%;
            text-align: center;
            /* Membuat garis sepanjang kolom */
            
            /* Memastikan padding tidak mempengaruhi lebar */
        }

        .company-info p {
            font-size: 20px;
            text-align: center;
            margin-bottom: 5px;
            margin-top: 5px;
            /* Jarak antar baris */
            width: 100%;
            /* Membuat garis sepanjang kolom */
           
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

        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin: 20px;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            
            padding: 10px;
        }
        .header, .order-info, .section, .footer {
            border-bottom: 1px solid #000; /* Border between sections */
            padding: 10px 0;
        }
        .header .left, .header .right, 
        .order-info .left, .order-info .right {
            width: 48%;
            display: inline-block;
            vertical-align: top;
        }
        .header .left, .order-info .left {
            border-right: 1px solid #000; /* Vertical divider between columns */
            padding-right: 10px;
        }
        .section p, .footer p {
            margin: 5px 0;
        }

        .signature-section {
        position: absolute;
        bottom: -150%; /* Stick to the bottom */
        left: 0; /* Stick to the left */
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: right;
        text-align: right;
        width: 100%; /* Full width to center-align content */
        font-size: 14px; /* Adjust the font size if needed */
    }

    .signature-left {
        font-weight: bold;
    }

    .signature-right {
        margin-top: 100px; /* Space between the title and name */
    }

    }
</style>
    <div class="content-wrapper" style="background-color: rgb(255, 255, 255);">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report.order') }}">Order</a></li>
                            <li class="breadcrumb-item active">View Order</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="header print-only">
            <div class="logo-kiri">
                <img src="{{ asset('lte/dist/img/ptatmisolo.png') }}" alt="Logo PT. ATMI Solo" class="logo">
                <div class="company-info">
                    <b>PT. ATMI SOLO</b>
                    <p>ORDER/PESANAN</p>
                </div>
                <div class="logo-kanan">
                    <b>F.PPIC</b>
                    <img src="{{ asset('lte/dist/img/atmipro.png') }}" alt="Logo ATMI Pro" class="logo">
                    <img src="{{ asset('lte/dist/img/truv.jpg') }}" alt="Logo ISO" class="logo">
                </div>
            </div>
            <br>

        </div>

        <div class="container print-only" style="background-color: rgb(255, 255, 255);margin-bottom:30px;">
            <div class="col-md-12" style="text-align: center;">
                <h4 style="margin-top:7px;">ORDER</h4>
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
                                        {{-- <button class="btn btn-white">CSV</button>
                                        <button class="btn btn-white">PDF</button> --}}
                                        <button class="btn btn-white" onclick="printPage()">Print</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 m-b-20 no-print">
                                        <img src="{{ URL::to('assets/img/logo2.png') }}" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li>{{ $order->order_number }}</li>
                                            <li>{{ $order->so_number }}</li>
                                            <li>{{ $order->quotation_number }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 m-b-20 no-print">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Order #{{ $order->order_number }}
                                            </h3>
                                            <ul class="list-unstyled">
                                                <li>Create Date:
                                                    <span>{{ date('d F, Y', strtotime($order->order_date)) }}</span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 m-b-20 no-print">
                                        <h5>Estimate to: {{ $order->dod}}</h5>
                                        <ul class="list-unstyled">
                                            <li><a href="#">{{ $order->reff_number }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- <h5 class="print-only" style="text-align: center; font-weight:bold;">{{ $order->order_number }}</h5> --}}
                                <div class="header">
                                    <div class="left">
                                        <p><strong>PT ATMI SOLO</strong></p>
                                        <p>Jl. Mojo No. 1<br>SURAKARTA - 57145</p>
                                        <p>Telp: 0217-714466, Fax: 0217-714390</p>
                                    </div>
                                    <div class="right">
                                        <p><strong>Pemesan:</strong>{{ $order->customer }}</p>
                                        <p>No. Pesanan: {{ $order->order_number }}</p>
                                        <p>No. PO: {{ $order->quotation_number }}</p>
                                    </div>
                                </div>
                                <!-- Order Information Section -->
                                <div class="header">
                                    <div class="left">
                                        <p><strong>NOMOR PESANAN:</strong> {{ $order->order_number }}</p>
                                        <p><strong>TANGGAL PESANAN:</strong> {{ $order->order_date }}</p>
                                        <p><strong>REF. SURAT: </strong>{{ $order->reff_number }}</p>
                                        <p><strong>PESANAN:</strong> {{ $order->product }}</p>
                                        <p><strong>JUMLAH PESANAN:</strong> {{ $order->qty }}</p>
                                    </div>
                                    <div class="right">
                                        <p><strong>No. SO:</strong> {{ $order->so_number }}</p>
                                    </div>
                                </div>
                                <!-- Sample and Catalog Section -->
                                <div class="section">
                                    <p><strong>Contoh:</strong></p>
                                    <p>No. Catalog: {{ $order->catalog_number }}</p>
                                </div>
                                <!-- Additional Information Section -->
                                <div class="footer">
                                    <p><strong>Keterangan:</strong>{{ $order->information }}</p>
                                </div>
                                <!-- Signature Section -->
                                <div class="signature-section">
                                    <div class="signature-left">
                                        <p>Surakarta, {{ now()->format('d-m-Y') }}</p>
                                    </div>
                                    <div class="signature-right">
                                        <p>St. Hermawan BP</p>
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

            // Mengambil elemen HTML yang menampilkan total_amount, tax, discount, subtotal, dan freight di dalam tabel
            var totalAmountElements = document.querySelectorAll('.totalamount');
            var amountElements = document.querySelectorAll('.amount');
            var unitPriceElements = document.querySelectorAll('.unitprice');
            var taxElements = document.querySelectorAll('.tax');
            var discountElements = document.querySelectorAll('.discount');
            var subtotalElements = document.querySelectorAll('.subtotal');
            var freightElements = document.querySelectorAll('.freight');

            // Iterasi melalui setiap elemen dan mengonversi nilainya ke format rupiah
            totalAmountElements.forEach(function(totalAmountElement) {
                var totalAmount = totalAmountElement.textContent.trim();
                var formattedTotalAmount = formatCurrency(totalAmount);
                totalAmountElement.textContent = formattedTotalAmount;
            });

            amountElements.forEach(function(amountElement) {
                var Amount = amountElement.textContent.trim();
                var formattedAmount = formatCurrency(Amount);
                amountElement.textContent = formattedAmount;
            });

            unitPriceElements.forEach(function(unitPriceElement) {
                var unitPrice = unitPriceElement.textContent.trim();
                var formattedunitPrice = formatCurrency(unitPrice);
                unitPriceElement.textContent = formattedunitPrice;
            });

            taxElements.forEach(function(taxElement) {
                var tax = taxElement.textContent.trim();
                var formattedTax = formatCurrency(tax);
                taxElement.textContent = formattedTax;
            });

            discountElements.forEach(function(discountElement) {
                var discount = discountElement.textContent.trim();
                var formattedDiscount = formatCurrency(discount);
                discountElement.textContent = formattedDiscount;
            });

            subtotalElements.forEach(function(subtotalElement) {
                var subtotal = subtotalElement.textContent.trim();
                var formattedSubtotal = formatCurrency(subtotal);
                subtotalElement.textContent = formattedSubtotal;
            });

            freightElements.forEach(function(freightElement) {
                var freight = freightElement.textContent.trim();
                var formattedFreight = formatCurrency(freight);
                freightElement.textContent = formattedFreight;
            });


            // Panggil fungsi ini saat halaman "barcode" dimuat
            updateTitle('View Order');
        });
    </script>
    <script>
        function printPage() {
            window.print();
        }
    </script>
@endsection
