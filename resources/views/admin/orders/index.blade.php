@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <table class="table m-0">
                                {{-- Visualizza il nome del ristorante --}}
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Nome
                                    </th>
                                    <th scope="col">
                                        Cognome
                                    </th>
                                    <th scope="col">
                                        E-mail
                                    </th>
                                    <th scope="col">
                                        Prezzo Totale
                                    </th>
                                    <th scope="col">
                                        Orario di consegna
                                    </th>
                                    <th scope="col">
                                        Mostra Ordine
                                    </th>
                                </tr>
                            </thead>
                            {{-- Cicla attraverso gli ordini per questo ristorante --}}
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->customer_surname }}</td>
                                        <td>{{ $order->customer_email }}</td>
                                        <td>{{ $order->total_price}}€</td>
                                        <td>{{ $order->delivery_time }}</td>
                                        <td><a href="{{ route('admin.orders.show', $order ) }}" class="btn btn-primary"><i class="fa-solid fa-arrow-right"></i></a></td>
                                        {{-- <td>
                                            <ul>
                                                @foreach($order->dishes as $dish)
                                                    <li>
                                                        {{ $dish->name }} - Quantità: {{ $dish->n_dish }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
