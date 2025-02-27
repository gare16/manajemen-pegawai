<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::resource('/karyawans', KaryawanController::class);

});

Route::get('/', [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawans');

Auth::routes();
