@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-12">
        <h2 class="fs-4 text-secondary my-4">
            Il tuo Men&uacute;
        </h2>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($resturant->dishes as $dish)
                    <li class="list-group-item">
                        {{ $dish->name }}
                    </li>    
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection