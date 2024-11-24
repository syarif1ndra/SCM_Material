<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk admin yang sudah login
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('pengiriman', PengirimanController::class)->names([
        'index' => 'admin.pengiriman.index', // Menetapkan nama rute untuk index
        'create' => 'admin.pengiriman.create',
        'store' => 'admin.pengiriman.store',
        'edit' => 'admin.pengiriman.edit',
        'update' => 'admin.pengiriman.update',
        'destroy' => 'admin.pengiriman.destroy'
    ]);
    Route::get('/admin/dashboard', [HomeController::class, 'index']);
    Route::get('/admin/pengiriman', [PengirimanController::class, 'index'])->name('admin.pengiriman');
    Route::get('/admin/pengiriman/create', [PengirimanController::class, 'create'])->name('admin.pengiriman.create');
    Route::post('admin/pengiriman/store', [PengirimanController::class,'store'])->name('admin.pengiriman.store');
    Route::get('/admin/pengiriman/{id}/edit', [PengirimanController::class, 'edit'])->name('admin.pengiriman.edit');
Route::put('/admin/pengiriman/{id}', [PengirimanController::class, 'update'])->name('admin.pengiriman.update');
Route::delete('/admin/pengiriman/{id}', [PengirimanController::class, 'destroy'])->name('admin.pengiriman.destroy');

});
// Rute untuk user yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/pengiriman', [PengirimanController::class, 'indexForUser'])->name('pengiriman.index');
});

require __DIR__.'/auth.php';
