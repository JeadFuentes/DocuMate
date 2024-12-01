<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Livewire\Checkout;

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
    Route::view('/home', 'documate.home')->name('documate.home');
    Route::view('/dashboard', 'documate.dashboard')->name('documate.dashboard');
    Route::view('/orders', 'documate.orders')->name('documate.orders');
    Route::view('/products', 'documate.products')->name('documate.products');
    Route::view('/users', 'documate.user')->name('documate.users');
    Route::view('/newapp', 'documate.newapp')->name('documate.newapp');
    Route::get('/newapp/checkout/{id}', [UserController::class, 'showChekout'])->name('documate.checkout');
    Route::get('/newapp/attch/{id}', [UserController::class, 'showAttachment'])->name('documate.attachment');
    Route::get('/printform', [UserController::class, 'printForm'])->name('documate.printForm');
});