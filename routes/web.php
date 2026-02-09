<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransaksiController;

// Public User

Route::get('/', [TransaksiController::class, 'create'])->name('home');

Route::post('/booking', [TransaksiController::class, 'store'])->name('transaksi.store');

Route::get('/booking/sukses/{invoice}', [TransaksiController::class, 'sukses'])->name('transaksi.sukses');

Route::get('/keranjang', [TransaksiController::class, 'keranjang'])->name('keranjang');

Route::get('/login', [AdminController::class, 'showLogin'])->name('login');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/queue', [AdminController::class, 'queue'])->name('queue');

    Route::post('/admin/transaksi/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.transaksi.status');

    Route::get('/transaction', [AdminController::class, 'createTransaksi'])->name('transaction');
    
    Route::post('/transaction/new', [AdminController::class, 'storeTransaksi'])->name('admin.transaksi.store');
});

    
Route::get('/employees', function() {
    return view('auth/employees');
})->name('employees');

Route::get('/dashboard', function() {
    return view('auth/dashboard');
})->name('dashboard');

