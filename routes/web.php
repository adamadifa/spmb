<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pendaftar', [PendaftarController::class, 'index'])->name('pendaftar.index');
    Route::get('/pendaftar/create', [PendaftarController::class, 'create'])->name('pendaftar.create');
    Route::post('/pendaftar', [PendaftarController::class, 'store'])->name('pendaftar.store');
    Route::get('/pendaftar/{no_register}', [PendaftarController::class, 'show'])->name('pendaftar.show');
    Route::get('/pendaftar/{no_register}/edit', [PendaftarController::class, 'edit'])->name('pendaftar.edit');
    Route::put('/pendaftar/{no_register}', [PendaftarController::class, 'update'])->name('pendaftar.update');
    Route::delete('/pendaftar/{no_register}', [PendaftarController::class, 'destroy'])->name('pendaftar.destroy');
    Route::get('/pendaftar/{no_register}/cetak-pdf', [PendaftarController::class, 'cetakPdf'])->name('pendaftar.cetak-pdf');

    // Route untuk fitur pembayaran
    Route::middleware(['auth'])->group(function () {
        Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
        Route::get('/pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
        Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
        Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
        Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
        Route::put('/pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
        Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');

        // Route untuk admin
        Route::middleware(['admin'])->group(function () {
            Route::post('/pembayaran/{id}/approve', [PembayaranController::class, 'approve'])->name('pembayaran.approve');
            Route::post('/pembayaran/{id}/reject', [PembayaranController::class, 'reject'])->name('pembayaran.reject');
        });
    });
});

require __DIR__ . '/auth.php';
