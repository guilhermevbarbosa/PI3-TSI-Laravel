<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Support\Facades\DB;

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

    public function destroy(Product $product)
    {
        $user = auth()->user();
        $cart = $user->cart;

        // Query SQL que busca o produto no cart_product que tem o cart_id no valor $cart->id e product_id $product->id e deleta
        DB::table('cart_product')->where([['cart_id', $cart->id], ['product_id', $product->id]])->delete();
        session()->flash('success', $product->name . ' removido do carrinho');

        return redirect()->back();
    }
}
