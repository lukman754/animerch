<?php

use App\Http\Controllers\MerchandiseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Landing Page (Public)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalog', [MerchandiseController::class, 'catalog'])->name('merchandise.catalog');
Route::get('/catalog/{merchandise}', [MerchandiseController::class, 'catalogShow'])->name('merchandise.catalog-show');
Route::get('/about', function () {
    return view('about');
})->name('about');

// Semua rute Merchandise (Data Entry/Admin) diproteksi - Harus Login
Route::middleware(['auth'])->group(function () {
    Route::get('/merchandise', [MerchandiseController::class, 'index'])->name('merchandise.index');
    Route::get('/merchandise/create', [MerchandiseController::class, 'create'])->name('merchandise.create');
    Route::post('/merchandise', [MerchandiseController::class, 'store'])->name('merchandise.store');
    Route::get('/merchandise/export-pdf', [MerchandiseController::class, 'exportPdf'])->name('merchandise.export-pdf');
    Route::get('/merchandise/{merchandise}', [MerchandiseController::class, 'show'])->name('merchandise.show');
    Route::get('/merchandise/{merchandise}/edit', [MerchandiseController::class, 'edit'])->name('merchandise.edit');
    Route::put('/merchandise/{merchandise}', [MerchandiseController::class, 'update'])->name('merchandise.update');
    Route::delete('/merchandise/{merchandise}', [MerchandiseController::class, 'destroy'])->name('merchandise.destroy');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Katalog Pengunjung (Akan dibuat nanti)
// Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');

// Authentication routes
require __DIR__.'/auth.php';
