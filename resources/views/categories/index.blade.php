@extends('layouts.app')

@section('content')
<h2 class="text-center">Lista de categorias</h2>

<div class="d-flex mb-2 justify-content-end">
    <a href="{{route('categories.create')}}" class="btn btn-success right"><i class="fas fa-plus-circle"></i> Nova</a>
</div>

<div>
    <div class="row">

        <table class="table">
            <thead class="thead-light">
                <tr class="center">
                    <th scope="col">Nome</th>
                    <th scope="col">Visualizar</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="center">
                    <th scope="row">{{$category->name}}</th>

                    <td>
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye">
                            </i>
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm"><i
                                class="fas fa-pen"></i></a>
                    </td>

                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                            onsubmit="return confirm('Deseja excluir {{ $category->name }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection