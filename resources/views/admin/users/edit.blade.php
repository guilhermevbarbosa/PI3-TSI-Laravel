@extends('layouts.app')
@section('content')
<h2 class="text-center">Editar perfil</h2>

<form action="{{ route('users.update') }}" class="p-3 col-md-6 offset-md-3 col-sm-12" method="POST">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item text-danger"><i class="far fa-times-circle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-body">
            <div class="label-float mb-5">
                <input name="name" type="text" placeholder=" " value="{{ $user->name }}" />
                <label>Nome</label>
            </div>

            <div class="label-float mb-5">
                <input name="email" type="text" placeholder=" " value="{{ $user->email }}" />
                <label>E-mail</label>
            </div>

            <div class="label-float mb-5">
                <input name="password" type="text" placeholder=" " value="" />
                <label>Senha</label>
            </div>

            <button type="submit" class="btn btn-success mt-4 float-right">Criar</button>
        </div>
    </div>
</form>

@endsection