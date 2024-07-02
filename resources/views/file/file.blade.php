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
            <li class="nav-item {{ request()->is('file/user/changepw') ? 'active' : '' }}">
                <a href="{{ route('user.changepw') }}" class="nav-link">
                    <i class="nav-icon fas fa-key"></i>
                    <p>
                        Change Password
                    </p>
                </a>
            </li>
            @if (Auth::user()->role == 'superadmin')
            <li class="nav-item {{ request()->is('file/user') || request()->is('file/user/create') || (request()->is('file/user/edit/*') && request()->route('id') == $user->id) ? 'active' : '' }}">
                    <a href="{{ route('user') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('file/user/active') ? 'active' : '' }}">
                    <a href="{{ route('user.active') }}" class="nav-link">
                        <i class="nav-icon fas fa-toggle-on"></i>
                        <p>
                            Active User
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
                            <h3 class="judul">File</h3>
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
        updateTitle('File');
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
