@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="col-12">
            <h2 class="text-white text-center my-4">
                Crea il tuo nuovo Piatto
            </h2>
        </div>
        <div class="col-12">
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="btn button_delive_two m-3">Torna alla dashboard</a>
            </div>
            <div class="card">
                <p class="text-center text-secondary">i campi contrassegnati con questo simbolo <strong>*</strong> sono obbligatori</p>
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
                    <button type="submit" class="btn btn-primary m-3">Crea piatto</button>  
                    <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">Torna alla lista piatti</a>
                </form>
            </div>
        </div>
    </div>
@endsection