<?php

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\CouponController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ShopController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\WishlistController;

Route::get('/', [HomeController::class, 'home']);
Route::group(['middleware'=>'guest'] , function(){
    Route::get('user/auth',[AuthController::class,'login'])->name('user.login');
    Route::post('user/login',[AuthController::class,'loginSubmit'])->name('user.submit');
    Route::post('user/register',[AuthController::class,'registerSubmit'])->name('register.submit');
});


Route::get('seller', [AdminController::class, 'index'])->name('seller')->middleware(['auth','vendor']);
// Route::get('customer',[])



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('home');
Route::get('products-cat/{category:slug}', [HomeController::class, 'categoryProducts'])->name('category.products');
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
    Route::get('/cart',[CartController::class,'cart'])->name('cart');
    Route::post('cart/store',[CartController::class,'store'])->name('cart.store');
    Route::delete('cart/delete',[CartController::class,'delete'])->name('cart.delete');
    Route::post('cart/update',[CartController::class,'update'])->name('cart.update') ;

    //coupon
    Route::post('coupon/add',[CouponController::class,'couponAdd'])->name('coupon.add') ;
    
    //wishlist
    Route::get('/wishlist',[WishlistController::class,'wishlist'])->name('wishlist');
    Route::post('/wishlist/store',[WishlistController::class,'wishlistStore'])->name('wishlist.store');
    Route::post('/wishlist/move-to-cart',[WishlistController::class,'MoveToCart'])->name('wishlist.move.cart');
    Route::post('/wishlist/delete',[WishlistController::class,'wishlistDelete'])->name('wishlist.delete');

    //checkout
    // Route::get('/checkout',[CheckoutController::class, 'checkout'])->name('checkout')->middleware('user');
    Route::get('/checkout',[CheckoutController::class, 'checkout'])->name('checkout')->middleware('auth');

    Route::post('/checkout-first',[CheckoutController::class , 'checkout1Store'])->name('checkout1.store')->middleware('auth');
    Route::post('/checkout-two',[CheckoutController::class , 'checkout2Store'])->name('checkout2.store')->middleware('auth');
    Route::post('/checkout-three',[CheckoutController::class , 'checkout3Store'])->name('checkout3.store')->middleware('auth');
    Route::get('/checkout/confirm',[CheckoutController::class, 'confirm'])->name('checkout.confirm')->middleware('auth');
    Route::get('/checkout/complete/{order_number}',[CheckoutController::class, 'complete'])->name('checkout.complete')->middleware('auth');

    //shop
    Route::get('/shop',[ShopController::class, 'shop'])->name('shop');
    Route::post('/shop-filter',[ShopController::class, 'shopFilter'])->name('shop.fiter');

    //search product and auto search product
    Route::get('/autoseacrh',[HomeController::class, 'autosearch'])->name('autosearch');
    Route::get('/search',[HomeController::class, 'search'])->name('search');

});

// Route::get('/hi', function () {
//     Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
//     return view('welcome');
// });
