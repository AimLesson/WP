@extends('layout.main')
@section('sidebar')
    <style>
        /* Tambahkan gaya untuk kelas active */
        .nav-item.active {
            background-color: rgb(51, 126, 255);
            border-radius: 5px;
        }

        /* Gaya untuk tautan di dalam menu aktif */
        .nav-item.active a.nav-link {
            color: white;
            /* Warna teks menjadi putih atau sesuai kebutuhan */
        }
        .judul {
            font-size: 9rem; /* default size */
        }

        @media (max-width: 1200px) {
            .judul {
                font-size: 5rem;
            }
        }

        @media (max-width: 992px) {
            .judul {
                font-size: 5rem;
            }
        }

        @media (max-width: 768px) {
            .judul {
                font-size: 5rem;
            }
        }

        @media (max-width: 576px) {
            .judul {
                font-size: 3rem;
            }
        }
    </style>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item {{ request()->is('table/order') ? 'active' : '' }}">
                <a href="{{ route('tables.orders') }}" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Orders
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('table/machine') ? 'active' : '' }}">
                <a href="{{ route('tables.machines') }}" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Machines
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                        Machines Activities
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('tables.orderpriority_real') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Order Priority (Real)</p>
                        </a>
                        <a href="{{ route('tables.orderpriority_all') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Order Priority (All)</p>
                        </a>
                        <a href="{{ route('tables.loadofmachines') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Load Of Machines</p>
                        </a>
                        <a href="{{ route('tables.orderonprocess') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Order On Process</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->is('table/overheadmanufacture') ? 'active' : '' }}">
                <a href="{{ route('tables.overheadmanufacture') }}" class="nav-link">
                    <i class="nav-icon fas fa-exclamation"></i>
                    <p>
                        Overhead Manufacture
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('table/standartpart') ? 'active' : '' }}">
                <a href="{{ route('tables.standartpart') }}" class="nav-link">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>
                        Standart Part
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('table/subcontr') ? 'active' : '' }}">
                <a href="{{ route('tables.subcontr') }}" class="nav-link">
                    <i class="nav-icon fas fa-people-arrows"></i>
                    <p>
                        Sub. Contr.
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('table/machineshistory') ? 'active' : '' }}">
                <a href="{{ route('tables.machineshistory') }}" class="nav-link">
                    <i class="nav-icon fas fa-history"></i>
                    <p>
                        Machines History
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('table/oldorder') ? 'active' : '' }}">
                <a href="{{ route('tables.oldorders') }}" class="nav-link">
                    <i class="nav-icon fas fa-book-reader"></i>
                    <p>
                        Old Orders (Read Only)
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('table/trackingorder') ? 'active' : '' }}">
                <a href="{{ route('tables.trackingorder') }}" class="nav-link">
                    <i class="nav-icon fas fa-route"></i>
                    <p>
                        Tracking Order
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('table/monitor') ? 'active' : '' }}">
                <a href="{{ route('tables.monitor') }}" class="nav-link">
                    <i class="nav-icon fas fa-desktop"></i>
                    <p>
                        Monitor
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('table/delivery') ? 'active' : '' }}">
                <a href="{{ route('tables.delivery') }}" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>
                        Delivery
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('table/rekaporderma') ? 'active' : '' }}">
                <a href="{{ route('tables.rekaporderma') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Rekap Order MA
                    </p>
                </a>
            </li>
        </ul>
    </nav>
@endsection
@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div style="position: relative; text-align: center;">
                <div class="row">
                    <img class="" src="{{ asset('lte/dist/img/textbox.png') }}" alt="ATMILogo1" height="650"
                        width="1100" style="margin: auto">
                    <div>
                        <h3 class="judul">Tables</h3>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Tables');
    </script>

    <!-- Tambahkan jQuery (pastikan untuk menyesuaikan versi yang sesuai) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // Gunakan jQuery untuk menambahkan kelas 'active' pada klik menu
        $(document).ready(function() {
            $('.nav-item').click(function() {
                $('.nav-item').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
@endsection
