<nav class="navbar">
    <div class="logo">Lentera Studio</div>
    <div class="hamburger" onclick="toggleMenu()">☰</div>
    <ul class="nav-links" id="navLinks">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/kategori') }}">Kategori</a></li>
        <li><a href="{{ url('/booking') }}">Booking</a></li>
        <li><a href="{{ route('riwayat') }}">Riwayat</a></li>
        <li><a href="{{ url('/contact') }}">Kontak</a></li>
    </ul>
</nav>

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
        background-color: #f9f9f9;
    }

    .navbar {
        background-color: #1e2a50;
        color: white;
        padding: 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 1000;
        width: 100%;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .logo {
        font-size: 1.3rem;
        font-weight: bold;
    }

    .nav-links {
        list-style: none;
        display: flex;
        gap: 1.5rem;
    }

    .nav-links li {
        position: relative;
    }

    .nav-links a {
        text-decoration: none;
        color: #cfd8ff;
        font-size: 1rem;
        transition: color 0.3s ease;
        position: relative;
        padding-left: 0.75rem;
    }

    .nav-links a:hover {
        color: white;
    }

    .nav-links li.active a {
        color: white;
        font-weight: bold;
    }

    .nav-links li.active a::before {
        content: "";
        position: absolute;
        left: -10px;
        top: 50%;
        transform: translateY(-50%);
        height: 6px;
        width: 6px;
        background-color: red;
        border-radius: 50%;
    }

    .hamburger {
        display: none;
        font-size: 1.8rem;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .nav-links {
            position: absolute;
            top: 100%;
            right: 1rem;
            background-color: #28325c;
            flex-direction: column;
            width: 180px;
            border-radius: 0.5rem;
            padding: 1rem;
            display: none;
        }

        .nav-links.show {
            display: flex;
        }

        .hamburger {
            display: block;
        }
    }
</style>

<script>
    function toggleMenu() {
        document.getElementById("navLinks").classList.toggle("show");
    }

    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname.split('/')[1];
        const navItems = document.querySelectorAll('.nav-links li');

        navItems.forEach((li) => {
            const link = li.querySelector('a');
            const href = link.getAttribute('href');

            // Ambil path dari href, buang domain jika ada
            const linkPath = href.replace(/^.*\/\/[^/]+/, '').split('/')[1];

            if (linkPath === currentPath) {
                li.classList.add('active');
            }
        });
    });
</script>
