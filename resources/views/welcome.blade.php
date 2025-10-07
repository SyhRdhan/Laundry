<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>So Clean Laundry Express - Solusi Laundry Modern Anda</title>

    {{-- Tautan Font, Ikon, dan Animasi --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    
    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Aset Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <i class="fas fa-tshirt me-2"></i>So Clean Express
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#hero">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#why-us">Keunggulan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">Testimoni</a></li>
                </ul>
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2 rounded-pill px-4">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary rounded-pill px-4">Daftar</a>
                </div>
            </div>
        </div>
    </nav>

    <header id="hero" class="hero-section text-center text-md-start">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="hero-title animate__animated animate__fadeInLeft">Kesegaran & Kebersihan Profesional di Ujung Jari Anda</h1>
                    <p class="hero-subtitle animate__animated animate__fadeInLeft animate__delay-1s">Biarkan kami yang mengurus cucian Anda. Nikmati layanan laundry premium dengan penjemputan dan pengantaran tepat waktu.</p>
                    <a href="{{ route('register') }}" class="btn btn-lg btn-primary rounded-pill px-5 py-3 fw-bold animate__animated animate__fadeInUp animate__delay-2s">
                        Pesan Sekarang <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    {{-- IMPROVED: Menambahkan alt text untuk aksesibilitas --}}
                    <img src="resources/views/laundry.jpg" class="hero-image" alt="Ilustrasi layanan laundry modern">
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="services" class="py-5">
            <div class="container">
                <h2 class="section-title">Layanan yang Kami Sediakan</h2>
                <div class="row g-4">
                    @foreach($services as $service)
                    <div class="col-md-4 d-flex">
                        <div class="card service-card glass-card flex-fill">
                            <div class="card-body text-center">
                                <div class="icon-wrapper mb-3">
                                    {{-- TRANSLATED: Mengubah kondisi ke Bahasa Indonesia --}}
                                    @if($service->name == 'Cuci & Lipat') <i class="fas fa-tshirt"></i>
                                    @elseif($service->name == 'Cuci Kering') <i class="fas fa-user-tie"></i>
                                    @else <i class="fas fa-water"></i>
                                    @endif
                                </div>
                                <h5 class="card-title fw-bold">{{ $service->name }}</h5>
                                <p class="card-text text-muted">{{ $service->description }}</p>
                                <p class="fw-bold h5 mt-3 text-primary">Rp{{ number_format($service->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="why-us" class="py-5 bg-white">
            <div class="container">
                <h2 class="section-title">Mengapa Memilih Kami?</h2>
                <div class="row g-4 text-center">
                    {{-- Konten ini sudah dalam Bahasa Indonesia --}}
                    <div class="col-md-3">
                        <div class="feature-box">
                            <i class="fas fa-shipping-fast feature-icon"></i>
                            <h5 class="fw-bold mt-3">Antar-Jemput Gratis</h5>
                            <p class="text-muted">Kami jemput dan antar laundry Anda tanpa biaya tambahan.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="feature-box">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <h5 class="fw-bold mt-3">Kualitas Terjamin</h5>
                            <p class="text-muted">Menggunakan deterjen premium yang aman untuk pakaian Anda.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="feature-box">
                            <i class="fas fa-stopwatch feature-icon"></i>
                            <h5 class="fw-bold mt-3">Proses Cepat</h5>
                            <p class="text-muted">Selesaikan laundry Anda lebih cepat dari yang Anda kira.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="feature-box">
                            <i class="fas fa-hand-holding-usd feature-icon"></i>
                            <h5 class="fw-bold mt-3">Harga Terjangkau</h5>
                            <p class="text-muted">Kualitas terbaik dengan harga yang bersahabat di kantong.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="testimonials" class="py-5">
            <div class="container">
                <h2 class="section-title">Apa Kata Pelanggan Kami</h2>
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                {{-- Konten ini sudah dalam Bahasa Indonesia --}}
                                <div class="carousel-item active">
                                    <p class="testimonial-text">"Pelayanannya cepat dan hasilnya wangi banget! Pakaian jadi seperti baru lagi. Pasti langganan di sini."</p>
                                    <h6 class="testimonial-author">Sarah Livia - Mahasiswa</h6>
                                </div>
                                <div class="carousel-item">
                                    <p class="testimonial-text">"Sangat membantu untuk saya yang sibuk kerja. Tinggal pesan online, cucian dijemput dan diantar bersih. Recommended!"</p>
                                    <h6 class="testimonial-author">Budi Santoso - Karyawan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cta-section text-center text-white">
            <div class="container">
                {{-- Konten ini sudah dalam Bahasa Indonesia --}}
                <h2 class="display-5 fw-bold">Siap untuk Pakaian Bersih Tanpa Repot?</h2>
                <p class="lead my-4">Daftar sekarang dan nikmati kemudahan mengelola laundry Anda secara online.</p>
                <a href="{{ route('register') }}" class="btn btn-lg btn-light rounded-pill px-5 py-3 fw-bold">
                    Buat Akun Gratis
                </a>
            </div>
        </section>
    </main>

    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container text-center text-md-start">
            <div class="row">
                <div class="col-md-4 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold">So Clean Express</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: var(--primary-color); height: 2px"/>
                    <p>Kami adalah solusi laundry modern yang menyediakan layanan cepat, bersih, dan profesional untuk memudahkan hidup Anda.</p>
                </div>
                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold">Tautan</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: var(--primary-color); height: 2px"/>
                    <p><a href="#services" class="text-white text-decoration-none">Layanan</a></p>
                    <p><a href="#why-us" class="text-white text-decoration-none">Keunggulan</a></p>
                </div>
                <div class="col-md-4 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold">Kontak</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: var(--primary-color); height: 2px"/>
                    <p><i class="fas fa-home me-3"></i> Medan, Sumatera Utara</p>   
                    <p><i class="fas fa-envelope me-3"></i> cs@soclean.com</p>
                    <p><i class="fas fa-phone me-3"></i> +62 812 3456 7890</p>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            {{-- TRANSLATED: Mengubah copyright text --}}
            © 2025 So Clean Laundry Express. Seluruh Hak Cipta.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>