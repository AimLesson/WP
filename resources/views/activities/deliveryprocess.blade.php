@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Delivery Process</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Delivery Process</li>
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
                         <!-- Filter Form -->
                         <form action="{{ route('activities.deliveryprocess') }}" method="GET" class="mb-3">
                            <div class="form-group row">
                                <label for="order_number" class="col-auto">Filtered by Order No.</label>
                                <div class="col-auto">
                                    <input type="text" name="order_number" id="order_number" class="form-control"
                                           placeholder="Enter Order No." value="{{ request('order_number') }}">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary btn-custom">Filter</button>
                                    <a href="{{ route('activities.deliveryprocess') }}" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Delivery Process </h3>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="customer" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Order No.</th>
                                            <th>Customer</th>
                                            <th>Date Order</th>
                                            <th>SO No.</th>
                                            <th>Product</th>
                                            <th>QTY</th>
                                            <th>DOD</th>
                                            <th>Sale Price</th>
                                            <th>State</th>
                                            <th>App. Produksi</th>
                                            <th>App. Marketing</th>
                                            <th>Surat Jalan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $o)
                                            <tr>
                                                <td>{{ $o->id }}</td>
                                                <td><a
                                                        href="{{ url('activities/order/view/' . $o->order_number) }}">{{ $o->order_number }}</a>
                                                </td>
                                                <td>{{ $o->customer }}</td>
                                                <td>{{ $o->order_date }}</td>
                                                <td>{{ $o->so_number }}</td>
                                                <td>{{ $o->product }}</td>
                                                <td>{{ $o->qty }}</td>
                                                <td>{{ $o->dod }}</td>
                                                <td>{{ formatRupiah($o->sale_price) }}</td>
                                                <td>{{ $o->order_status }}</td>
                                                <td class="text-center">
                                                    <input type="checkbox" class="form-check-input update-status produksi-checkbox"
                                                        data-toggle="modal" data-target="#statusModal"
                                                        data-id="{{ $o->id }}" data-type="produksi"
                                                        {{ $o->produksi_status == 'Disetujui' ? 'checked' : '' }}>
                                                    <label class="form-check-label">Produksi</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="form-check-input update-status marketing-checkbox"
                                                        data-toggle="modal" data-target="#statusModal"
                                                        data-id="{{ $o->id }}" data-type="marketing"
                                                        {{ $o->marketing_status == 'Disetujui' ? 'checked' : '' }}
                                                        {{ $o->produksi_status != 'Disetujui' ? 'disabled' : '' }}>
                                                    <label class="form-check-label">Marketing</label>
                                                </td>
                                                <td>
                                                    <input type="checkbox" class="form-check-input update-status surat-jalan-checkbox"
                                                        data-toggle="modal" data-target="#statusModal"
                                                        data-id="{{ $o->id }}" data-type="surat_jalan"
                                                        {{ $o->surat_jalan_status == 'Disetujui' ? 'checked' : '' }}
                                                        {{ $o->marketing_status != 'Disetujui' ? 'disabled' : '' }}>
                                                    <label class="form-check-label">Surat Jalan</label>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Input Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="statusForm">
                        <input type="hidden" id="orderId" name="order_id">
                        <input type="hidden" id="statusType" name="status_type">
                        <input type="hidden" id="statusValue" name="status_value">
                        <div class="mb-3">
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-custom">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const produksiCheckbox = document.querySelector('.produksi-checkbox');
            const marketingCheckbox = document.querySelector('.marketing-checkbox');
            const suratJalanCheckbox = document.querySelector('.surat-jalan-checkbox');

            produksiCheckbox.addEventListener('change', function() {
                marketingCheckbox.disabled = !this.checked;
                if (!this.checked) {
                    marketingCheckbox.checked = false;
                    suratJalanCheckbox.disabled = true;
                    suratJalanCheckbox.checked = false;
                }
            });

            marketingCheckbox.addEventListener('change', function() {
                suratJalanCheckbox.disabled = !this.checked;
                if (!this.checked) {
                    suratJalanCheckbox.checked = false;
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.update-status').on('click', function() {
                var id = $(this).data('id');
                var type = $(this).data('type');
                var isChecked = $(this).is(':checked');
                var value = isChecked ? 'Disetujui' : 'Belum Disetujui';
                var modalTitle = '';

                // Set modal title based on the type
                switch (type) {
                    case 'produksi':
                        modalTitle = 'Keterangan Produksi : ';
                        break;
                    case 'marketing':
                        modalTitle = 'Keterangan Marketing';
                        break;
                    case 'surat_jalan':
                        modalTitle = 'Masukan Nomor Surat Jalan';
                        break;
                    default:
                        modalTitle = 'Input Description';
                }

                // Set values in the modal
                $('#orderId').val(id);
                $('#statusType').val(type);
                $('#statusValue').val(value);
                $('#statusModalLabel').text(modalTitle);

                // Delay the display of the modal by 1.5 seconds
                setTimeout(function() {
                    $('#statusModal').modal('show');
                }, 1500); // 1500 milliseconds = 1.5 seconds
            });

            // Handle form submission
            $('#statusForm').on('submit', function(e) {
                e.preventDefault();

                var id = $('#orderId').val();
                var type = $('#statusType').val();
                var value = $('#statusValue').val();
                var description = $('#description').val();

                $.ajax({
                    url: '{{ route('update-status') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        type: type,
                        value: value,
                        description: description
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Status and description updated successfully.',
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to update status.',
                            });
                        }

                        // Hide the modal after submission
                        $('#statusModal').modal('hide');
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while updating status.',
                        });
                    }
                });
            });
        });
    </script>
@endsection
