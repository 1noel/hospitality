<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// trader 
Route::middleware(['auth','verified', 'role:trader'])->prefix('trader')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Trader\DashboardController::class, 'index'])->name('trader.dashboard');
    Route::resource('businesses', App\Http\Controllers\Trader\BusinessController::class);
    Route::resource('products', App\Http\Controllers\Trader\ProductController::class);
    Route::resource('orders', App\Http\Controllers\Trader\OrderController::class);
    Route::get('/profile', [App\Http\Controllers\Trader\ProfileController::class, 'edit'])->name('trader.profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Trader\ProfileController::class, 'update'])->name('trader.profile.update');
});

require __DIR__.'/auth.php';
