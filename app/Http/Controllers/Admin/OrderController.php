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
       //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       //
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Order  $order
    * @return \Illuminate\Http\Response
    */
   public function show(Order $order)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Order  $order
    * @return \Illuminate\Http\Response
    */
   public function edit(Order $order)
   {
       //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Order  $order
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Order $order)
   {
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Order  $order
    * @return \Illuminate\Http\Response
    */
   public function destroy(Order $order)
   {
       //
   }


   public function getOrderStatistics()
   {
       // Estrarre i dati degli ordini dal database per il primo grafico (ammontare vendite)
       $orderData = Order::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_price) as total_sales'))
           ->groupBy('year', 'month')
           ->orderBy('year', 'asc')
           ->orderBy('month', 'asc')
           ->get();
   
       // Estrarre i dati degli ordini dal database per il secondo grafico (conteggio ordini ricevuti)
       $orderReceivedData = Order::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as order_count'))
           ->groupBy('year', 'month')
           ->orderBy('year', 'asc')
           ->orderBy('month', 'asc')
           ->get();
   
       return view('admin.order_statistics', compact('orderData', 'orderReceivedData'));
   }
}
