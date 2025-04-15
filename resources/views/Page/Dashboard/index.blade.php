@extends('template')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- Contoh tampilan untuk Petugas --}}
                    <h3>Selamat Datang, Petugas Contoh</h3>
                    <div class="card d-block m-auto text-center">
                        <div class="card-header">
                            Total Penjualan Hari Ini
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">15</h3>
                            <p class="card-text">Jumlah total penjualan yang terjadi hari ini.</p>
                        </div>
                        <div class="card-footer text-muted">
                            Terakhir diperbarui: 2025-04-14
                        </div>
                    </div>

                    {{-- Contoh tampilan untuk Administrator --}}
                    
                    <h3>Selamat Datang, Administrator!</h3>
                    <div class="row">
                        <div class="col-8">
                            <canvas id="myChart" width="384" height="192"></canvas>
                        </div>
                        <div class="col-4">
                            <canvas id="myChart2" width="192" height="192"></canvas>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data statis
        const date = ['2025-04-10', '2025-04-11', '2025-04-12', '2025-04-13', '2025-04-14'];
        const count = [5, 8, 12, 7, 15];

        const product = ['Produk A', 'Produk B', 'Produk C', 'Produk D'];
        const productCount = [10, 20, 5, 8];

        // Bar chart (jumlah penjualan per hari)
        const ctx = document.getElementById('myChart')?.getContext('2d');
        if (ctx) {
            const salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: date,
                    datasets: [{
                        label: 'Jumlah Penjualan',
                        data: count,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Pie chart (distribusi penjualan produk)
        const ctx2 = document.getElementById('myChart2')?.getContext('2d');
        if (ctx2) {
            const productChart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: product,
                    datasets: [{
                        label: 'Persentase Penjualan Produk',
                        data: productCount,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Persentase Penjualan Produk'
                        }
                    }
                }
            });
        }
    </script>
@endsection
