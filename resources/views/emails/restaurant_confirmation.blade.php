<h1>Nuovo ordine da {{ $order->customer_name }} {{ $order->customer_surname }}</h1>
<p>Ecco i dettagli dell'ordine:</p>
<ul>
    @foreach($order->dishes as $dish)
        <li>{{ $dish->name }} - {{ $dish->price }}&euro; x {{ $dish->pivot->n_dish }}</li>
    @endforeach
</ul>
<p>Totale: {{ number_format($order->total_price, 2, ',','.') }}&euro;</p>
<p>Orario di consegna: {{ substr($order->delivery_time, 0, 5) }}</p>
<p>Indirizzo di consegna: {{ $order->address }}</p>
@if($order->note)
<p>Note: {{ $order->note }}</p>
@endif