<?php

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\UserController;

Route::get('/', [HomeController::class, 'home']);

Route::get('user/auth',[AuthController::class,'login'])->name('user.login');
Route::post('user/login',[AuthController::class,'loginSubmit'])->name('user.submit');
Route::post('user/register',[AuthController::class,'registerSubmit'])->name('register.submit');


Route::get('seller', [AdminController::class, 'index'])->name('seller')->middleware(['auth','vendor']);
// Route::get('customer',[])



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('home');
Route::get('products-cat/{slug}', [HomeController::class, 'categoryProducts'])->name('category.products');
Route::get('product-details/{slug}', [HomeController::class, 'productDetails'])->name('product.details');


//user-account
Route::group(['prefix'=>'user'] , function(){
    Route::get('/dashboard',[UserController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/order',[UserController::class,'userOrder'])->name('user.order');
    Route::get('/address',[UserController::class,'userAddress'])->name('user.address');
    Route::post('/billing/address/{id}',[UserController::class,'billingAddress'])->name('billing.address');
    Route::post('/shipping/address/{id}',[UserController::class,'shippingAddress'])->name('shipping.address');

    Route::get('/account-detail',[UserController::class,'userAcccount'])->name('user.account');
    Route::put('/update/account',[UserController::class,'updateAcccount'])->name('update.account');


    //cart 
    Route::post('cart/store',[CartController::class,'store'])->name('cart.store');
    Route::delete('cart/delete',[CartController::class,'delete'])->name('cart.delete');



});
// Route::get('/hi', function () {
//     Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
//     return view('welcome');
// });
