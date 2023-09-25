<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Resturant;

class DishController extends Controller
{
    public function index(String $slug){
        $resturant = Resturant::where('slug', $slug)->get()->first();
        $dishes = Dish::where('resturant_id', $resturant->id)->where('visibility', true)->get();
        return response()->json(
            [
                'success' => true,
                'response' => [
                    'dishes' => $dishes,
                    'resturant' => $resturant
                ]
            ]
            );
    }
}
