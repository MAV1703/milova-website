<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDescriptionController;
use Illuminate\Support\Facades\Route;

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('main', ['title' => 'Разработка сайтов. Анастасия Милова']);
})->name('main');
Route::middleware('auth')->group(function () {
    Route::get('/new-order', [OrderController::class, 'newOrder'])->name('newOrder');
    Route::get('/order-details/{order}', [OrderDescriptionController::class, 'showOrderDetails'])->name('showOrderDetails');
});
Route::get('/orders/{order?}', [OrderController::class, 'getOrders'])->name('orders');

Route::get('/guest-login', function () {
    if (auth()->check() && auth()->user()->status == 'guest') {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
    }

    return redirect()->route('login');
})->name('guest.login');

Route::get('/guest-register', function () {
    if (auth()->check() && auth()->user()->status == 'guest') {
        session()->put('guest_id_to_merge', auth()->id());
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
    }

    return redirect()->route('register');
})->name('guest.register');

Route::get('/public-offer', function () {
    return view('publicOffer', ['title' => 'Разработка сайтов: Договор публичной оферты']);
})->name('publicOffer');

Route::get('/privacy', function () {
    return view('privacy', ['title' => 'Разработка сайтов: Политика конфиденциальности']);
})->name('privacy');
