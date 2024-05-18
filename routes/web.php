<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ListBukuController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ListUlasanController;
use App\Http\Controllers\PeminjamanController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/beranda', [ListBukuController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('beranda');


Route::middleware(['auth'])->group(function () {
    Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan');
    Route::post('/ulasan/filter', [ListUlasanController::class, 'filterByRating']);
    Route::post('/ulasan/store', [ListUlasanController::class, 'store']);

    Route::get('/detailBuku/{idBuku}', [ListBukuController::class, 'getById'])->name('detailBuku');

    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');

    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::post('/keranjang/store/{idBuku}', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::put('/keranjang/update/{idBuku}', [KeranjangController::class, 'update'])->name('keranjang.update');
    Route::delete('/keranjang/destroy/{idBuku}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

    Route::get('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
    Route::put('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');

    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian');
    Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
    Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');

    Route::get('/pengembalian', [PeminjamanController::class, 'pengembalian'])->name('pengembalian');

    Route::get('/denda', [DendaController::class, 'index'])->name('denda');
    Route::post('/denda/tambahDenda', [DendaController::class, 'tambahDenda'])->name('denda.tambahDenda');
    Route::get('/denda/{denda}/form', [DendaController::class, 'showFormDenda'])->name('denda.showFormDenda');
    Route::post('/denda/bayar', [DendaController::class, 'submitPelunasanDenda'])->name('denda.submitPelunasanDenda');

});


require __DIR__.'/auth.php';
