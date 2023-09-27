@extends('layouts.admin')


@section('content')

    {{-- JUMBOTRON --}}
    <div class="container-fluid">
        @guest
        {{-- BENVENUTO QUEST --}}
        <div class="container mt-5">
            <h1 class="text-light display-5 fw-bold text-center mt-4">
                Inizia ad utilizzare il tuo gestionale di <em class="text-dark shadow_title">DeliveBoo!</em>
            </h1>
        </div>
        @endguest
        @auth
        <div class="container mt-5">
            {{-- NOME UTENTE REGISTRATO --}}
            <h1 class="text-light display-5 fw-bold text-center mt-4"class="text-light display-5 fw-bold text-center mt-4">
            Salve <span class="text-dark">{{Auth::user()->name}}</span>!
            </h1>
            {{-- PARAGRAFO UTENTE REGISTRSTO --}}
            <h3 class="text-light text-center mt-4">
            Siamo lieti di averti con noi! Grazie per aver scelto il nostro servizio per gestire 
            il tuo ristorante e raggiungere i tuoi clienti.
            </h3>
        </div>
        @endauth
        <div class="container py-3">
            <hr class="text-white hr_style">
            <div class="row pt-4">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    {{-- PARAGRAFO GUEST --}}
                    @guest
                    <p class="text-white fs-5 lh-lg">
                        Se hai mai desiderato <span class="text-dark fw-bold">semplificare</span> la gestione del tuo ristorante o servizio di 
                        consegna di cibo a domicilio, sei nel <span class="text-dark fw-bold">posto giusto</span>.
                        <br> 
                        <br>
                        Il nostro sistema di gestione 
                        è stato progettato su misura per le tue esigenze, 
                        offrendoti la soluzione completa 
                        per rendere la tua attività più 
                        <span class="text-dark fw-bold">efficiente</span>
                        e <span class="text-dark fw-bold">redditizia</span>.
                    </p>
                    @endguest
                    {{-- PARAGRAFO REGISTRATO--}}
                    @auth
                    <p class="text-white fs-5 lh-lg">
                        In questa pagina troverai tutte le informazioni e le funzionalità necessarie 
                        per gestire il tuo business in modo efficace. 
                        Potrai creare il tuo <span class="text-dark fw-bold">menù</span>, 
                        gestire gli <span class="text-dark fw-bold">ordini</span>, 
                        monitorare le <span class="text-dark fw-bold">vendite</span> e molto altro ancora.
                        <br> 
                        <br>
                        Siamo a tua disposizione per qualsiasi domanda o necessità. Contattaci per saperne di più su come possiamo 
                        aiutarti a far <span class="text-dark fw-bold">crescere il tuo ristorante</span>.
                    </p>
                    @endauth
                </div> 
                <div class="col-12 col-md-6 ">
                    {{-- Immagine gestionale --}}
                    <img class="img-fluid pb-4 pt-4 pt-md-0"  src="{{ asset('storage/img/vector_gestionale.png') }}" alt="">
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