@extends('layouts.store')

@section('css')
<link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
@endsection

@section('javascript')
<script src="{{ asset('js/swiper.js') }}"></script>
<script src="{{ asset('js/home-swipe.js') }}"></script>
@endsection

@section('content')

@if(session()->has('success'))
<div class="alert alert-success">
    <i class="far fa-thumbs-up"></i> {{ session()->get('success') }}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
    <i class="fas fa-times-circle"></i> {{ session()->get('error') }}
</div>
@endif

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img class="first">
        </div>

        <div class="swiper-slide">
            <img class="second">
        </div>

        <div class="swiper-slide">
            <img class="third">
        </div>
    </div>

    <!-- Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Pagination -->

    <!-- Navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <!-- Navigation buttons -->
</div>

<div class="container py-4">
    <div class="row">
        <div class="col-12 mb-4">
            <h2 class="title-sec-prod">Maiores descontos</h2>
        </div>
    </div>

    <div class="row">
        @foreach ($featuredProds as $product)
        <div class="col-sm-6 col-md-6 col-lg-3 col-12">
            <div class="card prod mb-3">
                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top img-fluid img-store"
                    alt="{{ $product->name }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>

                    <span class="discount">
                        {{ $product->discount }}% off

                        <span class="discount-val">
                            {{ $product->formatMoney($product->price) }}
                        </span>
                    </span>


                    <h5 class="text-muted"> {{ $product->discountPrice() }} </h5>

                    <div class="text-center mt-4">
                        <a href="{{ route('show-product', $product->id) }}" class="btn btn-primary btn-sm mb-3"><i
                                class="fad fa-eye"></i> Visualizar</a>
                        <a href="{{ route('cart-store', $product->id) }}" class="btn btn-success btn-sm mb-3"><i
                                class="fad fa-shopping-cart"></i> Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-5">
        <div class="col-6">
            <div class="sale-card">
                <i class="fas fa-gifts"></i> Os melhores produtos você encontra aqui!
            </div>
        </div>

        <div class="col-6">
            <div class="sale-card">
                <i class="fas fa-dollar-sign"></i> Aproveite os descontos especiais
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 mb-4">
            <h2 class="title-sec-prod">Adicionados recentemente</h2>
        </div>
    </div>

    <div class="row">
        @foreach ($newProds as $product)
        <div class="col-sm-6 col-md-6 col-lg-3 col-12">
            <div class="card prod mb-3">
                <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top img-fluid img-store"
                    alt="{{ $product->name }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>

                    <span class="discount">
                        {{ $product->discount }}% off

                        <span class="discount-val">
                            {{ $product->formatMoney($product->price) }}
                        </span>
                    </span>


                    <h5 class="text-muted"> {{ $product->discountPrice() }} </h5>

                    <div class="text-center mt-4">
                        <a href="{{ route('show-product', $product->id) }}" class="btn btn-primary btn-sm mb-3"><i
                                class="fad fa-eye"></i> Visualizar</a>
                        <a href="{{ route('cart-store', $product->id) }}" class="btn btn-success btn-sm mb-3"><i
                                class="fad fa-shopping-cart"></i> Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection