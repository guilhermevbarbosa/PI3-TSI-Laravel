@extends('layouts.app')
@section('content')
<h2 class="text-center">Criar tag</h2>

<form action="{{ route('tags.store') }}" class="p-3 col-md-6 offset-md-3 col-sm-12" method="POST">

    @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item text-danger mb-1"><i class="far fa-times-circle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @csrf

    <div class="card">
        <div class="card-body">
            <div class="label-float">
                <input name="name" type="text" placeholder=" " value="{{ old('name') }}" />
                <label>Nome</label>
            </div>

            <button type="submit" class="btn btn-success mt-4 float-right">Criar</button>
        </div>
    </div>
</form>

@endsection