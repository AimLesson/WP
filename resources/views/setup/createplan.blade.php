@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Plan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item active">Add Plan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.storeplan') }}" method="POST" enctype="multipart/form-data"
                    onsubmit="return validateForm();">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Plan Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Plan Name</label>
                                        <input type="text" name="plan_name" class="form-control"
                                            id="exampleInputUsername" placeholder="Insert Plan Name" required>
                                        @error('plan_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Group"
                                            style="display: flex; justify-content: space-between; align-items: center;"
                                            class="form-label">
                                            Group
                                            <button type="button" id="add-group-row" class="btn btn-primary btn-xs">
                                                <a href="javascript:void(0)" class="text-light font-18" title="Add Group"
                                                    id="addBtn"><i class="fa fa-plus"></i></a>
                                            </button>
                                        </label>
                                        <div class="table-responsive" style="max-width: 100%;">
                                            <table class="table" id="planadd-table"
                                                style="width: 100%; overflow-x: auto;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:100px">Group ID</th>
                                                        <th>Group Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input class="form-control" style="width:100px" type="text"
                                                                id="group_id" name="group_id[]"></td>
                                                        <td><input class="form-control" type="text" id="group"
                                                                name="group[]"></td>
                                                        <td><a href="javascript:void(0)" class="text-danger font-18 remove"
                                                                title="Delete Product"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-custom">Add Plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
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

            // Fungsi untuk mengubah judul berdasarkan halaman
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            // Panggil fungsi ini saat halaman "barcode" dimuat
            updateTitle('Add Plan');

            var rowIdx = 1;
            $("#addBtn").on("click", function() {
                // Adding a row inside the tbody.
                $("#planadd-table tbody").append(`
                    <tr id="R${++rowIdx}">
                        <td><input class="form-control" style="width:100px" type="text" id="group_id" name="group_id[]"></td>
                        <td><input class="form-control" type="text" id="group" name="group[]"></td>
                        <td><a href="javascript:void(0)" class="text-danger font-18 remove" title="Remove"><i class="fa fa-trash"></i></a></td>
                    </tr>`);
            });

            $("#planadd-table tbody").on("click", ".remove", function() {
                var child = $(this).closest("tr").nextAll();
                child.each(function() {
                    var id = $(this).attr("id");
                    var idx = $(this).children(".row-index").children("p");
                    var dig = parseInt(id.substring(1));
                    idx.html(`${dig - 1}`);
                    $(this).attr("id", `R${dig - 1}`);
                });

                $(this).closest("tr").remove();

                rowIdx--;
            });

        });
    </script>
@endsection
