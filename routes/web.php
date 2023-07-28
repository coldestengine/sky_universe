<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::controller(AdminController::class)->prefix('admin')->group(function () {
        Route::get('/dashboard', 'Index')->middleware(['verified'])->name('admin.dashboard');
        Route::get('/edit/user/{user}', 'EditUser')->name('edit.user');
        Route::post('/update/user', 'UpdateUser')->name('update.user');
        Route::post('/ban/user', 'BanUser')->name('ban.user');
        Route::post('/unban/user', 'UnbanUser')->name('unban.user');
    });

});

Route::middleware(['auth', 'isUser'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'Index')->middleware(['verified'])->name('home');
        Route::get('/get-catalogue', 'GetCatalogue');
        Route::get('/item/{product}', 'ItemDetail')->name('item.detail');
        Route::get('/cart', 'Cart')->name('cart');
        Route::post('/cart', 'Purchase')->name('cart');
        Route::get('/add-to-cart', 'AddToCart');
        Route::get('/cart-delete', 'DeleteCart');
        Route::post('/checkout', 'Checkout')->name('checkout');
    });

    Route::controller(GameController::class)->group(function () {
        Route::get('/tic', 'Game')->middleware(['verified', 'unique.tab.access'])->name('tic');
        Route::get('/regenerate', 'Regenerate');
        Route::get('/close', 'Close')->name('close');
        Route::get('/check-married', 'CheckMarried');
    });

});


require __DIR__.'/auth.php';
