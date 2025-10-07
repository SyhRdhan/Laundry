@extends('layouts.app')

@section('content')
<x-slot name="header">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Manajemen Pesanan</h1>
        <a href="{{ route('admin.orders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Pesanan
        </a>
    </div>
</x-slot>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Daftar Semua Pesanan</h5>
        <form action="" method="GET" class="w-25">
            <input type="search" name="search" class="form-control" placeholder="Cari pesanan...">
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-0">
            <thead>
                <tr>
                    <th class="ps-4">ID Pesanan</th>
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
                    <td class="ps-4 align-middle fw-medium">#{{ $order->id }}</td>
                    <td class="align-middle">{{ $order->customer->name ?? 'N/A' }}</td>
                    <td class="align-middle">{{ $order->service->name ?? 'N/A' }}</td>
                    <td class="align-middle">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td class="align-middle text-secondary">{{ $order->created_at->format('d F Y') }}</td>
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
                        <a href="{{ route('admin.orders.edit', $order) }}" class="btn btn-light btn-sm me-1" title="Edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.orders.destroy', $order) }}" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus pesanan ini?')">
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
                        <i class="fas fa-box-open fa-2x mb-2"></i>
                        <p>Belum ada data pesanan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection