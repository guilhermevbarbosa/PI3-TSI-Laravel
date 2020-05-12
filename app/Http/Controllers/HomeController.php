<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home-admin');
    }

    public function homeStore(){
        $products = Product::all();

        return view('store.home')
        ->with('featuredProds', $products->sortByDesc('discount')->take(4));
    }
}
