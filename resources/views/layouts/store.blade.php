<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GVPM Store</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/os.js') }}" defer></script>
    @yield('css')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/os.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script>
        document.addEventListener("DOMContentLoaded", function() {
	        OverlayScrollbars(document.querySelectorAll("body"), { });
        });
    </script>

    @yield('javascript')
</head>

<body>
    <div id="app">

        <nav class="navbar store navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    GVPM Store
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-white" id="navbarCategoria" role="button"
                                data-toggle="dropdown"> Categorias</a>

                            <div class="dropdown-menu" aria-labelledby="navbarCategoria">
                                @foreach (\App\Category::all() as $category)
                                <a class="dropdown-item"
                                    href="{{ route('search-category', $category->id) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle text-white" id="navbarTag" role="button"
                                data-toggle="dropdown"> Tags</a>

                            <div class="dropdown-menu" aria-labelledby="navbarTag">
                                @foreach (\App\Tag::all() as $tag)
                                <a class="dropdown-item" href="{{ route('search-tag', $tag->id) }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                    <!-- Left Side Of Navbar -->

                    <form class="form-group m-0 w-50" action="{{ route('search-product') }}">
                        <div class="input-group search-space">
                            <input type="text" class="form-control" placeholder="Busque por um produto : )" name="s">
                            <div class="input-group-append">
                                <button class="search-btn" type="submit">Buscar <i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                        </li>
                        @endif

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{route('user.edit')}}" class="dropdown-item">Perfil</a>

                                @if (Auth::user()->role == 'admin')
                                <a href="{{route('home')}}" class="dropdown-item">Painel admin</a>
                                @endif

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('Logout') }}</button>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}">
                                <i class="fas fa-shopping-cart text-white"></i>

                                <span class="badge badge-pill badge-danger">
                                    {{ Auth::user()->cart->count() }}
                                </span>
                            </a>
                        </li>
                        @endguest
                        <!-- Authentication Links -->
                    </ul>
                    <!-- Right Side Of Navbar -->
                </div>
        </nav>

        <main>
            <div class="container">
                @if(session()->has('success'))
                <div class="alert alert-success mt-2">
                    <i class="far fa-thumbs-up"></i> {{ session()->get('success') }}
                </div>
                @endif

                @if(session()->has('error'))
                <div class="alert alert-danger mt-2">
                    <i class="fas fa-times-circle"></i> {{ session()->get('error') }}
                </div>
                @endif
            </div>

            @yield('content')
        </main>

        <footer class="container-float bg-footer p-4">
            <div class="row">
                <div class="col-12">
                    <span class="text-white">Copyright © 2020 GVPM Store</span>
                </div>
            </div>
        </footer>

    </div>


    </div>
</body>

</html>
