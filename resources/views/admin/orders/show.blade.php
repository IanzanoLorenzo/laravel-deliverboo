@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-5 p-4">
                    <div class="d-flex justify-content-center">
                        <h1 class="text-primary">Dati Cliente</h1>
                    </div>
                    <div class="row">
                    
                        <div class="col-12 card-body">
                            <div class="text-dark">
                                Nome:
                                <strong> 
                                    {{$order->customer_name}}
                                </strong>
                            </div>

                            <div class="text-dark">
                                Cognome:
                                <strong> 
                                    {{$order->customer_surname}}
                                </strong>
                            </div>
                            
                            <div class="text-dark">
                                E-mail:
                                <strong> 
                                    {{$order->customer_email}}
                                </strong>
                            </div>  

                            <div class="text-dark">
                                Indirizzo:
                                <strong> 
                                    {{$order->address}}
                                </strong>
                            </div> 
                        </div>
                        <div class="d-flex justify-content-center">
                            <h1 class="text-primary">Dati Ordine</h1>
                        </div>
                        <div class="col-12 card-body">
                            <div class="text-dark">
                                <ol class="list-group list-group">
                                    @foreach($order->dishes as $dish)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="text-primary">{{ $dish->name }}</div>
                                            </div>
                                            <strong>{{ $dish->price }}&euro;</strong>
                                            <span class="badge ms-3 bg-primary rounded-pill"><strong>x</strong>{{ $dish->pivot->n_dish }}</span>
                                        </li>
                                    @endforeach
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold">Totale</div>
                                        </div>
                                        <strong> 
                                            {{ number_format($order->total_price, 2, ',','.') }}&euro;
                                        </strong>
                                    </li>
                                </ol>
                            
                            </div>
                              
                            <div class="text-dark">
                                Orario indicato per la consegna:
                                <strong> 
                                    {{ substr($order->delivery_time, 0, 5) }}
                                </strong>
                            </div> 
                            @if($order->note)
                            <div class="text-dark">
                                Note:
                                <strong> 
                                    "{{$order->note}}"
                                </strong>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection