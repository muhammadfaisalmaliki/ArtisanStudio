@extends('layouts.app')

@section('content')
<style>
    @import url('https://googleapis.com');

    .wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        display: flex;
        min-height: 100vh;
        background-color: #fff;
        overflow: hidden; /* Supaya lekukan air tidak bikin scroll horizontal */
    }

    /* SISI KIRI */
    .left-side {
        flex: 1;
        padding: 100px 80px;
        z-index: 2; /* Agar teks di atas lekukan air jika bertumpukan */
    }

    .title-brand {
        font-size: 5rem;
        font-weight: 800;
        line-height: 0.85;
        color: #122953;
        letter-spacing: -3px;
        margin-bottom: 25px;
    }

    .title-brand span {
        color: #F6D64A;
    }

    .btn-create {
        display: inline-block;
        background: #122953;
        color: #fff;
        padding: 16px 32px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 2px solid #122953;
    }

    .btn-create:hover {
        background: transparent;
        color: #122953;
        transform: scale(1.05);
    }

    /* LIST PRODUK */
    .product-list { margin-top: 80px; max-width: 500px; }
    .product-item {
        padding: 20px 0;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .product-info h4 { margin: 0; color: #122953; font-size: 1.2rem; }
    .product-info p { margin: 5px 0 0 0; color: #888; font-size: 0.9rem; }
    .action-links { display: flex; gap: 15px; }
    .link-edit { color: #122953; text-decoration: none; font-weight: 800; font-size: 0.75rem; text-transform: uppercase; }
    .link-delete { color: #ff4757; border: none; background: none; cursor: pointer; font-weight: 800; font-size: 0.75rem; text-transform: uppercase; }

    /* SISI KANAN: BENTUK AIR (LIQUID) */
    .right-side-container {
        flex: 1;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .liquid-shape {
        position: absolute;
        top: 50%;
        right: -10%; /* Biar agak keluar layar dikit biar stylish */
        transform: translateY(-50%);
        width: 120%;
        height: 90%;
        background: #122953;
        /* Ini adalah "Magic" nya: Bentuk organik air */
        border-radius: 40% 60% 40% 60% / 35% 29% 71% 65%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px;
        color: white;
        transition: all 1s ease-in-out;
        animation: morphing 8s infinite alternate-reverse; /* Biar bentuknya gerak pelan kayak air */
    }

    @keyframes morphing {
        0% { border-radius: 40% 60% 40% 60% / 35% 29% 71% 65%; }
        100% { border-radius: 60% 40% 60% 40% / 65% 71% 29% 35%; }
    }

    .info-content {
        max-width: 400px;
        position: relative;
    }

    .info-content h2 {
        color: #F6D64A;
        font-size: 1.8rem;
        margin-bottom: 10px;
    }

    .info-content p {
        font-weight: 300;
        line-height: 1.6;
        margin-bottom: 40px;
        font-size: 1rem;
        opacity: 0.9;
    }

    /* Notifikasi */
    .notif {
        position: fixed;
        top: 30px;
        left: 80px;
        background: #F6D64A;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 800;
        z-index: 10;
    }
</style>

<div class="wrapper">
    @if(session('success'))
        <div class="notif">Success: {{ session('success') }}</div>
    @endif

    <div class="left-side">
        <h1 class="title-brand">PRODUCT<span>&</span><br>LAYANAN</h1>
        <a href="{{ route('projects.index') }}" class="btn-create">See Our Projects</a>

        <div class="product-list">
            @foreach($produks as $produk)
                <div class="product-item">
                    <div class="product-info">
                        <h4>{{ $produk->nama }}</h4>
                        <p>{{ $produk->deskripsi }}</p>
                    </div>
                    <div class="action-links">
                        <a href="{{ route('produk.edit', $produk->id) }}" class="link-edit">Edit</a>
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="link-delete">Del</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="right-side-container">
        <!-- Bentuk Liquid yang Bergerak -->
        <div class="liquid-shape">
            <div class="info-content">
                <h2>JASA DESIGN GRAPHIC</h2>
                <p>Kami menawarkan layanan design grafis profesional untuk berbagai kebutuhan mulai dari logo, branding hingga kemasan produk.</p>
                
                <h2>JASA MOTION GRAPHIC</h2>
                <p>Layanan motion grafis profesional untuk branding, music video, iklan, dan ilustrasi dinamis.</p>
            </div>
        </div>
    </div>
</div>
@endsection
