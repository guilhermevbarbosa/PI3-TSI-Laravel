<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index')
        ->with('categories', Category::paginate(10))
        ->with('trashed', false);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            'name'=> $request->name
        ]);

        session()->flash('success', 'Categoria criada com sucesso!');
        return redirect(route('categories.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update(EditCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]); 

        session()->flash('success', 'Categoria alterada com sucesso');
        return redirect(route('categories.index'));
    }

    public function destroy($id)
    {
        $category = Category::withTrashed()->where('id', $id)->firstOrFail();
        $prodCount = $category->products()->count();

        if($prodCount > 0){
            session()->flash('error', 'Não pode deletar a categoria pois '. $prodCount . ' produto(s) utiliza(m) a categoria.');
            return redirect()->back();
        }

        if($category->trashed()){
            $category->forceDelete();

            session()->flash('success', 'Categoria deletada com sucesso');
        }else{
            $category->delete();

            session()->flash('success', 'Categoria enviada para a lixeira');
        }

        return redirect()->back();
    }

    public function trashed(){
        return view('admin.categories.index')
        ->with('categories', Category::onlyTrashed()->get())
        ->with('trashed', true);
    }

    public function restore($id){
        $category = Category::withTrashed()->where('id', $id)->firstOrFail();
        $category->restore();

        session()->flash('success', 'Categoria restaurada');
        return redirect()->back();
    }
}
