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
                    @vite(['resources/js/statistic.js'])
                    <div class="row g-4 mb-5">
                        <div class="col-12 col-md-6">
                            <div id="orderData" data-orderData="{{ json_encode($orderData) }}">
                                <h1>Ammontare delle Vendite</h1>
                                <canvas id="orderStatistics"></canvas>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div id="orderReceivedData" data-orderReceivedData="{{ json_encode($orderReceivedData) }}">
                                <h1>Riepilogo degli Ordini</h1>
                                <canvas id="orderReceivedStatistics"></canvas>
                            </div>
                        </div>
                    </div>
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
