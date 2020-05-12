@extends('layouts.store')

@section('css')
<link href="{{ asset('css/swiper.css') }}" rel="stylesheet">
@endsection

@section('javascript')
<script src="{{ asset('js/swiper.js') }}"></script>
<script src="{{ asset('js/home-swipe.js') }}"></script>
@endsection

@section('content')
<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="https://via.placeholder.com/1080x400/FEFEFE">
        </div>

        <div class="swiper-slide">
            <img src="https://via.placeholder.com/1080x400/dc4e4e">
        </div>

        <div class="swiper-slide">
            <img src="https://via.placeholder.com/1080x400/179636">
        </div>
    </div>

    <!-- Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Pagination -->

    <!-- Navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <!-- Navigation buttons -->
</div>

{{-- {{ $products }} --}}
@endsection