@extends('layouts.app')

@section('content')
    <h1> Benvenuto {{ $user->name }}</h1>
    <h2>{{ $resturant->name }}</h2>
    @foreach ($resturant->dishes as $item)
    <p>
            {{$item->name}}
    </p>
        @endforeach
@endsection