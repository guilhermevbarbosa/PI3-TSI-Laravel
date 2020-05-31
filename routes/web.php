<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

// ROTAS LIBERADAS DE AUTENTICAÇÃO
Route::redirect('/', 'home-store');
Route::get('home-store', 'HomeController@homeStore');

// Exibe produto clicado
Route::get('show/{product}', 'HomeController@showProduct')->name('show-product');

// Pesquisa por categoria e tag pelo botão do menu, passando por parâmetro o item clicado
Route::get('search/category/{category}', 'HomeController@searchCategory')->name('search-category');
Route::get('search/tag/{tag}', 'HomeController@searchTag')->name('search-tag');

// Pesquisa por produto na barra de pesquisa
Route::get('search/product', 'HomeController@searchBarFindProduct')->name('search-product');
// ROTAS LIBERADAS DE AUTENTICAÇÃO

// NECESSÁRIO ESTAR APENAS AUTENTICADO
Route::middleware('auth')->group(function () {
    Route::get('users/profile', 'UsersController@edit')->name('user.edit');
    Route::put('users/profile', 'UsersController@update')->name('users.update');


    Route::get('address', 'AddressController@index')->name('address.index');
    Route::post('address/store', 'AddressController@store')->name('address.store');
    Route::put('address/edit-data', 'AddressController@update')->name('address.update');

    // ROTAS DE ADICIONAR, EXIBIR, DELETAR E CHECKOUT DO CARRINHO DO USUÁRIO
    Route::get('cart/store/{product}', 'CartsController@store')->name('cart-store');
    Route::get('cart', 'CartsController@index')->name('cart');
    Route::delete('cart/remove/{product}', 'CartsController@destroy')->name('cart-remove');
    Route::post('cart/checkout', 'CartsController@checkout')->name('cart-checkout');
    // ROTAS DE ADICIONAR, EXIBIR, DELETAR E CHECKOUT DO CARRINHO DO USUÁRIO

    // ROTAS DE PEDIDO
    Route::get('orders', 'OrdersController@index')->name('orders');
    Route::get('order/show/{order}', 'OrdersController@show')->name('order.show');
    // ROTAS DE PEDIDO
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
