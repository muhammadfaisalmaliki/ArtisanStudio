<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikan Studio</title>
    
    <!-- Link Font yang Benar (WAJIB) -->
    <link href="https://googleapis.com" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/svg+xml" href="https://svgshare.com/i/14vG.svg">

    <style>
        :root {
            --navy: #122953;
            --yellow: #F6D64A;
        }

        body {
            background: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* --- SLIM & LONG FLOATING NAVBAR --- */
        .artikan-navbar {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 96%; /* MEMANJANG KE SAMPING */
            max-width: 1500px;
            height: 68px; /* KEMBALI SLIM (KECIL) */
            background: rgba(18, 41, 83, 0.9);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 100px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 40px;
            z-index: 9999;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        /* Gelembung Hiasan di Navbar */
        .artikan-navbar::after {
            content: '';
            position: absolute;
            top: -15px;
            right: -15px;
            width: 70px;
            height: 70px;
            background: rgba(246, 214, 74, 0.15);
            border-radius: 50%;
            z-index: -1;
        }

        .nav-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #fff;
            font-weight: 900;
            font-size: 1.2rem;
            letter-spacing: -0.5px;
        }

        .nav-logo span { color: var(--yellow); }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 8px;
            margin: 0;
            padding: 0;
        }

        .nav-links li a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 10px 16px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: 0.3s ease;
        }

        .nav-links li a:hover, .nav-links li a.active {
            background: var(--yellow);
            color: var(--navy);
        }

        /* --- BACKGROUND DEKORASI --- */
        .layout-blob {
            position: fixed;
            z-index: -1;
            filter: blur(100px);
            opacity: 0.3;
            animation: moveBlobs 25s infinite alternate ease-in-out;
        }
        .blob-1 { width: 500px; height: 500px; background: var(--yellow); top: -100px; left: -100px; border-radius: 50%; }
        .blob-2 { width: 600px; height: 600px; background: var(--navy); bottom: -150px; right: -100px; border-radius: 50%; }

        @keyframes moveBlobs {
            0% { transform: translate(0, 0); }
            100% { transform: translate(100px, 50px); }
        }

        .main-wrapper {
            padding-top: 110px; /* Jarak aman agar konten tidak tertutup */
            min-height: 100vh;
        }

        @media (max-width: 1024px) {
            .nav-links { display: none; }
            .artikan-navbar { width: 94%; padding: 0 25px; }
        }
    </style>
    @yield('head')
</head>
<body>

    <div class="layout-blob blob-1"></div>
    <div class="layout-blob blob-2"></div>

    <nav class="artikan-navbar">
        <a href="/" class="nav-logo">
            <!-- Tempat Foto Logo Nanti -->
            <img src="{{ asset('img/removebg.png') }}" alt="Logo" height="30" onerror="this.style.display='none'">
            ARTIKAN<span>STUDIO</span>
        </a>

        <ul class="nav-links">
            <li><a href="/produk" class="{{ Request::is('produk*') ? 'active' : '' }}">Produk</a></li>
            <li><a href="/anggota" class="{{ Request::is('anggota*') ? 'active' : '' }}">Anggota</a></li>
            <li><a href="/visi-misi" class="{{ Request::is('visi-misi*') ? 'active' : '' }}">Visi Misi</a></li>
            <li><a href="/prinsip" class="{{ Request::is('prinsip*') ? 'active' : '' }}">Prinsip</a></li>
            <li><a href="/logo-branding" class="{{ Request::is('logo-branding*') ? 'active' : '' }}">Logo</a></li>
            <li><a href="/kontak" class="{{ Request::is('kontak*') ? 'active' : '' }}">Kontak</a></li>
        </ul>

        <div style="color: white; font-size: 0.75rem; font-weight: 700; opacity: 0.4; letter-spacing: 1px;" class="d-none d-lg-block">
            EST. 2026
        </div>
    </nav>

    <div class="main-wrapper">
        @yield('content')
    </div>

</body>
</html>
