<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Resturant;
Use App\Models\Type;


class ResturantController extends Controller
{
    public function index(){
        $resturants = Resturant::with('types')->paginate(4);
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

    public function search(String $search){
        $types = Type::all();

        $selectedTypesString = explode('-', $search);

        $selectedTypes = [];

        foreach($selectedTypesString as $typeString){
            $selectedTypes[] = intval($typeString);
        }

        $resturantsUnfiltered = Resturant::whereHas('types', function ($query) use ($selectedTypes) {
            $query->whereIn('type_id', $selectedTypes);
        })->with('types')->get();
    
        $resturants = $resturantsUnfiltered->filter(function ($resturant) use ($selectedTypes) {
            return count(array_intersect($resturant->types->pluck('id')->toArray(), $selectedTypes)) === count($selectedTypes);
        });

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
