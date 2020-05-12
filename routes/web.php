<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('store.home');
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('users/profile', 'UsersController@edit')->name('user.edit');
    Route::put('users/profile', 'UsersController@update')->name('users.update');
});


Route::middleware(['auth', 'admin'])->group(function(){
    Route::resource('products', 'ProductsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');

    // ROTAS LIXEIRA
    Route::get('trashed-products', 'ProductsController@trashed')->name('trashed-product.index');
    Route::put('restore-product/{product}', 'ProductsController@restore')->name('restore-product.update');
    Route::get('trashed-categories', 'CategoriesController@trashed')->name('trashed-categories.index');
    Route::put('restore-category/{category}', 'CategoriesController@restore')->name('restore-category.update');
    Route::get('trashed-tags', 'TagsController@trashed')->name('trashed-tags.index');
    Route::put('restore-tag/{tag}', 'TagsController@restore')->name('restore-tag.update');
    // ROTAS LIXEIRA

    Route::get('users', 'UsersController@index')->name('users.index');
    Route::put('users/{user}/change-admin', 'UsersController@changeAdmin')->name('users.change-admin');
});
