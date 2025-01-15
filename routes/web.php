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
    Route::resource('business', App\Http\Controllers\Trader\BusinessController::class);
    Route::resource('products', App\Http\Controllers\Trader\ProductController::class);
    Route::resource('orders', App\Http\Controllers\Trader\OrderController::class);
    Route::get('/profile', [App\Http\Controllers\Trader\ProfileController::class, 'edit'])->name('trader.profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Trader\ProfileController::class, 'update'])->name('trader.profile.update');

// post all
Route::post('/businesses', [App\Http\Controllers\Trader\BusinessController::class, 'store'])->name('businesses');


// put all
Route::put('/businesses/{business}', [App\Http\Controllers\Trader\BusinessController::class, 'update'])->name('business.update');


Route::prefix('business/{business}')->group(function () {
    Route::get('/', [App\Http\Controllers\Trader\BusinessController::class, 'dashboard'])->name('business.dashboard');
    Route::get('/products', [App\Http\Controllers\Trader\BusinessController::class, 'products'])->name('business.products');
    Route::get('/bookings', [App\Http\Controllers\Trader\BusinessController::class, 'bookings'])->name('business.bookings');
    Route::get('/employees', [App\Http\Controllers\Trader\BusinessController::class, 'employees'])->name('business.employees');
    Route::get('/transactions', [App\Http\Controllers\Trader\BusinessController::class, 'transactions'])->name('business.transactions');
    Route::get('/settings', [App\Http\Controllers\Trader\BusinessController::class, 'settings'])->name('business.settings');
});


});

require __DIR__.'/auth.php';
