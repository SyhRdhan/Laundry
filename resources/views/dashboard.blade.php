@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h2 fw-bold mb-0">Dashboard</h1>
        <p class="text-muted">Ringkasan aktivitas laundry Anda.</p>
    </div>
    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Buat Pesanan
    </a>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-2">Pelanggan Aktif</p>
                <h3 class="fw-bold">{{ \App\Models\Customer::count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-2">Pesanan Dalam Proses</p>
                <h3 class="fw-bold">{{ \App\Models\Order::where('status', 'in_progress')->count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-2">Pesanan Selesai</p>
                <h3 class="fw-bold">{{ \App\Models\Order::where('status', 'completed')->count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-2">Total Pendapatan</p>
                <h3 class="fw-bold">Rp{{ number_format(\App\Models\Order::sum('total_price') ?? 0, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-title fw-bold mb-0">Pesanan Terbaru</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th class="ps-3">Pelanggan</th>
                        <th>Tanggal Masuk</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="text-end pe-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\Order::with('customer')->latest()->take(7)->get() as $order)
                    <tr>
                        <td class="ps-3 fw-medium">{{ $order->customer->name }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $statusClass = [
                                    'pending' => 'bg-warning text-dark',
                                    'in_progress' => 'bg-info text-dark',
                                    'completed' => 'bg-success text-white',
                                    'cancelled' => 'bg-danger text-white'
                                ][$order->status];
                            @endphp
                            <span class="badge {{ $statusClass }}">{{ str_replace('_', ' ', $order->status) }}</span>
                        </td>
                        <td class="text-end pe-3">
                            <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-sm btn-light">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-5">
                            Belum ada pesanan masuk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection