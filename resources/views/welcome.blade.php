@extends('layouts.admin')


@section('content')

    {{-- JUMBOTRON --}}
    <div class="container-fluid">
        
        {{-- Titolone --}}
        <h1 class="text-light display-5 fw-bold text-center mt-4">
            Ben arrivato nel tuo gestionale di <em class="text-dark shadow-title">DeliveBoo!</em>
        </h1>

        <div class="container py-5 ">
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-center">
                    {{-- Paragrafo --}}
                    <p class="text-dark fs-5">
                        Se hai mai desiderato semplificare la gestione del tuo ristorante o servizio di 
                        consegna di <strong class="text-light">cibo a domicilio</strong>, sei nel posto giusto.
                        <br> 
                        <br>
                        Il nostro potente sistema di gestione 
                        è stato progettato su misura per le tue esigenze, offrendoti la <strong class="text-light">soluzione completa</strong> per rendere 
                        la tua attività più efficiente e redditizia.
                    </p>
                </div> 
                <div class="col-12 col-md-6 ">
                    {{-- Immagine gestionale --}}
                    <img class="img-fluid"  src="{{ asset('storage/img/gestionale_home.png') }}" alt="">
                </div>
            </div>
            {{-- Pulsante Registrati --}}
            @if (Route::has('register'))
                <a href="{{ route('register')}}" class="button-delive btn btn-lg" type="button">
                    Registrati
                </a>
            @endif
            
        </div>
        {{-- FINE JUMBOTRON --}}
    </div>
@endsection