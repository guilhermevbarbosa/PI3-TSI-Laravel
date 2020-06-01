@extends('layouts.app')

@section('content')
<h3 class="text-center">Pedido {{ $orderNumb }} - <small>{{ $orderDate }}</small></h3>

<div>
    <div class="row">

        <table class="table table-striped table-hover">

            <thead class="thead-light">
                <tr class="center">
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>

            <tbody>

                @for ($i = 0; $i < count($products); $i++) <tr class="center">
                    <th scope="row">
                        <img src="{{ asset('storage/' .$products[$i]->image) }}" alt="{{ $products[$i]->name }}"
                            width="50" height="50">
                    </th>
                    <th scope="row">
                        {{$products[$i]->name}}
                    </th>
                    <th scope="row">
                        {{$amount[$i]}}
                    </th>
                    <th scope="row">
                        R$ {{$price[$i]}}
                    </th>
                    </tr>
                    @endfor
            </tbody>
        </table>

        <div class="total-price">
            Total <br>
            R$ {{ $totalPrice }}
        </div>
    </div>

</div>

@endsection
