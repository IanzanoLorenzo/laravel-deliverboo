@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
        <div class="my-4 d-flex justify-content-end">
                <a href="{{route('admin.dishes.index')}}" class="btn btn-sm btn-primary">Torna ai piatti</a>
            </div>
            <div class="col-12 ">
                <h1>{{$dish->name}}</h1>
                <p><strong>ingredienti: {{$dish->ingredients}}</strong></p>
                <h3>prezzo:{{$dish->price}}€</h3>
                <p>{{$dish->visibilty ? 'il piatto è visibile sul sito' : 'il piatto non è visibile  sul sito'}}</p>
            </div>
        </div>
    </div>
@endsection