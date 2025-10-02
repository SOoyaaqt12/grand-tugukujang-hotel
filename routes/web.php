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

// Product/Rooms routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Booking/Reservation routes
Route::get('/reservasi', [BookingController::class, 'index'])->name('booking.index');
Route::post('/reservasi', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking/hitung-total', [BookingController::class, 'hitungTotal'])->name('booking.hitung');

// Transaction routes
Route::get('/transaksi', [BookingController::class, 'transaksi'])->name('booking.transaksi');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

// Success page
Route::get('/booking-sukses', [BookingController::class, 'sukses'])->name('booking.sukses');