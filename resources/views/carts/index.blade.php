@extends('layouts.store')

@section('content')

<h2 class="text-center mt-5">Carrinho de compras</h2>

<section class="container pd-size pt-5 pr-4 pl-4">

    @if($products->count() !== 0)

    @foreach ($products as $product)
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

    <a href="#" class="btn btn-primary btn-lg float-right shop-btn"><i class="fas fa-shopping-basket"></i> Finalizar compra</a>
    @else
    <h2 class="mt-5">Ainda não há produtos no carrinho</h2>
    @endif

</section>

@endsection