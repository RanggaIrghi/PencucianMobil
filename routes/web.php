<?php

use Illuminate\Support\Facades\Route;

// Public User

Route::get('/', function () {
    return view('index');
});

Route::get('/keranjang', function() {
    return view('keranjang');
})->name('keranjang');

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::get('/transaction', function() {
    return view('auth/transaction');
})->name('transaction');

Route::get('/queue', function() {
    return view('auth/queue');
})->name('queue');

Route::get('/employees', function() {
    return view('auth/employees');
})->name('employees');

Route::get('/dashboard', function() {
    return view('auth/dashboard');
})->name('dashboard');

