@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="col-12">
            <h1 class=" text-white text-center my-4">
                Modifica "{{ $dish->name }}"
            </h1>
        </div>
        <div class="col-12">
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="btn button_delive_two m-3">Torna alla dashboard</a>
            </div>
            <div class="card">
                <p class="text-center text-secondary">i campi contrassegnati con questo simbolo <strong>*</strong> sono obbligatori</p>
                <form action="{{route('admin.dishes.update', $dish)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group p-3">
                        <label class="control-label">Nome piatto *</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il nome del piatto" value="{{ old('name') ?? $dish->name }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="control-label">Ingredienti *</label>
                        <textarea type="text" name="ingredients" id="ingredients" class="form-control @error('ingredients') is-invalid @enderror" placeholder="Inserisci gli ingredienti" required>{{ old('ingredients') ?? $dish->ingredients }}</textarea>
                        @error('ingredients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="contol-label">Prezzo *</label>
                        <div class="input-group">
                            <span class="input-group-text">&euro;</span>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Inserisci il prezzo" value="{{ old('price') ?? $dish->price }}" min="0" max="999.99" step="0.01" required> 
                        </div>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    <div class="form-group p-3">
                        <div>
                            <label class="control-label">Visibilità *</label>
                        </div>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="visibility" id="visibility1" autocomplete="off" value="1" required @if ($dish->visibility)
                            {{'checked'}}
                        @endif>
                            <label class="btn btn-outline-success" for="visibility1">Visibile</label>
                          
                            <input type="radio" class="btn-check" name="visibility" id="visibility2" autocomplete="off" value="0" @if (!$dish->visibility)
                                {{'checked'}}
                            @endif>
                            <label class="btn btn-outline-danger" for="visibility2">Non visibile</label>
                        </div>
                        @error('visibility')
                        <div class="text-danger ">{{ $message }}</div>
                        @enderror 
                    </div>
                    
                    <button type="submit" class="btn btn-primary m-3">Modifica piatto</button>
                    {{-- PULSANTE ANNULLA MODIFICA --}}
                    <a href="{{ url()->previous() }}" class="btn btn-danger text-white">Annulla modifica</a>
                </form>
            </div>
        </div>
    </div>
@endsection