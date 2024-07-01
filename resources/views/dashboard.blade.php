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
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                  <div class="card text-center m-4 mb-4">
                    <div class="card-header">
                      Laporan Order Bulanan
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
                    </div>
                    <div class="card-header">
                      Laporan Proses Order
                    </div>
                    <div class="card-body">
                        <div class="pie-chart-container mt-4">
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                    <!-- Custom tabs (Charts with tabs)-->
                    
                </div>
            </div>
        </section>
        <!-- /.Left col -->
        <section class="col-lg-12 connectedSortable">

        </section>
    </div>
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
                labels: Array.from({ length: 30 }, (_, i) => i + 1), // Labels for 30 days
                datasets: [{
                    label: 'Jumlah Order',
                    data: Array.from({ length: 30 }, () => Math.floor(Math.random() * 100)), // Random data for example
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
                                // Only show these specific tick values
                                if (value === 20 || value === 40 || value === 60 || value === 80 || value === 100) {
                                    return value;
                                }
                                return null; // Hide other tick values
                            },
                            stepSize: 20, // Ensure the step size is set to 20 for consistent tick intervals
                        }
                    }
                }
            }
        });

        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Not Started', 'Pending', 'Finish'],
                datasets: [{
                    label: 'Jumlah',
                    data: [50, 25, 30],
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
