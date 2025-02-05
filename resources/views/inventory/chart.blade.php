@extends('layouts.app')

@section('title', 'Data Charts')

@section('content')
    <h2 class="text-center mb-4 fw-bold">Data Inventory Charts</h2>

    <div class="container">
        {{-- Statistik --}}
        <div class="row justify-content-center">
            <!-- Total Statistik -->
            <div class="col-lg-3 mb-4">
                <div class="card text-white bg-dark shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Barang di Gudang</h5>
                        <p class="fs-3 fw-bold">{{ $totalItems }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card text-white bg-primary shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori Tenant Name</h5>
                        <p class="fs-3 fw-bold">{{ $totalTenant }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4">
                <div class="card text-white bg-success shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori Hostname Edge</h5>
                        <p class="fs-3 fw-bold">{{ $totalHostname }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4">
                <div class="card text-white bg-secondary shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori Edge Type</h5>
                        <p class="fs-3 fw-bold">{{ $totalEdgeType }}</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <!-- Grafik Hostname Edge -->
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header text-center fw-bold">
                        Hostname Edge
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <canvas id="hostnameChart" style="max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Grafik Edge Type -->
            <div class="col-md-6 col-lg-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header text-center fw-bold">
                        Edge Type
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <canvas id="edgeTypeChart" style="max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Grafik Tenant Name -->
            <div class="col-lg mb-4">
                <div class="card shadow-sm">
                    <div class="card-header text-center fw-bold">
                        Tenant Name
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <canvas id="tenantChart" style="max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data Tenant Name
        var tenantLabels = @json($tenantCounts->pluck('tenant_name'));
        var tenantData = @json($tenantCounts->pluck('count'));

        // Data Hostname Edge
        var hostnameLabels = @json($hostnameCounts->pluck('hostname_edge'));
        var hostnameData = @json($hostnameCounts->pluck('count'));

        // Data Edge Type
        var edgeTypeLabels = @json($edgeTypeCounts->pluck('edge_type'));
        var edgeTypeData = @json($edgeTypeCounts->pluck('count'));

        // Fungsi membuat chart bar
        function createBarChart(ctx, labels, data) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false,
                            position: 'bottom'
                        }
                    },
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        }

        // Fungsi membuat chart pie
        function createPieChart(ctx, labels, data, title) {
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: title,
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    }
                }
            });
        }

        // chart Tenant Name
        createBarChart(document.getElementById('tenantChart'), tenantLabels, tenantData);

        // chart Hostname Edge
        createPieChart(document.getElementById('hostnameChart'), hostnameLabels, hostnameData, 'Total');

        // chart Edge Type
        createPieChart(document.getElementById('edgeTypeChart'), edgeTypeLabels, edgeTypeData, 'Total');

    </script>
@endsection
