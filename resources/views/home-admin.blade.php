@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="mt-5">Bem vindo {{ Auth::user()->name }} ao painel administrativo</h2>
            <p class="mt-4">Navegue pelos menus para</p>

            <ul class="mt-4">
                <li>Administrar usuários</li>
                <li>Administrar tags</li>
                <li>Administrar produtos</li>
                <li>Administrar categorias</li>
            </ul>
        </div>
    </div>
</div>
@endsection
