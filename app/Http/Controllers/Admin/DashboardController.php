<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
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
   
       return view('dashboard', compact('orderData', 'orderReceivedData'));
    }
}
