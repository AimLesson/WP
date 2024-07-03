<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title id="dynamic-title">PT. ATMI SOLO</title>
    <link rel="icon" type="png" href="{{ asset('lte/dist/img/ATMILogo.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:ital,wght@1,800&family=Courgette&family=Roboto:wght@900&family=Ubuntu:wght@700&display=swap"
        rel="stylesheet">
    
        

    <!-- Stylesheet DateTimePicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- Flowbite -->
    <link rel="stylesheet" href="https://unpkg.com/@flowbite/core.min.css" />

    <!-- Chart -->
    <link rel="stylesheet" href="{{asset('tailwindcharts/css/flowbite.min.css')}}">
    <style>
        .border-confirmation {
            border: 2px solid #c3c2c2;
            /* Warna garis tepi (contoh: biru) */
            /* Warna garis tepi (contoh: biru) */

            border-radius: 5px;
            /* Sudut bulat pada elemen */
            background-color: #f2f2f2;
            color: #000000;
            /* Warna teks (contoh: hitam) */
        }

        .border-type {
            border: 2px solid #c3c2c2;
            /* Warna garis tepi (contoh: biru) */
            padding: 10px;
            /* Ruang dalam dari tepi elemen */
            border-radius: 5px;
            /* Sudut bulat pada elemen */
            background-color: #f2f2f2;
            color: #000000;
            /* Warna teks (contoh: hitam) */
        }

        #menuIcon {
            transition: transform 0.3s ease;
            /* Menambahkan efek transisi rotasi */
        }

        .rotated {
            transform: rotate(90deg);
            /* Mengubah rotasi menjadi 90 derajat */
        }

        .d-block {
            font-size: 24px;
            position: absolute;
        }

        .m-0 {
            color: #565656;
            font-family: 'Ubuntu', sans-serif;
            font-size: 24px;
            font-weight: bold;
        }

        .judul {
            color: #ffffff;
            /* Warna teks (contoh: putih) */
            font-family: 'Poppins', sans-serif;
            font-size: 130px;
            font-weight: bold;
            /* Ketebalan huruf */
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.5);
            /* Efek bayangan (horisontal, vertikal, blur, warna) */
            opacity: 0.9;
            position: absolute;
            top: 51%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Gaya untuk menu aktif */
        .navbar-nav .nav-item.active {
            background-color: rgb(51, 126, 255);
            /* Warna latar belakang menjadi abu-abu atau sesuai kebutuhan */
            border-radius: 100px;
        }

        /* Gaya untuk tautan di dalam menu aktif */
        .navbar-nav .nav-item.active a.nav-link {
            color: white;
            /* Warna teks menjadi putih atau sesuai kebutuhan */
        }

        /* Gaya untuk efek hover pada menu */
        .navbar-nav .nav-item:hover {
            background-color: #c3c2c2;
            /* Warna latar belakang menjadi abu-abu (sesuaikan dengan kebutuhan) */
            border-radius: 100px;
        }

/* Gaya untuk tautan di dalam efek hover pada menu */
        .navbar-nav .nav-item:hover a.nav-link {
            color: #000000;
            /* Warna teks menjadi hitam atau sesuai kebutuhan */
        }

        .btn-custom {
    background-color: #337EFF; /* Change this to your desired background color */
    color: white; /* Change this to your desired text color */
    border: 2px solid #ffffff; /* Add a border with your desired color and width */
    border-radius: 5px; /* Optional: Add rounded corners */
    padding: 10px 20px; /* Adjust padding as needed */
    font-size: 16px; /* Adjust font size as needed */
    cursor: pointer;
    transition: background-color 0.3s, border-color 0.3s; /* Optional: Add transition for smooth color changes */
     }

        .btn-custom:hover {
    background-color: #337EFF; /* Change this to your desired hover background color */
    border-color: #0c65ff; /* Change this to your desired hover border color */
     }



    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        {{-- <div id="preloader" class="preloader flex-column justify-content-center align-items-center">
            <img class="" src="{{ asset('lte/dist/img/ATMILogo1.png') }}" alt="ATMILogo1" height="200"
                width="200">
        </div> --}}


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-lg navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a id="menuIcon" class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i id="menuIcon" class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('file') }}" class="nav-link {{ Request::is('file') ? 'active' : '' }}">File</a>
                </li>
                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('setup') }}" class="nav-link {{ Request::is('setup') ? 'active' : '' }}">Setup</a>
                </li>
                @endif
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('tables') }}" class="nav-link {{ Request::is('tables') ? 'active' : '' }}">Table</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('activities') }}" class="nav-link {{ Request::is('activities') ? 'active' : '' }}">Activities</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('report') }}" class="nav-link {{ Request::is('report') ? 'active' : '' }}">Report</a>
                </li>
            </ul>
        
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('dashboard') }}" class="dropdown-item {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
                        <a href="{{ route('file') }}" class="dropdown-item {{ Request::is('file') ? 'active' : '' }}">File</a>
                        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
                        <a href="{{ route('setup') }}" class="dropdown-item {{ Request::is('setup') ? 'active' : '' }}">Setup</a>
                        @endif
                        <a href="{{ route('tables') }}" class="dropdown-item {{ Request::is('tables') ? 'active' : '' }}">Table</a>
                        <a href="{{ route('activities') }}" class="dropdown-item {{ Request::is('activities') ? 'active' : '' }}">Activities</a>
                        <a href="{{ route('report') }}" class="dropdown-item {{ Request::is('report') ? 'active' : '' }}">Report</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
        
        
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{ asset('lte/dist/img/ATMILogo.png') }}" alt="AdminLTE Logo" class="brand-image"
                    style="opacity: .8">
                <span class="brand-text font-weight-bold">PT. ATMI SOLO</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('lte/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                            alt="User Image" style="width: 40px; height:40px">
                    </div>
                    <div class="info">
                        @auth
                            <label class="d-block"><b>{{ Auth::user()->name }}</b></label>
                        @else
                            <label class="d-block">Guest</label>
                        @endauth
                    </div>
                </div>

                @yield('sidebar')
                <!-- Sidebar Menu -->
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        <footer class="main-footer no-print">
            <strong>Copyright &copy; 2024 <a href="http://atmi.co.id" target="_blank">PT. ATMI SOLO</a>.</strong>
            All rights reserved.
            <span id="datetime" class="float-right d-none d-sm-inline-block"></span>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <!-- Summernote -->
    <script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <!-- JavaScript DateTimePicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#purchasedate, #year').datepicker({
                format: "yyyy", // Format tanggal yang diinginkan
                autoclose: true,
                todayHighlight: true
            });
        });

        const menuIcon = document.getElementById("menuIcon");

        menuIcon.addEventListener("click", function() {
            menuIcon.classList.toggle("rotated");
        });

        function updateDateTime() {
            const dateTimeElement = document.getElementById('datetime');
            if (dateTimeElement) {
                const now = new Date();
                const daysOfWeek = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                const dayOfWeek = daysOfWeek[now.getDay()];
                const dayOfMonth = now.getDate().toString().padStart(2, '0');
                const month = (now.getMonth() + 1).toString().padStart(2, '0');
                const year = now.getFullYear();
                const hours = now.getHours().toString().padStart(2, '0');
                const minutes = now.getMinutes().toString().padStart(2, '0');
                const seconds = now.getSeconds().toString().padStart(2, '0');

                const dateTimeString = `${dayOfWeek}, ${dayOfMonth}-${month}-${year} | ${hours}:${minutes}:${seconds}`;
                dateTimeElement.textContent = dateTimeString;
            }
        }

        // Call the function initially when the page loads
        updateDateTime();

        // Update the date and time every second
        setInterval(updateDateTime, 1000); // 1000ms = 1 second

        document.addEventListener("DOMContentLoaded", function() {
            // Dapatkan elemen input pencarian
            var searchInput = document.getElementById("searchInput");

            // Dapatkan semua baris data dalam tabel
            var rows = document.querySelectorAll(".table tbody tr");

            // Tambahkan event listener untuk input pencarian
            searchInput.addEventListener("input", function() {
                var searchText = searchInput.value.toLowerCase();

                // Loop melalui setiap baris dalam tabel
                rows.forEach(function(row) {
                    var rowData = row.textContent.toLowerCase();

                    // Periksa apakah teks pencarian ada dalam data baris
                    if (rowData.includes(searchText)) {
                        // Tampilkan baris jika ada kecocokan
                        row.style.display = "";
                    } else {
                        // Sembunyikan baris jika tidak ada kecocokan
                        row.style.display = "none";
                    }
                });
            });
        });

        $(function() {
    var logoUrl = "{{ asset('lte/dist/img/ATMILogo.png') }}";

    $("#machine").DataTable({
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "scrollX": true,
        "buttons": [
            {
                extend: 'print',
                className: 'btn-custom',  // Add custom class here
                customize: function (win) {
                    $(win.document.body)
                        .css('font-size', '10pt')
                        .prepend(
                            `
                                <div class="header print-only" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
                                    <div class="logo-kiri" style="display: flex; align-items: center;">
                                        <img src="{{ asset('lte/dist/img/ptatmisolo.png') }}" alt="Logo PT. ATMI Solo" class="logo" style="height: 100px;">
                                    </div>
                                    <div class="company-info" style="text-align: center; flex-grow: 1; margin-left: 20px;">
                                        <b>PT. ATMI SOLO</b>
                                        <p>Jl. Adisucipto / Jl. Mojo No. 1 Karangasem, Laweyan, Surakarta 57145<br>
                                            Phone: +62 271 714466 - Fax: +62 271 714390<br>
                                            PO BOX 215 Surakarta 57145, Jawa Tengah, Indonesia<br>
                                            Email: marketing@atmi.co.id - Website: http://www.atmi.co.id</p>
                                    </div>
                                    <div class="logo-kanan" style="display: flex; align-items: center;">
                                        <img src="{{ asset('lte/dist/img/atmipro.png') }}" alt="Logo ATMI Pro" class="logo" style="height: 100px; margin-left: 10px;">
                                        <img src="{{ asset('lte/dist/img/truv.jpg') }}" alt="Logo ISO" class="logo" style="height: 100px; margin-left: 10px;">
                                    </div>
                                </div>
                                <br>
                            `
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            },
            {
                extend: 'excel',
                className: 'btn-custom'  
            },
            {
                extend: 'colvis',
                className: 'btn-custom'  
            }
        ]
    }).buttons().container().appendTo('#machine_wrapper .col-md-6:eq(0)');
            $("#tableorder").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "scrollX": true,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tableorder_wrapper .col-md-6:eq(0)');
            $("#histori").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#histori_wrapper .col-md-6:eq(0)');
            $("#user").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#user_wrapper .col-md-6:eq(0)');
            $("#produk").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#produk_wrapper .col-md-6:eq(0)');
            $("#barcode").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#barcode_wrapper .col-md-6:eq(0)');
            $("#productionsheet").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#productionsheet_wrapper .col-md-6:eq(0)');
            $("#ordertype").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#ordertype_wrapper .col-md-6:eq(0)');
            $("#plan").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#plan_wrapper .col-md-6:eq(0)');
            $("#department").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "scrollX": true,
                "searching": false,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#department_wrapper .col-md-6:eq(0)');
            $("#customer, #sotarget").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                "scrollX": true,
                "buttons": ["excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo(
                '#customer_wrapper .col-md-6:eq(0), #sotarget_wrapper .col-md-6:eq(0)');
        });

        $(document).ready(function() {
            // Hanya tampilkan preloader saat pertama kali halaman dimuat setelah login
            if (localStorage.getItem('hasLoggedIn') === null) {
                // Tampilkan preloader
                $('#preloader').show();

                // Setelah beberapa detik, sembunyikan preloader dan tandai bahwa pengguna sudah login
                setTimeout(function() {
                    $('#preloader').hide();
                    localStorage.setItem('hasLoggedIn', 'true');
                }, 3000); // Ganti angka 3000 dengan durasi yang diinginkan dalam milidetik
            } else {
                // Jika pengguna sudah login sebelumnya, sembunyikan preloader
                $('#preloader').hide();
            }
        });

        // Menggunakan jQuery untuk menangani perubahan warna navbar
        $(document).ready(function() {
            // Mendapatkan URL halaman saat ini
            var currentUrl = window.location.href;

            // Memeriksa setiap tautan navbar
            $('.navbar-nav a.nav-link').each(function() {
                var navUrl = $(this).attr('href');

                // Memeriksa apakah URL tautan sama dengan URL halaman saat ini
                if (currentUrl.indexOf(navUrl) !== -1) {
                    // Menambahkan kelas 'active' pada tautan menu yang sesuai
                    $(this).closest('li.nav-item').addClass('active');
                }
            });
        });
    </script>
    @yield('scripts')
</body>

</html>
