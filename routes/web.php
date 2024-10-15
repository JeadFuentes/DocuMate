<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
Route::middleware(['auth', 'auth.session'])->group(function () {
   // Route::get('/user',[UserController::class,'user'])->name('user.user');
});

Route::view('/home', 'documate.home')->name('documate.home');
Route::view('/dashboard', 'documate.dashboard')->name('documate.dashboard');
Route::view('/orders', 'documate.orders')->name('documate.orders');
Route::view('/products', 'documate.products')->name('documate.products');