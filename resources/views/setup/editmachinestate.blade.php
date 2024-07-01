@extends('setup.setup')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Machine State</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup') }}">Setup</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('setup.ordermachine') }}">Machine State</a></li>
                            <li class="breadcrumb-item active">Edit Machine State</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('setup.updatemachinestate', ['id' => $machine_state->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Edit Machine State</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNama">ID</label>
                                        <input type="text" name="code" value="{{ $machine_state->code }}"
                                            class="form-control" id="exampleInputName" placeholder="ID Order Type" readonly required>
                                        @error('code')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Name State</label>
                                        <input type="text" name="state" value="{{ $machine_state->state }}"
                                            class="form-control" id="exampleInputName" placeholder="state " required>
                                        @error('state')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNama">Info</label>
                                        <input type="text" name="info" value="{{ $machine_state->info }}"
                                            class="form-control" id="exampleInputName" placeholder="Info" >
                                        @error('info')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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

    <script>

        
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Edit Machine State');
    </script>
@endsection
