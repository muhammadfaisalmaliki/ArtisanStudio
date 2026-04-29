@extends('layouts.app')

@section('content')
<style>
    @import url('https://googleapis.com');

    .vismis-split-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        display: flex;
        min-height: 100vh;
        width: 100%;
        background: transparent;
    }

    /* --- SISI KIRI (JUDUL STATIS) --- */
    .left-title-side {
        flex: 1;
        background: #122953;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 60px;
        position: sticky; /* Tetap di tempat saat kanan di-scroll */
        top: 0;
        height: 100vh;
        overflow: hidden;
    }

    /* Dekorasi gelembung di dalam sisi kiri */
    .left-title-side::before {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        background: rgba(246, 214, 74, 0.1);
        border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        top: -100px;
        left: -100px;
    }

    .left-title-side h1 {
        font-size: 5rem;
        font-weight: 900;
        line-height: 0.9;
        letter-spacing: -4px;
        margin: 0;
        position: relative;
        z-index: 2;
    }

    .left-title-side h1 span {
        color: #F6D64A;
        display: block;
    }

    .left-title-side p {
        font-size: 1.1rem;
        opacity: 0.7;
        margin-top: 20px;
        max-width: 300px;
    }

    /* --- SISI KANAN (KONTEN SCROLL) --- */
    .right-content-side {
        flex: 1.5;
        padding: 100px 80px;
        display: flex;
        flex-direction: column;
        gap: 80px;
    }

    .content-block h2 {
        font-size: 2.5rem;
        font-weight: 900;
        color: #122953;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .content-block h2::after {
        content: '';
        flex: 1;
        height: 2px;
        background: #F6D64A;
    }

    /* Gaya Teks Visi */
    .visi-text {
        font-size: 1.4rem;
        line-height: 1.6;
        color: #122953;
        font-weight: 300;
        border-left: 8px solid #F6D64A;
        padding-left: 30px;
    }

    /* Gaya Grid Misi */
    .misi-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .misi-box {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        border: 1px solid #f1f5f9;
        transition: 0.3s;
    }

    .misi-box:hover {
        transform: translateY(-10px);
        background: #122953;
        color: white;
    }

    .misi-box h3 {
        font-size: 1rem;
        font-weight: 800;
        margin-bottom: 10px;
        text-transform: uppercase;
        color: inherit;
    }

    .misi-box p {
        font-size: 0.85rem;
        opacity: 0.8;
        line-height: 1.5;
        color: inherit;
    }

    /* Responsive */
    @media (max-width: 1100px) {
        .vismis-split-wrapper { flex-direction: column; }
        .left-title-side { height: auto; padding: 100px 40px; position: relative; }
        .right-content-side { padding: 60px 40px; }
        .misi-grid { grid-template-columns: 1fr; }
    }
</style>

<div class="vismis-split-wrapper">
    <!-- KIRI: Judul yang Mengunci -->
    <div class="left-title-side">
        <h1>VISI<span>& MISI</span></h1>
        <p>Arah, nilai, dan tujuan utama Artikan Studio dalam berkarya.</p>
    </div>

    <!-- KANAN: Konten Detail -->
    <div class="right-content-side">
        
        <!-- Blok Visi -->
        <div class="content-block">
            <h2>OUR VISION</h2>
            <p class="visi-text">
                Menjadi gerbang eksplorasi kreatif terdepan yang menyediakan aset dan layanan motion grafis berkualitas tinggi serta inovatif bagi industri kreatif global.
            </p>
        </div>

        <!-- Blok Misi -->
        <div class="content-block">
            <h2>OUR MISSION</h2>
            <div class="misi-grid">
                <div class="misi-box">
                    <h3>Premium Quality</h3>
                    <p>Menyediakan aset 3D dan desain grafis kelas dunia yang fungsional.</p>
                </div>
                <div class="misi-box">
                    <h3>Innovation</h3>
                    <p>Memanfaatkan teknologi terbaru untuk hasil karya yang futuristik.</p>
                </div>
                <div class="misi-box">
                    <h3>Empowerment</h3>
                    <p>Mendukung komunitas desainer melalui aset siap pakai yang memudahkan produksi.</p>
                </div>
                <div class="misi-box">
                    <h3>Client First</h3>
                    <p>Memberikan solusi kustom dengan layanan responsif melampaui ekspektasi.</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
