@extends('layout.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                  <div class="card text-center m-4 mb-4">
                    <div class="card-header">
                      Laporan Order Bulanan
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Number of Orders</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($labels as $index => $label)
                                    <tr>
                                        <td>{{ $label }}</td>
                                        <td>{{ $data[$index] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">
                      Laporan Proses Order
                    </div>
                    <div class="card-body">
                        <div class="pie-chart-container mt-4">
                            <canvas id="pieChart"></canvas>
                        </div>
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>Order Status</th>
                                    <th>Number of Orders</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statusLabels as $index => $statusLabel)
                                    <tr>
                                        <td>{{ $statusLabel }}</td>
                                        <td>{{ $statusData[$index] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header">
                      Laporan Order Berdasarkan Kategori
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th>Order Category</th>
                                    <th>Number of Orders</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>WF Orders</td>
                                    <td>{{ $wfCount }}</td>
                                </tr>
                                <tr>
                                    <td>MDC Orders</td>
                                    <td>{{ $mdcCount }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
</div>
@endsection

@section('styles')
<style>
    .pie-chart-container {
        width: 150px;
        height: 150px;
        margin: 0 auto; /* Center the div */
    }
    .pie-chart-container canvas {
        width: 100% !important;
        height: 100% !important;
    }
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctxLine = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Jumlah Order',
                    data: {!! json_encode($data) !!},
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Day of the Month'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Value'
                        },
                        ticks: {
                            callback: function(value) {
                                if (value === 20 || value === 40 || value === 60 || value === 80 || value === 100) {
                                    return value;
                                }
                                return null;
                            },
                            stepSize: 20,
                        }
                    }
                }
            }
        });

        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: {!! json_encode($statusLabels) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode($statusData) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });
    });
</script>
@endsection
