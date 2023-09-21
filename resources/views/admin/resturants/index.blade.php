@extends('layouts.admin')

@section('content')
    <div class="container">
        {{-- UTENTE RISTORATORE --}}
        <h2 class="text-center text-white"> Benvenuto <span class="text-dark">{{ $user->name }}</span>!</h2>
        {{-- NOME RISTORANTE --}}
        <h4 class="text-center text-white mb-4">Gestisci qui il menù del tuo ristorante <em class="text-dark">{{ $resturant->name }}</em>.</h4>
        <div class="row justify-content-center">

            <div class="col-12 col-md-4 d-flex flex-column justify-content-center">
                {{-- TIPI RISTORANTE --}}
                <ul class="list-unstyled text-center text-md-end ">
                    @forelse ($resturant->types as $type)
                    <li>
                        {{$type->name}}
                    </li>
                    @empty
                    <li>
                        Nessun tipo selezionato
                    </li>
                    @endforelse
                </ul>
            </div>

            <div class="col-12 col-md-4 d-flex justify-content-center">
                {{-- FOTO RISTORANTE --}}
                <img class="rounded-circle img_resturant" src="@if($resturant->cover_image !== null){{ asset( 'storage/'.$resturant->cover_image)}}@else {{ asset( 'storage/cover_images/default.png')}}@endif" alt="{{$resturant->name}}">
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">

                <div class="d-flex mt-4 mt-md-0">
                    {{-- PULSANTE EDIT PIATTI  --}}
                    <a href="{{ route('admin.dishes.index')}}" class="button_delive_two btn btn-sm me-3" type="button">
                        Modifica Men&uacute;
                        <i class="fa-solid fa-arrow-turn-up ms-1" style="color: #ffffff;"></i>
                    </a>
                    {{-- PULSANTE EDIT RISTORANTE --}}
                    <a href="{{ route('admin.resturants.edit')}}" class="button_delive_two btn btn-sm d-flex align-items-center" type="button">
                        Modifica Ristorante
                        <i class="fa-solid fa-arrow-turn-up ms-1" style="color: #ffffff;"></i>
                    </a>
                </div>
                
            </div>
            @if (session('message'))
            <div class="alert alert-success col-12 col-md-8 mt-3">
                {{session('message')}}
            </div>
            @endif
        </div>

        
        <div class="row mb-5 mt-5 position-relative">
            {{-- LEGENDA --}}
            <div class="col-2 position_tr d-none d-md-block">
                <div class="card text-center">
                    <div class="bg-primary text-white p-1">Legenda</div>
                    <div class="bg-white p-1">Visibile</div>
                    <div class="back-nv p-1">Non Visibile</div>
                </div>
            </div>
            {{-- LEGENDA --}}
            <div class="col-12 col-md-8 offset-md-2 px-4">
                @if(count($resturant->dishes) !== 0)
                    
                    <ul class="list-group list-group-flush">
                        {{-- MENU --}}
                        <li class="list-group-item bg-primary text-white">
                            <h2 class="text-center">
                                Men&uacute;
                            </h2>
                        </li>
                        @foreach ($resturant->dishes as $item)
                        <li class="list-group-item @if(!$item->visibility) list-group-item-secondary @endif">
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
                            <p class="pe-3">
                                {{ $item->ingredients}}
                            </p>  
                            
                            {{-- INGREDIENTI --}}
                        </li>
                        @endforeach
                    </ul>
                @endif
                
            </div>
        </div>
        
        {{-- FINE PIATTI --}}
    </div>
@endsection