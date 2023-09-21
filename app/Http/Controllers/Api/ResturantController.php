<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Resturant;
Use App\Models\Type;


class ResturantController extends Controller
{
    public function index(){
        $resturants = Resturant::with('types')->get();
        $types = Type::all();
        return response()->json(
            [
                'success' => true,
                'response' => [
                    'resturants' => $resturants,
                    'types' => $types
                ]
            ]
            );
    }
}
