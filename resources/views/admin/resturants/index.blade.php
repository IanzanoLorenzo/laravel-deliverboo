@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mt-5">
                {{-- UTENTE RISTORATORE --}}
            <div class="col-12">
                <h2 class="text-center text-white">
                    Salve 
                    <strong class="text-dark">{{ $user->name }}</strong>
                    !
                </h2>
            </div>
            {{-- NOME RISTORANTE --}}
            <div class="col-12">
                <h4 class="text-center text-white mb-4">
                    Gestisci qui il menù del tuo ristorante
                    <em class="text-dark display-6">{{ $resturant->name }}</em>
                    .
                </h4>
            </div>
            <div class="col-12"><hr class="text-white hr_style mb-4"></div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12 offset-md-1 col-md-3 d-flex flex-column justify-content-center">
                {{-- TIPI RISTORANTE --}}
                <ul class="list-unstyled text-center text-md-start text-uppercase text-white fs-5">
                    @forelse ($resturant->types as $type)
                    <li>
                        <i class="fs-3 me-1 fa {{$type->icon}}"></i> 
                        <span>{{$type->name}}</span> 
                    </li>
                    @empty
                    <li class="bg-white p-1 text-danger text-uppercase">
                        Nessun tipo selezionato
                    </li>
                    @endforelse
                </ul>       
            </div>

            <div class="col-12 col-md-4 d-flex flex-column justify-content-center align-items-center">
                {{-- FOTO RISTORANTE --}}
                <img class="rounded-circle img_resturant" src="@if($resturant->cover_image !== null){{ asset( 'storage/'.$resturant->cover_image)}}@else {{ asset( 'storage/cover_images/default.png')}}@endif" alt="{{$resturant->name}}">
                <div class="mt-4 d-flex justify-content-center flex-wrap">
                    <a class="btn button_delive_three" href="{{route('admin.orders.index')}}">I tuoi ordini</a>
                    <a class="btn button_delive_two" href="{{route('admin.dishes.create')}}">Crea nuovo piatto</a>
                </div>
            </div>
            <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">

                <div class="d-flex mt-4 mt-md-0">
                    {{-- PULSANTE EDIT RISTORANTE --}}
                    <a href="{{ route('admin.resturants.edit')}}" class="me-3 button_delive_two btn btn-sm btn btn-sm d-flex align-items-center" type="button">
                        Modifica Ristorante
                        <i class="fa-solid fa-pencil ms-1" style="color: #ffffff;"></i>
                    </a>
                    {{-- PULSANTE EDIT PIATTI  --}}
                    <a href="{{ route('admin.dishes.index')}}" class="button_delive_two btn btn-sm" type="button">
                        Modifica Piatti
                        <i class="fa-solid fa-pencil ms-1" style="color: #ffffff;"></i>
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
            {{-- LEGENDA TABLET--}}
            <div class="col-2 position_tr d-none d-md-block">
                <div class="card text-center">
                    <div class="bg-primary text-white p-1">Legenda</div>
                    <div class="bg-white p-1">Visibile</div>
                    <div class="back-nv p-1">Non Visibile</div>
                </div>
            </div>
            {{-- FINE LEGENDA --}}
        </div>
        <div class="row mb-5 mt-5">

            <div class="col-12 col-md-8 offset-md-2">
                @if(count($resturant->dishes) !== 0)
                    
                    <ul class="list-group list-group-flush">
                        {{-- INIZIO MENU --}}
                        <li class="list-group-item">
                            <h2 class="text-center">
                                
                                Men&uacute;
                                
                            </h2>
                            {{-- LEGENDA MOBILE--}}
                            <div class="d-block d-md-none border">
                                <div class="bg-white p-1">Visibile</div>
                                <div class="back-nv p-1">Non Visibile</div>
                            </div>
                            {{-- FINE LEGENDA --}}
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