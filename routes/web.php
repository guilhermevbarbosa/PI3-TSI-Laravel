<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

// ROTAS LIBERADAS DE AUTENTICAÇÃO
Route::redirect('/', 'home-store');
Route::get('home-store', 'HomeController@homeStore');
Route::get('/search/category/{category}', 'HomeController@searchCategory')->name('search-category');
Route::get('/search/tag/{tag}', 'HomeController@searchTag')->name('search-tag');
Route::get('show/{product}', 'HomeController@showProduct')->name('show-product');
// ROTAS LIBERADAS DE AUTENTICAÇÃO

// NECESSÁRIO ESTAR APENAS AUTENTICADO
Route::middleware('auth')->group(function () {
    Route::get('users/profile', 'UsersController@edit')->name('user.edit');
    Route::put('users/profile', 'UsersController@update')->name('users.update');

    // ROTAS DE ADICIONAR, EXIBIR E DELETAR DO CARRINHO DO USUÁRIO
    Route::get('cart', 'CartsController@index')->name('cart');
    Route::get('cart/store/{product}', 'CartsController@store')->name('cart-store');
    Route::get('cart/remove/{product}', 'CartsController@destroy')->name('cart-remove');
    // ROTAS DE ADICIONAR, EXIBIR E DELETAR DO CARRINHO DO USUÁRIO
});
// NECESSÁRIO ESTAR APENAS AUTENTICADO

// NECESSÁRIO ESTAR AUTENTICADO E TER PERMISSÂO ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
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
// NECESSÁRIO ESTAR AUTENTICADO E TER PERMISSÂO ADMIN
