<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
    Route::resource('products', 'ProductsController');
    Route::resource('categories', 'CategoriesController');

    Route::get('trashed-products', 'ProductsController@trashed')->name('trashed-product.index');
    Route::put('restore-product/{product}', 'ProductsController@restore')->name('restore-product.update');
    Route::get('trashed-categories', 'CategoriesController@trashed')->name('trashed-categories.index');
    Route::put('restore-category/{category}', 'CategoriesController@restore')->name('restore-category.update');
});
