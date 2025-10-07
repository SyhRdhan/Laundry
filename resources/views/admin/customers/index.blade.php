@extends('layouts.app')

@section('content')
<x-slot name="header">
    <h1 class="mb-0">Manajemen Pelanggan</h1>
    <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-1"></i> Tambah Pelanggan
    </a>
</x-slot>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Daftar Semua Pelanggan</h5>
        <form action="" method="GET" class="w-25">
            <input type="search" name="search" class="form-control" placeholder="Cari pelanggan...">
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-borderless mb-0">
            <thead>
                <tr>
                    <th class="ps-4">Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Bergabung Sejak</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $customer)
                <tr>
                    <td class="ps-4 align-middle fw-medium">{{ $customer->name }}</td>
                    <td class="align-middle">{{ $customer->email }}</td>
                    <td class="align-middle">{{ $customer->phone }}</td>
                    <td class="align-middle text-secondary">{{ $customer->created_at->format('d F Y') }}</td>
                    <td class="text-end pe-4 align-middle">
                        <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-light btn-sm me-1" title="Edit">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.customers.destroy', $customer) }}" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus pelanggan ini?')">
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
                    <td colspan="5" class="text-center text-secondary py-5">
                        <i class="fas fa-users-slash fa-2x mb-2"></i>
                        <p>Belum ada data pelanggan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection