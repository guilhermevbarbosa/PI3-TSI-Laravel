@extends('layouts.app')
@section('content')
<h2 class="text-center">Criar produto</h2>

<form action="{{ route('products.store') }}" class="p-3 col-md-6 offset-md-3 col-sm-12" method="POST"
    enctype="multipart/form-data">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item text-danger"><i class="far fa-times-circle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @csrf

    <div class="card">
        <div class="card-body">
            <div class="label-float mb-5 mt-2">
                <input name="name" type="text" placeholder=" " value="{{ old('name') }}" />
                <label>Nome</label>
            </div>

            <div class="label-float mb-5">
                <input name="description" type="text" placeholder=" " value="{{ old('description') }}" />
                <label>Descrição</label>
            </div>

            <div class="label-float mb-5">
                <input name="price" type="number" placeholder=" " value="{{ old('price') }}" />
                <label>Preço</label>
            </div>

            <div class="label-float mb-5">
                <input name="discount" type="number" placeholder=" " value="{{ old('discount') }}" />
                <label>Desconto</label>
            </div>

            <div class="label-float mb-5">
                <input name="stock" type="number" placeholder=" " value="{{ old('stock') }}" />
                <label>Estoque</label>
            </div>

            <div class="form-group">
                <label for="category">Categoria</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="image">Imagem</label>
                <input type="file" class="form-control" name="image" value="null">
            </div>

            <button type="submit" class="btn btn-success mt-4 float-right">Criar</button>
        </div>
    </div>
</form>

@endsection