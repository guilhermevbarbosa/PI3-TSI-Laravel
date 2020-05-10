@extends('layouts.app')

@section('content')
<h2 class="text-center">Lista de produtos</h2>

<div class="d-flex mb-2 justify-content-end">
    <a href="{{route('products.create')}}" class="btn btn-success right"><i class="fas fa-plus-circle"></i> Nova</a>
</div>

<div>
    <div class="row">

        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr class="center">
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Desconto</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Visualizar</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr class="center">
                <th scope="row"><img src="{{ asset('storage/' .$product->image) }}" alt="{{ $product->name }}" width="50" height="50"></th>
                    <th scope="row">{{$product->name}}</th>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->stock }}</td>

                    <td>
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye">
                            </i>
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm"><i
                                class="fas fa-pen"></i></a>
                    </td>

                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Deseja excluir {{ $product->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" href="#" class="btn btn-danger btn-sm"><i
                                    class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection