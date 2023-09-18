@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- UTENTE RISTORATORE --}}
        <h2 class="text-center text-white"> Ciao <span class="text-dark">{{ $user->name }}</span>!</h2>
        {{-- NOME RISTORANTE --}}
        <h4 class="text-center text-white mb-4">Gestisci qui il menù del tuo ristorante <em class="text-dark">{{ $resturant->name }}</em>.</h4>
        <div class="row justify-content-center">

            <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
                {{-- TIPI RISTORANTE --}}
                <ul class="list-unstyled text-center">
                    @foreach($resturant->types as $type)
                        <li>
                            {{$type->name}}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-12 col-md-4 d-flex justify-content-center">
                {{-- FOTO RISTORANTE --}}
                <img class="rounded-circle img_resturant" src="{{ asset( 'storage/'.$resturant->cover_image)}}" alt="{{$resturant->name}}">
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">

                <div class="d-flex">
                    {{-- PULSANTE EDIT PIATTI  --}}
                    <a href="{{ route('admin.dishes.index')}}" class="button_delive_two btn btn-sm me-3" type="button">
                        Modifica Men&uacute;
                        <i class="fa-solid fa-arrow-turn-up ms-1" style="color: #ffffff;"></i>
                    </a>
                    {{-- PULSANTE EDIT RISTORANTE --}}
                    <a href="{{ route('admin.resturants.edit')}}" class="button_delive_two btn btn-sm d-flex align-items-center" type="button">
                        Modifica Ristorante
                    </a>
                </div>
                
            </div>
        </div>

        <div class="row mb-5 mt-5">
            <div class="col-12 col-md-8 offset-md-2 px-4">
                @if(count($resturant->dishes) !== 0)
                    
                    <ul class="list-group list-group-flush">
                        {{-- MENU --}}
                        <li class="list-group-item">
                            <h2 class="text-center">
                                Men&uacute;
                            </h2>
                        </li>
                        @foreach ($resturant->dishes as $item)
                        <li class="list-group-item">
                            <div class="d-flex justify-content-between mt-2">
                                {{-- NOME PIATTO --}}
                                <h4 class=" text-primary">
                                    {{$item->name}}
                                </h4>
                                <span class="fs-6 text-dark">
                                {{-- PREZZO --}}
                                    &euro;{{ $item->price}}
                                </span>
                            </div>
                            
                            {{-- INGREDIENTI --}}
                            <p>
                                {{ $item->ingredients}}
                            </p>  
                        </li>
                        @endforeach
                    </ul>
                @endif
                
            </div>
        </div>
        
        {{-- FINE PIATTI --}}
    </div>
@endsection