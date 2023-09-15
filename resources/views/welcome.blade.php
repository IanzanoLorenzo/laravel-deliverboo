@extends('layouts.admin')


@section('content')

<div class="bg-dark px-5 mb-4">
    {{-- JUMBOTRON --}}
    <div class="container py-5 ">
        {{-- Titolone --}}
        <h1 class="text-warning display-5 fw-bold">
            Ben arrivato nel tuo gestionale di DeliveBoo!
        </h1>
        <div class="row">
            <div class="col-12 col-md-6 d-flex align-items-center">
                {{-- Paragrafo --}}
                <p class="text-light fs-5">
                    Se hai mai desiderato semplificare la gestione del tuo ristorante o servizio di 
                    consegna di cibo a domicilio, sei nel posto giusto. Il nostro potente sistema di gestione 
                    è stato progettato su misura per le tue esigenze, offrendoti la soluzione completa per rendere 
                    la tua attività più efficiente, redditizia e soddisfacente.
                </p>
            </div>
            <div class="col-12 col-md-6">
                {{-- Immagine gestionale --}}
                <img src="{{ asset('storage/img/gestionale_home.jpg') }}" alt="">
            </div>
            
        </div>
        
        {{-- Pulsante Registrati --}}
        @if (Route::has('register'))
        <a href="{{ route('register')}}" class="btn btn-primary btn-lg" type="button">Registrati</a>
        @endif
    </div>
    {{-- FINE JUMBOTRON --}}
</div>

@endsection