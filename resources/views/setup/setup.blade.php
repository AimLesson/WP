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
            <li class="nav-item {{ request()->is('setup/machine')||request()->is('setup/machine/create')||(request()->is('setup/machine/edit/*')&& request()->route('id') == $machine->id)||request()->is('setup/machine/view/*') ? 'active' : '' }} ? 'active' : '' }}">
                <a href="{{ route('setup.machine') }}" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Machine
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/workunit')||request()->is('setup/workunit/add')||(request()->is('setup/workunit/edit/*')&& request()->route('id')==$work_unit->id) ? 'active' : '' }}">
                <a href="{{ route('setup.workunit') }}" class="nav-link">
                    <i class="nav-icon fas fa-network-wired"></i>
                    <p>
                        Work Unit
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/plan')||request()->is('setup/plan/create')||(request()->is('setup/plan/edit/*')&&request()->route('plan_name')==$plan->plan_name)||request()->is('setup/plan/view/*') ? 'active' : '' }}">
                <a href="{{ route('setup.plan') }}" class="nav-link">
                    <i class="nav-icon fas fa-bullseye"></i>
                    <p>
                        Plan
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/ordercode/orderunit')||request()->is('setup/ordercode/orderunit/add')||(request()->is('setup/ordercode/orderunit/edit/*')&&request()->route('id')==$order_unit->id)|| request()->is('setup/ordercode/machine')||request()->is('setup/ordercode/machine-state/add')||(request()->is('setup/ordercode/machine-state/edit/*')&&request()->route('id')==$machine_state->id)|| request()->is('setup/ordercode/unit')||request()->is('setup/ordercode/unit/add')||(request()->is('setup/ordercode/unit/edit/*')&&request()->route('id')==$unit->id) ? 'active' : '' }}">
                <a href="{{ route('setup.orderunit') }}" class="nav-link">
                    <i class="nav-icon fas fa-code-branch"></i>
                    <p>
                        Order Code
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/department')||request()->is('setup/department/add')||(request()->is('setup/department/edit/*')&&request()->route('id')==$department->id) ? 'active' : '' }}">
                <a href="{{ route('setup.department') }}" class="nav-link">
                    <i class="nav-icon fas fa-house-user"></i>
                    <p>
                        Department
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/kblicode')||request()->is('setup/kblicode/add')||(request()->is('setup/kblicode/edit/*')&&request()->route('id')==$kblicode->id) ? 'active' : '' }}">
                <a href="{{ route('setup.kblicode') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        KBLI Code
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/material') ? 'active' : '' }}">
                <a href="{{route('setup.material')}}" class="nav-link">
                    <i class="nav-icon fas fa-puzzle-piece"></i>
                    <p>
                        Material
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/sotarget')||request()->is('setup/sotarget/add')||(request()->is('setup/sotarget/edit/*')&&request()->route('id')==$sotarget->id) ? 'active' : '' }}">
                <a href="{{ route('setup.sotarget') }}" class="nav-link">
                    <i class="nav-icon fas fa-check-square"></i>
                    <p>
                        SO Target
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/taxtype')||request()->is('setup/taxtype/add')||(request()->is('setup/taxtype/edit/*')&&request()->route('id')==$taxtype->id) ? 'active' : '' }}">
                <a href="{{ route('setup.taxtype') }}" class="nav-link">
                    <i class="nav-icon fas fa-money-check"></i>
                    <p>
                        Tax Type
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/producttype')||request()->is('setup/producttype/add')||(request()->is('setup/producttype/edit/*')&&request()->route('id')==$producttype->id) ? 'active' : '' }}">
                <a href="{{ route('setup.producttype') }}" class="nav-link">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>
                        Product Type
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/shipping')||request()->is('setup/shipping/add')||(request()->is('setup/shipping/edit/*')&&request()->route('id')==$shipping->id) ? 'active' : '' }}">
                <a href="{{ route('setup.shipping') }}" class="nav-link">
                    <i class="nav-icon fas fa-shipping-fast"></i>
                    <p>
                        Shipping
                    </p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-print"></i>
                    <p>
                        Print
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('setup.print_productionsheet') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Production Sheet</p>
                        </a>
                    </li>
                </ul>
            </li>
            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
            <li class="nav-item {{ request()->is('setup/privileges') ? 'active' : '' }}">
                <a href="{{ route('setup.privileges') }}" class="nav-link">
                    <i class="nav-icon fas fa-user-check"></i>
                    <p>
                        Privilege
                    </p>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 'superadmin')
            <li class="nav-item {{ request()->is('setup/companyinfo') ? 'active' : '' }}">
                <a href="{{ route('setup.companyinfo') }}" class="nav-link">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>
                        Company Info
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('setup/settinghost3') ? 'active' : '' }}">
                <a href="{{ route('setup.settinghost3') }}" class="nav-link">
                    <i class="nav-icon fas fa-dragon"></i>
                    <p>
                        Setting Host 3
                    </p>
                </a>
            </li>
            @endif
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
                            <h3 class="judul">Setup</h3>
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
        updateTitle('Setup');

        $(document).ready(function() {
            // Mendapatkan URL halaman saat ini
            var currentUrl = window.location.href;

            // Memeriksa setiap tautan menu
            $('.nav-sidebar .nav-item a').each(function() {
                var navUrl = $(this).attr('href');

                // Memeriksa apakah URL tautan sama dengan URL halaman saat ini
                if (currentUrl.indexOf(navUrl) !== -1) {
                    // Menambahkan kelas 'active' pada tautan menu yang sesuai
                    $(this).closest('li.nav-item').addClass('active');
                }
            });
        });
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
