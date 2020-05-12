<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GVPM Store</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    @yield('javascript')
</head>

<body>
    <div id="app">


        <main class="py-4 container">
            @if(session()->has('success'))
            <div class="alert alert-success">
                <i class="far fa-thumbs-up"></i> {{ session()->get('success') }}
            </div>
            @endif

            @if(session()->has('error'))
            <div class="alert alert-danger">
                <i class="fas fa-times-circle"></i> {{ session()->get('error') }}
            </div>
            @endif

            @yield('content')
        </main>

    </div>


    </div>
</body>

</html>