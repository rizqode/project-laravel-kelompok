@extends('layouts.app')

@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", sans-serif;
            background-color: #24325f;
            color: #1e2a3a;
        }

        #main-contact {
            display: block;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            padding: 2rem 1rem;
            max-width: 1000px;
            margin: 5rem auto 4rem auto;
            gap: 1.5rem;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .contact-info {
            flex: 1;
            min-width: 300px;
        }

        .section-title {
            color: #1e2a50;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .contact-info h1 {
            font-size: 2.2rem;
            line-height: 1.3;
            font-weight: bold;
            color: #1e2a50;
        }

        .description {
            margin-top: 1rem;
            font-size: 1rem;
            line-height: 1.6;
            color: #444;
        }

        .contact-details {
            margin-top: 2rem;
        }

        .detail-item {
            display: flex;
            align-items: start;
            gap: 1rem;
            margin-bottom: 1.5rem;
            color: #1e2a3a;
        }

        .detail-item i {
            font-size: 1.2rem;
            margin-top: 0.2rem;
            color: #1e2a50;
        }

        .detail-item a {
            text-decoration: none;
            color: #1e2a50;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .detail-item a:hover {
            text-decoration: underline;
        }

        .contact-form-wrapper {
            flex: 1;
            min-width: 300px;
            background-color: #1e2a50;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .contact-form .form-group {
            margin-bottom: 1.2rem;
        }

        .contact-form input,
        .contact-form select,
        .contact-form textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            background-color: #ffffff;
            color: #1e2a50;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            outline: none;
        }

        .contact-form textarea {
            resize: vertical;
        }

        .submit-button {
            background-color: #ffffff;
            color: #1e2a50;
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .submit-button:hover {
            background-color: #e6ecff;
            transform: scale(1.03);
        }

        .visually-hidden {
            position: absolute;
            left: -10000px;
            top: auto;
            width: 1px;
            height: 1px;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                padding: 2rem 1rem;
            }

            .contact-form-wrapper {
                padding: 1.5rem;
            }

            .contact-info h1 {
                font-size: 1.8rem;
            }
        }
    </style>

    <div id="main-contact">
        <div class="container">
            {{-- Kiri: Info --}}
            <div class="contact-info">
                <p class="section-title">KAMI SIAP MEMBANTU ANDA</p>
                <h1>Konsultasikan <br />Kebutuhan <br />Foto Studio Anda</h1>
                <p class="description">
                    Sedang mencari layanan foto profesional untuk momen spesial Anda?
                    Hubungi Lentera Studio sekarang untuk mendapatkan penawaran terbaik!
                </p>

                <div class="contact-details">
                    <div class="detail-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <p style="margin: 0; font-weight: 600">E-mail</p>
                            <a href="mailto:lenterastudiofoto@gmail.com">lenterastudiofoto@gmail.com</a>
                        </div>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-phone-alt"></i>
                        <div>
                            <p style="margin: 0; font-weight: 600">Nomor Telepon</p>
                            <a href="tel:+6281234567890">+62 812 - 3456 - 7890</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kanan: Form --}}
            <div class="contact-form-wrapper">
                <form class="contact-form" method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="form-group">
                        <label for="nama" class="visually-hidden">Nama</label>
                        <input type="text" id="nama" name="nama" placeholder="Nama Anda" required />
                    </div>
                    <div class="form-group">
                        <label for="email" class="visually-hidden">Email</label>
                        <input type="email" id="email" name="email" placeholder="email@anda.com" required />
                    </div>
                    <div class="form-group">
                        <label for="layanan" class="visually-hidden">Layanan</label>
                        <select id="layanan" name="layanan" required>
                            <option value="" disabled selected>Pilih Layanan...</option>
                            <option value="Foto wisuda">Foto Wisuda</option>
                            <option value="Pas foto">Pas Foto</option>
                            <option value="Foto keluarga">Foto Keluarga</option>
                            <option value="Foto anak">Foto Anak</option>
                            <option value="Foto pernikahan">Foto Pernikahan</option>
                            <option value="Foto personal">Foto Personal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="catatan" class="visually-hidden">Catatan</label>
                        <textarea id="catatan" name="catatan" rows="5" placeholder="Tulis catatan atau pesan Anda di sini..." required></textarea>
                    </div>
                    <button type="submit" class="submit-button">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
