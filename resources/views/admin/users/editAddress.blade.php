@extends('layouts.app')

@section('javascript')
<script src="{{ asset('js/jquery.mask.min.js') }}" defer></script>
<script src="{{ asset('js/cep.js') }}" defer></script>
@endsection

@section('content')
<h2 class="text-center">Editar endereço</h2>

<form action="{{ route('address.update') }}" class="p-3 col-md-6 offset-md-3 col-sm-12" method="POST">

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
    @method('PUT')

    <div class="card">
        <div class="card-body">
            <div class="label-float mb-5">
                <input oninput="getCep(this.value)" name="cep" type="text" placeholder=" " class="cep"
                    value="{{ $address->cep }}" />
                <label>CEP</label>

                <small id="error-cep" style="color: red; display: none">CEP inválido</small>
            </div>

            <div class="label-float mb-5">
                <input name="h_address" type="text" placeholder=" " value="{{ $address->h_address }}" />
                <label>Endereço</label>
            </div>

            <div class="label-float mb-5">
                <input name="h_number" type="number" placeholder=" " value="{{ $address->h_number }}" />
                <label>Número</label>
            </div>

            <div class="label-float mb-5">
                <input name="neighborhood" type="text" placeholder=" " value="{{ $address->neighborhood }}" />
                <label>Bairro</label>
            </div>

            <div class="label-float mb-5">
                <input name="city" type="text" placeholder=" " value="{{ $address->city }}" />
                <label>Cidade</label>
            </div>

            <div class="label-float mb-5">
                <input name="state" type="text" placeholder=" " value="{{ $address->state }}" />
                <label>Estado</label>
            </div>

            <button type="submit" class="btn btn-success mt-4 float-right">Salvar</button>
        </div>
    </div>
</form>

@endsection
