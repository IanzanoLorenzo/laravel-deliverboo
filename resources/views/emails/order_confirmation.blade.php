<h1>Grazie per il tuo ordine, {{ $order->customer_name }} {{ $order->customer_surname }}!</h1>
<p>Ecco i dettagli del tuo ordine:</p>
<ul>
    @foreach($order->dishes as $dish)
        <li>{{ $dish->name }} - {{ $dish->price }}&euro; x {{ $dish->pivot->n_dish }}</li>
    @endforeach
</ul>
<p>Totale: {{ number_format($order->total_price, 2, ',','.') }}&euro;</p>
<p>Orario di consegna: {{ substr($order->delivery_time, 0, 5) }}</p>
<p>Note: {{ $order->note }}</p>