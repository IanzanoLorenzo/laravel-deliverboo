@extends('layouts.app')

@section('content')
    <h1> Benvenuto {{ $user->name }}</h1>
    <h2>{{ $resturant[0]->name }}</h2>
    @foreach ($resturant[0]->dishes as $item)
    <p>
            {{$item->name}}
    </p>
        @endforeach
@endsection