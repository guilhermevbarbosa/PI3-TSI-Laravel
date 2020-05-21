<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getUserOrders(int $id){
        return Order::all()->where('user_id', $id);
    }

    public function getOrderProducts(int $id){
        return OrderProduct::all()->where('order_id', $id);
    }

    public function index(){
        $userId = auth()->user()->id;
        $orders = $this->getUserOrders($userId)->sortByDesc('created_at');

        return view('orders.index')->with('orders', $orders);
    }

    public function show(Order $order){

        $orderProducts = $this->getOrderProducts($order->id);

        $totalPrice = number_format($orderProducts->sum('price'), 2, ',', '');

        foreach($orderProducts as $product){
            $clientProds[] = Product::withTrashed()->find($product->product_id); 
            $priceDB[] = $product->price;
        }

        return view('orders.show')
        ->with('products', $clientProds)
        ->with('price', $priceDB)
        ->with('totalPrice', $totalPrice)
        ->with('orderNumb', $order->id)
        ->with('orderDate', $order->formatData($order->created_at->timestamp));
    }
}
