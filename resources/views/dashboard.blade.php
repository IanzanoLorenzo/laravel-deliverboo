@extends('layouts.admin')

@section('content')
<div class="container">

    <h2 class="fs-4 text-dark text-uppercase text-center my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-12 mt-4"><a href="{{ route('admin.dishes.index' )}}" class="btn btn-primary">Visualizza il tuo Men&uacute;</a></div>
    </div>
</div>
@endsection
