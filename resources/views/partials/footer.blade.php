<footer class="footer">
    <style>
        .footer {
            background-color: #1e2a50;
            color: #eceff4;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 40px;
            max-width: 1000px;
            width: 100%;
            margin: auto;
            padding: 0 16px;
        }

        .footer-column {
            flex: 1;
            min-width: 200px;
            max-width: 260px;
        }

        .footer-column h2,
        .footer-column h3 {
            color: #00cfff;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .footer-column p {
            margin-bottom: 8px;
            line-height: 1.4;
            font-size: 0.9rem;
        }

        .footer-column a,
        .footer-column li a {
            color: #eceff4;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-column ul li {
            margin-bottom: 6px;
        }

        .footer-column ul li a:hover {
            text-decoration: underline;
        }

        .social-icons {
            margin-top: 12px;
        }

        .social-icons a {
            display: inline-block;
            margin-right: 10px;
            color: #0b1c44;
            background: #00cfff;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            text-align: center;
            line-height: 36px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .social-icons a:hover {
            background: #007ea4;
        }

        .footer-cta {
            display: inline-block;
            margin-top: 12px;
            padding: 10px 24px;
            background-color: #00cfff;
            color: #0b1c44;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .footer-cta:hover {
            opacity: 0.8;
        }

        .footer-bottom {
            margin-top: 24px;
            font-size: 0.8rem;
            color: #94a3b8;
            text-align: center;
            border-top: 1px solid #1a2a4f;
            padding-top: 10px;
            width: 100%;
            max-width: 1000px;
        }

        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 24px;
            }

            .footer-column {
                max-width: 100%;
            }
        }
    </style>

    <div class="footer-container">
        {{-- Brand + Deskripsi --}}
        <div class="footer-column">
            <h2>Lentera Studio</h2>
            <p>
                Studio foto profesional berfokus pada kualitas, pencahayaan sempurna,
                dan suasana nyaman untuk setiap momen spesial Anda.
            </p>
        </div>

        {{-- Navigasi --}}
        <div class="footer-column">
            <h3>Navigasi</h3>
            <ul>
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ url('/kategori') }}">Kategori</a></li>
                <li><a href="{{ url('/booking') }}">Booking</a></li>
            </ul>
        </div>

        {{-- Kontak --}}
        <div class="footer-column">
            <h3>Kontak</h3>
            <p>
                Jalan Cikopak No.53, Mulyamekar, Kec. Babakancikao<br />
                Purwakarta, Jawa Barat
            </p>
            <p><a href="mailto:info@lenterastudio.com">info@lenterastudio.com</a></p>
            <p>+62 812 3456 7890</p>
            <a href="{{ route('contact') }}" class="footer-cta">Hubungi Kami</a>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Lentera Studio. Semua hak cipta.</p>
    </div>
</footer>
