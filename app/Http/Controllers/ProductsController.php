<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('CountCategories')->only(['create', 'store']);
    }

    public function index()
    {
        return view('admin.products.index')
        ->with('products', Product::all())
        ->with('trashed', false);
    }

    public function create()
    {
        return view('admin.products.create')
        ->with('categories', Category::all())
        ->with('tags', Tag::all());
    }

    public function store(CreateProductRequest $request)
    {
        // Salva a imagem no storage
        $image = $request->image->store('products');
        
        // Salva a imagem e atualiza o endereço da imagem no banco
        $product = Product::create($request->all());
        $product->image = $image;
        $product->save();

        // Aramazena as tags pertencentes ao produto no banco na tabela dinâmica product_tag
        if($request->tags){
            $product->tags()->attach($request->tags);
        }
        
        session()->flash('success', 'Produto criado com sucesso!');
        return redirect(route('products.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit')
            ->with('product', $product)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function update(EditProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'stock' => $request->stock,
            'category_id' => $request->category_id
        ]);

        $product->tags()->sync($request->tags);

        if($request->image){
            // Apaga a imagem antiga do storage
            Storage::delete($product->image);

            // Cria a nova imagem no storage
            $image = $request->image->store('products');

            // Update do endereço da imagem no banco
            $product->image = $image;
            $product->save();
        }

        session()->flash('success', 'Produto alterado com sucesso!');
        return redirect(route('products.index'));
    }

    public function destroy($id)
    {
        // Busca o produto entre a lixeira e os ativados 
        $product = Product::withTrashed()->where('id', $id)->firstOrFail();

        // Se o produto está na lixeira, deleta a imagem do storage e exclui o produto do banco
        if($product->trashed()){
            Storage::delete($product->image);
            $product->forceDelete();

            session()->flash('success', 'Produto excluído com sucesso');
        }else{
            $product->delete();

            session()->flash('success', 'Produto deletado com sucesso!');
        }

       return redirect()->back();
    }

    // Retorna apenas os produtos da lixeira do softDeletes
    public function trashed(){
        return view('admin.products.index')->with('products', Product::onlyTrashed()->get())->with('trashed', true);
    }

    public function restore($id){
        $product = Product::withTrashed()->where('id', $id)->firstOrFail();
        $product->restore();

        session()->flash('success', 'Produto restaurado');
        return redirect()->back();
    }
}
