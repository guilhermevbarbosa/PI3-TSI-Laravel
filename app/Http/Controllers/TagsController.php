<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\EditTagRequest;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all())->with('trashed', false);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(CreateTagRequest $request)
    {
        Tag::create([
            'name'=>$request->name
        ]);

        session()->flash('success', 'Tag criada com sucesso');
        return redirect(route('tags.index'));
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

    public function edit(Tag $tag)
    {
        return view('tags.edit')->with('tag', $tag);
    }

    public function update(EditTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Tag alterada com sucesso');
        return redirect(route('tags.index'));
    }

    public function destroy($id)
    {
        $tag = Tag::withTrashed()->where('id', $id)->firstOrFail();

        if($tag->trashed()){
            $tag->forceDelete();

            session()->flash('success', 'Tag deletada com sucesso');
        }else{
            $tag->delete();
            
            session()->flash('success', 'Tag enviada para a lixeira');
        }

        return redirect()->back();
    }

    public function trashed(){
        return view('tags.index')->with('tags', Tag::onlyTrashed()->get())->with('trashed', true);
    }

    public function restore($id){
        $tag = Tag::withTrashed()->where('id', $id)->firstOrFail();
        $tag->restore();

        session()->flash('success', 'Tag restaurada com sucesso');
        return redirect()->back();
    }
}
