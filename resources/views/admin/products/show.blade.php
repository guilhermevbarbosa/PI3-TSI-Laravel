@extends('layouts.app')

@section('javascript')
<script>
    window.onload = function() {
        $('.tagSelection').select2();
    }
</script>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <img src="{{ asset('storage/' .$product->image) }}" class="prod-show mb-4">

        <div class="label-float mb-5 mt-2">
            <input disabled name="name" type="text" placeholder=" " value="{{ $product->name }}" />
            <label>Nome</label>
        </div>

        <div class="form-group mb-5">
            <label>Descrição</label>
            <textarea disabled class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="label-float mb-5">
            <input disabled name="price" type="text" placeholder=" " value="{{ $product->price }}" />
            <label>Preço</label>
        </div>

        <div class="label-float mb-5">
            <input disabled name="discount" type="text" placeholder=" " value="{{ $product->discount }}" />
            <label>Desconto</label>
        </div>

        <div class="label-float mb-5">
            <input disabled name="stock" type="text" placeholder=" " value="{{ $product->stock }}" />
            <label>Estoque</label>
        </div>

        <div class="form-group mb-5">
            <label for="category">Categoria</label>
            <select disabled name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == $product->category_id) @endif>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            <select disabled name="tags[]" class="form-control tagSelection" multiple>
                @foreach($tags as $tag)
                <option value="{{ $tag->id }}" {{ $product->hasTag($tag->id) ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@endsection
