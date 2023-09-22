@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- Registrazione --}}
                <div class="card-header">{{ __('Registrazione') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        {{--DATI UTENTE --}}
                        <h2 class="text-center title_form">Inserisci i tuoi dati</h2>
                        <p class="text-center text-secondary">i campi contrassegnati con questo simbolo <strong>*</strong> sono obbligatori</p>
                        {{-- INIZIO INPUT-FORM --}}
                        <div class="mb-4 row">
                            {{-- Nome --}}
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }} *</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            {{-- Cognome --}}
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }} *</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus required>
                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            {{-- E-mail --}}
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }} *</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required pattern=".+@.+\..+" placeholder="mario@mail.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            {{-- Password --}}
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} *</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="min. 8 caratteri" minlength="8" autocomplete="new-password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }} *</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            {{-- Partita Iva --}}
                            <label for="vat_number" class="col-md-4 col-form-label text-md-right">{{ __('Partita Iva') }} *</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text">IT</span>
                                    <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" placeholder="11 CIFRE NUMERICHE (es.12345678910)" autocomplete="new-vat_number" value="{{ old('vat_number') }}" pattern="[0-9]{11}" required>
                                </div>
                                @error('vat_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- DATI RISTORANTE --}}
                        <h2 class="text-center title_form mt-5">Inserisci i dati del tuo ristorante</h2>
                        <div class="mb-4 row">
                            {{-- Nome ristorante --}}
                            <label for="resturant_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }} *</label>
                            <div class="col-md-6">
                                <input id="resturant_name" type="text" class="form-control @error('resturant_name') is-invalid @enderror" name="resturant_name" autocomplete="new-resturant_name" value="{{ old('resturant_name') }}" required>
                                @error('resturant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            {{-- Via del ristorante --}}
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }} *</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="new-address" value="{{ old('address') }}" required>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            {{-- Immagine --}}
                            <label for="cover_image" class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                            <div class="col-md-6">
                                <input id="cover_image" type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" autocomplete="new-cover_image" value="{{ old('cover_image') }}">

                                @error('cover_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            {{-- Tipologia --}}
                            <label for="type_name" class="col-md-4 col-form-label text-md-right">{{ __('Tipologia') }} *</label>
                            
                            <div class="col-md-6">
                                <div class="input-group">
                                    {{-- CHECKBOX --}}
                                    @foreach ($types as $type)
                                    <input id="type_name{{ $type->id }}" type="checkbox" class="form-check-input mx-3" name="type_name[]" value="{{ $type->id }}" {{ in_array($type->id, old('type_name', [])) ? 'checked' : ''}}>
                                    <label class="" for="type_name{{ $type->id }}">{{ $type->name }}</label>
                                    @endforeach
                                </div>
                                <span id="checkboxError" class="invalid-feedback" style="display: none;">Selezionare almeno una tipologia.</span>
                            </div>
                        </div>
                        {{-- PULSANTE REGISTRATI --}}
                        <div class="mb-4 row mb-0">
                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
