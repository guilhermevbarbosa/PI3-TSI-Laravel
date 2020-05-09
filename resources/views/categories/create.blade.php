@extends('layouts.app')
@section('content')
<h2>Criar categoria</h2>

<form action="{{ route('categories.store') }}" class="p-3 bg-white" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Nome da categoria">
    </div>

    <button type="submit" class="btn btn-success">Criar</button>
</form>

@endsection