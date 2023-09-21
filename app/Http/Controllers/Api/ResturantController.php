<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Resturant;

class ResturantController extends Controller
{
    public function index(){
        $resturants = Resturant::with('types')->get();
        return response()->json(
            [
                'success' => true,
                'response' => $resturants
            ]
            );
    }
}
