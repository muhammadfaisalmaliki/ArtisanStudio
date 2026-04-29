@extends('layouts.app')

@section('content')
<style>
    @import url('https://googleapis.com');

    .organization-wrapper {
        position: relative;
        width: 100%;
        height: 100vh;
        background: #fcfcfc;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* --- BACKGROUND LIQUID ELEMENTS (GELEMBUNG) --- */
    .blob {
        position: absolute;
        background: #122953;
        filter: blur(2px);
        z-index: 1;
        animation: morphing 15s infinite alternate ease-in-out;
        opacity: 0.95;
    }

    /* Gelembung Utama (Kanan Atas) */
    .blob-1 {
        width: 800px;
        height: 800px;
        top: -200px;
        right: -150px;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        background: #122953;
    }

    /* Gelembung Menengah (Kiri Bawah) */
    .blob-2 {
        width: 500px;
        height: 500px;
        bottom: -100px;
        left: -100px;
        border-radius: 50% 50% 20% 80% / 25% 80% 20% 75%;
        background: #122953;
        animation-delay: -5s;
    }

    /* Gelembung Kecil/Aksen (Tengah Bawah) */
    .blob-3 {
        width: 300px;
        height: 300px;
        bottom: 50px;
        right: 15%;
        border-radius: 80% 20% 50% 50% / 50% 50% 20% 80%;
        background: #F6D64A; /* Warna aksen kuning */
        opacity: 0.6;
        animation-duration: 10s;
    }

    @keyframes morphing {
        0% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; transform: rotate(0deg) scale(1); }
        50% { border-radius: 50% 50% 20% 80% / 25% 80% 20% 75%; transform: rotate(5deg) scale(1.05); }
        100% { border-radius: 80% 20% 50% 50% / 50% 50% 20% 80%; transform: rotate(-5deg) scale(0.95); }
    }

    /* --- KARTU ANGGOTA (ORBIT) --- */
    .circle-container {
        position: relative;
        width: 1px;
        height: 1px;
        z-index: 10; /* Di atas gelembung */
    }

    .member-node {
        position: absolute;
        width: 150px;
        text-align: center;
        transform: translate(-50%, -50%);
        transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .photo-box {
        width: 100%;
        aspect-ratio: 1/1;
        overflow: hidden;
        border-radius: 30px;
        background: #fff;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border: 4px solid white;
        transition: all 0.4s ease;
    }

    .photo-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    /* Hover Effect: "Mental" menjauh dari pusat */
    .member-node:not(.boss):hover {
        z-index: 100;
        transform: translate(calc(-50% + var(--move-x)), calc(-50% + var(--move-y))) scale(1.3);
    }

    .member-node.boss:hover {
        z-index: 100;
        transform: translate(-50%, -50%) scale(1.1);
    }

    .member-node:hover .photo-box {
        box-shadow: 0 20px 50px rgba(246, 214, 74, 0.5);
        border-color: #F6D64A;
    }

    .member-node:hover img { transform: scale(1.3); }

    .label { margin-top: 12px; }
    .name { font-weight: 900; color: #122953; font-size: 0.8rem; margin: 0; text-transform: uppercase; letter-spacing: 0.5px; }
    .role { color: #F6D64A; font-size: 0.6rem; font-weight: 800; text-transform: uppercase; display: block; margin-top: 3px; }

    /* Custom styling for Boss agar tetap kontras di atas gelembung */
    .member-node.boss .name { color: #fff; font-size: 1.8rem; text-shadow: 0 2px 10px rgba(0,0,0,0.2); }
    .member-node.boss .role { font-size: 1rem; color: #F6D64A; }

</style>

<div class="organization-wrapper">
    <!-- Gelembung-gelembung Cair (Liquid) -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>

    <div class="circle-container">
        <!-- PUSAT: PRESIDENT DIRECTOR -->
        <div class="member-node boss" style="width: 320px;">
            <div class="photo-box" style="border-radius: 50px; border: 8px solid white;">
                <img src="{{ asset('img/nadya.jpeg') }}" alt="President">
            </div>
            <div class="label">
                <h2 class="name">Nadiya Keysha</h2>
                <span class="role">President Director</span>
            </div>
        </div>

        @php
            $staffs = [
                ['name' => 'Nadila Oktaviana', 'role' => 'Sekretaris', 'img' => 'nadila.jpeg'],
                ['name' => 'Alea Tania', 'role' => 'VP Finance', 'img' => 'lupa.jpeg'],
                ['name' => 'Syauqi Firdaus', 'role' => 'VP PR', 'img' => 'syauqi.jpeg'],
                ['name' => 'M. Faisal Maliki', 'role' => 'VP HR', 'img' => 'faisal.jpeg'],
                ['name' => 'Farrel Devandra', 'role' => 'VP COMERCIAL', 'img' => 'farrel.jpeg'],
                ['name' => 'Dhia Antar Satir', 'role' => 'VP PRODUCTION', 'img' => 'dhia.jpeg'],
                ['name' => 'Nasya Anggira', 'role' => 'QC', 'img' => 'nasya.jpeg'],
                ['name' => 'M. Priska Yamani', 'role' => 'R & D', 'img' => 'priska.jpeg'],
                ['name' => 'Muhamad Afriza', 'role' => 'HR DEPT', 'img' => 'afriza.jpeg'],
            ];
            $count = count($staffs);
            $radiusX = 580; 
            $radiusY = 320; 
            $pushOut = 80; 
        @endphp

        @foreach($staffs as $index => $s)
            @php
                $angle = ($index * (360 / $count)) - 90;
                $radian = deg2rad($angle);
                $posX = $radiusX * cos($radian);
                $posY = $radiusY * sin($radian);
                $moveX = $pushOut * cos($radian);
                $moveY = $pushOut * sin($radian);
            @endphp
            <div class="member-node" 
                 style="left: {{ $posX }}px; top: {{ $posY }}px; --move-x: {{ $moveX }}px; --move-y: {{ $moveY }}px;">
                <div class="photo-box">
                    <img src="{{ asset('img/' . $s['img']) }}" onerror="this.src='{{ asset('img/logo.png') }}'">
                </div>
                <div class="label">
                    <p class="name">{{ $s['name'] }}</p>
                    <span class="role">{{ $s['role'] }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
