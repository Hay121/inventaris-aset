<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController; // Panggil Controller kita

// Arahkan halaman utama (/) langsung ke 'index' di AssetController
Route::get('/', [AssetController::class, 'index'])->name('assets.index.root');

// Ini membuat semua rute CRUD (create, store, edit, update, destroy)
// dengan awalan URL /assets
Route::resource('assets', AssetController::class);