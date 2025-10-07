<x-guest-layout>
    <x-slot name="header">
        <i class="fas fa-user-plus"></i>
        <h2 class="mb-1">Buat Akun Pelanggan</h2>
        <p class="small">Daftar untuk mulai menggunakan layanan kami.</p>
    </x-slot>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Kolom Nama --}}
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            </div>
            @error('name')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Kolom Email --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" />
            </div>
            @error('email')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
        
        {{-- Kolom Nomor Telepon --}}
        <div class="mb-3">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" value="{{ old('phone') }}" required autocomplete="tel" />
            </div>
            @error('phone')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Kolom Password --}}
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" />
            </div>
            @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Kolom Konfirmasi Password --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <div class="input-group">
                 <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-user-plus me-2"></i>Daftar
            </button>
        </div>
    </form>
    
    <div class="footer-text">
        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
    </div>
</x-guest-layout>