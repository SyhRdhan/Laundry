@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card glass-card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 fw-bold"><i class="fas fa-user-plus me-2"></i>Tambah Pelanggan Baru</h5>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.customers.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium">Nama Lengkap</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Masukkan nama pelanggan">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-medium">Alamat Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="contoh@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-medium">Nomor Telepon</label>
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="tel" placeholder="+62 812-3456-7890">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="address" class="form-label fw-medium">Alamat (Opsional)</label>
                        <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" rows="4" autocomplete="address" placeholder="Masukkan alamat lengkap pelanggan">{{ old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary fw-medium">
                            <i class="fas fa-save me-1"></i>Simpan Pelanggan
                        </button>
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-outline-secondary fw-medium">
                            <i class="fas fa-arrow-left me-1"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection