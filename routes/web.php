<?php

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



//user
Route::prefix('')->group(function (){
   Route::get('/',[\App\Http\Controllers\Client\HomePageController::class,'index'])->name('home.index');
   Route::get('/shop/list',[\App\Http\Controllers\Client\HomePageController::class,'show'])->name('product.show');
   Route::get('/shop/detail',[\App\Http\Controllers\Client\HomePageController::class,'showDetail'])->name('product.showDetail');
   Route::get('/shop/cart',[\App\Http\Controllers\Client\HomePageController::class,'showCart'])->name('product.showCart');
   Route::get('/shop/checkout',[\App\Http\Controllers\Client\HomePageController::class,'showCheckout'])->name('product.showCheckout');
   Route::get('/shop/contact',[\App\Http\Controllers\Client\HomePageController::class,'showContact'])->name('product.showContact');
});

Auth::routes();


