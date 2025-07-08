@extends('layouts.app')

@section('title', 'Beranda - Lentera Studio')

@section('head')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Segoe UI", sans-serif;
            background-color: #1e2a50;
            color: #ffffff;
        }

        main {
            display: block;
        }

        /* HERO FULL BACKGROUND */
        .hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 3rem;
            background: url("{{ asset('Gallery/ggl.jpg') }}") center/cover no-repeat;
            color: white;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Overlay gelap */
            z-index: 1;
        }

        .hero-text {
            position: relative;
            z-index: 2;
            max-width: 700px;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 3rem;
            line-height: 1.2;
            color: #ffffff;
        }

        .hero-text h1 span {
            font-weight: 600;
            color: #8ea8ff;
        }

        .hero-text p {
            margin-top: 1rem;
            font-size: 1rem;
            color: #dce1f5;
        }

        .temp {
            margin-top: 1.2rem;
            font-size: 0.9rem;
            color: #dce1f5;
        }

        .gallery {
            padding: 2rem 0;
            background-color: #1e2a50;
        }

        .gallery-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 1.5rem 1.5rem 1.5rem;
        }

        .gallery-header h2 {
            font-size: 1.5rem;
            color: #ffffff;
        }

        .gallery-header a {
            text-decoration: none;
            font-size: 1rem;
            color: #ffffff;
        }

        .gallery-slider-wrapper {
            overflow: hidden;
            position: relative;
            padding: 0 1.5rem;
        }

        .gallery-slider {
            display: flex;
            width: max-content;
            animation: scrollGallery 40s linear infinite;
        }

        @keyframes scrollGallery {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .gallery-slider .card {
            min-width: 180px;
            margin-right: 1rem;
            border-radius: 12px;
            overflow: hidden;
        }

        .gallery-slider .card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 12px;
            transition: transform 0.4s ease;
        }

        .gallery-slider .card:hover img {
            transform: scale(1.05);
        }

        .paket-section {
            background: #1e2a50;
            padding: 2rem 1rem;
            text-align: center;
            color: #f0f4f8;
        }

        .paket-section h2 {
            font-size: 1.75rem;
            font-weight: bold;
            margin-bottom: 0.75rem;
        }

        .paket-section p {
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .hero {
                height: auto;
                padding: 2rem 1rem;
            }

            .hero-text h1 {
                font-size: 2rem;
            }

            .gallery-slider .card {
                min-width: 150px;
            }

            .gallery-slider-wrapper {
                padding: 0 1rem;
            }
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-text">
                <h1>LENTERA<br /><span>STUDIO FOTO</span></h1>
                <p>
                    Studio fotografi profesional dengan suasana hangat dan fasilitas yang
                    dirancang untuk kenyamanan Anda. Di Lentera Studio, setiap momen tak
                    hanya diabadikan, tapi diceritakan melalui lensa, penuh emosi, ekspresi,
                    dan makna.
                </p>
                <p class="temp">Paket: Reguler • Eksklusif • Premium</p>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="gallery">
            <div class="gallery-header">
                <h2>Explore Studio Lainnya</h2>
                <a href="{{ url('/kategori') }}">Lihat Semua →</a>
            </div>

            <div class="gallery-slider-wrapper">
                <div class="gallery-slider">
                    @for ($i = 0; $i < 2; $i++)
                        <div class="card"><img src="{{ asset('/gallery/foto1.jpg') }}" alt="1"></div>
                        <div class="card"><img src="{{ asset('/gallery/foto2.jpg') }}" alt="2"></div>
                        <div class="card"><img src="{{ asset('/gallery/foto3.jpg') }}" alt="3"></div>
                        <div class="card"><img src="{{ asset('/gallery/foto4.jpg') }}" alt="4"></div>
                        <div class="card"><img src="{{ asset('/gallery/foto5.jpg') }}" alt="5"></div>
                        <div class="card"><img src="{{ asset('/gallery/foto6.jpg') }}" alt="6"></div>
                    @endfor
                </div>
            </div>
        </section>

        <!-- Paket Section -->
        <section class="paket-section">
            <h2>Self Portrait and Graduation</h2>
            <p>
                Foto Wisuda • Pas Foto • Foto Keluarga • Foto Anak • Foto Pernikahan •
                Foto Personal
            </p>
        </section>
    </main>
@endsection
