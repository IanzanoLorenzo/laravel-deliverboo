<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
         // Recupera tutti gli ordini
         $orders = Order::orderBy('created_at', 'desc')->with(['dishes' => function ($query) {
            $query->select(['dishes.id', 'dishes.name', 'dishes.price', 'dish_order.n_dish']);
        }])->get();

        // Crea un array vuoto per raggruppare gli ordini per restaurant_id
        $ordersByRestaurant = [];

        // Cicla attraverso gli ordini e li raggruppa in base a restaurant_id
        foreach ($orders as $order) {
            $restaurantId = $order->restaurant_id;

            // Se l'array per questo ristorante non esiste, crealo
            if (!isset($ordersByRestaurant[$restaurantId])) {
                $ordersByRestaurant[$restaurantId] = [];
            }

            // Aggiungi l'ordine all'array del ristorante corrispondente
            $ordersByRestaurant[$restaurantId][] = $order;
        }

        return view('admin.orders.index', compact('ordersByRestaurant'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}
