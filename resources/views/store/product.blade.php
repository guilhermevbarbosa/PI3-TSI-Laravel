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


<div class="container pd-size">
    <div class="row pt-5">
        <div class="col-md-4 col-sm-12 text-center">
            <img src="{{ asset('storage/'.$product->image) }}" class="img-fluid product-img">
        </div>

        <div class="col-md-8 col-sm-12 text-center product-details pt-3 pb-3">

            <h2 class="text-uppercase">{{ $product->name }}</h2>
            <p class="text-muted">{{$product->description}}</p>

            <span class="discount text-center">
                {{ $product->discount }}% off

                <span class="discount-val">
                    {{ $product->formatMoney($product->price) }}
                </span>
            </span>

            <h5 class="text-muted"> {{ $product->discountPrice() }} </h5>

            <div class="text-center mt-5">
                <a href="{{ route('cart-store', $product->id) }}" class="btn btn-primary btn-lg">Comprar</a>
            </div>

            <div class="text-center mt-5">
                <h3 class="mb-4">Tags</h3>
                @foreach ($product->tags as $tag)
                <a href="{{ route('search-tag', $tag->id) }}">
                    <span class="badge badge-pill">{{ $tag->name }}</span>
                </a>
                @endforeach
            </div>
        </div>

    </div>
</div>


@endsection