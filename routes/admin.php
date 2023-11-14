<?php

use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'showLoginForm'])->name('admin.showLoginForm');
    Route::post('/login', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
    Route::middleware(['auth:admin', 'check-role-permission'])->group(function () {
        Route::prefix('account')->as('admin.')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
            Route::post('/store', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('store');
            Route::put('/{id}/update', [\App\Http\Controllers\Admin\AdminController::class, 'update'])->name('update');
            Route::delete('/{id}/delete', [\App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('delete');
            Route::post("{id}/change-status", [\App\Http\Controllers\Admin\AdminController::class, 'changeStatus'])->name("changeStatus");
        });
        Route::prefix('user')->as('user.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
            Route::post('/store', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
            Route::put('/{id}/update', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
            Route::delete('/{id}/delete', [\App\Http\Controllers\Admin\UserController::class, 'delete'])->name('delete');

        });
        Route::prefix('category')->as('category.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
            Route::post('/store', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
            Route::put('/{id}/update', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
            Route::delete('/{id}/delete', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('delete');
        });
        Route::prefix('product')->as('product.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
            Route::post('/store', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
            Route::put('/{id}/update', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
            Route::delete('/{id}/delete', [\App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('delete');
            Route::post("{id}/change-status", [\App\Http\Controllers\Admin\ProductController::class, 'changeStatus'])->name("changeStatus");
            Route::get('/copy/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'copy'])->name('copy');
        });
        Route::prefix('attribute')->as('attribute.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\AttributeController::class, 'index'])->name('index');
            Route::post('/store', [\App\Http\Controllers\Admin\AttributeController::class, 'store'])->name('store');
            Route::put('/{id}/update', [\App\Http\Controllers\Admin\AttributeController::class, 'update'])->name('update');
            Route::delete('/{id}/delete', [\App\Http\Controllers\Admin\AttributeController::class, 'delete'])->name('delete');
        });
        Route::prefix('banner')->as('banner.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\BannerController::class, 'index'])->name('index');
            Route::post('/store', [\App\Http\Controllers\Admin\BannerController::class, 'store'])->name('store');
            Route::post('/{id}/update', [\App\Http\Controllers\Admin\BannerController::class, 'update'])->name('update');
            Route::delete('/{id}/delete', [\App\Http\Controllers\Admin\BannerController::class, 'delete'])->name('delete');
            Route::post("{id}/change-status", [\App\Http\Controllers\Admin\BannerController::class, 'changeStatus'])->name("changeStatus");
        });
        Route::prefix('discount')->as('discount.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\DiscountController::class, 'index'])->name('index');
            Route::post('/store', [\App\Http\Controllers\Admin\DiscountController::class, 'store'])->name('store');
            Route::put('/{id}/update', [\App\Http\Controllers\Admin\DiscountController::class, 'update'])->name('update');
            Route::delete('/{id}/delete', [\App\Http\Controllers\Admin\DiscountController::class, 'delete'])->name('delete');
        });
    });


    Route::prefix('ajax')->group(function () {
        Route::get('admin/categories/get-category-parent', [\App\Http\Controllers\Admin\CategoryController::class, 'getAllCategory'])->name('category.getCategoryParent');
        Route::get('admin/attributes/get-search-attribute',[\App\Http\Controllers\Admin\AttributeController::class,'getAllAttribute'])->name('attribute.getAllAttribute');
        Route::get('admin/discounts/get-search-discount',[\App\Http\Controllers\Admin\DiscountController::class,'getAllDiscount'])->name('discount.getAllDiscount');
        Route::get('admin/product/get-product-parent',[\App\Http\Controllers\Admin\ProductController::class,'getAllProduct'])->name('product.getProductParent');
    });


    Route::prefix('media')->group(function () {
        Route::post('upload', [\App\Http\Controllers\Admin\MediaController::class, 'uploadFile'])->name('media.upload-file');
        Route::get('dropzone', [\App\Http\Controllers\Admin\MediaController::class, 'dropzoneIndex'])->name('media.dropzoneIndex');
        Route::post('dropzone/upload', [\App\Http\Controllers\Admin\MediaController::class, 'dropzoneUpload'])->name('media.dropzoneUpload');
        Route::delete('dropzone/delete/{id}', [\App\Http\Controllers\Admin\MediaController::class, 'dropzoneDelete'])->name('media.dropzoneDelete');
    });

    Route::get('/dashboard', [\App\Http\Controllers\Admin\Auth\LoginController::class, 'dashboard'])->name('admin.dashboard');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
