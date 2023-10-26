# E-commerce API - Test-Driven Laravel Application

This is a Test-Driven Laravel E-commerce API project that includes factories, seeders, test classes, API endpoints, models, migrations, and controllers. The project is designed to serve as a foundation for building e-commerce applications in Laravel while adhering to best practices.

## Features

-   **API Endpoints:** The project provides various API endpoints for common e-commerce features such as product management, user authentication, order processing, and more.
-   **Test-Driven Development (TDD):** This project follows the TDD methodology, ensuring that the codebase is thoroughly tested with PHPUnit.
-   **Factories and Seeders:** It includes factories and seeders to generate dummy data for testing and seeding the database.

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/psalmsin1759/ecommerce_laravel_api.git
    ```

2. **Install Composer Dependencies:**

    ```bash
    composer install
    ```

3. **Copy Environment File:**

    Create a copy of the `.env.example` file and name it `.env`. Update the database and other configurations in the `.env` file.

4. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5. **Run Database Migrations and Seeders:**

    ```bash
    php artisan migrate --seed
    ```

6. **Start the Development Server:**

    ```bash
    php artisan serve
    ```

    The API should be accessible at `http://localhost` (or another URL as specified).

7. Running Tests

-   This project is built using Test-Driven Development, so running tests is essential. To execute the tests, run:

```bash
php artisan test
```

## Endpoints

-   GET|HEAD api/applyCoupon/{coupon} ........................CouponController@applyCoupon
-   GET|HEAD api/banners ............................ banners.index › BannerController@index
-   POST api/banners ............................ banners.store › BannerController@store
-   GET|HEAD api/banners/create ................... banners.create › BannerController@create
-   GET|HEAD api/banners/{banner} ..................... banners.show › BannerController@show
-   PUT|PATCH api/banners/{banner} ................. banners.update › BannerController@update
-   DELETE api/banners/{banner} ............... banners.destroy › BannerController@destroy
-   GET|HEAD api/banners/{banner}/edit ................ banners.edit › BannerController@edit
-   GET|HEAD api/categories .................... categories.index › CategoryController@index
-   POST api/categories .................... categories.store › CategoryController@store
-   GET|HEAD api/categories/create ........... categories.create › CategoryController@create
-   GET|HEAD api/categories/{category} ........... categories.show › CategoryController@show
-   PUT|PATCH api/categories/{category} ....... categories.update › CategoryController@update
-   DELETE api/categories/{category} ..... categories.destroy › CategoryController@destroy
-   GET|HEAD api/categories/{category}/edit ...... categories.edit › CategoryController@edit
-   POST api/changepassword .............................. AuthController@changepassword
-   GET|HEAD api/coupons ............................ coupons.index › CouponController@index
-   POST api/coupons ............................ coupons.store › CouponController@store
-   GET|HEAD api/coupons/create ................... coupons.create › CouponController@create
-   GET|HEAD api/coupons/{coupon} ..................... coupons.show › CouponController@show
-   PUT|PATCH api/coupons/{coupon} ................. coupons.update › CouponController@update
-   DELETE api/coupons/{coupon} ............... coupons.destroy › CouponController@destroy
-   GET|HEAD api/coupons/{coupon}/edit ................ coupons.edit › CouponController@edit
-   POST api/create-payment-intent ................ StripePaymentIntentController@create
-   GET|HEAD api/customers ...................... customers.index › CustomerController@index
-   POST api/customers ...................... customers.store › CustomerController@store
-   GET|HEAD api/customers/create ............. customers.create › CustomerController@create
-   GET|HEAD api/customers/{customer} ............. customers.show › CustomerController@show
-   PUT|PATCH api/customers/{customer} ......... customers.update › CustomerController@update
-   DELETE api/customers/{customer} ....... customers.destroy › CustomerController@destroy
-   GET|HEAD api/customers/{customer}/edit ........ customers.edit › CustomerController@edit
-   POST api/forgotpassword .............................. AuthController@forgotpassword
-   GET|HEAD api/getfeaturedproduct ................... ProductController@getfeaturedproduct
-   POST api/login ................................................ AuthController@login
-   GET|HEAD api/newsletters ................ newsletters.index › NewsletterController@index
-   POST api/newsletters ................ newsletters.store › NewsletterController@store
-   GET|HEAD api/newsletters/create ....... newsletters.create › NewsletterController@create
-   GET|HEAD api/newsletters/{newsletter} ..... newsletters.show › NewsletterController@show
-   PUT|PATCH api/newsletters/{newsletter} . newsletters.update › NewsletterController@update
-   DELETE api/newsletters/{newsletter} newsletters.destroy › NewsletterController@destroy
-   GET|HEAD api/newsletters/{newsletter}/edit newsletters.edit › NewsletterController@edit
-   GET|HEAD api/orderitems ................... orderitems.index › OrderItemController@index
-   POST api/orderitems ................... orderitems.store › OrderItemController@store
-   GET|HEAD api/orderitems/create .......... orderitems.create › OrderItemController@create
-   GET|HEAD api/orderitems/{orderitem} ......... orderitems.show › OrderItemController@show
-   PUT|PATCH api/orderitems/{orderitem} ..... orderitems.update › OrderItemController@update
-   DELETE api/orderitems/{orderitem} ... orderitems.destroy › OrderItemController@destroy
-   GET|HEAD api/orderitems/{orderitem}/edit .... orderitems.edit › OrderItemController@edit
-   GET|HEAD api/orders ............................... orders.index › OrderController@index
-   POST api/orders ............................... orders.store › OrderController@store
-   GET|HEAD api/orders/create ...................... orders.create › OrderController@create
-   GET|HEAD api/orders/{order} ......................... orders.show › OrderController@show
-   PUT|PATCH api/orders/{order} ..................... orders.update › OrderController@update
-   DELETE api/orders/{order} ................... orders.destroy › OrderController@destroy
-   GET|HEAD api/orders/{order}/edit .................... orders.edit › OrderController@edit
-   GET|HEAD api/productcategory ... productcategory.index › ProductCategoryController@index
-   POST api/productcategory ... productcategory.store › ProductCategoryController@store
-   GET|HEAD api/productcategory/create productcategory.create › ProductCategoryController@…
-   GET|HEAD api/productcategory/{productcategory} productcategory.show › ProductCategoryCo…
-   PUT|PATCH api/productcategory/{productcategory} productcategory.update › ProductCategory…
-   DELETE api/productcategory/{productcategory} productcategory.destroy › ProductCategor…
-   GET|HEAD api/productcategory/{productcategory}/edit productcategory.edit › ProductCateg…
-   GET|HEAD api/productimages .......... productimages.index › ProductImageController@index
-   POST api/productimages .......... productimages.store › ProductImageController@store
-   GET|HEAD api/productimages/create . productimages.create › ProductImageController@create
-   GET|HEAD api/productimages/{productimage} productimages.show › ProductImageController@s…
-   PUT|PATCH api/productimages/{productimage} productimages.update › ProductImageController…
-   DELETE api/productimages/{productimage} productimages.destroy › ProductImageControlle…
-   GET|HEAD api/productimages/{productimage}/edit productimages.edit › ProductImageControl…
-   GET|HEAD api/products ......................... products.index › ProductController@index
-   POST api/products ......................... products.store › ProductController@store
-   GET|HEAD api/products/create ................ products.create › ProductController@create
-   GET|HEAD api/products/{product} ................. products.show › ProductController@show
-   PUT|PATCH api/products/{product} ............. products.update › ProductController@update
-   DELETE api/products/{product} ........... products.destroy › ProductController@destroy
-   GET|HEAD api/products/{product}/edit ............ products.edit › ProductController@edit
-   GET|HEAD api/productvariants .... productvariants.index › ProductVariantController@index
-   POST api/productvariants .... productvariants.store › ProductVariantController@store
-   GET|HEAD api/productvariants/create productvariants.create › ProductVariantController@c…
-   GET|HEAD api/productvariants/{productvariant} productvariants.show › ProductVariantCont…
-   PUT|PATCH api/productvariants/{productvariant} productvariants.update › ProductVariantCo…
-   DELETE api/productvariants/{productvariant} productvariants.destroy › ProductVariantC…
-   GET|HEAD api/productvariants/{productvariant}/edit productvariants.edit › ProductVarian…
-   POST api/register .......................................... AuthController@register
-   GET|HEAD api/relatedproducts .... relatedproducts.index › RelatedProductController@index
-   POST api/relatedproducts .... relatedproducts.store › RelatedProductController@store
-   GET|HEAD api/relatedproducts/create relatedproducts.create › RelatedProductController@c…
-   GET|HEAD api/relatedproducts/{relatedproduct} relatedproducts.show › RelatedProductCont…
-   PUT|PATCH api/relatedproducts/{relatedproduct} relatedproducts.update › RelatedProductCo…
-   DELETE api/relatedproducts/{relatedproduct} relatedproducts.destroy › RelatedProductC…
-   GET|HEAD api/relatedproducts/{relatedproduct}/edit relatedproducts.edit › RelatedProduc…
-   GET|HEAD api/sliders ............................ sliders.index › SliderController@index
-   POST api/sliders ............................ sliders.store › SliderController@store
-   GET|HEAD api/sliders/create ................... sliders.create › SliderController@create
-   GET|HEAD api/sliders/{slider} ..................... sliders.show › SliderController@show
-   PUT|PATCH api/sliders/{slider} ................. sliders.update › SliderController@update
-   DELETE api/sliders/{slider} ............... sliders.destroy › SliderController@destroy
-   GET|HEAD api/sliders/{slider}/edit ................ sliders.edit › SliderController@edit
-   GET|HEAD api/wishlists ...................... wishlists.index › WishlistController@index
-   POST api/wishlists ...................... wishlists.store › WishlistController@store
-   GET|HEAD api/wishlists/create ............. wishlists.create › WishlistController@create
-   GET|HEAD api/wishlists/{wishlist} ............. wishlists.show › WishlistController@show
-   PUT|PATCH api/wishlists/{wishlist} ......... wishlists.update › WishlistController@update
-   DELETE api/wishlists/{wishlist} ....... wishlists.destroy › WishlistController@destroy
-   GET|HEAD api/wishlists/{wishlist}/edit ........ wishlists.edit › WishlistController@edit
-   GET|HEAD sanctum/csrf-cookie sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieControll…

## Contributing

If you'd like to contribute to this project, please follow these steps:

# Fork the repository.

-   Create a new branch for your feature or bug fix: git checkout -b feature/your-feature.
-   Commit your changes and push your branch to your fork: git push origin feature/your-feature.
-   Create a pull request on the main repository.

## License

This project is open-source and available under the MIT License.

## Author

Samson Ude

## Acknowledgments

-   Laravel Framework
-   PHPUnit

## Contact

-   If you have any questions or need further assistance, please feel free to contact us samson_ude@yahoo.com
