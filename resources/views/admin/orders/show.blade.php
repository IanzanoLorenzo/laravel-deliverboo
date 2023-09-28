@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-5 p-4">
            
                    {{-- NOME PIATTO --}}
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h1 class="text-primary">{{$order->customer_name}} {{ $order->customer_surname }}</h1>
                        
                        {{-- <h3>&euro;{{ number_format($dish->price, 2, ',','.') }}</h3> --}}
                    </div>
                    <div class="row">
                    
                        {{-- <div class="col-12 card-body">
                            
                            <span class="text-dark">
                                Ingredienti:
                            </span>  
                            <strong> 
                                {{$dish->ingredients}}
                            </strong>
                            
                            
                            <div>
                                {{$dish->visibility ? 'Il piatto è visibile sul sito' : 'Il piatto non è visibile  sul sito'}}
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection