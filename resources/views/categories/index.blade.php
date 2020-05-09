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
                <tr class="center">
                    <th scope="row">Nome</th>
                    <td> <a href="" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a></td>
                    <td> <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a></td>
                    <td><a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection