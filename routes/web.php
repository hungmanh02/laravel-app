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
Route::get('/','Client\HomeController@index');
// admin
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Admin\HomeController@index');
    Route::post('/login', 'Admin\HomeController@admin_login')->name('admin-login');
    Route::get('/logout', 'Admin\HomeController@admin_logout')->name('admin-logout');
    Route::get('/dashboard', 'Admin\HomeController@dashboard')->name('dashboard');
    Route::resource('categories','Admin\CategoryController');
    Route::get('/active-category-product/{id}','Admin\CategoryController@active_category_product')->name('active-category-product');
    Route::get('/unactive-category-product/{id}','Admin\CategoryController@unactive_category_product')->name('unactive-category-product');

});