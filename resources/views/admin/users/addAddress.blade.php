@extends('layouts.app')

@section('javascript')
<script src="{{ asset('js/jquery.mask.min.js') }}" defer></script>
<script src="{{ asset('js/cep.js') }}" defer></script>
@endsection

@section('content')
<h2 class="text-center">Adicionar endereço</h2>

<form action="{{ route('address.store') }}" class="p-3 col-md-6 offset-md-3 col-sm-12" method="POST">

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
            <div class="label-float mb-5">
                <input oninput="getCep(this.value)" name="cep" type="text" placeholder=" " class="cep"
                    value="{{ old('cep') }}" />
                <label>CEP</label>

                <small id="error-cep" style="color: red; display: none">CEP inválido</small>
            </div>


            <div class="label-float mb-5">
                <input name="h_address" id="address" type="text" placeholder=" " value="{{ old('h_address') }}" />
                <label>Endereço</label>
            </div>

            <div class="label-float mb-5">
                <input name="h_number" type="number" placeholder=" " value="{{ old('h_number') }}" />
                <label>Número</label>
            </div>

            <div class="label-float mb-5">
                <input name="neighborhood" id="neig" type="text" placeholder=" " value="{{ old('neighborhood') }}" />
                <label>Bairro</label>
            </div>

            <div class="label-float mb-5">
                <input name="city" id="city" type="text" placeholder=" " value="{{ old('city') }}" />
                <label>Cidade</label>
            </div>

            <div class="label-float mb-5">
                <input name="state" id="state" type="text" placeholder=" " value="{{ old('state') }}" />
                <label>Estado</label>
            </div>

            <button type="submit" class="btn btn-success mt-4 float-right">Salvar</button>
        </div>
    </div>
</form>

@endsection
