<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

        <nav class="navbar store fixed-top navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
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
                            <a href="#" class="nav-link dropdown-toggle" id="navbarCategoria" role="button"
                                data-toggle="dropdown"> Categorias</a>

                            <div class="dropdown-menu" aria-labelledby="navbarCategoria">
                                @foreach (\App\Category::all() as $category)
                                <a class="dropdown-item"
                                    href="{{ route('search-category', $category->id) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="navbarTag" role="button"
                                data-toggle="dropdown"> Tags</a>

                            <div class="dropdown-menu" aria-labelledby="navbarTag">
                                @foreach (\App\Tag::all() as $tag)
                                <a class="dropdown-item" href="{{ route('search-tag', $tag->id) }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif

                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{route('user.edit')}}" class="dropdown-item">Perfil</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('Logout') }}</button>
                                </form>
                            </div>
                        </li>
                        @endguest
                        <!-- Authentication Links -->
                    </ul>
                    <!-- Right Side Of Navbar -->
                </div>
        </nav>

        <main>
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

        <footer class="container-float bg-footer p-5">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <h2 class="h4">Localização</h2>
                    <address>
                        Rua Lorem, ipsum dolor, 386 <br>
                        Lorem, ipsum - Lorem, LR. <br>
                        CEP: 0000-000 <br>
                        Telefone: (11) 8888-8888
                    </address>
                </div>
                <div class="col-sm-12 col-md-4">
                    <h2 class="h4">Horário de funcionamento</h2>
                    <ul class="list-unstyled pl-2">
                        <li>Segunda - Sexta: 9:00 - 20:00</li>
                        <li>Sábado: 9:00 - 16:00</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-4">
                    <h2 class="h4">Mapa</h2>

                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://www.openstreetmap.org/export/embed.html?bbox=-46.47894322872162%2C-23.547818703515524%2C-46.47186219692231%2C-23.543274664058107&amp;layer=mapnik"
                        style="border: 1px solid black"></iframe><br /><small><a
                            href="https://www.openstreetmap.org/#map=18/-23.54555/-46.47540">Ver Mapa
                            Ampliado</a></small>
                </div>
            </div>
        </footer>

    </div>


    </div>
</body>

</html>