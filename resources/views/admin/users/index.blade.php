@extends('layouts.app')

@section('content')
<h2 class="text-center">Lista de usuários</h2>

<div>
    <div class="row">

        <table class="table table-striped table-hover">
            <thead class="thead-light">
                <tr class="center">
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Atualizar tipo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="center">
                    <th scope="row">{{$user->name}}</th>
                    <th scope="row">{{$user->email}}</th>

                    <td>
                        @if($user->id != auth()->user()->id)
                        <form action="{{ route('users.change-admin', $user->id) }}" method="POST"
                            onsubmit="return confirm('Atualizar o Admin da conta {{ $user->name }}?')">
                            @csrf
                            @method('PUT')
                            <button type="submit" href="#"
                                class="btn btn-sm {{ $user->isAdmin() ? 'btn-warning' : 'btn-success'}}">

                                @if($user->isAdmin())
                                <i class="fas fa-shopping-basket"></i> Tornar Cliente
                                @else
                                <i class="fas fa-user-tie"></i> Tornar Admin
                                @endif

                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection