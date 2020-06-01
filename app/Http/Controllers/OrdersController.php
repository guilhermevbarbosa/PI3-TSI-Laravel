<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    private function getUserOrders(int $id){
        return Order::all()->where('user_id', $id);
    }

    private function getOrderProducts(int $id){
        return OrderProduct::all()->where('order_id', $id);
    }

    public function index(){
        $userId = auth()->user()->id;
        $orders = $this->getUserOrders($userId)->sortByDesc('created_at');

        return view('orders.index')->with('orders', $orders);
    }

    public function show(Order $order){

        // Pega os produtos do pedido
        $orderProducts = $this->getOrderProducts($order->id);

        // Soma os valores dos produtos do pedido
        $totalPrice = number_format($orderProducts->sum('price'), 2, ',', '');

        foreach($orderProducts as $product){
            // Pega o produto completo contido em Product
            $clientProds[] = Product::withTrashed()->find($product->product_id);

            // Pega o preço contido em OrderProduct
            $priceDB[] = $product->price;
            // Pega a quantidade contida em OrderProduct
            $amountDB[] = $product->amount;
        }

        // Retorno - Array de todos os produtos / Array de preços de order_products /
        // Array de produtos de order_products / Preço total de todos os itens do pedido de order_products
        // Pega o ID da ordem / Pega a data do pedido por timestamp e formata
        return view('orders.show')
        ->with('products', $clientProds)
        ->with('price', $priceDB)
        ->with('amount', $amountDB)
        ->with('totalPrice', $totalPrice)
        ->with('orderNumb', $order->id)
        ->with('orderDate', $order->formatData($order->created_at->timestamp));
    }
}
