@extends('layouts.app')

@section('content')
<h2 class="text-center">Meus pedidos</h2>

<div>
    <div class="row">

        <table class="table table-striped table-hover">

            <thead class="thead-light">
                <tr class="center">
                    <th scope="col">Pedido</th>
                    <th scope="col">Data</th>
                    <th scope="col">Visualizar</th>
                </tr>
            </thead>

            <tbody>

                @if (Auth::user()->orders)
                @foreach ($orders as $order)
                <tr class="center">
                    <th scope="row">{{$order->id}}</th>
                    <th scope="row">{{$order->created_at}}</th>

                    <td>
                        <form action="" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </button>
                        </form>
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