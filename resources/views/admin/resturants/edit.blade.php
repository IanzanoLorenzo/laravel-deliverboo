@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="col-12">
            <h2 class="fs-4 text-secondary my-4">
                Modifica il tuo Ristorante
            </h2>
        </div>
        <div class="col-12">
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-success m-3">Torna alla dashboard</a>
            </div>
            <div class="card">
                <form action="{{route('admin.resturants.update', $resturant)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group p-3">
                        <label class="control-label">Nome Ristorante</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il nome del piatto" value="{{ old('name') ?? $resturant->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="control-label">Indirizzo</label>
                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Inserisci gli ingredienti" value="{{ old('address') ?? $resturant->address }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- IMMAGINE RISTORANTE --}}
                    <div class="form-group p-3">
                        <label class="contol-label">Immagine</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" placeholder="Inserisci il prezzo">
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror 
                        <img class="img-thumbnail rounded-circle img_resturant" src="{{asset('storage/'.$resturant->cover_image)}}" alt="">
                    </div>
                    <button type="submit" class="btn btn-primary m-3">Modifica Ristorante</button>  
                    <a href="{{ route('admin.resturants') }}" class="btn btn-primary">Torna al Ristorante</a>
                </form>
            </div>
        </div>
    </div>
@endsection