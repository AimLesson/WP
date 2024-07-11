@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Plant</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.plan') }}">Plan</a></li>
                            <li class="breadcrumb-item active">Edit Plant</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.updateplan') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input class="form-control" type="hidden" id="id" name="id" value="{{ $plan->id }}">
                    <input class="form-control" type="hidden" id="plan_name" name="plan_name"
                        value="{{ $plan->plan_name }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Plant Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputUsername">Plant Name</label>
                                        <input type="text" name="plan_name" class="form-control"
                                            id="exampleInputUsername" placeholder="Insert Plan Name"
                                            value="{{ $planJoin[0]->plan_name }}" required readonly>
                                        @error('plan_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="Group"
                                            style="display: flex; justify-content: space-between; align-items: center;"
                                            class="form-label">
                                            Group
                                            <button type="button" id="add-group-row" class="btn btn-primary btn-xs btn-custom">
                                                <a href="javascript:void(0)" class="text-light font-18" title="Add Group"
                                                    id="addBtn"><i class="fa fa-plus"></i></a>
                                            </button>
                                        </label>
                                        <div class="table-responsive" style="max-width: 100%;">
                                            <table class="table" id="planadd-table" style="width: 100%; overflow-x: auto;">
                                                <thead>
                                                    <tr>
                                                        <th style="width:100px">Group ID</th>
                                                        <th>Group Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($planJoin as $key => $group)
                                                        <tr>
                                                            <input type="hidden" name="planadd[]"
                                                                value="{{ $group->id }}">
                                                            <td hidden class="ids">{{ $group->id }}</td>
                                                            <td><input class="form-control" style="width:100px"
                                                                    type="text" id="group_id" name="group_id[]"
                                                                    value="{{ $group->group_id }}"></td>
                                                            <td><input class="form-control" type="text" id="group"
                                                                    name="group[]" value="{{ $group->group }}"></td>
                                                            @if ($group->id == !null)
                                                                <td><a class="text-danger font-18 delete_plan"
                                                                        href="#" data-toggle="modal"
                                                                        data-target="#delete_plan" title="Remove"><i
                                                                            class="fa fa-trash"></i></a></td>
                                                            @else
                                                                <td><a class="text-danger font-18 remove" href="#"
                                                                        title="Remove"><i class="fa fa-trash"></i></a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-custom">Update Plant</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Delete Modal -->
        <div class="modal fade" id="delete_plan" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm Delete Plan Add</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete
                            <b>{{ $group->group_id }} - {{ $group->group }}?</b>
                        </p>
                    </div>
                    <div class="modal-footer justify-content">
                        <form action="{{ route('setup.deleteplanadd') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" class="e_id" value="">
                            <a href="javascript:void(0);" data-dismiss="modal"
                                class="btn btn-default cancel-btn">Cancel</a>
                            <button type="submit" class="btn btn-danger continue-btn submit-btn">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

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
            updateTitle('Edit Plan');

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
                var totalGroups = $("#planadd-table tbody tr").length;

                if (totalGroups > 1) {
                    var child = $(this).closest("tr").nextAll();
                    $(this).closest("tr").remove();
                    rowIdx--;

                    child.each(function() {
                        var id = $(this).attr("id");
                        var idx = $(this).children(".row-index").children("p");
                        var dig = parseInt(id.substring(1));
                        idx.html(`${dig - 1}`);
                        $(this).attr("id", `R${dig - 1}`);
                    });

                } else {
                    alert("Cannot delete group if only one group remains!");
                }
            });

            $(document).on('click', '.delete_plan', function() {
                var _this = $(this).parents('tr');
                $('.e_id').val(_this.find('.ids').text());
            });

        });
    </script>
@endsection
