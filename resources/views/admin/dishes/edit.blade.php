@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="col-12">
            <h2 class="fs-4 text-secondary my-4">
                Crea il tuo nuovo Piatto
            </h2>
        </div>
        <div class="col-12">
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-success m-3">Torna alla dashboard</a>
            </div>
            <div class="card">
                <form action="{{route('admin.dishes.update', $dish)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group p-3">
                        <label class="control-label">Nome piatto</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il nome del piatto" value="{{ old('name') ?? $dish->name }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="control-label">Ingredienti</label>
                        <textarea type="text" name="ingredients" id="ingredients" class="form-control @error('ingredients') is-invalid @enderror" placeholder="Inserisci la descrizione del progetto">{{ old('ingredients') ?? $dish->ingredients }}</textarea>
                        @error('ingredients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="contol-label">Prezzo</label>
                        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Inserisci il nome dell'autore" value="{{ old('price') ?? $dish->price }}"> 
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <div class="form-group p-3">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="visibility" id="visibility1" autocomplete="off" value="1" @if ($dish->visibility)
                            {{'checked'}}
                        @endif>
                            <label class="btn btn-outline-success" for="visibility1">Visibile</label>
                          
                            <input type="radio" class="btn-check" name="visibility" id="visibility2" autocomplete="off" value="0" @if (!$dish->visibility)
                                {{'checked'}}
                            @endif>
                            <label class="btn btn-outline-danger" for="visibility2">Non visibile</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary m-3">Crea piatto</button>  
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">Torna alla lista piatti</a>
                </form>
            </div>
        </div>
    </div>
@endsection