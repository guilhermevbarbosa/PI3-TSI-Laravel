<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;

class CartsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cart = $user->cart;

        if ($cart == null) {
            // Se usuário não tiver carrinho cria um novo na tabela carts
            $cart = Cart::updateOrCreate(['user_id' => $user->id]);
        }

        // products() acessa a classe
        // products retorna um select

        return view('carts.index')->with('products', $cart->products);
    }

    public function store(Product $product)
    {
        $user = auth()->user();
        // Se usuário não tiver carrinho cria um novo, ou atualiza o existente na tabela carts
        $cart = Cart::updateOrCreate(['user_id' => $user->id]);

        // Salva o produto passado por parâmetro pelo id na tabela cart_product, utilizando o id do usuário do $cart
        $cart->products()->saveMany([$product]);
        session()->flash('success', $product->name . 'adicionado ao carrinho');

        return redirect()->back();
    }

    public function destroy()
    {}
}
