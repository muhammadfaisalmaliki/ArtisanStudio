@extends('layouts.app')

@section('content')
<style>
    .project-wrapper {
        padding: 80px;
        font-family: 'Plus Jakarta Sans', sans-serif;
        position: relative;
        min-height: 100vh;
        background: #fff;
        overflow: hidden; /* Penting: menjaga gelembung raksasa tidak bikin scroll */
    }

    /* BACKGROUND GELEMBUNG RAKSASA & BERNYAWA */
    .bubbles-container {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        pointer-events: none;
        z-index: 1;
    }

    .bubble {
        position: absolute;
        /* Perpaduan Navy & Gold transparan */
        background: linear-gradient(135deg, rgba(18, 41, 83, 0.1), rgba(246, 214, 74, 0.15));
        border-radius: 50%;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        /* Efek kilauan kaca di dalam gelembung */
        box-shadow: inset -15px -15px 40px rgba(18, 41, 83, 0.05), 
                    inset 15px 15px 40px rgba(255, 255, 255, 0.6),
                    0 20px 50px rgba(18, 41, 83, 0.05);
        animation: organic-float 25s infinite ease-in-out;
        will-change: transform, border-radius;
    }

    /* Animasi Gerakan Cairan Organik */
    @keyframes organic-float {
        0%, 100% { 
            transform: translate(0, 0) rotate(0deg) scale(1); 
            border-radius: 50% 50% 50% 50% / 50% 50% 50% 50%;
        }
        33% { 
            transform: translate(100px, -150px) rotate(120deg) scale(1.1); 
            border-radius: 40% 60% 40% 60% / 35% 29% 71% 65%; /* Berubah bentuk tipis */
        }
        66% { 
            transform: translate(-80px, -300px) rotate(240deg) scale(0.95); 
            border-radius: 60% 40% 60% 40% / 65% 71% 29% 35%;
        }
    }

    /* HEADER & GRID */
    .header-content, .project-grid {
        position: relative;
        z-index: 5; /* Di atas gelembung */
    }

    .header-project h1 {
        font-size: 5rem;
        font-weight: 800;
        color: #122953;
        letter-spacing: -3px;
        margin-top: 10px;
    }

    .header-project h1 span { color: #F6D64A; }
    .header-project p { color: #888; font-size: 1.2rem; margin-bottom: 40px; }

    /* CARDS */
    .project-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 40px;
    }

    .project-card {
        border-radius: 30px;
        overflow: hidden;
        position: relative;
        height: 480px;
        background: #f8f9fa;
        box-shadow: 0 20px 40px rgba(18, 41, 83, 0.08);
        transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        cursor: pointer;
    }

    .project-card:hover {
        transform: scale(1.03) translateY(-20px);
        box-shadow: 0 40px 80px rgba(18, 41, 83, 0.2);
    }

    .project-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 1s ease;
    }

    .project-card:hover img { transform: scale(1.15); }

    .project-info {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        padding: 40px 30px;
        background: linear-gradient(to top, rgba(18, 41, 83, 0.98), transparent);
        color: white;
        transform: translateY(30px);
        transition: 0.5s;
    }

    .project-card:hover .project-info { transform: translateY(0); }
    .project-info h4 { font-size: 1.5rem; margin-bottom: 5px; }
    .project-info p { opacity: 0.8; font-weight: 300; font-size: 0.9rem; }

    /* ZOOM OVERLAY */
    .zoom-overlay {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(18, 41, 83, 0.97);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        cursor: zoom-out;
        backdrop-filter: blur(15px);
    }

    .zoom-overlay img {
        max-height: 85vh;
        max-width: 90vw;
        border-radius: 20px;
        transform: scale(0.8);
        transition: 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .zoom-overlay.active { display: flex; }
    .zoom-overlay.active img { transform: scale(1); }

    .btn-back {
        text-decoration: none;
        color: #122953;
        font-weight: 800;
        font-size: 0.75rem;
        letter-spacing: 2px;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: 0.3s;
    }
    .btn-back:hover { transform: translateX(-5px); color: #F6D64A; }
</style>

<div class="project-wrapper">
    <!-- GELEMBUNG RAKSASA -->
    <div class="bubbles-container">
        <!-- Gelembung Navy Raksasa Atas -->
        <div class="bubble" style="width: 600px; height: 600px; left: -200px; top: -100px; animation-duration: 30s;"></div>
        
        <!-- Gelembung Gold Tengah -->
        <div class="bubble" style="width: 450px; height: 450px; right: 10%; top: 20%; animation-duration: 35s; animation-delay: -5s; background: linear-gradient(135deg, rgba(246, 214, 74, 0.15), transparent);"></div>
        
        <!-- Gelembung Raksasa Bawah -->
        <div class="bubble" style="width: 550px; height: 550px; left: 20%; bottom: -200px; animation-duration: 28s; animation-delay: -2s;"></div>
        
        <!-- Gelembung Kecil Detail -->
        <div class="bubble" style="width: 200px; height: 200px; right: -50px; bottom: 100px; animation-duration: 20s;"></div>
    </div>

    <div class="header-content">
        <a href="{{ route('produk.index') }}" class="btn-back">
            <span>←</span> Back to Services
        </a>
        <div class="header-project">
            <h1>OUR PROJECTS<span>.</span></h1>
            <p>Showcasing our best visual creations and brand stories.</p>
        </div>
    </div>

    <div class="project-grid">
        <div class="project-card" onclick="openZoom('{{ asset('img/burger.jpeg') }}')">
            <img src="{{ asset('img/burger.jpeg') }}" alt="KFC Branding">
            <div class="project-info">
                <h4>Colonel Burger Branding</h4>
                <p>Identity • Graphic Design</p>
            </div>
        </div>

        <div class="project-card" onclick="openZoom('{{ asset('img/cola.jpeg') }}')">
            <img src="{{ asset('img/cola.jpeg') }}" alt="Coca Cola Ads">
            <div class="project-info">
                <h4>Coca Cola Motion Ads</h4>
                <p>Motion Graphic • Animation</p>
            </div>
        </div>

        <div class="project-card" onclick="openZoom('{{ asset('img/sepatu.jpeg') }}')">
            <img src="{{ asset('img/sepatu.jpeg') }}" alt="Adidas Concept">
            <div class="project-info">
                <h4>Adidas Future Concept</h4>
                <p>Product Shoot • Branding</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal Zoom -->
<div class="zoom-overlay" id="zoomOverlay" onclick="closeZoom()">
    <img src="" id="zoomedImg">
</div>

<script>
    function openZoom(src) {
        const overlay = document.getElementById('zoomOverlay');
        const img = document.getElementById('zoomedImg');
        img.src = src;
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeZoom() {
        document.getElementById('zoomOverlay').classList.remove('active');
        document.body.style.overflow = 'auto';
    }
</script>
@endsection
