<?php

use Illuminate\Support\Facades\Route;

// Public User

Route::get('/', function () {
    return view('index');
});

Route::get('/keranjang', function() {
    return view('keranjang');
})->name('keranjang');
