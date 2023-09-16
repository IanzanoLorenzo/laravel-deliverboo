@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h1> Benvenuto {{ $user->name }}</h1>
            <h2>{{ $resturant->name }}</h2>
            <div class="col-12 text-end"><a href="{{route('admin.resturants.edit')}}" class="btn btn-primary my-3">Modifica il tuo ristorante</a></div>
            @if (session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
            @endif
        </div>
        @foreach ($resturant->dishes as $item)
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <h4>
                            {{$item->name}}
                    </h4>
                    <p>
                        {{ $item->ingredients}}
                    </p>
                    <p>
                        {{ $item->price}}€
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($resturant->types as $type)
            {{$type->name}}
        @endforeach
    </div>
@endsection