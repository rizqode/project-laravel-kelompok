@extends('layouts.app')

@section('title', 'Riwayat Booking')

@section('content')
    <h1 style="text-align:center; color:#1b2a49;">Riwayat Booking Studio</h1>

    <table
        style="width:100%; border-collapse:collapse; margin-top:20px; background:white; box-shadow:0 0 10px rgba(0,0,0,0.05);">
        <thead>
            <tr style="background-color:#1b2a49; color:white;">
                <th style="padding:12px; border:1px solid #ccc;">Nama</th>
                <th style="padding:12px; border:1px solid #ccc;">Paket</th>
                <th style="padding:12px; border:1px solid #ccc;">Tanggal</th>
                <th style="padding:12px; border:1px solid #ccc;">Status</th>
                <th style="padding:12px; border:1px solid #ccc;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr onclick="lihatBukti({{ $booking->id }})" style="cursor:pointer;">
                    <td style="padding:12px; border:1px solid #ccc;">{{ $booking->nama }}</td>
                    <td style="padding:12px; border:1px solid #ccc;">{{ $booking->paket }}</td>
                    <td style="padding:12px; border:1px solid #ccc;">{{ $booking->tanggal }}</td>
                    <td style="padding:12px; border:1px solid #ccc;">
                        <form action="{{ route('booking.updateStatus', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()" style="padding:6px; border-radius:5px;">
                                <option value="Pending" {{ $booking->status === 'Pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="Sukses" {{ $booking->status === 'Sukses' ? 'selected' : '' }}>Sukses</option>
                                <option value="Batal" {{ $booking->status === 'Batal' ? 'selected' : '' }}>Batal</option>
                            </select>
                        </form>
                    </td>
                    <td style="padding:12px; border:1px solid #ccc;">
                        <form action="{{ route('booking.destroy', $booking->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="color:red; background:none; border:none; font-weight:bold; cursor:pointer;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function lihatBukti(id) {
            // Arahkan ke halaman bukti, misalnya /bukti?id=xxx
            window.location.href = "/bukti?id=" + id;
        }
    </script>
@endsection
