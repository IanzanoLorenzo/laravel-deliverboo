@extends('layouts.admin')

@section('content')
@vite(['resources/js/statistic.js'])
    <div class="container bg-white mb-5">
        <div id="orderData" data-orderData="{{ json_encode($orderData) }}">
            <h1>Ammontare delle Vendite</h1>
            <canvas id="orderStatistics"></canvas>
        </div>
    </div>
    <div class="container bg-white">
        <div id="orderReceivedData" data-orderReceivedData="{{ json_encode($orderReceivedData) }}">
            <h1>Riepilogo degli Ordini</h1>
            <canvas id="orderReceivedStatistics"></canvas>
        </div>
    </div>

@endsection

