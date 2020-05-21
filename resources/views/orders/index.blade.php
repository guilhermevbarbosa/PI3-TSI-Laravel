@extends('layouts.app')

@section('content')
<h2 class="text-center">Meus pedidos</h2>

<div>
    <div class="row">

        <table class="table table-striped table-hover">

            <thead class="thead-light">
                <tr class="center">
                    <th scope="col">N° Pedido</th>
                    <th scope="col">Data</th>
                    <th scope="col">Visualizar</th>
                </tr>
            </thead>

            <tbody>

                @if (Auth::user()->orders)
                @foreach ($orders as $order)
                <tr class="center">
                    <th scope="row">{{$order->id}}</th>
                    <th scope="row">{{$order->formatData($order->created_at->timestamp)}}</th>

                    <td>
                        <a href="{{ route('order.show', $order->id) }}">
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <h4 class="mt-5">Ainda não há pedidos realizados</h4>
                @endif
            </tbody>

        </table>
    </div>

</div>

@endsection