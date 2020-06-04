@extends('layouts.app')

@section('javascript')
<script>
    window.onload = function() {
        $('.tagSelection').select2();
    }
</script>
@endsection

@section('content')
<h2 class="text-center">Editar produto</h2>

<form action="{{ route('products.update', $product->id) }}" class="p-3 col-md-6 offset-md-3 col-sm-12" method="POST"
    enctype="multipart/form-data" novalidate>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item text-danger mb-1"><i class="far fa-times-circle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-body">
            <div class="label-float mb-5 mt-2">
                <input name="name" type="text" placeholder=" " value="{{ $product->name }}" />
                <label>Nome</label>
            </div>

            <div class="label-float mb-5">
                <input name="description" type="text" placeholder=" " value="{{ $product->description }}" />
                <label>Descrição</label>
            </div>

            <div class="label-float mb-5">
                <input name="price" type="text" placeholder=" " value="{{ $product->price }}" />
                <label>Preço</label>
            </div>

            <div class="label-float mb-5">
                <input name="discount" type="text" placeholder=" " value="{{ $product->discount }}" />
                <label>Desconto</label>
            </div>

            <div class="label-float mb-5">
                <input name="stock" type="text" placeholder=" " value="{{ $product->stock }}" />
                <label>Estoque</label>
            </div>

            <div class="form-group mb-5">
                <label for="category">Categoria</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id == $product->category_id) @endif>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" class="form-control tagSelection" multiple>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ $product->hasTag($tag->id) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-success mt-4 float-right">Editar</button>
        </div>
    </div>
</form>

@endsection
