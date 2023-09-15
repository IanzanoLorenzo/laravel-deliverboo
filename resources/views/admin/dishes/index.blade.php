@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-12">
        <h2 class="fs-4 text-secondary my-4">
            Il tuo Men&uacute;
        </h2>
    </div>
    <div class="col-12">
        <a href="{{route('admin.dishes.create')}}" class="btn btn-primary">Nuovo Piatto</a>
    </div>
    <div class="col-12">
        <table class="table m-0">
            <thead>
                <tr>
                    <th scope="col">
                        Nome Piatto
                    </th>
                    <th scope="col">
                        Prezzo
                    </th>
                    <th class="text-center" scope="col">
                        Azioni
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resturant->dishes as $dish)
                <tr>
                    <td>{{$dish->name}}</td>
                    <td>{{$dish->price}}&euro;</td>
                    <td class="text-center">
                        <a href="{{ route('admin.dishes.show', $dish ) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i></a>
                        <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                        <form method="POST" class="d-inline-block" action="{{ route('admin.dishes.destroy', $dish) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
    </div>
</div>
@endsection