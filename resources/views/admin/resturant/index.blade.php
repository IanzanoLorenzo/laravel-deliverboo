@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1> Benvenuto {{ $user->name }}</h1>
            <h2>{{ $resturant->name }}</h2>
        </div>
        @foreach ($resturant->dishes as $item)
        <div class="row">
            <div class="col-12">
                <div class="card">
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
    </div>
@endsection