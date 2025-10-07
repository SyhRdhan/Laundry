@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fw-bold mb-1" style="font-size: 2.5rem; color: var(--text-primary);">Dashboard</h1>
            <p class="text-muted mb-0" style="font-size: 1.1rem;">Analitik real-time & aksi instan untuk operasional laundry.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-3d btn-primary" data-bs-toggle="modal" data-bs-target="#quick-action-modal" aria-label="Aksi Cepat">
                <i class="fas fa-bolt me-1"></i>Aksi
            </button>
        </div>
    </div>
</div>

<!-- Statistik Cards Neumorphism -->
<div class="row mb-5 g-4">
    <div class="col-md-3">
        <div class="card neum-card text-center p-4 position-relative overflow-hidden" data-tooltip="Total pelanggan aktif">
            <div class="card-body">
                <i class="fas fa-users fa-3x mb-3" style="color: var(--accent-blue);"></i>
                <h3 class="mb-1 fw-bold" style="font-size: 2rem; color: var(--text-primary);">{{ \App\Models\Customer::count() ?? 0 }}</h3>
                <p class="text-muted mb-0" style="font-size: 0.9rem;">Pelanggan Aktif</p>
            </div>
            <div class="neum-glow"></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card neum-card text-center p-4 position-relative overflow-hidden" data-tooltip="Pesanan bulan ini" style="background: var(--gradient-green);">
            <div class="card-body">
                <i class="fas fa-shopping-bag fa-3x mb-3" style="color: white;"></i>
                <h3 class="mb-1 fw-bold" style="font-size: 2rem; color: white;">{{ \App\Models\Order::whereMonth('created_at', now()->month)->count() ?? 0 }}</h3>
                <p class="text-light mb-0" style="font-size: 0.9rem;">Pesanan Bulan Ini</p>
            </div>
            <div class="neum-glow"></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card neum-card text-center p-4 position-relative overflow-hidden" data-tooltip="Pendapatan YTD" style="background: var(--gradient-yellow);">
            <div class="card-body">
                <i class="fas fa-chart-bar fa-3x mb-3" style="color: white;"></i>
                <h3 class="mb-1 fw-bold" style="font-size: 2rem; color: white;">Rp {{ number_format(\App\Models\Order::sum('total_price') ?? 0, 0, ',', '.') }}</h3>
                <p class="text-light mb-0" style="font-size: 0.9rem;">Pendapatan Tahunan</p>
            </div>
            <div class="neum-glow"></div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card neum-card text-center p-4 position-relative overflow-hidden" data-tooltip="Tingkat konversi" style="background: var(--gradient-purple);">
            <div class="card-body">
                <i class="fas fa-percentage fa-3x mb-3" style="color: white;"></i>
                <h3 class="mb-1 fw-bold" style="font-size: 2rem; color: white;">{{ \App\Models\Order::where('status', 'completed')->count() / max(\App\Models\Order::count(), 1) * 100 ?? 0 }}%</h3>
                <p class="text-light mb-0" style="font-size: 0.9rem;">Konversi Selesai</p>
            </div>
            <div class="neum-glow"></div>
        </div>
    </div>
</div>

<!-- Chart Interaktif Modern -->
<div class="row mb-5">
    <div class="col-12">
        <div class="card neum-card shadow-lg">
            <div class="card-header border-0">
                <h5 class="mb-0 fw-bold"><i class="fas fa-chart-area me-2" style="color: var(--accent-blue);"></i>Tren Pendapatan & Pesanan (2025)</h5>
            </div>
            <div class="card-body">
                <canvas id="analyticsChart" height="80"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Actionable Insights Panel -->
<div class="row g-4">
    <div class="col-md-6">
        <div class="card neum-card p-4">
            <h6 class="fw-bold mb-3" style="color: var(--text-primary);">Rekomendasi Aksi</h6>
            <ul class="list-unstyled">
                <li class="mb-3 p-3 rounded" style="background: rgba(0,123,255,0.05); border-left: 4px solid var(--accent-blue);">
                    <i class="fas fa-lightbulb me-2 text-primary"></i>
                    <strong>Promosi Dry Clean</strong>: 20% pelanggan memilih layanan ini. Kirim email promo.
                    <a href="#" class="btn btn-sm btn-link p-0 ms-2">Kirim Sekarang</a>
                </li>
                <li class="mb-3 p-3 rounded" style="background: rgba(40,167,69,0.05); border-left: 4px solid var(--accent-green);">
                    <i class="fas fa-truck me-2 text-success"></i>
                    <strong>Pengiriman Cepat</strong>: 5 pesanan tertunda >3 hari. Prioritaskan pengiriman.
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-link p-0 ms-2">Lihat</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card neum-card p-4">
            <h6 class="fw-bold mb-3" style="color: var(--text-primary);">Ringkasan Mingguan</h6>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-muted">Pendapatan Minggu Ini</span>
                <span class="fw-bold" style="color: var(--accent-green);">+15%</span>
            </div>
            <div class="progress" style="height: 8px; border-radius: 10px;">
                <div class="progress-bar bg-success" style="width: 65%;"></div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <span class="text-muted">Pelanggan Baru</span>
                <span class="fw-bold" style="color: var(--accent-blue);">+8</span>
            </div>
            <div class="progress" style="height: 8px; border-radius: 10px;">
                <div class="progress-bar bg-primary" style="width: 40%;"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chart Interaktif dengan Zoom
    const ctx = document.getElementById('analyticsChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
                datasets: [
                    {
                        label: 'Pendapatan (Rp)',
                        data: [120000, 190000, 30000, 50000, 20000, 30000, 450000],
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        yAxisID: 'y'
                    },
                    {
                        label: 'Pesanan',
                        data: [12, 19, 3, 5, 2, 3, 8],
                        borderColor: 'rgb(25, 135, 84)',
                        backgroundColor: 'rgba(25, 135, 84, 0.1)',
                        tension: 0.4,
                        yAxisID: 'y1'
                    }
                ]
            },
            options: {
                responsive: true,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: { position: 'top' },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleColor: 'white',
                        bodyColor: 'white',
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.parsed.y.toLocaleString();
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        beginAtZero: true,
                        title: { display: true, text: 'Pendapatan (Rp)' }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        beginAtZero: true,
                        grid: { drawOnChartArea: false },
                        title: { display: true, text: 'Pesanan' }
                    }
                }
            }
        });
    }

    // Micro-Interactions for Cards
    document.querySelectorAll('.neum-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) rotateX(5deg)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) rotateX(0deg)';
        });
    });
});
</script>
@endpush