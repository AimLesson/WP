@extends('activities.activities')
@section('content')
    <style>
        .vertical-center {
            display: flex;
            align-items: center;
            justify-content: left;
            height: 100%;
        }

        .fixed-column {
            position: sticky;
            left: 0;
            background-color: white;
            z-index: 1;
        }

        .radio-label input[type="radio"] {
            position: absolute;
            left: 0;
            top: 0;
            margin: 0;
        }

        .radio-label {
            position: relative;
            padding-left: 5px;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Copy Order</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities') }}">Activities</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('activities.order') }}">Order</a></li>
                            <li class="breadcrumb-item active">Copy Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('activities.storecopyorder') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="selected_order_id">Select Order to Copy</label>
                        <select name="selected_order_id" id="selected_order_id" class="form-control select2" style="width: 100%;" required>
                            <option selected="selected" disabled>-- Select Order --</option>
                            @foreach ($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="order_number">New Order Number</label>
                        <input type="text" name="order_number" class="form-control" id="order_number" placeholder="Input Order No." required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-custom">Copy Order</button>
                </form>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
