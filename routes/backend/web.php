<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Auth\UpdateUserPassword;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Auth\UpdateUserProfileInformation;

// login
Auth::routes([ 'login' => false]);
Route::get('admin/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'App\Http\Controllers\Auth\LoginController@login');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin')->middleware('admin');

    //admin-profile
    Route::resource('profile', ProfileController::class)->only([
        'index', 'edit'
    ]);
    Route::put('user/password/update', [UpdateUserPassword::class, 'update'])->name('user-password.update');
    Route::put('user/update-user-rofileInformation', [UpdateUserProfileInformation::class, 'update'])->name('user-profile-information.update');

    //banners
    Route::resource('banners', BannerController::class);
    Route::get('/banners-toggle/{id}', [BannerController::class, 'toggle'])->name('banners.toggle');

    //categories
    Route::resource('categories', CategoryController::class);
    Route::get('/categories-toggle/{id}', [CategoryController::class, 'toggle'])->name('categories.toggle');

    //Brands
    Route::resource('brands',BrandController::class);
    Route::get('/brands-toggle/{id}',[BrandController::class,'toggle'])->name('brands.toggle');

     //Products
     Route::resource('products',ProductController::class);
     Route::get('/products-toggle/{id}',[ProductController::class,'toggle'])->name('products.toggle');
     Route::post('category/{id}/child',[ProductController::class,'getChildByParentId'])->name('products.child');
     //product images
     Route::resource('product-images',ImageController::class);

    
     //users
     Route::resource('users',UserController::class);
    Route::get('/users-toggle/{id}', [CategoryController::class, 'toggle'])->name('users.toggle');
     
});
