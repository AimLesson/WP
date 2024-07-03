@extends('activities.activities')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Used Time</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item active">Used Time</li>
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
                    <div class="container mt-5">
                        <h1>Used Time</h1>
                        <a href="/tasks/create" class="btn btn-primary mb-3">Create Task</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Pending At</th>
                                    <th>Finished At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $task->status)) }}</td>
                                        <td>{{ $task->pending_at }}</td>
                                        <td>{{ $task->finished_at }}</td>
                                        <td>
                                            <form action="{{ route('tasks.markAsPending', $task->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @php dd($task->id); @endphp
                                                <button type="submit" class="btn btn-sm btn-warning" {{ $task->status == 'pending' || $task->status == 'finished' ? 'disabled' : '' }}>
                                                    Mark as Pending
                                                </button>
                                            </form>
                                            
                                            <form action="{{ route('tasks.markAsFinished', $task->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @php dd($task->id); @endphp
                                                <button type="submit" class="btn btn-sm btn-success" {{ $task->status == 'finished' ? 'disabled' : '' }}>
                                                    Mark as Finished
                                                </button>
                                            </form>
                                            <form action="{{ route('tasks.refreshFromPending', $task->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @php dd($task->id); @endphp
                                                <button type="submit" class="btn btn-sm btn-primary" {{ $task->status != 'pending' || $task->status == 'finished' ? 'disabled' : '' }}>
                                                    Start
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        updateTitle('Used Time');
    </script>
@endsection
