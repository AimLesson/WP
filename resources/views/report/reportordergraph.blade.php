@extends('report.report')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Report Order Graph</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('report') }}">Report</a></li>
                            <li class="breadcrumb-item active">Report Order Graph</li>
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
                    <div class="col-lg-12">
                        <div class="card text-center m-4 mb-4">
                            
                            <div class="card-body">
                                <canvas id="lineChart"></canvas>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

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
        });

        // Fungsi untuk mengubah judul berdasarkan halaman
        function updateTitle(pageTitle) {
            document.title = pageTitle;
        }

        // Panggil fungsi ini saat halaman "barcode" dimuat
        updateTitle('Report Order Graph');
    </script>
@endsection
