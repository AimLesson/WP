@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Processing</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Processing</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('activities.createprocessing') }}" class="btn btn-primary mb-3"><i
                                class="fas fa-plus"></i>
                            Add</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Processings Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="quotation" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Order Number</th>
                                            <th>Item Number</th>
                                            <th>DOD</th>
                                            <th>Nama Item</th>
                                            <th>Total Process</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($processing as $pr)
                                            <tr>
                                                <td hidden class="ids">{{ $pr->id }}</td>
                                                <td><a
                                                        href="#">{{ $pr->order_number }}</a>
                                                </td>
                                                <td>{{ $pr->item_no }}</td>
                                                <td>{{ $pr->dod }}</td>
                                                <td>{{ $pr->item }}</td>
                                                <td>{{ $pr->total_process}}</td>
                                                <td>{{ $pr->created_at}}</td>
                                                <td>
                                                    <a href="{{ url('activities/processing/edit/' . $pr->order_number) }}"
                                                        class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                        Edit</a>
                                                    <a href="{{ route('activities.destroyprocessing', ['id' => $pr->id]) }}"
                                                        data-toggle="modal" data-target="#modal-hapus{{ $pr->id }}"
                                                        class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $pr->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Item</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('activities.destroyprocessing', ['id' => $pr->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
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

            // Fungsi untuk mengonversi angka ke format rupiah
            function formatRupiah(angka) {
                var number_string = angka.toString();
                var split = number_string.split(',');
                var sisa = split[0].length % 3;
                var rupiah = split[0].substr(0, sisa);
                var ribuan = split[0].substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    var separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return 'Rp ' + rupiah;
            }

            // Mengambil elemen HTML yang menampilkan total_amount di dalam tabel
            var totalAmountElements = document.querySelectorAll('.totalamount');

            // Iterasi melalui setiap elemen dan mengonversi nilainya ke format rupiah
            totalAmountElements.forEach(function(totalAmountElement) {
                var totalAmount = totalAmountElement.textContent.trim();
                var formattedTotalAmount = formatRupiah(totalAmount);
                totalAmountElement.textContent = formattedTotalAmount;
            });

            // Mengambil nilai total_amount dan tax
            var totalAmount = totalAmountElement.textContent.trim();

            // Mengonversi nilai total_amount dan tax ke format rupiah
            var formattedTotalAmount = formatRupiah(totalAmount);

            // Menetapkan nilai yang sudah dikonversi ke elemen HTML
            totalAmountElement.textContent = formattedTotalAmount;


            // Fungsi untuk mengubah judul berdasarkan halaman
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            // Panggil fungsi ini saat halaman "barcode" dimuat
            updateTitle('Items');
        });
    </script>
@endsection
