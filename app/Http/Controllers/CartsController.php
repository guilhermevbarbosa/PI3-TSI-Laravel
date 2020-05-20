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
        
        foreach ($cart as $p) {
            $products[] = Product::withTrashed()->find($p->product_id);
        }

        $countProd = count($products);

        return view('carts.index')->with('prod', $products)->with('cart_count', $countProd);
    }

    public function store(Product $product)
    {
        $user = auth()->user()->id;

        Cart::create([
            'user_id' => $user,
            'product_id' => $product->id
        ]);

        session()->flash('success', $product->name . ' adicionado no carrinho');
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
