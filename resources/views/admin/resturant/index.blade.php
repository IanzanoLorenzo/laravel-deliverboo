@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}</h1>
    <h2>{{ $user->resturant->name }}</h2>
@endsection