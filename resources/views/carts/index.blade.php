@extends('layouts.store')

@section('content')

<h2 class="text-center mt-5">Carrinho de compras</h2>

<section class="container pd-size pt-5 pr-4 pl-4">

    @if (Auth::user()->cart->count())
    @foreach ($prod as $product)
    <div class="row">
        <div class="col-12">
            <div class="product-selected">
                <span>
                    {{ $product->name }}
                    <b>{{ $product->discountPrice() }}</b>
                </span>

                <a href="{{ route('cart-remove', $product->id) }}" class="float-right"><i
                        class="fas fa-window-close"></i></a>
            </div>

        </div>
    </div>
    @endforeach
    
    <form action="{{ route('cart-checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg float-right shop-btn">
            <i class="fas fa-shopping-basket"></i>
            Finalizar compra
        </button>
    </form>

    @else
    <h4 class="mt-5">Ainda não há produtos no carrinho</h4>
    @endif

</section>

@endsection