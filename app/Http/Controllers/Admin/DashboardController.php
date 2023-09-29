<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Resturant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $resturant = Resturant::select('id')->where('user_id', '=', Auth::id())->get()->first();
        // Estrarre i dati degli ordini dal database per il primo grafico (ammontare vendite)
        $orderData = Order::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_price) as total_sales'))
            ->where('resturant_id', '=', $resturant->id)
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->take(12)
            ->get();
   
        // Estrarre i dati degli ordini dal database per il secondo grafico (conteggio ordini ricevuti)
        $orderReceivedData = Order::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as order_count'))
            ->where('resturant_id', '=', $resturant->id)
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->take(12)
            ->get();
   
       return view('dashboard', compact('orderData', 'orderReceivedData'));
    }
}