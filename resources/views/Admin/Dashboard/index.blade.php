@extends('layouts.MasterView')
@section('menu_dashboard', 'active')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-custom-2-800">
            <i class="fas fa-fw fa-tachometer-alt mr-1"></i>
            {{ $pageTitle }}
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-3 mb-30">
            <div class="card height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data" style="position: relative;">
                        <div class="p-3">
                            <img src="{{ asset('vendors/images/virus.png') }}" alt="">
                        </div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0">{{ $penyakit->count() }}</div>
                        <div class="weight-600 font-14">Data Penyakit</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data" style="position: relative;">
                        <div class="p-3">
                            <img src="{{ asset('vendors/images/gejala.png') }}" alt="">
                        </div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0"> {{ $gejala->count() }} </div>
                        <div class="weight-600 font-14">Data Gejala</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data" style="position: relative;">
                        <div class="p-3">
                            <img src="{{ asset('vendors/images/database.png') }}" alt="">
                        </div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0"> {{ $basisPengetahuan->count() }} </div>
                        <div class="weight-600 font-14">Data Basis Pengetahuan</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mb-30">
            <div class="card height-100-p widget-style1">
                <div class="d-flex flex-wrap align-items-center">
                    <div class="progress-data" style="position: relative;">
                        <div class="p-3">
                            <img src="{{ asset('vendors/images/diagnosa.png') }}" alt="">
                        </div>
                    </div>
                    <div class="widget-data">
                        <div class="h4 mb-0"> {{ $riwayat->count() }} </div>
                        <div class="weight-600 font-14">Data Diagnosa</div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div style="height:580px">

        <!-- Include the Chart.js library -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <div class="row">
            <div class="col-md-6">
                <div class="page-header"
                    style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <h4>Total Diagnosa</h4>
                    <div class="chart-container" style="position: relative; height:500px; width:500px">
                        <!-- Create a canvas element to render the chart -->
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-header"
                    style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <h4>Hasil Diagnosa Chart</h4>
                    <div class="chart-container" style="position: relative; height:500px; width:500px">
                        <!-- Create a canvas element to render the chart -->
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>



        <!-- Script to generate the pie chart -->
        <script>
            // Retrieve the chart data from the controller
            var chartData = @json($chartData);

            // Extract the penyakit and total_diagnosa values from the chart data
            var labels = chartData.map(item => item.penyakit);
            var data = chartData.map(item => item.total_diagnosa);

            // Generate the pie chart
            var ctx = document.getElementById('pieChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56',
                            '#4BC0C0',
                            '#9966FF',
                            '#FF9F40',
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56',
                            '#4BC0C0',
                            '#9966FF',
                            '#FF9F40',
                            '#FF6384',
                            '#36A2EB',
                            '#FFCE56'
                        ]
                    }]
                }
            });
        </script>

        <!-- Script to generate the bar chart -->
        <script>
            // Retrieve the chart data from the controller
            var chartData = @json($barChart);

            // Extract the diagnosa_date and total_diagnoses values from the chart data
            var labels = chartData.map(item => item.diagnosa_date);
            var data = chartData.map(item => item.total_diagnoses);

            // Generate the bar chart
            var ctx = document.getElementById('barChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Diagnoses',
                        data: data,
                        backgroundColor: '#36A2EB',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Total Diagnoses'
                            }
                        }
                    }
                }
            });
        </script>

    </div>
@endsection
