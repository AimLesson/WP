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
            <li class="nav-item {{ request()->is('activities/quotation')||request()->is('activities/quotation/create')||(request()->is('activities/quotation/edit/*')&&request()->route('quotation_no')==$quotation->quotation_no)||request()->is('activities/quotation/view/*') ? 'active' : '' }}">
                <a href="{{route('activities.quotation')}}" class="nav-link">
                    <i class="nav-icon fas fa-file-upload"></i>
                    <p>
                        Quotation
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/salesorder')||request()->is('activities/salesorder/create')||(request()->is('activities/salesorder/edit/*')&&request()->route('so_number')==$salesorder->so_number)||request()->is('activities/salesorder/view/*') ? 'active' : '' }}">
                <a href="{{route('activities.salesorder')}}" class="nav-link">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                        Sales Order
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/order')||request()->is('activities/order/create')||(request()->is('activities/order/edit/*')&&request()->route('id')==$order->id) ? 'active' : '' }}">
                <a href="{{route('activities.order')}}" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Order
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/customer')||request()->is('activities/customer/add')||(request()->is('activities/customer/edit/*')&&request()->route('id')==$customer->id) ? 'active' : '' }}">
                <a href="{{route('activities.customer')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Customer
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/item')||request()->is('activities/item/create')||(request()->is('activities/item/edit/*')&&request()->route('id')==$item->id) ? 'active' : '' }}">
                <a href="{{route('activities.item')}}" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>
                        Item
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/processing') ? 'active' : '' }}">
                <a href="{{route('activities.processing')}}" class="nav-link">
                    <i class="nav-icon fas fa-retweet"></i>
                    <p>
                        Processings
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/standartpart') ? 'active' : '' }}">
                <a href="{{route('activities.standartpart')}}" class="nav-link">
                    <i class="nav-icon fas fa-archive"></i>
                    <p>
                        Standart Part
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/sub_contract') ? 'active' : '' }}">
                <a href="{{route('activities.sub_contract')}}" class="nav-link">
                    <i class="nav-icon fas fa-people-arrows"></i>
                    <p>
                        Sub. Cont.
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/overhead_manufacture') ? 'active' : '' }}">
                <a href="{{route('activities.overhead_manufacture')}}" class="nav-link">
                    <i class="nav-icon fas fa-exclamation"></i>
                    <p>
                        Over Head Manufacture
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/material') ? 'active' : '' }}">
                <a href="{{route('activities.material')}}" class="nav-link">
                    <i class="nav-icon fas fa-puzzle-piece"></i>
                    <p>
                        Material
                    </p>
                </a>
            </li>
            <!--<li class="nav-item {{ request()->is('activities/labor_cost') ? 'active' : '' }}">
                <a href="{{route('activities.labor_cost')}}" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>
                        Labor Cost, OH.Org.
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/depreciation_cost') ? 'active' : '' }}">
                <a href="{{route('activities.depreciation_cost')}}" class="nav-link">
                    <i class="nav-icon fas fa-level-down-alt"></i>
                    <p>
                        Depreciation Cost
                    </p>
                </a>
            </li>-->
            <li class="nav-item {{ request()->is('tasks/index') ? 'active' : '' }}">
                <a href="{{ route('tasks.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-clock"></i>
                    <p>
                        Used Time
                    </p>
                </a>
            </li>
            {{-- <li class="nav-item {{ request()->is('activities/used_time_barcode') ? 'active' : '' }}">
                <a href="{{route('activities.used_time_barcode')}}" class="nav-link">
                    <i class="nav-icon fas fa-barcode"></i>
                    <p>
                        Used Time (Barcode ID)
                    </p>
                </a>
            </li> --}}
            <li class="nav-item {{ request()->is('activities/calculation') ? 'active' : '' }}">
                <a href="{{route('activities.calculation')}}" class="nav-link">
                    <i class="nav-icon fas fa-calculator"></i>
                    <p>
                        Calculation
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/delivery_orders_wh') ? 'active' : '' }}">
                <a href="{{route('activities.delivery_orders_wh')}}" class="nav-link">
                    <i class="nav-icon fas fa-warehouse"></i>
                    <p>
                        Delivery Orders to (WH)
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/copy_order') ? 'active' : '' }}">
                <a href="{{route('activities.copy_order')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Copy Order
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/delivery_process') ? 'active' : '' }}">
                <a href="{{route('activities.delivery_process')}}" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>
                        Delivery Process
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/real_hpp') ? 'active' : '' }}">
                <a href="{{route('activities.real_hpp')}}" class="nav-link">
                    <i class="nav-icon fas fa-percentage"></i>
                    <p>
                        Real HPP (Finance)
                    </p>
                </a>
            </li>
            <li class="nav-item {{ request()->is('activities/finish_order') ? 'active' : '' }}">
                <a href="{{route('activities.finish_order')}}" class="nav-link">
                    <i class="nav-icon fas fa-check-double"></i>
                    <p>
                        Finish Order (Finance)
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
                        <img class="" src="{{ asset('lte/dist/img/textbox.png') }}" alt="ATMILogo1" height="650" width="1100" style="margin: auto">
                        <div>
                            <h3 class="judul">Activities</h3>
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
        updateTitle('Activities');
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
