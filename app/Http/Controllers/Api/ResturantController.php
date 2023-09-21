<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Resturant;

class ResturantController extends Controller
{
    public function index(){
        $resturants = Resturant::all();
        return response()->json(
            [
                'success' => true,
                'response' => $resturants
            ]
            );
    }

    public function search(String $string){
        $resturants = Resturant::where('name', 'LIKE', '%'.$string.'%')->get();
        return response()->json(
            [
                'success' => true,
                'response' => $resturants
            ]
            );
    }
}
