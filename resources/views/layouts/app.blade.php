<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">


    <style>
        .grid-container {
            display: grid;
            grid: 150px / auto;
            grid-gap: 10px;

            background-color: #000000;
            padding: 10px;

        }

        .grid-container>div {
            background-color: rgb(42, 165, 236);
            text-align: center;
            padding: 20px 0;
            font-size: 30px;
        }

        .button {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);

        }

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @if (Auth::check())
                    @if (Auth::user()->rol == 2)

                        <a class="navbar-brand" href="{{ url('homeMod') }}">
                            Match Deportes
                        </a>

                    @else
                        <a class="navbar-brand" href="{{ url('home') }}">
                            Match Deportes
                        </a>
                    @endif
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ __('Laravel') }}
                    </a>
                @endif
                @if (Auth::check())

                    @if (Auth::user()->rol == 1 || Auth::user()->rol == 3)

                        <a class="navbar-brand" href="{{ url('deportes/eventos/') }}">
                            {{ __('Eventos') }}
                        </a>
                        <a class="navbar-brand" href="{{ url('deportes/torneos/') }}">
                            {{ __('Torneos') }}
                        </a>
                    @endif
                @endif




                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::check())
                            @if (Auth::user()->rol == 1)
                                <div>
                                    <li class="nav-item dropdown">


                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                            role="button" data-toggle="dropdown" aria-expanded="false">
                                            {{ __('Usuarios') }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu"
                                            aria-labelledby="navbarDarkDropdownMenuLink">


                                            <a class="dropdown-item" href="{{ route('verUsuarios') }}">
                                                {{ __('Ver Usuarios') }}
                                            </a>

                                            <a class="dropdown-item" href="{{ route('crear.usuario') }}">Crear
                                                Usuario</a>

                                        </div>

                                    </li>


                                </div>
                            @endif
                        @endif
                        @if (Auth::check())

                            @if (Auth::user()->rol == 1 || Auth::user()->rol == 3)

                                <div>
                                    <li class="nav-item dropdown">


                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                            role="button" data-toggle="dropdown" aria-expanded="false">
                                            {{ __('Equipos') }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu"
                                            aria-labelledby="navbarDarkDropdownMenuLink">


                                            <a class="dropdown-item" href="{{ route('equipos.ver') }}">
                                                {{ __('Mis Equipos') }}
                                            </a>

                                            <a class="dropdown-item" href="{{ route('equipos.crear') }}">
                                                {{ __('Crear Equipo') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('equipos.buscar') }}">
                                                {{ __('Buscar Equipos') }}
                                            </a>

                                        </div>

                                    </li>


                                </div>
                                <div>
                                    <li class="nav-item dropdown">


                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                            role="button" data-toggle="dropdown" aria-expanded="false">
                                            {{ __('Usuarios') }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu"
                                            aria-labelledby="navbarDarkDropdownMenuLink">

                                            <a class="dropdown-item" href="{{ route('usuario.buscar') }}">
                                                {{ __('Buscar Usuarios') }}
                                            </a>

                                        </div>

                                    </li>


                                </div>
                            @endif
                        @endif
                        <div>
                            <li class="nav-item dropdown">


                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                    role="button" data-toggle="dropdown" aria-expanded="false">
                                    {{ __('Reservas') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">


                                    <a class="dropdown-item" href="{{ route('reserva.buscar') }}">
                                        {{ __('Buscar Reservas') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('reserva.crear') }}">
                                        {{ __('Crear Reserva') }}
                                    </a>


                                </div>

                            </li>


                        </div>
                        @if (Auth::check())
                            @if (Auth::user()->rol == 1)
                                <div>
                                    <li class="nav-item dropdown">


                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                            role="button" data-toggle="dropdown" aria-expanded="false">
                                            {{ __('Complejos Deportivos') }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu"
                                            aria-labelledby="navbarDarkDropdownMenuLink">


                                            <a class="dropdown-item" href="{{ route('complejo.buscar') }}">
                                                {{ __('Buscar Complejos') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ route('complejo.crear') }}">
                                                {{ __('Crear Complejos') }}
                                            </a>


                                        </div>

                                    </li>


                                </div>
                            @endif
                        @endif

                    </ul>



                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>


                                    @if (Auth::check())
                                        <img src="/image/{{ Auth::user()->foto }}" width="50px">

                                        {{ Auth::user()->name }}
                                    @endif




                                    <span class="caret"></span>
                                </a>




                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('ver.perfil') }}">
                                        {{ __('Perfil') }}
                                    </a>




                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>


        <main class="py-4">

            <div class="container-sm">


                @if (session()->has('success'))

                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>

                @endif

                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>


                @endif

                @yield('content')


            </div>
        </main>
    </div>


    @yield('scripts')
</body>





</html>
