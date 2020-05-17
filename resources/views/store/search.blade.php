@extends('layouts.store')

@section('content')
<section class="container pad-cont relative pd-size">
    <div class="row">
        <div class="mx-auto col-12 mb-5">
            <h2 class="text-uppercase"> {{ $title }} </h2>
            <hr class="title">
        </div>

        <div class="row mx-auto">
            @foreach ($products as $product)
            <div class="col-sm-6 col-md-6 col-lg-3 col-12">
                <div class="card prod mb-3">
                    <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top img-fluid img-store"
                        alt="{{ $product->name }}">

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>

                        <span class="discount">
                            {{ $product->discount }}% off

                            <span class="discount-val">
                                {{ $product->formatMoney($product->price) }}
                            </span>
                        </span>


                        <h5 class="text-muted"> {{ $product->discountPrice() }} </h5>

                        <div class="text-center mt-4">
                            <a href="{{ route('show-product', $product->id) }}" class="btn btn-primary btn-sm mb-3"><i
                                    class="fad fa-eye"></i> Visualizar</a>
                            <a href="#" class="btn btn-success btn-sm mb-3"><i class="fad fa-shopping-cart"></i>
                                Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4 m-auto">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection