<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DeliveBoo') }}</title>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])

        
    </head>
    <body>
        <div id="app">
            {{-- INIZIO NAVBAR --}}
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    {{-- LOGO --}}
                    <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <div class="">
                            LOGO
                        </div>
                        {{-- config('app.name', 'Laravel') --}}
                    </a>
                    {{-- HAMBURGER MENU --}}
                    <button class="navbar-toggler hamburger_menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    {{-- FINE HAMBURGER MENU --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto ">
                            {{-- HOME --}}
                            <li class="nav-item nav_item_hover">
                                <a class="nav-link text-white fs-5 p-1" href="{{url('/') }}">{{ __('Home') }}</a>
                            </li>
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- ACCEDI -->
                            @guest
                            <li class="nav-item nav_item_hover">
                                <a class="nav-link text-white fs-5 p-1" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                            {{-- DROP DOWN MENU --}}
                            @else
                            <li class="nav-item dropdown">
                                {{-- NOME UTENTE REGISTRATO --}}
                                

                                <a id="navbarDropdown" class="nav-link dropdown-toggle  nav_auth_hover text-dark text-uppercase fs-5 p-1" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                
                                {{-- LISTA DROP DOWN --}}
                                <div class="nav_drop_menu dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item nav_itemdrop_hover" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                    <a class="dropdown-item nav_itemdrop_hover" href="{{ route('admin.resturants') }}">{{__('Il tuo Ristorante')}}</a>
                                    <a class="dropdown-item nav_itemdrop_hover" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Esci') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- FINE NAVBAR --}}
            <main class="">
                @yield('content')
            </main>
        </div>
    </body>

</html>
