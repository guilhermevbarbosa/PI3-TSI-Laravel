@extends('layouts.app')
@section('content')
<h2 class="text-center">Criar categoria</h2>

<form action="{{ route('categories.store') }}" class="p-3 col-md-6 offset-3" method="POST">
    @csrf

    <div class="card">
        <div class="card-body">
            <div class="label-float">
                <input name="name" type="text" placeholder=" " />
                <label>Nome</label>
            </div>

            <button type="submit" class="btn btn-success mt-4 float-right">Criar</button>
        </div>
    </div>
</form>

@endsection