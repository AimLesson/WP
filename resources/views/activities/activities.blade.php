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
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        
        @php
            // Get the user's permissions from the database
            $user_permissions = Auth::user()->permissions ? json_decode(Auth::user()->permissions, true) : [];
        @endphp

        @if(in_array('quotation', $user_permissions))
        <li class="nav-item {{ request()->is('activities/quotation')||request()->is('activities/quotation/create')||(request()->is('activities/quotation/edit/*')&&request()->route('quotation_no')==$quotation->quotation_no)||request()->is('activities/quotation/view/*') ? 'active' : '' }}">
            <a href="{{route('activities.quotation')}}" class="nav-link">
                <i class="nav-icon fas fa-file-upload"></i>
                <p>Quotation</p>
            </a>
        </li>
        @endif

        @if(in_array('salesorder', $user_permissions))
        <li class="nav-item {{ request()->is('activities/salesorder')||request()->is('activities/salesorder/create')||(request()->is('activities/salesorder/edit/*')&&request()->route('so_number')==$salesorder->so_number)||request()->is('activities/salesorder/view/*') ? 'active' : '' }}">
            <a href="{{route('activities.salesorder')}}" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Sales Order</p>
            </a>
        </li>
        @endif

        @if(in_array('order', $user_permissions))
        <li class="nav-item {{ request()->is('activities/order')||request()->is('activities/order/create')||(request()->is('activities/order/edit/*')&&request()->route('id')==$order->id) ? 'active' : '' }}">
            <a href="{{route('activities.order')}}" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>Order</p>
            </a>
        </li>
        @endif

        @if(in_array('customer', $user_permissions))
        <li class="nav-item {{ request()->is('activities/customer')||request()->is('activities/customer/add')||(request()->is('activities/customer/edit/*')&&request()->route('id')==$customer->id) ? 'active' : '' }}">
            <a href="{{route('activities.customer')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Customer</p>
            </a>
        </li>
        @endif

        @if(in_array('item', $user_permissions))
        <li class="nav-item {{ request()->is('activities/item')||request()->is('activities/item/create')||(request()->is('activities/item/edit/{id}')&&request()->route('id')==$item->id) ? 'active' : '' }}">
            <a href="{{route('activities.item')}}" class="nav-link">
                <i class="nav-icon fas fa-box"></i>
                <p>Item</p>
            </a>
        </li>
        @endif

        @if(in_array('processing', $user_permissions))
        <li class="nav-item {{ request()->is('activities/processing') ||request()->is('activities/processing/create') ? 'active' : '' }}">
            <a href="{{route('activities.processing')}}" class="nav-link">
                <i class="nav-icon fas fa-retweet"></i>
                <p>Processings</p>
            </a>
        </li>
        @endif

        @if(in_array('standartpart', $user_permissions))
        <li class="nav-item {{ request()->is('activities/standartpart') ||request()->is('activities/standartpart/create')||(request()->is('activities/standartpart/edit/{id}')&&request()->route('id')==$item->id) ? 'active' : '' }}">
            <a href="{{route('activities.standartpart')}}" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                <p>Standart Part</p>
            </a>
        </li>
        @endif

        @if(in_array('subcontract', $user_permissions))
        <li class="nav-item {{ request()->is('activities/sub_contract') ||request()->is('activities/sub_contract/create')||(request()->is('activities/sub_contract/edit/{id}')&&request()->route('id')==$item->id) ? 'active' : '' }}">
            <a href="{{route('activities.subcontract')}}" class="nav-link">
                <i class="nav-icon fas fa-people-arrows"></i>
                <p>Sub. Cont.</p>
            </a>
        </li>
        @endif

        @if(in_array('overhead_manufacture', $user_permissions))
        <li class="nav-item {{ request()->is('activities/overhead_manufacture') ||request()->is('activities/overhead_manufacture/create')||(request()->is('activities/overhead_manufacture/edit/{id}')&&request()->route('id')==$item->id) ? 'active' : '' }}">
            <a href="{{route('activities.overhead_manufacture')}}" class="nav-link">
                <i class="nav-icon fas fa-exclamation"></i>
                <p>Over Head Manufacture</p>
            </a>
        </li>
        @endif

        @if(in_array('material', $user_permissions))
        <li class="nav-item {{ request()->is('activities/material') ||request()->is('activities/material/create_material')||(request()->is('activities/material/edit/(id)')&&request()->route('id')==$item->id) ? 'active' : '' }}">
            <a href="{{route('activities.material')}}" class="nav-link">
                <i class="nav-icon fas fa-puzzle-piece"></i>
                <p>Material</p>
            </a>
        </li>
        @endif

        @if(in_array('used_time', $user_permissions))
        <li class="nav-item {{ request()->is('activities/used_time') ? 'active' : '' }}">
            <a href="{{ route('activities.used_time') }}" class="nav-link">
                <i class="nav-icon fas fa-clock"></i>
                <p>Used Time</p>
            </a>
        </li>
        @endif

        @if(in_array('qc', $user_permissions))
        <li class="nav-item {{ request()->is('activities/qc') ? 'active' : '' }}">
            <a href="{{route('activities.qc')}}" class="nav-link">
                <i class="nav-icon fas fa-barcode"></i>
                <p>QC Approval</p>
            </a>
        </li>
        @endif

        @if(in_array('closeorder', $user_permissions))
        <li class="nav-item {{ request()->is('activities/closeorder') ? 'active' : '' }}">
            <a href="{{ route('activities.closeorder') }}" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>Finished Process</p>
            </a>
        </li>
        @endif

        @if(in_array('calculation', $user_permissions))
        <li class="nav-item {{ request()->is('activities/calculation') ? 'active' : '' }}">
            <a href="{{route('activities.calculation')}}" class="nav-link">
                <i class="nav-icon fas fa-calculator"></i>
                <p>Calculation</p>
            </a>
        </li>
        @endif

        @if(in_array('copy_order', $user_permissions))
        <li class="nav-item {{ request()->is('activities/copy_order') ? 'active' : '' }}">
            <a href="{{route('activities.copy_order')}}" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Copy Order</p>
            </a>
        </li>
        @endif

        @if(in_array('deliveryprocess', $user_permissions))
        <li class="nav-item {{ request()->is('activities/delivery_process') ? 'active' : '' }}">
            <a href="{{route('activities.deliveryprocess')}}" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>Delivery Process</p>
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
    <script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>


    <script>
        // Gunakan jQuery untuk menambahkan kelas 'active' pada klik menu
        $(document).ready(function() {
            $('.nav-item').click(function() {
                $('.nav-item').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>

    <script>
            // Helper function to format numbers as Rupiah
    function formatRupiah(num) {
        return 'Rp. ' + num.toLocaleString(undefined, { minimumFractionDigits: 0, maximumFractionDigits: 0 }).replace(/,/g, '.');
    }
    </script>
@endsection
