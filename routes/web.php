<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchiveController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');
    Route::get('/feeds/create', [FeedController::class, 'create'])->name('feeds.create');
    Route::post('/feeds', [FeedController::class, 'store'])->name('feeds.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/archive', [ArchiveController::class, 'index'])->name('archive.index');
    Route::post('/archive/download', [ArchiveController::class, 'download'])->name('archive.download');

});
require __DIR__ . '/auth.php';
