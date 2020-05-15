@extends('layouts.store')

@section('content')
<header>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active"><a
                    href="{{ route('search-category', $product->category->id) }}">{{$product->category->name}}</a></li>
            <li class="breadcrumb-item active">{{$product->name}}</li>
        </ol>
    </nav>
</header>


<div class="row">
    <div class="col-4 mx-auto text-center">
        <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid">
    </div>

    <div class="col-8 mx-auto text-center">
        <h2 class="text-uppercase">{{ $product->name }}</h2>
        <p class="text-muted">{{$product->description}}</p>
        <span class="d-block h6 text-center mt-4">{{ $product->name }}</span>

        <div class="text-center">
            <span class="text-muted old-price"> {{ $product->formatMoney($product->price) }} </span>
            <span class="text-muted"> {{ $product->discountPrice() }} </span>
        </div>

        <div class="text-center mt-3">
            <a href="#" class="btn btn-primary btn-lg">Comprar</a>
        </div>

        <div class="text-center mt-5">
            <h3>Tags</h3>
            @foreach ($product->tags as $tag)
            <a href="{{ route('search-tag', $tag->id) }}" class="btn btn-sm btn-secondary">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>

</div>


@endsection