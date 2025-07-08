@extends('layouts.app')

@section('title', 'Bukti Transaksi')

@section('content')
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #1b2a49;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 5rem auto 4rem auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }


        h1 {
            color: #1b2a49;
            margin-bottom: 20px;
        }

        .checkmark {
            font-size: 60px;
            color: green;
            margin-bottom: 15px;
        }

        .data-item {
            text-align: left;
            margin: 10px 0;
        }

        .label {
            font-weight: bold;
            color: #333;
        }

        .button-group {
            margin-top: 25px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            margin: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #1b2a49;
            color: white;
        }

        .btn-secondary {
            background-color: #ccc;
            color: #333;
            text-decoration: none;
            display: inline-block;
            line-height: 38px;
        }
    </style>

    <div class="container" id="buktiContainer">
        <div class="checkmark">✔️</div>
        <h1>Bukti Transaksi</h1>

        <div class="data-item"><span class="label">Nama:</span> <span id="nama"></span></div>
        <div class="data-item"><span class="label">Kontak:</span> <span id="kontak"></span></div>
        <div class="data-item"><span class="label">Paket:</span> <span id="paket"></span></div>
        <div class="data-item"><span class="label">Tanggal Sesi:</span> <span id="tanggal"></span></div>
        <div class="data-item"><span class="label">Tanggal Booking:</span> <span id="tanggalBooking"></span></div>
        <div class="data-item"><span class="label">Status:</span> <span id="status"></span></div>
        <div class="data-item"><span class="label">Catatan:</span> <span id="catatan"></span></div>

        <div class="button-group">
            <button class="btn btn-primary" onclick="cetakPDF()">Download PDF</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        const data = JSON.parse(localStorage.getItem("dataBookingTerakhir"));
        if (data) {
            document.getElementById("nama").textContent = data.nama || "";
            document.getElementById("kontak").textContent = data.kontak || "";
            document.getElementById("paket").textContent = data.paket || "";
            document.getElementById("tanggal").textContent = data.tanggal || "";
            document.getElementById("tanggalBooking").textContent = data.tanggalBooking || "";
            document.getElementById("status").textContent = data.status || "Pending";
            document.getElementById("catatan").textContent = data.catatan || "-";
        }

        function cetakPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            doc.text("Bukti Transaksi Booking Studio", 20, 20);
            doc.setFontSize(12);
            doc.text(`Nama: ${data.nama}`, 20, 35);
            doc.text(`Kontak: ${data.kontak}`, 20, 45);
            doc.text(`Paket: ${data.paket}`, 20, 55);
            doc.text(`Tanggal Sesi: ${data.tanggal}`, 20, 65);
            doc.text(`Tanggal Booking: ${data.tanggalBooking}`, 20, 75);
            doc.text(`Status: ${data.status}`, 20, 85);
            doc.text(`Catatan: ${data.catatan}`, 20, 95);

            doc.save("bukti-booking.pdf");
        }
    </script>
@endsection
