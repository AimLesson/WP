@extends('report.report')
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 5px;
            text-align: center;
            font-size: 12px;
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
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            text-transform: uppercase;
            font-size: 16px;
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

    .title-section td {
            text-align: left;
        }
        .non-dimension-measurement td {
            text-align: left;
            height: 30px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
        }

        .signature {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
        }

        .signature div {
            text-align: center;
        }
        .label {
            width: 20%; /* Set the width of the first column */
        }
        .kontainer {
            border: 1px solid #000;
            padding: 10px;
            width: 845px;
            margin: 0 auto;
        }

        .heder {
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
            margin-bottom: 10px;
        }

        .note {
            font-size: 12px;
            margin-bottom: 10px;
        }

        .note ul {
            list-style: none;
            padding: 0;
        }

        .note ul li {
            margin-bottom: 5px;
        }

        .disposition {
            font-size: 12px;
            margin-bottom: 10px;
        }

        .lines {
            border-top: 1px solid #000;
            height: 10px;
            width: 400px
        }

        .signature {
      display: flex;
      justify-content: flex-end;
      flex-wrap: wrap;
      margin-top: 5px;
      gap: 20px;
    }

    .signature div {
      width: 30%;
      border-top: 1px solid #000;
      text-align: center;
      font-size: 12px;
    }

    .signature .date {
      width: 30%;
    }

    }
</style>
    <div class="content-wrapper" style="background-color: rgb(255, 255, 255);">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Inspection Sheet</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report.inspectionsheet') }}">Inspection Sheet</a></li>
                            <li class="breadcrumb-item active">View Inspection Sheet</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="header print-only">
                <div class="header">
                    <h2>INSPECTION SHEET</h2>
                    <h3>POLITEKNIK ATMI SURAKARTA - PT ATMI SOLO</h3>
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
                                {{-- <h5 class="print-only" style="text-align: center; font-weight:bold;">{{ $order->order_number }}</h5> --}}
                                <!-- ORDER DETAILS -->
                                <table class="title-section">
                                    <tr>
                                        <td>PO Number:</td>
                                        <td>No Order:</td>
                                    </tr>
                                    <tr>
                                        <td>Vendor:</td>
                                        <td>Drawing:</td>
                                    </tr>
                                    <tr>
                                        <td>Product:</td>
                                        <td>Material:</td>
                                    </tr>
                                    <tr>
                                        <td>Item Number / Name:</td>
                                        <td>No Order:</td>
                                    </tr>
                                </table>

                                <!-- INSPECTION TABLE -->
                                <table>
                                    <tr>
                                        <th rowspan="2">Process</th>
                                        <th colspan="2">Workplace Number</th>
                                        <th colspan="8">INSPECTION RESULT</th>
                                        <th rowspan="2">Measuring Tool ID</th>
                                        <th rowspan="2">Verified</th>
                                    </tr>
                                    <tr>
                                        <th>Standard Size</th>
                                        <th>Tol</th>
                                        <th>Result</th>
                                        <th>Result</th>
                                        <th>Result</th>
                                        <th>Result</th>
                                        <th>Result</th>
                                        <th>Result</th>
                                        <th>Result</th>
                                        <th>Result</th>
                                    </tr>
                                    <!-- Empty Rows for Data Input -->
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>

                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr><tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>

                                    <!-- Add more rows as needed -->
                                </table>

                                <!-- NON-DIMENSION MEASUREMENT SECTION -->
                                <table class="non-dimension-measurement">
                                    <tr>
                                        <td colspan="14" style="text-align: center; font-weight: bold;">
                                            Non Dimension Measurement
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Performance</td>
                                        <td colspan="13"></td>
                                    </tr>
                                    <tr>
                                        <td class="label">Surface Quality</td>
                                        <td colspan="13"></td>
                                    </tr>
                                    <tr>
                                        <td class="label">Corner Sharpness</td>
                                        <td colspan="13"></td>
                                    </tr>
                                    <tr>
                                        <td class="label">Welding Seam</td>
                                        <td colspan="13"></td>
                                    </tr>
                                    <tr>
                                        <td class="label">Main Function</td>
                                        <td colspan="13"></td>
                                    </tr>
                                    <tr>
                                        <td class="label">Special Requirement</td>
                                        <td colspan="13"></td>
                                    </tr>
                                </table>

                                

                                <!-- SIGNATURE SECTION -->
                                <div class="kontainer">
                                    <div class="heder">Disposition Sign</div>
                                    <div class="note">
                                        <ul><li>Note: </li>
                                            <li>1. Marked by Inspector with ( ⃝ ) means NG</li>
                                            <li>2. This Inspection Sheet must be attached to Production Sheet.</li>
                                        </ul>
                                    </div>
                                    <div class="disposition">
                                        Disposition: (further information of disposition by QC, ENG or MA)
                                    </div>
                                    <div class="lines"></div>
                                    <div class="lines"></div>
                                    <div class="lines"></div>
                                    <div class="lines"></div>
                                    <div class="lines"></div>
                                    <div class="lines"></div>

                                    <div class="signature">
                                        <div class="date">Date:</div>
                                        <div>Disposition by:</div>
                                        <div>Approved by:</div>
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
        function printPage() {
            window.print();
        }
    </script>
@endsection
