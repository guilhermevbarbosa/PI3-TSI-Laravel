@extends('layouts.store')

@section('css')
<link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
@endsection

@section('javascript')
<script src="{{ asset('js/swiper.js') }}"></script>
<script src="{{ asset('js/home-swipe.js') }}"></script>
@endsection

@section('content')
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
            <h2 class="title-sec-prod">Produtos com maior desconto</h2>
        </div>
    </div>

    <div class="row">
        @foreach ($featuredProds as $product)
        <div class="mx-auto col-xs-6 col-sm-6 col-md-4 col-lg-3">
            <div class="card mb-3">
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
                        <a href="" class="btn btn-primary btn-sm"><i class="fad fa-eye"></i> Visualizar</a>
                        <a href="" class="btn btn-success btn-sm"><i class="fad fa-shopping-cart"></i> Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection