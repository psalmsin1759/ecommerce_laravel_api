<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SliderController;
use \App\Http\Controllers\BannerController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\ProductVariantController;
use \App\Http\Controllers\ProductImageController;
use \App\Http\Controllers\RelatedProductController;
use \App\Http\Controllers\NewsletterController;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\WishlistController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\OrderItemController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ProductCategoryController;
use \App\Http\Controllers\CouponController;
use \App\Http\Controllers\StripePaymentIntentController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\StoreController;
use \App\Http\Controllers\FaqsController;
use \App\Http\Controllers\DeliveryMethodController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('categories', CategoryController::class);
Route::resource('sliders', SliderController::class);
Route::resource('coupons', CouponController::class);
Route::resource('banners', BannerController::class);
Route::resource('products', ProductController::class);
Route::resource('productvariants', ProductVariantController::class);
Route::resource('productimages', ProductImageController::class);
Route::resource('relatedproducts', RelatedProductController::class);
Route::resource('newsletters', NewsletterController::class);
Route::resource('customers', CustomerController::class);
Route::resource('wishlists', WishlistController::class);
Route::resource('orders', OrderController::class);
Route::resource('orderitems', OrderItemController::class);
Route::resource('productcategory', ProductCategoryController::class);
Route::resource('deliverymethods', DeliveryMethodController::class);

Route::get('getfeaturedproduct', [ProductController::class, "getfeaturedproduct"]);

Route::get('applyCoupon/{coupon}', [CouponController::class, "applyCoupon"]);

Route::post('create-payment-intent', [StripePaymentIntentController::class, "create"]);

Route::post("changeCustomerPassword", [CustomerController::class, "changeCustomerPassword"]);

Route::post('login', [AuthController::class, "webLogin"]);
Route::post('register', [AuthController::class, "register"]);
Route::post('forgotpassword', [AuthController::class, "forgotpassword"]);
Route::post('changepassword', [AuthController::class, "changepassword"]);

Route::post('placeOrder', [OrderController::class, "placeOrder"]);

Route::get('getOrderItems/{orderid}', [OrderController::class, "getOrderItems"]);

Route::resource('admins', AdminController::class);

Route::resource('store', StoreController::class);

Route::get("getOrdersByCustomer/{customerID}",[ OrderController::class, "getOrdersByCustomer"]);

Route::get("getOrdersByOrderID/{orderID}",[ OrderController::class, "getOrdersByOrderID"]);

Route::get("getOrderItemFromID/{orderID}",[ OrderController::class, "getOrderItemFromID"]);


Route::post("contactform", [CustomerController::class, "contactForm"]);

Route::resource('faqs', FaqsController::class);

Route::get("getFilter",[ ProductVariantController::class, "getFilter"]);

Route::get("getDeliveryMethods",[ DeliveryMethodController::class, "getDeliveryMethods"]);

Route::get("getAllProductVariants",[ ProductVariantController::class, "getAllProductVariants"]);