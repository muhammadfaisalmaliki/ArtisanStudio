@extends('layouts.app')

@section('content')
<style>
    @import url('https://googleapis.com');

    /* --- NAVBAR CUSTOM --- */
    .custom-nav {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 1000px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 15px 30px;
        border-radius: 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 1000;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .nav-links { display: flex; gap: 25px; }
    .nav-links a { 
        color: white; 
        text-decoration: none; 
        font-weight: 700; 
        font-size: 0.85rem; 
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.8;
        transition: 0.3s;
    }
    .nav-links a:hover { opacity: 1; color: #F6D64A; }

    /* --- WRAPPER UTAMA --- */
    .principles-wrapper {
        background: #122953;
        height: 100vh;
        width: 100%;
        font-family: 'Plus Jakarta Sans', sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    /* --- GELEMBUNG BACKGROUND DINAMIS --- */
    .bg-blob {
        position: absolute;
        background: rgba(246, 214, 74, 0.1);
        filter: blur(60px);
        z-index: 1;
        animation: move 10s infinite alternate;
    }
    .blob-big { width: 600px; height: 600px; top: -100px; right: -100px; border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; }
    .blob-small { width: 400px; height: 400px; bottom: -50px; left: -50px; background: rgba(18, 41, 83, 0.5); border: 2px solid #F6D64A; opacity: 0.2; }

    @keyframes move {
        from { transform: translate(0, 0) rotate(0deg); }
        to { transform: translate(50px, 100px) rotate(20deg); }
    }

    /* --- ISI KONTEN --- */
    .header-section { text-align: center; z-index: 10; margin-bottom: 40px; }
    .brand-logo { width: 220px; margin-bottom: 20px; border-radius: 50px 15px; }
    .main-title { color: #fff; font-size: 3.5rem; font-weight: 900; line-height: 1; margin: 0; }
    .main-title span { color: #F6D64A; }

    /* --- KARTU PRINSIP (FULL GELEMBUNG) --- */
    .blobs-container {
        display: flex;
        gap: 25px;
        z-index: 10;
    }

    .principle-card {
        width: 200px;
        height: 200px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 25px;
        text-align: center;
        transition: 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }

    /* Bentuk gelembung beda-beda */
    .b-1 { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
    .b-2 { border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%; }
    .b-3 { border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%; }
    .b-4 { border-radius: 70% 30% 50% 50% / 30% 30% 70% 70%; }

    .principle-card:hover {
        transform: scale(1.15) rotate(5deg);
        background: #F6D64A;
        border-radius: 50%; /* Jadi bulat sempurna pas dihover */
    }

    .principle-card span {
        color: #122953;
        font-weight: 900;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

</style>

<!-- NAVBAR BARU -->
<nav class="custom-nav">
    <div style="color: white; font-weight: 900; font-size: 1.2rem;">ARTIKAN<span style="color: #F6D64A;">.</span></div>
    <div class="nav-links">
        <a href="#">Produk</a>
        <a href="#">Anggota</a>
        <a href="#">Visi Misi</a>
        <a href="#">Prinsip</a>
        <a href="#">Kontak</a>
    </div>
</nav>

<div class="principles-wrapper">
    <!-- Gelembung Latar Belakang -->
    <div class="bg-blob blob-big"></div>
    <div class="bg-blob blob-small"></div>

    <div class="header-section">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="brand-logo">
        <h1 class="main-title">OUR <span>PRINSIP</span></h1>
        <p style="color: rgba(255,255,255,0.6); margin-top: 10px;">Nilai murni di balik setiap karya Artikan Studio.</p>
    </div>

    <div class="blobs-container">
        <div class="principle-card b-1">
            <span>Kualitas &<br>Kepuasan</span>
        </div>
        <div class="principle-card b-2">
            <span>Komitmen &<br>Profesional</span>
        </div>
        <div class="principle-card b-3">
            <span>Kreativitas &<br>Inovasi</span>
        </div>
        <div class="principle-card b-4">
            <span>Kolaborasi &<br>Sinergi</span>
        </div>
    </div>
</div>
@endsection
