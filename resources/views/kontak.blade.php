@extends('layouts.app')

@section('content')
<style>
    @import url('https://googleapis.com');

    .contact-container {
        font-family: 'Plus Jakarta Sans', sans-serif;
        max-width: 1300px;
        margin: 0 auto;
        padding: 60px 20px 100px 20px;
        display: grid;
        grid-template-columns: 1fr 1.2fr; /* Membagi Visual dan Informasi */
        gap: 80px;
        align-items: center;
        min-height: 85vh;
    }

    /* --- SISI KIRI (VISUAL LOGO) --- */
    .contact-visual {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Gelembung Cair Raksasa */
    .contact-visual::before {
        content: '';
        position: absolute;
        width: 110%;
        height: 110%;
        background: #122953;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        z-index: -1;
        animation: morphingBlob 10s infinite alternate ease-in-out;
        opacity: 0.95;
        box-shadow: 20px 20px 60px rgba(18, 41, 83, 0.15);
    }

    @keyframes morphingBlob {
        0% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; transform: rotate(0deg); }
        100% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; transform: rotate(5deg); }
    }

    .contact-visual img {
        width: 100%;
        max-width: 450px;
        filter: drop-shadow(0 20px 40px rgba(0,0,0,0.3));
        transition: 0.5s;
    }

    .contact-visual:hover img {
        transform: scale(1.05) translateY(-10px);
    }

    /* --- SISI KANAN (INFO KONTAK) --- */
    .contact-info-side h1 {
        font-size: 4.5rem;
        font-weight: 900;
        color: #122953;
        letter-spacing: -3px;
        margin-bottom: 15px;
        line-height: 0.9;
    }

    .contact-info-side h1 span { color: #F6D64A; }

    .address-text {
        font-size: 1.2rem;
        color: #64748b;
        font-weight: 600;
        line-height: 1.6;
        margin-bottom: 40px;
        border-left: 6px solid #F6D64A;
        padding-left: 20px;
    }

    /* KARTU KONTAK */
    .contact-cards-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .contact-item {
        background: white;
        padding: 20px 30px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        border: 1px solid #f1f5f9;
        transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-decoration: none;
    }

    .icon-circle {
        width: 50px;
        height: 50px;
        background: #fdfae6;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        transition: 0.3s;
    }

    .contact-item span.label {
        font-weight: 800;
        color: #122953;
        font-size: 1.05rem;
    }

    .contact-item:hover {
        transform: translateX(15px);
        background: #122953;
        border-color: #122953;
    }

    .contact-item:hover span.label { color: #fff; }
    .contact-item:hover .icon-circle { background: #F6D64A; transform: rotate(10deg); }

    /* Responsif */
    @media (max-width: 992px) {
        .contact-container { grid-template-columns: 1fr; text-align: center; }
        .address-text { border-left: none; padding-left: 0; }
        .contact-item { justify-content: center; }
        .contact-info-side h1 { font-size: 3.5rem; }
    }
</style>

<div class="contact-container">
    
    <!-- Kiri: Visual Logo Melayang -->
    <div class="contact-visual">
        <img src="{{ asset('img/removebg.png') }}" alt="Artikan Studio Logo">
    </div>

    <!-- Kanan: Informasi Kontak -->
    <div class="contact-info-side">
        <h1>Kontak <span>Kami</span></h1>
        
        <p class="address-text">
            Jl. Raya Wangun, RT.01/RW.06, Sindangsari,<br>
            Kec. Bogor Timur, Kota Bogor, Jawa Barat 16146
        </p>

        <div class="contact-cards-grid">
            <!-- Instagram -->
            <a href="https://instagram.com" target="_blank" class="contact-item">
                <div class="icon-circle">📸</div>
                <span class="label">@artikan_studio</span>
            </a>

            <!-- WhatsApp / Phone -->
            <div class="contact-item">
                <div class="icon-circle">📞</div>
                <span class="label">0853-5386-5064 | 0895-3234-35544</span>
            </div>

            <!-- Email -->
            <a href="mailto:artikanstudioo@gmail.com" class="contact-item">
                <div class="icon-circle">✉️</div>
                <span class="label">artikanstudioo@gmail.com</span>
            </a>
        </div>
    </div>

</div>
@endsection
