@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quotation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Quotation</li>
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
                        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' || Auth::user()->unit == 'MA')
                        <a href="{{ route('activities.createquotation') }}" class="btn btn-primary mb-3"><i
                                class="fas fa-plus"></i>
                            Add</a> @endif

                          <!-- Filter Form -->
                    <form action="{{ route('activities.quotation') }}" method="GET" class="mb-3">
                        <div class="form-group row">
                            <label for="quotation_no" class="col-sm-2 col-form-label">Filter by Quotation No.</label>
                            <div class="col-sm-4">
                                <input type="text" name="quotation_no" class="form-control" id="quotation_no"
                                    value="{{ old('quotation_no', $filterQuotationNo) }}"
                                    placeholder="Enter Quotation No.">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                <a href="{{ route('activities.quotation') }}" class="btn btn-secondary">Reset</a>
                            </div>
                        </div>
                    </form>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Quotation Data</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Quotation No.</th>
                                            <th>Company Name</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Total Amount</th>
                                            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' || Auth::user()->unit == 'MA')
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quotation as $q)
                                            <tr>
                                                <td >{{ $loop->iteration }}</td>
                                                <td ><a href="{{ url('activities/quotation/view/' . $q->quotation_no) }}">{{ $q->quotation_no }}</a></td>
                                                <td>{{ $q->company_name }}</td>
                                                <td>{{ $q->description }}</td>
                                                <td>{{ $q->date }}</td>
                                                <td class="totalamount">{{ $q->total_amount }}</td>
                                                @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin' || Auth::user()->unit == 'MA')
                                                <td>
                                                    <a href="{{ url('activities/quotation/edit/' . $q->quotation_no) }}"
                                                        class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                        Edit</a>
                                                    <a href="{{ route('activities.destroyquotation', ['id' => $q->id]) }}"
                                                        data-toggle="modal" data-target="#modal-hapus{{ $q->id }}"
                                                        class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                        Delete</a>
                                                </td>
                                                @endif
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $q->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Quotation</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete
                                                                <b>{{ $q->quotation_no }}?</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('activities.destroyquotation', ['id' => $q->id]) }}"
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
            updateTitle('Quotation');
        });
    </script>
@endsection
