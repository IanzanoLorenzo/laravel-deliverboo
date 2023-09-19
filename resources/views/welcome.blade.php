@extends('layouts.admin')


@section('content')

    {{-- JUMBOTRON --}}
    <div class="container-fluid">
        {{-- Titolone --}}
        @guest
        <h1 class="text-light display-5 fw-bold text-center mt-4">
            Ben arrivato nel tuo gestionale di <em class="text-dark shadow_title">DeliveBoo!</em>
        </h1>
        @endguest
        {{-- NOME UTENTE AUTENTICATO --}}
        @auth
        <h1 class="text-light display-5 fw-bold text-center mt-4">
            Ben tornato nel tuo gestionale <span class="text-dark">{{Auth::user()->name}}</span>
        </h1>
        @endauth

        <div class="container py-3">
            <hr class="text-white hr_style">
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    {{-- Paragrafo --}}
                    <p class="text-white fs-5">
                        Se hai mai desiderato semplificare la gestione del tuo ristorante o servizio di 
                        consegna di <span class="text-dark fw-bold">cibo a domicilio</span>, sei nel posto giusto.
                        <br> 
                        <br>
                        Il nostro sistema di gestione 
                        è stato progettato su misura per le tue esigenze, offrendoti la <span class="text-dark fw-bold">soluzione completa</span> per rendere 
                        la tua attività più efficiente e redditizia.
                    </p>
                </div> 
                <div class="col-12 col-md-6 ">
                    {{-- Immagine gestionale --}}
                    <img class="img-fluid"  src="{{ asset('storage/img/gestionale_home.png') }}" alt="">
                </div>
            </div>
            {{-- Pulsante Registrati --}}
            @guest
            @if (Route::has('register'))
                <div class="d-flex justify-content-center justify-content-md-start mt-4 mt-md-0">
                    <a href="{{ route('register')}}" class="button_delive btn btn-lg" type="button">
                        Registrati
                    </a>
                </div>
            @endif    
            @endguest
            
        </div>
        {{-- FINE JUMBOTRON --}}
    </div>
@endsection