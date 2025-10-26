<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $kegiatan = Kegiatan::with('kategori')->latest()->get();
    return view('dashboard', compact('kegiatan'));
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
    Route::get('/admin/data-kegiatan', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.kegiatan.index');
    Route::get('/admin/tambah-kegiatan', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.kegiatan.create');

});

require __DIR__.'/auth.php';
