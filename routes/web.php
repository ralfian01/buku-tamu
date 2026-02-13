<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\GuestBookController;


Route::redirect('/', '/buku-tamu');

// Route::get('/', [GuestBookController::class, 'index'])->name('guest-book.index');
// Route::post('/store', [GuestBookController::class, 'store'])->name('guest-book.store'); // Rute baru

Route::get('buku-tamu', [GuestBookController::class, 'index'])->name('guest-book.index');
Route::post('buku-tamu/store', [GuestBookController::class, 'store'])->name('guest-book.store'); // Rute baru
