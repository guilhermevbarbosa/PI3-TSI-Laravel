<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function getUserOrders(int $id){
        return Order::all()->where('user_id', $id);
    }

    public function index(){
        $userId = auth()->user()->id;
        $orders = $this->getUserOrders($userId)->sortByDesc('created_at');

        return view('orders.index')->with('orders', $orders);
    }
}
