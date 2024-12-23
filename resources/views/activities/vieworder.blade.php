@extends('activities.activities')
@section('content')
<style>
    .container {
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

/* Header Section */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border: 1px solid #000;
    margin-bottom: -1px;
}

.logo-kiri {
    display: flex;
    align-items: center;
}

.logo-kiri img {
    max-width: 100px;
    height: auto;
}

.company-info {
    text-align: center;
    margin: 0 90px;
}

.logo-kanan {
    display: flex;
    align-items: center;
}

.logo-kanan img {
    max-width: 50px;
    height: auto;
    margin-left: 10px;
}

/* Order Information */
.order-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    border: 1px solid #000;
    margin-bottom: -1px;
}

.order-info .left,
.order-info .right {
    padding: 10px;
}

.order-info .left {
    border-right: 1px solid #000;
}

/* Company Details */
.company-details,
.customer-details {
    padding: 10px;
    border: 1px solid #000;
    margin-bottom: -1px;
}

/* Order Details */
.order-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    border: 1px solid #000;
    margin-bottom: -1px;
}

.order-details .left,
.order-details .right {
    padding: 10px;
}

.order-details .left {
    border-right: 1px solid #000;
}

/* Sample Section */
.sample-section {
    padding: 10px;
    border: 1px solid #000;
    margin-bottom: -1px;
}

/* Notes Section */
.notes-section {
    padding: 10px;
    border: 1px solid #000;
    margin-bottom: -1px;
}

/* Signature Section */
.signature-section {
    display: flex;
    justify-content: flex-end; /* Ensures the content is positioned to the right */
    padding: 10px;
    border: 1px solid #000;
    margin-bottom: -1px;
}

.signature-right {
    text-align: right; /* Aligns the text within the `.signature-right` container */
}
.signature-right p {
    margin-bottom: 90px; /* Adds space between the two paragraphs */
}

.signature-right p:last-child {
    margin-bottom: 0; /* Removes extra margin from the last paragraph */
}


/* DOD Section */
.dod-section {
    padding: 10px;
    border: 1px solid #000;
    font-size: 80px;
    font-weight: bold;
}

/* Print Specific Styles */
@media print {
    .no-print {
        display: none !important;
    }
    
    .print-only {
        display: block !important;
    }
    
    body {
        width: 21cm;
        height: 29.7cm;
        margin: 0;
        padding: 0.5cm;
    }
    
    * {
        -webkit-print-color-adjust: exact;
        color-adjust: exact;
    }
}

/* Additional Utility Classes */
.font-bold {
    font-weight: bold;
}

.text-right {
    text-align: right;
}

.mb-0 {
    margin-bottom: 0;
}

.mt-2 {
    margin-top: 0.5rem;
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
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.order') }}">Order</a></li>
                            <li class="breadcrumb-item active">View Order</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="col-auto float-right ml-auto no-print">
            <div class="btn-group btn-group-sm">
                {{-- <button class="btn btn-white">CSV</button>
                <button class="btn btn-white">PDF</button> --}}
                <button class="btn btn-white" onclick="printPage()">Print</button>
            </div>
        </div>
        <div class="container">
            <!-- Header -->
            <div class="header">
                <div class="logo-kiri">
                    <img src="{{ asset('lte/dist/img/ptatmisolo.png') }}" alt="Logo PT. ATMI Solo">
                </div>
                    <div class="company-info">
                        <b>PT. ATMI SOLO</b>
                        <p>ORDER/PESANAN</p>
                    </div>
                <div class="logo-kanan">
                    <b>F.PPIC</b>
                </div>
            </div>

            
        
            <!-- Company & Customer Details -->
            <div class="order-details">
                <div class="left">
                    <p><strong>PT ATMI SOLO</strong></p>
                    <p>Jl. Mojo No. 1</p>
                    <p>SURAKARTA - 57145</p>
                    <p>Telp: 0217-714466, Fax: 0217-714390</p>
                </div>
                <div class="right">
                    <p><strong>Pemesan:</strong> {{ $order->customer }}</p>
                    <p>No. Pesanan: {{ $order->order_number }}</p>
                    <p>No. PO: {{ $order->quotation_number }}</p>
                </div>
            </div>
        
            <!-- Order Information -->
            <div class="order-details">
                <div class="left">
                    <p><strong>NOMOR PESANAN:</strong> {{ $order->order_number }}</p>
                    <p><strong>TANGGAL PESANAN:</strong> {{ $order->order_date }}</p>
                    <p><strong>REF. SURAT:</strong> {{ $order->reff_number }}</p>
                    <p><strong>PESANAN:</strong> {{ $order->product }}</p>
                    <p><strong>JUMLAH PESANAN:</strong> {{ $order->qty }}</p>
                </div>
                <div class="right">
                    <p><strong>No. SO:</strong> {{ $order->so_number }}</p>
                </div>
            </div>
        
            <!-- Sample Section -->
            <div class="sample-section">
                <p><strong>Contoh:</strong></p>
                <p>No. Catalog: {{ $order->catalog_number }}</p>
            </div>
        
            <!-- Notes Section -->
            <div class="notes-section">
                <p><strong>Keterangan:</strong> {{ $order->information }}</p>
            </div>
        
            <!-- Signature Section -->
            <div class="signature-section">
                <div class="signature-right">
                    <p>Surakarta, {{ now()->format('d-m-Y') }}</p>
                    <p>St. Hermawan BP</p>
                </div>
            </div>
            
            <div class="signature-section">
                <div class="signature-right">
                    <p>{{ now()->format('d-m-Y - H:i') }} </p>
                </div>
            </div>
        
            <!-- DOD Section -->
            <div class="dod-section">
                <p>DOD: {{ $order->dod }}</p>
            </div>
        </div>


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
            updateTitle('Sales Order');
        });
    </script>
    <script>
        function printPage() {
            window.print();
        }
    </script>
@endsection
