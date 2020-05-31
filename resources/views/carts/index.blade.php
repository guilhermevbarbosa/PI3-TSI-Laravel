@extends('layouts.store')

@section('content')

<h2 class="text-center mt-5">Carrinho de compras</h2>

<section class="container pd-size pt-5 pr-4 pl-4">

    @if (Auth::user()->cart->count())

    <div class="row">
        <div class="col-12">

            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr class="center">
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Remover do carrinho</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($prod as $product)
                    <tr class="center">
                        <th scope="row">
                            <img src="{{ asset('storage/' .$product->image) }}" alt="{{ $product->name }}" width="50"
                                height="50">
                        </th>
                        <th scope="row">
                            {{$product->name}}
                        </th>
                        <td>
                            {{ $product->discountPrice() }}
                        </td>
                        <td>
                            <form action="{{ route('cart-remove', $product->id) }}" method="POST"
                                onsubmit="return confirm('Deseja remover {{ $product->name }} do carrinho?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="total-price">
        Total <br>
        R$ {{ $totalPrice }}
    </div>

    @if (Auth::user()->address != null)
    <form action="{{ route('cart-checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg float-right shop-btn">
            <i class="fas fa-shopping-basket"></i>
            Finalizar compra
        </button>
    </form>
    @else
    <span class="required-end mt-2"><i class="fas fa-exclamation-triangle"></i> Cadastre um endereço para finalizar sua compra</span>
    @endif

    @else
    <h4 class="mt-5">Ainda não há produtos no carrinho</h4>
    @endif

</section>

@endsection
