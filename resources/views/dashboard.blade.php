@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="my-4 text-center fs-1">
                La tua <strong class="text-uppercase">dashboard</strong>
            </h2>
        </div>
        <div class="col">
            <div class="card text-center my-5">
                <div class="card-body">
                    @vite(['resources/js/statistic.js'])
                    <div class="row g-4 mb-5">
                        <div class="col-12 col-md-6">
                            <div id="orderData" data-orderData="{{ json_encode($orderData) }}">
                                <h3>Ammontare delle Vendite</h3>
                                <canvas id="orderStatistics"></canvas>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div id="orderReceivedData" data-orderReceivedData="{{ json_encode($orderReceivedData) }}">
                                <h3>Riepilogo degli Ordini</h3>
                                <canvas id="orderReceivedStatistics"></canvas>
                                <div class="d-flex justify-content-center pt-2">
                                    <a href="{{ route('admin.orders.index')}}" class="btn btn-sm btn-primary" type="button">
                                        Accedi ai tuoi ordini
                                        <i class="fa-solid fa-pencil ms-1" style="color: #ffffff;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5 pb-5">
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
