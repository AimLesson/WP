<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Quotation</title>
    <!-- Tambahkan stylesheet atau styles inline sesuai kebutuhan -->
    <style>
        /* Contoh styles, sesuaikan dengan desain yang diinginkan */
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

        .card-body th,
        .card-body td {
            border: 1px solid #dddddd;
            /* Menambahkan border pada header dan sel tabel */
            padding: 8px;
            font-size: 12px;
            /* Menambahkan padding pada sel tabel */
            text-align: center;
            /* Menetapkan alignment teks ke kiri */
        }

        .card-body th:nth-child(5),
        /* Menggunakan nth-child untuk mengidentifikasi kolom "Minggu Produksi" */
        .card-body td:nth-child(5) {
            font-size: 12px;
            width: 70px;
            /* Sesuaikan ukuran teks sesuai kebutuhan */
        }


        .card-body th {
            background-color: #f2f2f2;
            /* Menambahkan warna latar belakang pada header tabel */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 0vh;
            /* Menentukan tinggi container sesuai tinggi viewport */
        }

        .col-md-12 {
            width: 100%;
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
            flex-direction: column;
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


        .ttd {
            text-align: center;
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .ttd p.manager {
            width: 100px;
            border-top: 2px solid black;
            /* Menghapus margin bawaan dari elemen p */
        }

        .ttd p.pencetak {
            width: 100px;
            border-top: 2px solid black;
            /* Menghapus margin bawaan dari elemen p */
        }


        .company-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 600px;
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



        @media print {

            /* Mengatur ukuran kertas cetak menjadi A4 landscape */
            @page {
                size: A4 portrait;
                margin-top: 50px;
                /* Menambahkan margin top 100px pada setiap halaman */
            }

            /* Mengatur margin untuk halaman pertama */
            @page :first {
                margin-top: 0;
                /* Margin top 0 pada halaman pertama */
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

            /* Menambahkan gaya untuk penomoran halaman */
            .page-number {
                text-align: center;
                margin-top: 20px;
            }

            .page-number p {
                margin: 0;
                font-size: 12px;
            }

            .page-number-placeholder {
                content: counter(page);
            }

        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo-kiri">
            <img src="{{ asset('lte/dist/img/ptatmisolo.png') }}" alt="Logo PT. ATMI Solo" class="logo">
        </div>
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
    <br><br>
    <div class="container">
        <div class="col-md-12" style="text-align: center; ">
            <h4 style="margin-top:7px;margin-right:15px">QUOTATION</h4>
        </div>
    </div>
    <div
        style="display: flex; justify-content: space-between; font-weight: bold; margin-top: 20px; margin-bottom: 10px;">
        <p>Pencetak: {{ Auth::user()->name }}</p>
        <div id="realtime-clock">
            <p>Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>
        </div>
    </div>

</body>

</html>

<script type="text/javascript">
    window.print();
</script>
<script>
    function updateRealTimeClock() {
        const currentTime = new Date();

        const optionsTime = {
            hour: 'numeric',
            minute: 'numeric',
            second: 'numeric',
            hour12: false
        };

        const optionsDate = {
            year: 'numeric',
            month: 'long', // 'long' untuk nama bulan lengkap
            day: 'numeric'
        };

        const formattedDateTime = currentTime.toLocaleString('en-US', optionsTime);
        const formattedDate = currentTime.toLocaleString('id-ID', optionsDate);

        document.getElementById('realtime-clock').innerHTML = `<p>${formattedDateTime} | ${formattedDate}</p>`;
    }

    // Pembaruan waktu setiap detik
    setInterval(updateRealTimeClock, 1000);

    // Pembaruan awal saat halaman dimuat
    updateRealTimeClock();
</script>
