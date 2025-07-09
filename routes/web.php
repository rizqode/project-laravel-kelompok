<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Models\Categori;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/kategori', function () {
    return view('kategori');
});

Route::get('/detail', function () {
    return view('detail');
});

// =====================
// Halaman Depan (User)
// =====================

Route::get('/', function () {
    return view('home');
});
Route::view('/about', 'about')->name('about');
Route::get('/riwayat', [BookingController::class, 'riwayat'])->name('riwayat');
Route::view('/bukti', 'bukti')->name('bukti');
Route::put('/booking/{id}/status', [BookingController::class, 'updateStatus'])->name('booking.updateStatus');

// =====================
// Booking Logic
// =====================

Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

Route::get('/riwayat', function () {
    $bookings = \App\Models\Booking::latest()->get();
    return view('riwayat', compact('bookings'));
})->name('riwayat');

// =====================
// Contact Form
// =====================

Route::get('/contact', fn() => view('contact'))->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('{slug}', function ($slug) {
    $category = Categori::with(['paketFotos'])->get()
        ->first(fn($cat) => Str::slug($cat->nama) === $slug);

    if (!$category) abort(404);

    return view('detail', compact('category'));
})->name('detail.kategori');
