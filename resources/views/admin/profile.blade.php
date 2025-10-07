@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-user-circle me-2"></i>Profile Settings</h4>
                </div>
                <div class="card-body">
                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>Profile berhasil diperbarui!
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PATCH')

                        <!-- Username Field -->
                        <div class="mb-3">
                            <label for="username" class="form-label fw-bold">
                                <i class="fas fa-user me-1"></i>Username
                            </label>
                            <input type="text" 
                                   class="form-control @error('username') is-invalid @enderror" 
                                   id="username" 
                                   name="username" 
                                   value="{{ old('username', Auth::user()->username) }}" 
                                   required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">
                                <i class="fas fa-envelope me-1"></i>Email
                            </label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', Auth::user()->email) }}" 
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Password Section (Optional) -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0"><i class="fas fa-lock me-2"></i>Ubah Password</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">
                        <i class="fas fa-info-circle me-1"></i>
                        Untuk mengubah password, silakan hubungi administrator sistem.
                    </p>
                    <button class="btn btn-outline-warning" disabled>
                        <i class="fas fa-key me-1"></i>Ubah Password
                    </button>
                </div>
            </div>

            <!-- User Information -->
            <div class="card shadow-sm mt-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Informasi Akun</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <strong><i class="fas fa-calendar-plus me-1"></i>Akun Dibuat:</strong><br>
                            <span class="text-muted">{{ Auth::user()->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div class="col-md-6 mb-2">
                            <strong><i class="fas fa-calendar-check me-1"></i>Terakhir Diupdate:</strong><br>
                            <s  pan class="text-muted">{{ Auth::user()->updated_at->format('d M Y, H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection