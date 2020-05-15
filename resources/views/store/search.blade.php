@extends('layouts.store')

@section('content')
<section class="container pad-cont relative">
    <div class="row">
        <div class="mx-auto col-10 text-center">
            <h2 class="text-uppercase"> {{ $title }} </h2>
        </div>

        <div class="row">
            @foreach ($products as $product)
            <div class="mx-auto col-sm-10 col-md-6 col-lg-3">
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                <span>{{$product->name}}</span>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4 m-auto">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection