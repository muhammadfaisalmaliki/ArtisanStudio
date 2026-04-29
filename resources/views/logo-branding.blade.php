@extends('layouts.app')

@section('content')
<style>
    @import url('https://googleapis.com');

    .logo-page-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh; /* Hampir memenuhi seluruh layar */
    }

    /* --- KARTU UTAMA (SKALA DIPERBESAR) --- */
    .philosophy-card {
        background: #ffffff;
        width: 100%;
        max-width: 1350px; /* Lebih lebar agar tidak terasa kecil */
        border-radius: 50px;
        display: grid;
        grid-template-columns: 1.1fr 1.4fr; /* Penyeimbangan proporsi */
        overflow: hidden;
        box-shadow: 0 40px 100px rgba(18, 41, 83, 0.12);
        border: 1px solid #f0f0f0;
    }

    /* --- SISI KIRI (VISUAL LOGO JAUH LEBIH BESAR) --- */
    .visual-section {
        background: #122953;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 100px 60px;
        position: relative;
    }

    .visual-section img {
        width: 100%;
        max-width: 420px; /* Ukuran logo dinaikkan drastis */
        z-index: 2;
        filter: drop-shadow(0 20px 50px rgba(0,0,0,0.4));
        transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .visual-section:hover img {
        transform: scale(1.08) rotate(-3deg);
    }

    /* Efek gelembung hiasan di background logo */
    .visual-section::after {
        content: '';
        position: absolute;
        width: 90%;
        height: 90%;
        background: rgba(246, 214, 74, 0.08);
        border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        z-index: 1;
        animation: slowRotate 20s infinite linear;
    }

    @keyframes slowRotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    /* --- SISI KANAN (TEKS DESKRIPSI LEBIH MANTAP) --- */
    .text-section {
        padding: 80px 8%; /* Spasi dalam lebih luas */
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .tag-title {
        color: #F6D64A;
        font-weight: 900;
        font-size: 1.1rem;
        letter-spacing: 6px;
        text-transform: uppercase;
        margin-bottom: 25px;
    }

    .text-section h1 {
        color: #122953;
        font-size: 5rem; /* Font Judul Sangat Besar */
        font-weight: 900;
        line-height: 0.9;
        margin: 0 0 35px 0;
        letter-spacing: -4px;
    }

    .text-section h1 span { color: #F6D64A; }

    .desc-text {
        color: #444;
        font-size: 1.3rem; /* Teks deskripsi lebih besar dan nyaman dibaca */
        line-height: 1.8;
        margin-bottom: 45px;
    }

    /* Box Filosofi yang lebih mencolok */
    .meaning-highlight {
        background: #fdfae6;
        padding: 40px;
        border-radius: 30px;
        border-left: 10px solid #F6D64A;
        display: flex;
        gap: 25px;
        align-items: center;
    }

    .meaning-highlight .icon {
        font-size: 3rem;
    }

    .meaning-highlight p {
        color: #122953;
        font-weight: 800;
        margin: 0;
        font-style: italic;
        font-size: 1.2rem;
        line-height: 1.6;
    }

    /* Responsif untuk layar menengah */
    @media (max-width: 1200px) {
        .text-section h1 { font-size: 4rem; }
        .visual-section img { max-width: 350px; }
    }

    /* Responsif untuk HP */
    @media (max-width: 992px) {
        .philosophy-card { grid-template-columns: 1fr; }
        .text-section { padding: 60px 40px; }
        .visual-section { padding: 80px 40px; }
    }
</style>

<div class="logo-page-wrapper">
    <div class="philosophy-card">
        
        <!-- Sisi Kiri: Spotlight Logo -->
        <div class="visual-section">
            <img src="{{ asset('img/artikanlogo.png') }}" alt="Artikan Studio Logo">
        </div>

        <!-- Sisi Kanan: Filosofi & Narasi -->
        <div class="text-section">
            <div class="tag-title">Our Identity</div>
            <h1>LOGO<span>.</span><br>BRANDING</h1>
            
            <p class="desc-text">
                Logo kami dikembangkan dari inisial <b>"A"</b> yang melambangkan kekuatan fondasi dan puncak kreativitas. 
                Desain geometris yang tegas mencerminkan standar profesionalisme tinggi <b>Artikan Studio</b> dalam setiap pengerjaan proyek visual.
            </p>

            <div class="meaning-highlight">
                <p>
                    "Simbol mata di tengah logo merepresentasikan visi tajam kami untuk menghasilkan karya yang tidak hanya estetik, namun memiliki jiwa dan makna yang mendalam."
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
