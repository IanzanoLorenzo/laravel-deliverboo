@extends('layouts.admin')

@section('content')
<div class="container">
    {{-- PULSANTE --}}
    <div class="my-4 d-flex justify-content-end">
        <a href="{{route('admin.dishes.index')}}" class="btn btn-sm btn-primary">
            Torna ai piatti
        </a>
    </div>
    <h2 class="text-white text-center">Visualizza i dettagli del tuo piatto</h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <div class="card my-5 p-4">

        {{-- NOME PIATTO --}}
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="text-primary">{{$dish->name}}</h1>
            
            <h3>&euro;{{$dish->price}}</h3>
        </div>
        <div class="row">
        
            <div class="col-12 card-body">
                
                <span class="text-dark">
                    Ingredienti:
                </span>  
                <strong> 
                    {{$dish->ingredients}}
                </strong>
                
                
                <div>
                    {{$dish->visibility ? 'Il piatto è visibile sul sito' : 'Il piatto non è visibile  sul sito'}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{route('admin.dishes.edit', $dish)}}" class="btn btn-primary">Modifica il piatto</a>
        </div>
    </div>
    
</div>
@endsection
    
