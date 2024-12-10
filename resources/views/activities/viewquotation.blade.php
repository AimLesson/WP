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
                        <h1 class="m-0">View Quotation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.quotation') }}">Quotation</a></li>
                            <li class="breadcrumb-item active">View Quotation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="header print-only">
            <div class="logo-kiri">
                <img src="{{ asset('lte/dist/img/ptatmisolo.png') }}" alt="Logo PT. ATMI Solo" class="logo">
                <div class="vertical-line"></div><div class="company-info">
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
                <h4 style="margin-top:7px;">QUOTATION</h4>
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
                                            <li>{{ $quotationJoin[0]->company_name }}</li>
                                            <li>{{ $quotationJoin[0]->address }}</li>
                                            <li>{{ $quotationJoin[0]->tax_address }}</li>
                                            <li class="tax">{{ $quotationJoin[0]->tax }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 m-b-20 no-print">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Quotation #{{ $quotationJoin[0]->quotation_no }}
                                            </h3>
                                            <ul class="list-unstyled">
                                                <li>Create Date:
                                                    <span>{{ date('d F, Y', strtotime($quotationJoin[0]->date)) }}</span>
                                                </li>
                                                <li>Expiry date:
                                                    <span>{{ date('d F, Y', strtotime($quotationJoin[0]->valid)) }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-12 m-b-20 no-print">
                                        <h5>Estimate to: {{ $quotationJoin[0]->name }}</h5>
                                        <ul class="list-unstyled">
                                            <li><a href="#">{{ $quotationJoin[0]->phone }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5 class="print-only" style="text-align: right; font-weight:bold;">{{ $quotationJoin[0]->quotation_no }}</h5>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NO KATALOG</th>
                                            <th class="d-none d-sm-table-cell">ITEM DESCRIPTION</th>
                                            <th>QTY</th>
                                            <th>UNIT PRICE</th>
                                            <th>UNIT</th>
                                            <th>DISCOUNT</th>
                                            <th class="text-right">AMOUNT</th>
                                            <th>DESCRIPTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quotationJoin as $key => $item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->item }}</td>
                                                <td class="d-none d-sm-table-cell">{{ $item->item_desc }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td class="unitprice">{{ $item->unit_price }}</td>
                                                <td>{{ $item->unit }}</td>
                                                <td>{{ $item->disc }}</td>
                                                <td class="text-right amount">{{ $item->amount }}</td>
                                                <td>{{ $item->deskripsi }}</td>
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
                                                                <th>Subtotal:</th>
                                                                <td class="text-right subtotal">
                                                                    {{ $quotationJoin[0]->subtotal }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Discount: <span
                                                                        class="text-regular">{{ $quotationJoin[0]->discount_percent }}%</span>
                                                                </th>
                                                                <td class="text-right discount">
                                                                    {{ $quotationJoin[0]->discount }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tax: <span
                                                                        class="text-regular">{{ $quotationJoin[0]->tax_type }}</span>
                                                                </th>
                                                                <td class="text-right tax">{{ $quotationJoin[0]->tax }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Freight:</th>
                                                                <td class="text-right freight">
                                                                    {{ $quotationJoin[0]->freight }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Total Amount:</th>
                                                                <td class="text-right text-primary">
                                                                    <h5 class="totalamount">
                                                                        {{ $quotationJoin[0]->total_amount }}</h5>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-info">
                                        <h5>Description</h5>
                                        <p class="text-muted">{{ $quotationJoin[0]->description }}</p>
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
            updateTitle('Quotation');
        });
    </script>
    <script>
        function printPage() {
            window.print();
        }
    </script>
@endsection
