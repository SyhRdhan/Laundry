@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Tambah Pesanan Baru</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.orders.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Pelanggan</label>
                        <select id="customer_id" class="form-select @error('customer_id') is-invalid @enderror" name="customer_id" required>
                            <option value="">Pilih Pelanggan</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                            @endforeach
                        </select>
                        @error('customer_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="service_id" class="form-label">Layanan</label>
                        <select id="service_id" class="form-select @error('service_id') is-invalid @enderror" name="service_id" required>
                            <option value="">Pilih Layanan</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->name }} (Rp {{ number_format($service->price, 0, ',', '.') }})</option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Kuantitas</label>
                        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', 1) }}" min="1" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pickup_date" class="form-label">Tanggal Ambil</label>
                        <input id="pickup_date" type="date" class="form-control @error('pickup_date') is-invalid @enderror" name="pickup_date" value="{{ old('pickup_date') }}" required>
                        @error('pickup_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Catatan (Opsional)</label>
                        <textarea id="notes" class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3" placeholder="Catatan tambahan...">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save me-1"></i>Buat Pesanan
                        </button>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection