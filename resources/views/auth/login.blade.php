<x-guest-layout>
    <x-slot name="header">
        <i class="fas fa-tshirt"></i>
        <h2 class="mb-1">Selamat Datang Kembali</h2>
        <p class="small">Masuk ke Panel Admin Anda</p>
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success mb-4" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-envelope text-primary"></i></span>
                {{-- PERBAIKAN: Tambahkan class 'is-invalid' jika ada error --}}
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="cth: admin@email.com" />
            </div>
            {{-- PERBAIKAN: Ganti komponen <x-input-error> dengan @error Blade directive --}}
            @error('email')
                <div class="mt-2 text-danger small">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-lock text-primary"></i></span>
                {{-- PERBAIKAN: Tambahkan class 'is-invalid' jika ada error --}}
                <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi" />
            </div>
            @error('password')
                 <div class="mt-2 text-danger small">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label for="remember_me" class="form-check-label text-muted small">{{ __('Ingat saya') }}</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="small text-decoration-none text-primary fw-bold">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary fw-bold">
                <i class="fas fa-sign-in-alt me-2"></i>{{ __('Log In') }}
            </button>
        </div>
    </form>
    
    <div class="footer-text">
        <small>Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a></small>
    </div>
</x-guest-layout>