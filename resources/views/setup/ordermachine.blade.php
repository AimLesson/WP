@extends('setup.ordercode')
@section('ordercode')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('setup.createmachinestate') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i>
                        Add</a>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Machine State</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="machine" class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>State</th>
                                        <th>Info</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                        $machinestate = \App\Models\machinestate::get();
                                    @endphp
                                    @foreach ($machinestate as $ms)
                                        <tr>
                                            <td>{{ $ms->code }}</td>
                                            <td>{{ $ms->state }}</td>
                                            <td>{{ $ms->info }}</td>
                                            <td>
                                                <a href="{{ route('setup.editmachinestate', ['id' => $ms->id]) }}"
                                                    class="btn-xs btn-warning"><i class="fas fa-pen"></i>
                                                    Edit</a>
                                                <a href="" data-toggle="modal"
                                                    data-target="#modal-hapus{{ $ms->id }}"
                                                    class="btn-xs btn-danger"><i class="fas fa-trash-alt"></i>
                                                    Hapus</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-hapus{{ $ms->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Confirm Delete Machine State</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure delete
                                                            <b>{{ $ms->code }} - {{ $ms->state }} -
                                                                {{ $ms->info }}?</b>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <form
                                                            action="{{ route('setup.deletemachinestate', ['id' => $ms->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Ya,
                                                                Delete</button>
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
    <!-- Pastikan Anda telah menyertakan SweetAlert di proyek Anda -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Menampilkan pesan kesalahan dari sesi menggunakan SweetAlert
        var errorAlert = '{{ session('error') }}';
        if (errorAlert !== '') {
            Swal.fire({
                icon: 'error',
                title: errorAlert,
                position: 'center', // Mengubah posisi ke tengah
                showConfirmButton: true, // Menampilkan tombol OK
                toast: false,
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
    </script>
    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Machine State');
    </script>
@endsection
