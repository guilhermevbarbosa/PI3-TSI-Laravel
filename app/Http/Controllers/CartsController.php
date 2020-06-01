<?php
namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderProduct;
use App\Product;

class CartsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cart = $user->cart;
        $totalPrice = 0;

        if ($cart->count() > 0)
        {
            foreach ($cart as $product)
            {
                $forProd = Product::withTrashed()->find($product->product_id);

                $products[] = $forProd;
            }
        }
        else
        {
            $products = null;
            $totalPrice = null;
        }

        return view('carts.index')->with('prod', $products);
    }

    public function store(Product $product)
    {
        $user = auth()->user()->id;

        $consulta = Cart::all()
        ->where('user_id', $user)
        ->where('product_id', $product->id)
        ->first();

        if ($consulta)
        {
            $actualAmount = $consulta->amount;

            $consulta->update(['amount' => $actualAmount + 1]);
        }
        else
        {
            Cart::create([
                'user_id' => $user,
                'product_id' => $product->id,
                'amount' => 1
            ]);
        }

        session()->flash('success', $product->name . ' adicionado no carrinho');
        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $user = auth()->user()->id;

        $consulta = Cart::all()->where('user_id', $user)->where('product_id', $product->id)
            ->first();

        if ($consulta->amount > 1)
        {
            $actualAmount = $consulta->amount;

            $consulta->update(['amount' => $actualAmount - 1]);
        }
        else
        {
            $consulta->delete();
        }

        session()->flash('success', $product->name . ' removido do carrinho com sucesso!');
        return redirect()->back();
    }

    public function checkout()
    {
        $userId = auth()->user()->id;

        $orderItens = Cart::all()->where('user_id', $userId);

        // VERIFICA SE TEM ESTOQUE DOS PRODUTOS DO CARRINHO
        foreach ($orderItens as $prod)
        {
            $actualProd = Product::find($prod->product_id);
            $stock = $actualProd->stock;

            if ($prod->amount > $stock)
            {
                session()->flash('error', 'O produto ' . $actualProd->name . ' não tem estoque, só há ' . $stock . ' no estoque.');
                return redirect()->back();
            }
        }
        // VERIFICA SE TEM ESTOQUE DOS PRODUTOS DO CARRINHO

        // CRIA O PEDIDO NA TABELA ORDER
        $order = Order::create(['user_id' => $userId]);

        // PESQUISA NA TABELA DO CARRINHO OS PRODUTOS E INSERE NA TABELA ORDER_PRODUCT
        $this->searchAndInsertInOrderProductTable($userId, $order->id);

        // REMOVE PRODUTOS DO CARRINHO
        $this->deleteDataAfterCheckout($userId);

        session()->flash('success', 'Parabéns! Compra finalizada com sucesso!');
        return redirect('/orders');
    }

    private function searchAndInsertInOrderProductTable(int $userId, int $orderId)
    {
        // PEGA OS PRODUTOS DO CARRINHO DO USUÁRIO
        $orderItens = Cart::all()->where('user_id', $userId);

        foreach ($orderItens as $prod)
        {
            $actualProd = Product::find($prod->product_id);

            // CRIA O REGISTRO NA TABELA ORDER_PRODUCT
            OrderProduct::create([
                'order_id' => $orderId,
                'product_id' => $actualProd->id,
                'price' => $actualProd->discountPriceOnlyVal() * $prod->amount,
                'amount' => $prod->amount
            ]);

            // REMOVE DO ESTOQUE O PRODUTO
            $stock = $actualProd->stock;
            $stock -= $prod->amount;

            $actualProd->update(['stock' => $stock]);
            // REMOVE DO ESTOQUE O PRODUTO
        }
    }

    private function deleteDataAfterCheckout(int $userId)
    {
        // REMOVE OS PRODUTOS DO CARRINHO DO CLIENTE
        $prodsToRemove = Cart::all()->where('user_id', $userId);

        foreach ($prodsToRemove as $actualProd)
        {
            $actualProd->delete();
        }
    }
}
