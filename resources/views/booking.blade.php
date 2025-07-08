@extends('layouts.app')

@section('title', 'Booking Studio')

@section('head')
    <style>
        :root {
            --navy: #1b2a49;
            --tulang: #fdfcf9;
        }

        body {
            background: var(--tulang);
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 5rem auto 4rem auto;
            background: var(--navy);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: var(--tulang);
            margin-bottom: 25px;
        }

        label {
            display: block;
            color: var(--tulang);
            font-weight: bold;
            margin-bottom: 6px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }

        .button-wrapper {
            display: flex;
            justify-content: center;
        }

        button {
            width: 50%;
            padding: 12px;
            background-color: var(--tulang);
            color: var(--navy);
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e0e0e0;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1>Form Booking Studio</h1>
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf

            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" required>

            <label for="kontak">Kontak (HP/WA)</label>
            <input type="text" name="kontak" id="kontak" required>

            <label for="paket">Pilih Paket</label>
            <select name="paket" id="paket" required>
                <option value="">-- Pilih Paket --</option>
                <option value="Reguler">Reguler</option>
                <option value="Premium">Premium</option>
                <option value="Eksklusif">Eksklusif</option>
            </select>

            <label for="tanggal">Tanggal Sesi Foto</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <label for="catatan">Catatan Tambahan</label>
            <textarea name="catatan" id="catatan" rows="3"></textarea>

            <div class="button-wrapper">
                <button type="submit">Kirim Booking</button>
            </div>
        </form>
    </div>
@endsection
