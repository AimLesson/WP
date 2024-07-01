@extends('tables.tables')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Machines</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('tables') }}">Tables</a></li>
                            <li class="breadcrumb-item active">Machines</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Machine Data</h3>
                            </div>
                            <!-- /.card-header -->
                            {{-- <div class="card-body" style="overflow-x:auto; height:385px;"> --}}
                            <div class="card-body">
                                <table id="machine" class="table table-head-fixed text-nowrap">
                                    {{-- <table id="machine" class="table table-bordered table-striped"> --}}
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Machine</th>
                                            <th>Machine Name</th>
                                            <th>Group</th>
                                            <th>Group Name</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Status</th>
                                            <th>Plant</th>
                                            <th>Purchase Price</th>
                                            <th>Machine Price</th>
                                            <th>Used Age</th>
                                            <th>Mach. Hour</th>
                                            <th>Days per Year</th>
                                            <th>Bank Interest</th>
                                            <th>Floor Area</th>
                                            <th>Maintenance Faktor</th>
                                            <th>Power Cosumption</th>
                                            <th>Floor Price</th>
                                            <th>Electric Price (Kwh)</th>
                                            <th>Labor Cost</th>
                                            <th>Depreciation Cost</th>
                                            <th>Bank Interest</th>
                                            <th>Floor Cost</th>
                                            <th>Electrical Cost</th>
                                            <th>Maintenance Cost</th>
                                            <th>Mach Cost/Hour</th>
                                            <th>Mach Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            // Query untuk mengambil data pengguna menggunakan Eloquent ORM
                                            $machine = \App\Models\machine::get();
                                        @endphp
                                        @foreach ($machine as $m)
                                            <tr>
                                               <!-- <td>
                                                    <img src="{{ asset('/storage/lte/dist/img/' . $m->image) }}" alt="{{ $m->image }}" style="max-width: 100%; max-height: 100px;">
                                                </td>-->
                                                <td>{{ $m->id }}</td>
                                                <td>{{ $m->id_machine }}</td>
                                                <td>{{ $m->machine_name }}</td>
                                                <td>{{ $m->group_id }}</td>
                                                <td>{{ $m->group_name }}</td>
                                                <td>{{ $m->machine_type }}</td>
                                                <td>{{ $m->location }}</td>
                                                <td>{{ $m->machine_state }}</td>
                                                <td>{{ $m->plant }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->purchase_price, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->machine_price, 0, ',', '.') }}</td>
                                                <td>{{ $m->used_age }} years</td>
                                                <td>{{ $m->mach_hour }} hours/day</td>
                                                <td>{{ $m->days_per_year }} days</td>
                                                <td>{{ $m->bank_interest_percent }} %</td>
                                                <td>{{ $m->floor_area }} M²</td>
                                                <td>{{ $m->maintenance_factor }} %</td>
                                                <td>{{ $m->power_consumption }} kW</td>
                                                <td>{{ 'Rp. ' . number_format($m->floor_price, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->electric_price, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->labor_cost, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->depreciation_cost, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->bank_interest, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->area_cost, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->electrical_cost, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->maintenance_cost, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->mach_cost_per_hour, 0, ',', '.') }}</td>
                                                <td>{{ 'Rp. ' . number_format($m->total_mach, 0, ',', '.') }}</td>
                                                {{-- <td>{{$m->total_mach}}</td> --}}
                                            </tr>
                                            <div class="modal fade" id="modal-hapus{{ $m->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete Machine</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure delete Machine 
                                                                <b>{{ $m->id_machine }} - {{ $m->machine_name }} -
                                                                    {{ $m->machine_type }}?</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form
                                                                action="{{ route('setup.deletemachine', ['id' => $m->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Ya,
                                                                    Hapus</button>
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

    <script>
        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Machines');
    </script>
@endsection
