@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sales Order</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Sales Order</li>
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
                        <a href="{{ route('activities.createso') }}" class="btn btn-primary mb-3"><i
                                class="fas fa-plus"></i>
                            Add</a>

                             <!-- Search form -->
                             <form method="GET" action="{{ route('activities.salesorder') }}" class="mb-3">
                                <div class="form-group row">
                                    <label for="so_number" class="col-sm-2 col-form-label">Filtered by SO Number:</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="so_number" id="so_number" class="form-control"
                                               value="{{ request('so_number') }}" placeholder="Enter SO number">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                        <a href="{{ route('activities.salesorder') }}" class="btn btn-secondary">Reset</a>
                                    </div>
                                </div>
                            </form>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sales Order Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>SO No.</th>
                                            <th>PO No.</th>
                                            <th>Company Name</th>
                                            <th>SO Date</th>
                                            <th>Ship Date</th>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($salesorder as $so)
                                            <tr>
                                                <td >{{ $so->id }}</td>
                                                <td ><a href="{{ url('activities/salesorder/view/' . $so->so_number) }}">{{ $so->so_number }}</a></td>
                                                <td>{{ $so->po_number }}</td>
                                                <td>{{ $so->company_name }}</td>
                                                <td>{{ $so->date }}</td>
                                                <td>{{ $so->ship_date }}</td>
                                                <td class="totalamount">{{ $so->total_amount }}</td>
                                                <td>
                                                    <a href="{{ url('activities/salesorder/edit/' . $so->so_number) }}"
                                                        class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                        Edit</a>
                                                    <a href="{{ route('activities.destroyso', ['id' => $so->id]) }}"
                                                        data-toggle="modal" data-target="#modal-hapus{{ $so->id }}"
                                                        class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                        Delete</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $so->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Sales Order</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete
                                                                <b>{{ $so->so_number }}?</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('activities.destroyso', ['id' => $so->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-remove">Delete</button>
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

            // Fungsi untuk mengubah nilai ke dalam format mata uang (IDR)
            function formatCurrency(value) {
                // Gunakan toLocaleString() dengan opsi currency untuk format IDR
                var formattedValue = parseFloat(value).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

                return formattedValue;
            }

            // Mengambil elemen HTML yang menampilkan total_amount di dalam tabel
            var totalAmountElements = document.querySelectorAll('.totalamount');

            // Iterasi melalui setiap elemen dan mengonversi nilainya ke format rupiah
            totalAmountElements.forEach(function(totalAmountElement) {
                var totalAmount = totalAmountElement.textContent.trim();
                var formattedTotalAmount = formatCurrency(totalAmount);
                totalAmountElement.textContent = formattedTotalAmount;
            });

            // Mengambil nilai total_amount dan tax
            var totalAmount = totalAmountElement.textContent.trim();

            // Mengonversi nilai total_amount dan tax ke format rupiah
            var formattedTotalAmount = formatCurrency(totalAmount);

            // Menetapkan nilai yang sudah dikonversi ke elemen HTML
            totalAmountElement.textContent = formattedTotalAmount;


            // Fungsi untuk mengubah judul berdasarkan halaman
            function updateTitle(pageTitle) {
                document.title = pageTitle;
            }

            // Panggil fungsi ini saat halaman "barcode" dimuat
            updateTitle('Sales Order');
        });
    </script>
@endsection
