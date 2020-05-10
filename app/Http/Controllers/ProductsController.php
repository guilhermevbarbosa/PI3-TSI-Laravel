<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('products.index')->with('products', Product::all());
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(CreateProductRequest $request)
    {
        // cria a imagem
        $image = $request->image->store('products');
        $product = Product::create($request->all());

        // Atualiza o endereço da imagem no banco
        $product->image = $image;
        $product->save();
        
        session()->flash('success', 'Produto criado com sucesso!');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product);
    }

    public function update(EditProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
        ]);

        session()->flash('success', 'Produto alterado com sucesso!');
        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
       $product->delete();

       session()->flash('success', 'Produto deletado com sucesso!');
       return redirect(route('products.index'));
    }
}
