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

        if($cart->count() > 0){
            foreach ($cart as $p) {
                $products[] = Product::withTrashed()->find($p->product_id);
            }
        }else{
            $products = null;
        }

        return view('carts.index')->with('prod', $products);
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
        $user = auth()->user()->id;
    
        Cart::all()->where('user_id', $user )
        ->where('product_id', $product->id)
        ->first()
        ->delete();

        session()->flash('success', $product->name . ' removido do carrinho com sucesso!');
        return redirect()->back();
    }
}
