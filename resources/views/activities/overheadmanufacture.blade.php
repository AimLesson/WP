@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Overhead Manufacture</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Overhead Manufacture</li>
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
                        <a href="{{ route('activities.createoverhead_manufacture') }}" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add</a>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Overhead Manufacture</h3>
                            </div>
                            <div class="card-body">
                                <table id="quotation" class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Action</th>
                                            <th>Tanggal</th>
                                            <th>Reference</th>
                                            <th>Descriptions</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $data = \App\Models\Overhead::get();
                                        @endphp
                                        @foreach ($data as $m)
                                            <tr>
                                                <td>{{ $m->id }}</td>
                                                <td>
                                                    <a href="{{ route('activities.editoverhead_manufacture', $m->id) }}" class="btn-xs btn-warning"><i class="fas fa-pen"></i> Edit</a>
                                                    <form action="{{ route('activities.deleteoverhead_manufacture', $m->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-xs btn-danger" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</button>
                                                    </form>
                                                </td>
                                                <td>{{ $m->tanggal }}</td>
                                                <td>{{ $m->ref }}</td>
                                                <td>{{ $m->description }}</td>
                                                <td>{{ $m->jumlah }}</td>
                                                <td>{{ $m->keterangan }}</td>
                                                <td>{{ $m->info }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Edit Overhead Manufacture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="order_number">Order Number</label>
                            <input type="text" class="form-control" id="order_number" name="order_number" disabled required>
                        </div>
                        <div class="form-group">
                            <label for="ref">Reference</label>
                            <input type="text" class="form-control" id="ref" name="ref" required>
                        </div>
                        <div class="form-group">
                            <label for="dod">Tanggal</label>
                            <input type="date" class="form-control" id="dod" name="dod" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Amount</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit" required>
                        </div>
                        <div class="form-group">
                            <label for="price_unit">Price</label>
                            <input type="number" class="form-control" id="price_unit" name="price_unit" required>
                        </div>
                        <div class="form-group">
                            <label for="total_price">Total Price</label>
                            <input type="number" class="form-control" id="total_price" name="total_price" required>
                        </div>
                        <div class="form-group">
                            <label for="info">Info</label>
                            <textarea class="form-control" id="info" name="info"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var $jq = jQuery.noConflict();
            const editButtons = $jq('.edit-btn');
            editButtons.each(function() {
                $jq(this).on('click', function() {
                    const id = $jq(this).data('id');
                    fetch(`{{ url('activities/overhead_manufacture/edit') }}/${id}`)
                        .then(response => response.json())
                        .then(data => {
                            const form = $jq('#editForm');
                            form.attr('action', `{{ url('activities/overhead_manufacture/update') }}/${id}`);
                            $jq('#order_number').val(data.order_number);
                            $jq('#ref').val(data.ref);
                            $jq('#dod').val(data.tanggal);
                            $jq('#description').val(data.description);
                            $jq('#jumlah').val(data.jumlah);
                            $jq('#unit').val(data.unit);
                            $jq('#price_unit').val(data.price_unit);
                            $jq('#total_price').val(data.total_price);
                            $jq('#info').val(data.info);
                            $jq('#modal-edit').modal('show');
                        })
                        .catch(error => {
                            console.error('Error fetching overhead manufacture data:', error);
                        });
                });
            });
        });
    </script>
@endsection
