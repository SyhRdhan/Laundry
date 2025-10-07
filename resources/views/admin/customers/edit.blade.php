@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Pelanggan</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.customers.update', $customer) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $customer->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $customer->email) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="tel" class="form-control" name="phone" value="{{ old('phone', $customer->phone) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="address" rows="3">{{ old('address', $customer->address) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i>Ubah</button>
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection