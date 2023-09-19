@extends('layouts.admin')


@section('content')

    {{-- JUMBOTRON --}}
    <div class="container-fluid">
        @guest
        {{-- BENVENUTO QUEST --}}
        <h1 class="text-light display-5 fw-bold text-center mt-4">
            Ben arrivato nel tuo gestionale di <em class="text-dark shadow_title">DeliveBoo!</em>
        </h1>
        @endguest
        {{-- NOME UTENTE REGISTRATO --}}
        @auth
        <h1 class="text-light display-5 fw-bold text-center mt-4">
            Ben tornato nel tuo gestionale <span class="text-dark">{{Auth::user()->name}}</span>
        </h1>
        @endauth

        <div class="container py-3">
            <hr class="text-white hr_style">
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    {{-- PARAGRAFO GUEST --}}
                    @guest
                    <p class="text-white fs-5">
                        Se hai mai desiderato semplificare la gestione del tuo ristorante o servizio di 
                        consegna di <span class="text-dark fw-bold">cibo a domicilio</span>, sei nel posto giusto.
                        <br> 
                        <br>
                        Il nostro sistema di gestione 
                        è stato progettato su misura per le tue esigenze, offrendoti la <span class="text-dark fw-bold">soluzione completa</span> per rendere 
                        la tua attività più efficiente e redditizia.
                    </p>
                    @endguest
                    {{-- PARAGRAFO REGISTRATO--}}
                    @auth
                    <p class="text-white fs-5">
                        Siamo lieti di averti con noi! Grazie per aver scelto il nostro servizio per gestire 
                        il tuo ristorante e raggiungere i tuoi clienti.
                        <br>
                        <br>
                        In questa pagina troverai tutte le informazioni e le funzionalità necessarie 
                        per gestire il tuo business in modo efficace. 
                        Potrai creare il tuo menù, gestire gli ordini, monitorare le vendite e molto altro ancora.
                        <br> 
                        <br>
                        Siamo a tua disposizione per qualsiasi domanda o necessità. Contattaci per saperne di più su come possiamo 
                        aiutarti a far crescere il tuo ristorante.
                    </p>
                    @endauth
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