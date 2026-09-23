<?php

use App\Http\Controllers\JalurController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JalurController::class, 'beranda'])->name('beranda');
Route::get('/jelajah', [JalurController::class, 'langkah'])->name('langkah');
Route::get('/hasil', [JalurController::class, 'hasil'])->name('hasil');
Route::get('/kalender', [JalurController::class, 'kalender'])->name('kalender');

