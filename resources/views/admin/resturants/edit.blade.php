@extends('layouts.admin')

@section('content')
@vite(['resources/js/edit_resturant.js'])
    <div class="container mb-5 pb-5">
        <h2 class="text-white text-center my-4">
            Modifica il tuo Ristorante
        </h2>
        <div class="col-12">
            {{-- PULSANTE TORNA ALLA DASHBOARD --}}
            <div class="text-end">
                <a href="{{ route('dashboard') }}" class="btn button_delive_two m-3">
                    Torna alla dashboard
                    <i class="fas fa-arrow-right-from-bracket"></i>
                </a>
            </div>
            {{-- CARD --}}
            <div class="card mb-5">
                <p class="text-center text-secondary pt-4">i campi contrassegnati con questo simbolo <strong>*</strong> sono obbligatori</p>
                {{-- FORM --}}
                <form id='edit_resturant' action="{{route('admin.resturants.update', $resturant)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group p-3">
                        {{-- Nome Ristorante --}}
                        <label class="control-label">Nome Ristorante *</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il nome del piatto" value="{{ old('name') ?? $resturant->name }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group p-3">
                        {{-- Via del Ristorante --}}
                        <label class="control-label">Indirizzo *</label>
                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Inserisci gli ingredienti" value="{{ old('address') ?? $resturant->address }}" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    {{-- Tipologia --}}
                    <div class="form-group p-3">
                        <label for="type_name" class="col-md-4 col-form-label text-md-right">{{ __('Tipologia') }} *</label>
                        <div class="col-12">
                            {{-- CHECKBOX --}}
                            @foreach ($types as $type)
                                <div class="input-group">
                                    <input id="type_name{{ $type->id }}" type="checkbox" class="form-check-input mx-3 @error('type_name') is-invalid @enderror" name="type_name[]" value="{{ $type->id }}" @if ($errors->any())
                                    {{ in_array($type->id, old('type_name', [])) ? 'checked' : ''}}
                                    @else
                                        {{ $resturant->types->contains($type->id) ? 'checked' : '' }}
                                    @endif>
                                    <label class="" for="type_name{{ $type->id }}">{{ $type->name }}</label>
                                </div>
                                @endforeach
                                <span id="checkboxError" class="invalid-feedback" style="display: none;">Selezionare almeno una tipologia.</span>
                                @error('type_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                
                    {{-- IMMAGINE RISTORANTE --}}
                    <div class="form-group p-3">
                        <label class="contol-label">Immagine</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image') is-invalid @enderror" placeholder="Inserisci il prezzo">
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror 
                        @if($resturant->cover_image !== null)
                        <img class="img-thumbnail rounded-circle img_resturant mt-3" src="{{asset('storage/'.$resturant->cover_image)}}" alt="">
                        @else
                        <div>Nessuna immagine presente.</div>
                        @endif
                    </div>
                    {{-- PULSANTE MODIFICA RISTO --}}
                    <button type="submit" class="btn btn-warning m-3">
                        Modifica Ristorante
                    </button> 
                    {{-- PULSANTE ANNULLA --}} 
                    <a href="{{ url()->previous() }}" class="btn btn-danger text-white m-3 m-md-0">
                        Annulla Modifica
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection