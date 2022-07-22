<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

// client
Route::prefix('')->group(function () {
    Route::get('','Client\HomeController@index');
    // danh mục sản phẩm trang home
    Route::get('category-product/{id}','Client\HomeController@category_product');
    // thương hiệu sản phẩm trang home
    Route::get('brand-product/{id}','Client\HomeController@brand_product');
    // product detail
    Route::get('product-detail/{id}','Client\ProductController@product_detail')->name('product-detail');
    //cart
    Route::post('save-cart','Client\CartController@save_cart')->name('save-cart');
    Route::get('show-cart','Client\CartController@show_cart')->name('show-cart');
    Route::post('quantity-product-cart/{rowId}','Client\CartController@quantity_product_cart')->name('quantity-product-cart');
    Route::get('delete-product-cart/{rowId}','Client\CartController@delete_product_cart')->name('delete-product-cart');

    //checkout
    Route::get('login-checkout','Client\CheckoutController@login_checkout')->name('login-checkout');

});
// admin
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Admin\HomeController@index')->name('admin');
    Route::post('/login', 'Admin\HomeController@admin_login')->name('admin-login');
    Route::get('/logout', 'Admin\HomeController@admin_logout')->name('admin-logout');
    Route::get('/dashboard', 'Admin\HomeController@dashboard')->name('dashboard');
    // categories
    Route::resource('categories','Admin\CategoryController');
    Route::get('/active-category/{id}','Admin\CategoryController@active_category_product')->name('active-category');
    Route::get('/unactive-category/{id}','Admin\CategoryController@unactive_category_product')->name('unactive-category');
    // categories
    Route::resource('brands','Admin\BrandController');
    Route::get('/active-brand/{id}','Admin\BrandController@active_brand')->name('active-brand');
    Route::get('/unactive-brand/{id}','Admin\BrandController@unactive_brand')->name('unactive-brand');
    // products
    Route::resource('products','Admin\ProductController');
    Route::get('/active-product/{id}','Admin\ProductController@active_product')->name('active-product');
    Route::get('/unactive-product/{id}','Admin\ProductController@unactive_product')->name('unactive-product');

});