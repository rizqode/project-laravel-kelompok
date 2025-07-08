<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('booking');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'nama'     => 'required|string|max:255',
            'kontak'   => 'required|string|max:255',
            'paket'    => 'required|string|max:255',
            'tanggal'  => 'required|date',
            'catatan'  => 'nullable|string',
        ]);

        // Tambahan data yang tidak diinput user
        $validated['kode'] = 'STF' . rand(100000, 999999);
        $validated['status'] = 'Pending';
        $validated['tanggal_booking'] = now(); // default tanggal booking hari ini
        $validated['bukti_transfer'] = null;

        // Simpan ke database
        Booking::create($validated);

        // Arahkan ke halaman riwayat atau sukses booking
        return redirect()->route('riwayat')->with('success', 'Booking berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dihapus.');
    }

    public function riwayat()
    {
        $bookings = \App\Models\Booking::latest()->get();
        return view('riwayat', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Status diperbarui.');
    }
}
