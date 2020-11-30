<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');
Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('auth');

Route::resource('/modules/dosen/riwayat-pendidikan',App\Http\Controllers\RiwayatPendidikanController::class)
->except(['index', 'create', 'store', 'show']);
Route::resource('/modules/dosen/mata-kuliah', \App\Http\Controllers\DosenMatkulController::class);
