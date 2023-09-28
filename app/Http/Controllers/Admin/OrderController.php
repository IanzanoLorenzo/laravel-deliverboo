<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Resturant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{ /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $resturant = Resturant::select('id')->where('user_id', '=', Auth::id())->get()->first();
        $orders = Order::where('resturant_id', $resturant->id)->get();

        return view('admin.orders.index', compact('orders'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $resturant = Resturant::select('id')->where('user_id', '=', Auth::id())->get()->first();
        if($order->resturant_id === $resturant->id){
            return view('admin.orders.show', compact('order'));
        }else{
            return redirect()->route('dashboard')->with('error', 'Non hai l\'autorizzazione per visualizzare quest\'ordine.');
        }
    }
}
