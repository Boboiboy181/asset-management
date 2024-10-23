<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::prefix('assets')->group(function () {
        Route::get('', [AssetController::class, 'index'])->name('admin.asset');
        Route::post('', [AssetController::class, 'store'])->name('admin.asset.store');
        Route::get('/create', [AssetController::class, 'create'])->name('admin.asset.create');
        Route::get('/{id}', [AssetController::class, 'show'])->name('admin.asset.detail');
        Route::get('/{id}/edit', [AssetController::class, 'edit'])->name('admin.asset.edit');
        Route::patch('/{id}', [AssetController::class, 'update'])->name('admin.asset.update');
        Route::delete('/{id}', [AssetController::class, 'destroy'])->name('admin.asset.delete');
    });
});

require __DIR__ . '/auth.php';
