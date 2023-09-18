@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            {{-- UTENTE RISTORATORE --}}
            <h2 class="text-center text-white"> Ciao <span class="text-dark">{{ $user->name }}</span>!</h2>
            {{-- NOME RISTORANTE --}}
            <h4 class="text-center text-white mb-4">Gestisci qui il menù del tuo ristorante <em class="text-dark">{{ $resturant->name }}</em>.</h4>

            {{-- *********** WIP ************  --}}
            <ul class="list-unstyled">
                @foreach($resturant->types as $type)
                    <li>
                        {{$type->name}}
                    </li>
                @endforeach
            </ul>
            {{-- *********** WIP  *************--}}
        </div>

        {{-- PIATTI --}}
        @foreach ($resturant->dishes as $item)
        <div class="row">
            <div class="col-6">
                <div class="card text-center">
                    <h4>
                        {{$item->name}}
                    </h4>
                    <p>
                        {{ $item->ingredients}}
                    </p>
                    <p>
                        {{ $item->price}}
                    </p>
                </div>
            </div>
            <div class="col-6">

            </div>
        </div>
        @endforeach
        @foreach ($resturant->types as $type)
            {{$type->name}}
        @endforeach
    </div>
@endsection