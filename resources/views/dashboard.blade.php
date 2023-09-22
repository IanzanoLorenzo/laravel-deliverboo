@extends('layouts.admin')

@section('content')
<div class="container">

    <h2 class="fs-4 text-dark text-uppercase text-center my-4">
        {{ __('Dashboard') }}
    </h2>
    @if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('La tua Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Accesso eseguito correttamente!') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-12 col-md-6 mt-4 ">
            <div class="d-flex justify-content-center justify-content-md-end">
                {{-- PULSANTE RISTORANTE --}}
                <a href="{{ route('admin.resturants' )}}" class="btn button_delive_three">
                    Vai al tuo Ristorante <br> con il Men&uacute;
                </a>
            </div>
        </div>
        
        <div class="col-12 col-md-6 mt-4">
            <div class="h-100 d-flex justify-content-center justify-content-md-start">
                {{-- PULSANTE EDIT PIATTI --}}
                <a href="{{ route('admin.dishes.index' )}}" class="btn button_delive_two d-flex align-items-center">
                    Vai ai tuoi Piatti
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
