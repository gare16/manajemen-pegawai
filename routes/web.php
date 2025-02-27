<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::resource('/karyawans', KaryawanController::class);

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Auth::routes();
