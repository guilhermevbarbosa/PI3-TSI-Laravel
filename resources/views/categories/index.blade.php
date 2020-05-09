@extends('layouts.app')
@section('content')
<h2>Lista de categorias</h2>

<div class="d-flex mb-2 justify-content-end">
    <a href="{{route('categories.create')}}" class="btn btn-success right">Nova</a>
</div>

<div>
    <ul class="list-group">
        <li class="list-group-item">
            <span>Nome</span>
            <a href="" class="btn btn-primary btn-sm float-right ml-1">Visualizar</a>
            <a href="" class="btn btn-warning btn-sm float-right ml-1">Editar</a>
            <a href="" class="btn btn-danger btn-sm float-right ml-1">Excluir</a>
        </li>
    </ul>
</div>

@endsection