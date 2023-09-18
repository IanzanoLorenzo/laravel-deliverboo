@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="col-12">
        <h2 class="my-4 text-center fs-1">
            Il tuo Men&uacute;
        </h2>
    </div>
    <div class="col-12 d-flex justify-content-end py-3 ">
        <a href="{{route('admin.dishes.create')}}" class="btn btn-primary">Nuovo Piatto</a>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body pb-0">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th scope="col">
                                Nome Piatto
                            </th>
                            <th scope="col" class="d-none d-md-table-cell">
                                Prezzo
                            </th>
                            <th scope="col" class="d-none d-md-table-cell">
                                Visibile
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
                            <td class="d-none d-md-table-cell">{{$dish->price}}&euro;</td>
                            <td class="d-none d-md-table-cell">{{ $dish->visibility ? 'Sì' : 'No' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.dishes.show', $dish ) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i></a>
                                <a href="{{ route('admin.dishes.edit', $dish) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                                <form method="POST" class="d-inline-block dish-delete-button" action="{{ route('admin.dishes.destroy', $dish) }}" data-dish-name={{$dish->name}}>
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
    </div>
</div>
@include('admin.partials.model_dish_delete')
@endsection