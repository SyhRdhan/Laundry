<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - So Clean Laundry Express</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --brand-1: #007bff;
            --brand-2: #28a745;
            --muted: #6c757d;
            --bg: linear-gradient(135deg, #e3f2fd 0%, #f0f8f0 100%);
            --card-radius: 20px;
        }
        html, body {
            height: 100%;
        }
        .guest-layout {
            font-family: 'Roboto', sans-serif;
            background: var(--bg);
            margin: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100vh;
        }
        .guest-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        .guest-inner {
            width: 100%;
            max-width: 980px;
            display: grid;
            grid-template-columns: 1fr 440px;
            gap: 3rem;
            align-items: center;
        }
        .hero {
            padding: 2.5rem;
            border-radius: var(--card-radius);
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
        .hero h1 { margin: 0 0 .5rem 0; font-size: 1.75rem; font-weight: 700; color: #0b2e4a; }
        .hero p { margin: 0; color: #4a5568; }
        .brand-mark { display: flex; align-items: center; gap: .75rem; }
        .brand-mark .icon-wrapper {
            font-size: 2rem;
            color: var(--brand-1);
            background: linear-gradient(135deg, rgba(0, 123, 255, 0.1), transparent);
            padding: .75rem;
            border-radius: 12px;
            line-height: 1;
        }
        .hero ul li { padding-bottom: .5rem; color: #4a5568; }

        .form-card {
            background: #ffffff;
            border-radius: var(--card-radius);
            box-shadow: 0 15px 40px rgba(2, 6, 23, 0.08);
            overflow: hidden;
        }
        .form-card .card-header {
            text-align: center;
            padding: 2rem 1.5rem;
            background: linear-gradient(135deg, var(--brand-1) 0%, var(--brand-2) 100%);
            color: white;
            border-bottom: none;
        }
        .form-card .card-header i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }
        .form-card .card-header h2 { margin: 0; font-weight: 700; font-size: 1.5rem; }
        .form-card .card-header p { margin: .25rem 0 0; opacity: .9; }

        .form-card .card-body { padding: 2.5rem; }
        .form-card .form-label { font-weight: 600; color: #333; margin-bottom: .5rem; }
        .form-card .input-group {
            border-radius: 999px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(2, 6, 23, 0.06);
            border: 1px solid #dee2e6;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-card .input-group:focus-within {
            border-color: var(--brand-1);
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.15);
        }
        .form-card .input-group-text { background: #fff; border: none; padding: 0 1.25rem; }
        .form-card .form-control { border: none; padding: .9rem 1rem; }
        .form-card .btn-primary {
            border-radius: 999px;
            font-weight: 600;
            padding: .9rem;
            background: linear-gradient(135deg, var(--brand-1), var(--brand-2));
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.25);
        }
        .form-card .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
        }

        .footer-text { margin-top: 1.5rem; text-align: center; color: var(--muted); font-size: .9rem; }
        .footer-text a { color: var(--brand-1); font-weight: 600; text-decoration: none; }
        .footer-text a:hover { text-decoration: underline; }

        @media (max-width: 900px) {
            .guest-inner { grid-template-columns: 1fr; max-width: 480px; gap: 2rem; }
            .hero { order: 2; text-align: center; }
            .brand-mark { justify-content: center; }
            .form-card { order: 1; }
            .form-card .card-body { padding: 2rem 1.5rem; }
        }
    </style>
</head>
<body class="guest-layout">
    <div class="guest-container">
        <div class="guest-inner">
            <div class="hero animate__animated animate__fadeIn" aria-hidden="true">
                <div class="brand-mark mb-3">
                    <div class="icon-wrapper"><i class="fas fa-tshirt"></i></div>
                    <div>
                        <h1>So Clean Laundry Express</h1>
                        <p class="small">Layanan Laundry Terpercaya di Binjai</p>
                    </div>
                </div>
                <p class="mb-3">Cepat, bersih, dan terpercaya. Kami membantu pelanggan mendapatkan pakaian rapi tanpa repot. Masuk untuk mengelola pesanan, layanan, dan pelanggan.</p>
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-check-circle text-success me-2"></i>Antar & jemput</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>Layanan express 24 jam</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>Harga transparan</li>
                </ul>
            </div>

            <div class="form-card animate__animated animate__fadeInUp" role="region" aria-label="Authentication form">
                @if (isset($header))
                    <div class="card-header">
                        {{ $header }}
                    </div>
                @endif
                
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>