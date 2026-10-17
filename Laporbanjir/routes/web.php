<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;

Route::get('/laporbanjir', [
    LaporBanjirController::class, 'form'
])->name('banjir.form');

Route::post('/laporbanjir/konfirmasi', [
    LaporBanjirController::class, 'konfirmasi'
])->name('banjir.konfirmasi');

Route::get('/laporbanjir/daftar', [
    LaporBanjirController::class, 'daftar'
])->name('banjir.daftar');