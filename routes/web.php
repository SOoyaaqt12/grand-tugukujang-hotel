<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::resource('/products', ProductController::class);

Route::get('/price', [ProductController::class, 'price'])->name('price');

// Booking routes
Route::get('/reservasi', [BookingController::class, 'index'])->name('booking.index');
Route::post('/reservasi', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/sukses', [BookingController::class, 'sukses'])->name('booking.sukses');
Route::get('/booking/transaksi', [BookingController::class, 'transaksi'])->name('booking.transaksi');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

// AJAX routes for booking
Route::get('/booking/get-harga', [BookingController::class, 'getHarga'])->name('booking.getHarga');
Route::post('/booking/hitung-total', [BookingController::class, 'hitungTotal'])->name('booking.hitungTotal');