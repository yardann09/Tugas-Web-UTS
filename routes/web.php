<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome.beranda');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('kegiatan', KegiatanController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/user/kegiatan', [App\Http\Controllers\UserKegiatanController::class, 'index'])->name('user.kegiatan.index');
});

require __DIR__.'/auth.php';
