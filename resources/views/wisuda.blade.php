@extends('layouts.app')
@section('title', 'Kategori & Detail Paket Wisuda')
@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Dancing Script', cursive;
            background-color: #24325f;
            color: #1e2a3a;
        }

        .section-title {
            text-align: center;
            font-size: 2rem;
            margin: 2rem 0;
            color: #24325f;
        }

        .close-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #24325f;
            color: #ffffff;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            font-size: 20px;
            cursor: pointer;
            z-index: 1000;
            text-align: center;
            line-height: 35px;
            text-decoration: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .content {
            padding: 5rem 2rem 2rem;
        }

        .grid-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .card {
            background: #24325f;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            border: 2px solid #24325f;
            max-width: 600px;
            margin: 5px auto;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            display: block;
        }

        .card-info {
            padding: 1rem;
            text-align: center;
            background-color: #24325f;
        }

        .card-info h3 {
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .container {
            position: relative;
            display: flex;
            max-width: 1000px;
            margin: 40px auto;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .slider-container {
            flex: 1;
            max-width: 400px;
            position: relative;
            overflow: hidden;
        }

        .slides {
            display: flex;
            width: 100%;
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            height: 100%;
            box-sizing: border-box;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 1;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .description {
            flex: 1;
            padding: 30px;
        }

        .description h2 {
            color: #24325f;
            margin-bottom: 20px;
        }

        .description ul {
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .description ul li {
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .note {
            font-size: 0.9rem;
            color: #666;
            margin-top: 5px;
        }

        .booking-wrapper {
            text-align: center;
        }


        .booking-button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #24325f;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .booking-button:hover {
            background-color: #1f2842;
        }
    </style>
    {{-- Detail Paket 1 --}}
    @foreach ($category->paketFotos as $paket)
        <div class="container">
            <div class="slider-container">
                <div class="slides">
                    <div class="slide">
                        <img src="{{ asset('storage/' . $paket->foto) }}" alt="{{ $paket->nama }}">
                    </div>
                </div>
            </div>

            <div class="description">
                <h2>{{ $paket->nama }}</h2>

                {!! $paket->deskripsi !!}

                <ul>
                    <li>{{ $paket->fasilitas }}</li>
                </ul>

                <p class="price">Harga: Rp {{ number_format($paket->harga, 0, ',', '.') }}</p>

                <p class="note">Durasi: {{ $paket->durasi ?? '-' }}</p>

                <a href="{{ url('/booking?paket=' . $paket->id) }}" class="booking-button">Booking Now</a>
            </div>
        </div>
    @endforeach
@endsection
