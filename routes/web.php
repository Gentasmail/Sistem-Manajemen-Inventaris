<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;

Auth::routes();

// Tampilkan halaman welcome hanya untuk guest
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Resource route (harus pakai ::class)
Route::middleware(['auth'])->group(function () {
    Route::resource('barang', 'BarangController');
    Route::resource('kategori', 'KategoriController');
});
