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
Route::group([],function () {

    Route::prefix('web')->as('user.')->group(function () {

        Route::get('/login', [\App\Http\Controllers\Client\Auth\LoginController::class, 'showLoginForm'])->name('showLoginForm');
        Route::post('/login', [\App\Http\Controllers\Client\Auth\LoginController::class, 'login'])->name('login');
        Route::get('/logout', [\App\Http\Controllers\Client\Auth\LoginController::class, 'logout'])->name('logout');
    });

    //login social
    Route::get('/auth/redirect/{provider}', [\App\Http\Controllers\Client\Auth\LoginController::class,'redirect'])->name('login.provider');
    Route::get('/callback/{provider}', [\App\Http\Controllers\Client\Auth\LoginController::class,'callback'])->name('login.providerCallback');

    Route::get('/', [\App\Http\Controllers\Client\HomePageController::class, 'index'])->name('home.index');
    Route::get('/shop/list', [\App\Http\Controllers\Client\ProductController::class, 'list'])->name('product.show');
    Route::get('/shop/detail/{slug}', [\App\Http\Controllers\Client\ProductController::class, 'detail'])->name('product.detail');
//    Route::post('/get-related-product', [\App\Http\Controllers\Client\ProductController::class, 'getRelatedProduct'])->name('product.getProductAttribute');
    Route::get('/shop/cart', [\App\Http\Controllers\Client\CartController::class, 'showCart'])->name('product.showCart');
    Route::get('/shop/{id}', [\App\Http\Controllers\Client\CartController::class, 'addProductCart'])->name('product.addProductCart');
    Route::patch('/update-shopping-cart', [\App\Http\Controllers\Client\CartController::class, 'updateCart'])->name('product.updateCart');
    Route::delete('/delete-cart-product', [\App\Http\Controllers\Client\CartController::class, 'deleteProduct'])->name('product.deleteProduct');
    Route::get('/shop/checkout', [\App\Http\Controllers\Client\HomePageController::class, 'showCheckout'])->name('product.showCheckout');
    Route::get('/shop/contact', [\App\Http\Controllers\Client\HomePageController::class, 'showContact'])->name('product.showContact');
    Route::get('locale/{lange}', [\App\Http\Controllers\Client\HomePageController::class, 'changeLanguage'])->name('user.change-language');


    Route::prefix('ajax')->group(function () {
        Route::get('/shop/detail/check-product-stock', [\App\Http\Controllers\Client\ProductController::class, 'checkProductStock'])->name('client.checkProductStock');
    });

});

Auth::routes();


