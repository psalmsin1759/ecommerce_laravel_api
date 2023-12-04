<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Controller;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\SliderController;
use \App\Http\Controllers\BannerController;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\StoreController;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\CouponController;
use \App\Http\Controllers\NewsletterController;
use \App\Http\Controllers\DeliveryMethodController;

Route::get('/', [Controller::class, "login"]);

Route::get('/login', [Controller::class, "login"]);
Route::post('/login', [AdminController::class, "loginAction"]);

 Route::group(['middleware' => 'checkadmin'], function (){

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

    Route::post('store/edit', [StoreController::class, "updateStore"]);
    Route::post('about', [StoreController::class, "aboutAction"]);


    Route::post('/order/status', [OrderController::class, "changeOrderStatus"]);

    Route::get("/product/{id}", [ProductController::class, "productDetails"]);

    Route::get("/product/edit/{id}", [ProductController::class, "editProductView"]);

    Route::post("/product/edit", [ProductController::class, "editProduct"]);

    Route::post("option/editquantity", [ProductController::class, "editOptionsQuantity"]);

    Route::post("delete-options-edit", [ProductController::class, "deleteProductOption"]);

    Route::post("/product/edit/optionadd", [ProductController::class, "optionAdd"]);

    Route::post("delete-related-edit", [ProductController::class, "deleteRelatedProduct"]);

    Route::post("/product/editrelatedadd", [ProductController::class, "addRelatedToProduct"]);

    Route::post("delete-productcategory", [ProductController::class, "deleteProductCategory"]);

    Route::post("product/editcategoryadd", [ProductController::class, "editAddCategory"]);

    Route::get("customer/{id}", [CustomerController::class, "customerDetails"]);

    Route::post("/coupon/add", [CouponController::class, "addNewCoupon"]);

    Route::post("delete-vendor-coupon", [CouponController::class, "deleteNewCoupon"]);

    Route::post("/mail/send", [NewsletterController::class, "sendEmail"]);

    Route::post('/profile/edit', [AdminController::class, "editAdminProfile"]);

    Route::post('/profile/password', [AdminController::class, "changeAdminPassword"]);

    Route::post('delete-admin', [AdminController::class, "deleteAdmin"]);

    Route::post('/admin/changestatus', [AdminController::class, "changeAdminStatus"]);

    Route::resource('admins', AdminController::class);

    Route::get("delivery", [DeliveryMethodController::class, "showView"]);

    Route::post("delivery/add", [DeliveryMethodController::class, "addDeliveryMethod"]);

    Route::post("delivery/edit", [DeliveryMethodController::class, "editDeliveryMethod"]);

    Route::post("deleteDelivery", [DeliveryMethodController::class, "deleteDeliveryMethod"]);


 });
