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
<<<<<<< HEAD
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
    Route::post('/get-product-attributes', [\App\Http\Controllers\Client\ProductController::class, 'getProductAttribute'])->name('product.getProductAttribute');
    Route::get('/shop/cart', [\App\Http\Controllers\Client\HomePageController::class, 'showCart'])->name('product.showCart');
    Route::get('/shop/checkout', [\App\Http\Controllers\Client\HomePageController::class, 'showCheckout'])->name('product.showCheckout');
    Route::get('/shop/contact', [\App\Http\Controllers\Client\HomePageController::class, 'showContact'])->name('product.showContact');
    Route::get('locale/{lange}', [\App\Http\Controllers\Client\HomePageController::class, 'changeLanguage'])->name('user.change-language');


=======
Route::prefix('')->group(function (){
   Route::get('/',[\App\Http\Controllers\Client\HomePageController::class,'index'])->name('home.index');
   Route::get('/shop/list',[\App\Http\Controllers\Client\HomePageController::class,'show'])->name('product.show');
   Route::get('/shop/detail',[\App\Http\Controllers\Client\HomePageController::class,'showDetail'])->name('product.showDetail');
   Route::get('/shop/cart',[\App\Http\Controllers\Client\HomePageController::class,'showCart'])->name('product.showCart');
   Route::get('/shop/checkout',[\App\Http\Controllers\Client\HomePageController::class,'showCheckout'])->name('product.showCheckout');
   Route::get('/shop/contact',[\App\Http\Controllers\Client\HomePageController::class,'showContact'])->name('product.showContact');
>>>>>>> dece221f309a6888873a1349df77751a0356c316
});

Auth::routes();


