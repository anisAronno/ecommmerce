<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [App\Http\Controllers\client\HomeController::class, 'index'])->name('client.home');
Route::get('/product/{slug}', [App\Http\Controllers\client\productController::class, 'showProductDetails'])->name('client.showProductDetails');
Route::get('/cart', [App\Http\Controllers\client\cartController::class, 'showCart'])->name('client.showCart');
Route::post('/cart', [App\Http\Controllers\client\cartController::class, 'addToCart'])->name('client.addCart');

