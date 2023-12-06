<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StaticController;
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
Auth::routes();

Route::get('/', [StaticController::class, 'index'])->name('main');
Route::get('/gallery', [StaticController::class, 'gallery'])->name('gallery');
Route::get('/contact', [StaticController::class, 'contact'])->name('contact');
Route::get('/store', [StaticController::class, 'store'])->name('store');
Route::get('/privacy-policy', [StaticController::class, 'privacyPolicy'])->name('privacy_policy');

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/cart-list', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart', [CartController::class, 'store'])->name('cart.store');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checout.index');


