@extends('layouts.app')

@section('title', 'Kategori Produk')

@section('head')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Playfair Display', serif;
            background: #e0d7d7;
            color: #ffffff;
        }

        .content {
            padding: 2rem;
        }

        .grid-container {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            padding: 0;
            margin: 0;
        }

        .card {
            background: #2c365a;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            border: 2px solid #dbe9e2;
            max-width: 300px;
            margin: 10px auto;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
        }

        .card-info {
            padding: 1rem;
            text-align: center;
            background-color: #2c365a;
        }

        .card-info h3 {
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
        use App\Models\Categori;

        $categories = Categori::all();

    @endphp

    <div class="container">
        <main class="content">
            <div class="grid-container">

                @foreach ($categories as $category)
                    <div class="card">
                        <a href="{{ url('detail') }}">
                            <img src="{{ asset('storage/' . $category->foto_path) }}" alt="{{ $category->nama }}">
                        </a>
                        <div class="card-info">
                            <h3>{{ $category->nama }}</h3>
                        </div>
                    </div>
                @endforeach

            </div>
        </main>
    </div>
@endsection
