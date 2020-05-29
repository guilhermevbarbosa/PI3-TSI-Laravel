<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // HOME DE ADMIN
    public function index()
    {
        return view('home-admin');
    }
    // HOME DE ADMIN

    // FUNÇÕES DA LOJA
    public function homeStore(){
        $products = Product::all();

        return view('store.home')
        ->with('featuredProds', $products->sortByDesc('discount')->take(4))
        ->with('newProds', $products->sortByDesc('created_at')->take(4));
    }

    // Retorna a view de pesquisa com os produtos da categoria selecionada
    public function searchCategory(Category $category){
        return view('store.search')
        ->with('products', $category->products()->paginate(4))
        ->with('title', $category->name);
    }

    // Retorna a view de pesquisa com os produtos da tag selecionada
    public function searchTag(Tag $tag){
        return view('store.search')
        ->with('products', $tag->products()->paginate(4))
        ->with('title', $tag->name);
    }

    // Retorna a view com o produto selecionado
    public function showProduct(Product $product){
        return view('store.product')
        ->with('product', $product);
    }

    public function searchBarFindProduct(Request $request){
        $searchURL = $request->query('s');

        if($searchURL){
            $prodQuery = Product::where('name', 'LIKE', "%{$searchURL}%");

            return view('store.search')
            ->with('products', $prodQuery->paginate(4))
            ->with('title', $searchURL);
        }else{
            session()->flash('error', 'É necessário pelo menos 1 caractere para realizar a pesquisa');

            return redirect()->back();
        }
    }
    // FUNÇÕES DA LOJA

}
