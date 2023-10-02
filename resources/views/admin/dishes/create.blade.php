@extends('layouts.admin')

@section('content')
    <div class="container mb-5 pb-5">
        <div class="col-12">
            {{-- TITOLONE --}}
            <h2 class="text-white text-center my-4">
                Crea il tuo nuovo Piatto
            </h2>
        </div>
        <div class="col-12">
            {{-- PULSANTE TORNA ALLA DASHBOARD --}}
            <div class="text-end">
                <a href="{{ route('dashboard') }}" class="btn button_delive_two m-3">Torna alla dashboard</a>
            </div>
            <div class="card mb-5">
                {{-- Campi obbbligatori * --}}
                <p class="text-center text-secondary mt-3">i campi contrassegnati con questo simbolo <strong>*</strong> sono obbligatori</p>
                {{-- INIZIO FORM --}}
                <form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group p-3">
                        <label class="control-label">Nome piatto *</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il nome del piatto" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="control-label">Ingredienti *</label>
                        <textarea type="text" name="ingredients" id="ingredients" class="form-control @error('ingredients') is-invalid @enderror" placeholder="Inserisci gli ingredienti" value="{{ old('ingredients') }}" required></textarea>
                        @error('ingredients')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        <label class="contol-label">Prezzo *</label>
                        <div class="input-group">
                            <span class="input-group-text">&euro;</span>
                            <input type="number" step="0.01" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Inserisci il prezzo" value="{{ old('price') }}" min="0" max="999.99" required> 
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
                            <input type="radio" class="btn-check" name="visibility" id="visibility1" autocomplete="off" value="1" required>
                            <label class="btn btn-outline-success" for="visibility1">Visibile</label>
                          
                            <input type="radio" class="btn-check" name="visibility" id="visibility2" autocomplete="off" value="0">
                            <label class="btn btn-outline-danger" for="visibility2">Non visibile</label>
                        </div>
                        @error('visibility')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror 
                    </div>
                    {{-- PULSANTE CREA PIATTO --}}
                    <button type="submit" class="btn btn-warning m-3">Crea piatto</button>  
                    {{-- PULSANTE TORNA AI PIATTI --}}
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary m-3 m-md-0">Torna alla lista piatti</a>
                </form>
                {{-- FINE FORM --}}
            </div>
        </div>
    </div>
@endsection