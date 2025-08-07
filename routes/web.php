<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Models\Item;

// Route menu
Route::get('/menu', [ItemController::class, 'index']);

// Route home (menu utama)
Route::get('/', [ItemController::class, 'index']);

// Route::get('/cart', function () {
//     return view('customer.cart');
// })->name('cart');

// Route checkout
Route::get('/checkout', function () {
    return view('customer.checkout');
})->name('checkout');

// Cart routes
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::post('/cart/update/{id}', [CartController::class, 'updateQty'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

