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
    </style>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item {{ request()->is('report/order') ? 'active' : '' }}">
                <a href="{{ route('report.order') }}" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Order
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/controlsheet') ? 'active' : '' }}">
                <a href="{{route('report.controlsheet')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        Control Sheet
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/productionsheet') ? 'active' : '' }}">
                <a href="{{route('report.productionsheet')}}" class="nav-link">
                    <i class="nav-icon fas fa-file-contract"></i>
                    <p>
                        Production Sheet
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/inspectionsheet') ? 'active' : '' }}">
                <a href="{{route('report.inspectionsheet')}}" class="nav-link">
                    <i class="nav-icon fas fa-file-signature"></i>
                    <p>
                        Inspection Sheet
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/materialsheet') ? 'active' : '' }}">
                <a href="{{route('report.materialsheet')}}" class="nav-link">
                    <i class="nav-icon fas fa-puzzle-piece"></i>
                    <p>
                        Material Sheet
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/standartpartsheet') ? 'active' : '' }}">
                <a href="{{route('report.standartpartsheet')}}" class="nav-link">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>
                        Standart Part Sheet
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/subcont') ? 'active' : '' }}">
                <a href="{{route('report.subcont')}}" class="nav-link">
                    <i class="nav-icon fas fa-people-arrows"></i>
                    <p>
                        Sub. Cont.
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/overheadmanufacture') ? 'active' : '' }}">
                <a href="{{route('report.overheadmanufacture')}}" class="nav-link">
                    <i class="nav-icon fas fa-exclamation"></i>
                    <p>
                        Overhead Manufacture
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/monitoranalisaorder') ? 'active' : '' }}">
                <a href="{{route('report.monitoranalisaorder')}}" class="nav-link">
                    <i class="nav-icon fas fa-desktop"></i>
                    <p>
                        Monitor Analisa Order
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/statistic') ? 'active' : '' }}">
                <a href="{{route('report.statistic')}}" class="nav-link">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        Statistic
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/reportordergraph') ? 'active' : '' }}">
                <a href="{{route('report.reportordergraph')}}" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        Report Order On Graph
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/capacity') ? 'active' : '' }}">
                <a href="{{route('report.capacity')}}" class="nav-link">
                    <i class="nav-icon fas fa-house-damage"></i>
                    <p>
                        Capacity
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-stream"></i>
                    <p>
                        WIP
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('report.wip_process')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Process</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('report.wip_material')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Material</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-location-arrow"></i>
                    <p>
                        Out Standing
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('report.outstanding')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Process</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->is('report/finishgood') ? 'active' : '' }}">
                <a href="{{route('report.finishgood')}}" class="nav-link">
                    <i class="nav-icon fas fa-check-double"></i>
                    <p>
                        Finish Good
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/delivered') ? 'active' : '' }}">
                <a href="{{route('report.delivered')}}" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>
                        Delivered
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/hpp') ? 'active' : '' }}">
                <a href="{{route('report.hpp')}}" class="nav-link">
                    <i class="nav-icon fas fa-percentage"></i>
                    <p>
                        HPP (Versi Fin)
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/perhitunganwip') ? 'active' : '' }}">
                <a href="{{route('report.perhitunganwip')}}" class="nav-link">
                    <i class="nav-icon fas fa-calculator"></i>
                    <p>
                        Perhitungan WIP
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('report/salesorder') ? 'active' : '' }}">
                <a href="{{route('report.salesorder')}}" class="nav-link">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                        Sales Order
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
                            <h3 class="judul">Report</h3>
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
        updateTitle('Report');
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
