<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DeliveBoo') }}</title>
        {{-- Favicon --}}
        <link rel="icon" sizes="128x128" href="./storage/logo/favicon.png" type="image/png" >


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])

        
    </head>
    <body>
        <div id="app">
            {{-- NAVBAR --}}
            <nav class="navbar navbar-expand-md bg_navbar">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center" href="http://localhost:5174/">
                        {{-- LOGO --}}
                        <img src="{{asset('storage/logo/logo-deliveboo.png')}}" class="logo_size" alt="logo-deliveboo">
                        {{-- DELIVEBOO --}}
                        <img src="{{asset('storage/logo/deliveboo.png')}}" class="deliveboo_size d-none d-md-block" alt="deliveboo">
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
                            @guest                    
                            <li class="nav-item nav_item_hover">
                                <a class="nav-link text-dark fs-6 p-1" href="{{url('/') }}">{{ __('Home') }}</a>
                            </li>
                            @else
                            <li class="nav-item nav_item_hover">
                                <a class="nav-link text-dark fs-6 p-1" href="{{ route('admin.resturants') }}">{{ __('Home') }}</a>
                            </li>
                            <li class="nav-item nav_item_hover">
                                <a class="nav-link text-dark fs-6 p-1" href="{{ route('admin.dishes.index') }}">{{ __('Piatti') }}</a>
                            </li>
                            <li class="nav-item nav_item_hover">
                                <a class="nav-link text-dark fs-6 p-1" href="{{ route('admin.orders.index') }}">{{ __('Ordini') }}</a>
                            </li>
                            <li class="nav-item nav_item_hover">
                                <a class="nav-link text-dark fs-6 p-1" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                            </li>
                            @endguest
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- ACCEDI -->
                            @guest
                            <li class="nav-item nav_item_hover">
                                <a class="nav-link text-dark fs-6 p-1" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                            {{-- DROP DOWN MENU --}}
                            @else
                            <li class="nav-item d-flex align-items-center">
                                {{-- NOME UTENTE REGISTRATO --}}
                                <a id="navbarDropdown" class="nav-link nav_auth_hover text-dark text-uppercase fs-5 p-1" href="#" role="button">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center ps-md-3 ">
                                <a class="nav-link nav_auth_hover text-dark text-capitalize p-1 pt-2 d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Esci') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
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