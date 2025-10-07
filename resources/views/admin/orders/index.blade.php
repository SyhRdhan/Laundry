@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h2 fw-bold mb-0">Manajemen Pesanan</h1>
    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Pesanan
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-header bg-white border-0">
        <h5 class="card-title mb-0">Daftar Semua Pesanan</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">ID</th>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Total Harga</th>
                    <th>Tanggal Masuk</th>
                    <th>Status</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td class="ps-4 align-middle fw-bold">#{{ $order->id }}</td>
                    <td class="align-middle">{{ $order->customer->name ?? 'Pelanggan Dihapus' }}</td>
                    <td class="align-middle">{{ $order->service->name ?? 'Layanan Dihapus' }}</td>
                    <td class="align-middle">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td class="align-middle text-muted">{{ $order->created_at->format('d M Y') }}</td>
                    <td class="align-middle">
                        @php
                            $statusClass = [
                                'pending' => 'bg-warning text-dark',
                                'in_progress' => 'bg-info text-dark',
                                'completed' => 'bg-success text-white',
                                'cancelled' => 'bg-danger text-white'
                            ][$order->status] ?? 'bg-secondary text-white';
                        @endphp
                        <span class="badge {{ $statusClass }}">{{ ucwords(str_replace('_', ' ', $order->status)) }}</span>
                    </td>
                    <td class="text-end pe-4 align-middle">
                        <a href="{{-- route('admin.orders.edit', $order) --}}" class="btn btn-light btn-sm me-1" title="Edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form method="POST" action="{{-- route('admin.orders.destroy', $order) --}}" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus pesanan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-light text-danger btn-sm" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-secondary py-5">
                        <i class="fas fa-box-open fa-3x mb-3 text-muted"></i>
                        <p class="mb-0">Belum ada data pesanan.</p>
                        <small>Klik tombol "Tambah Pesanan" untuk membuat pesanan baru.</small>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection