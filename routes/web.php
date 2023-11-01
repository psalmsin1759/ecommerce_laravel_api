<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SliderController;
use \App\Http\Controllers\BannerController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\OrderController;


Route::get('/', [Controller::class, "login"]);

Route::get('/login', [Controller::class, "login"]);

Route::get('/index', [Controller::class, "index"]);

Route::get('/category', [Controller::class, "category"]);

Route::get('/slider', [Controller::class, "slider"]);

Route::get('/banner', [Controller::class, "banner"]);

Route::get('/featuredproduct', [Controller::class, "featuredproduct"]);

Route::get('/product', [Controller::class, "product"]);

Route::get('/product/add', [Controller::class, "addProduct"]);

Route::get('/options', [Controller::class, "options"]);

Route::get('/order', [Controller::class, "order"]);


Route::get('/customer', [Controller::class, "customer"]);

Route::get('/coupon', [Controller::class, "coupon"]);

Route::get('/coupon/add', [Controller::class, "addCoupon"]);

Route::get('/mail', [Controller::class, "mail"]);

Route::get('/newsletter', [Controller::class, "newsletter"]);

Route::get('/stocklist', [Controller::class, "stocklist"]);

Route::get('/returns', [Controller::class, "returns"]);

Route::get('/details', [Controller::class, "details"]);

Route::get('/address', [Controller::class, "address"]);

Route::get('/about', [Controller::class, "about"]);

Route::get('/profile', [Controller::class, "profile"]);

Route::get('/admin', [Controller::class, "admin"]);

Route::get('/logout', [Controller::class, "logout"]);

Route::post('/login', [AdminController::class, "loginAction"]);

Route::post('/category/add', [CategoryController::class, "addCategory"]);
Route::post('/category/edit', [CategoryController::class, "editCategory"]);
Route::post('delete-category', [CategoryController::class, "deleteCategory"]);

Route::post('/slider/add', [SliderController::class, "addSlider"]);
Route::post('/slider/edit', [SliderController::class, "editSlider"]);
Route::post('/delete-slider', [SliderController::class, "deleteSlider"]);

Route::post('/banner/add', [BannerController::class, "addBanner"]);
Route::post('/banner/edit', [BannerController::class, "editBanner"]);
Route::post('/delete-banner', [BannerController::class, "deleteBanner"]);


Route::post('/featuredproduct/add', [ProductController::class, "addFeaturedProduct"]);
Route::post('delete-featured', [ProductController::class, "removeFromFeatured"]);

Route::post('product/delete', [ProductController::class, "deleteProduct"]);
Route::post('product/add', [ProductController::class, "addProduct"]);

Route::get('/order/{id}', [OrderController::class, "orderDetails"]);