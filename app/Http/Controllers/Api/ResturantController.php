<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Resturant;
Use App\Models\Type;
use Illuminate\Pagination\LengthAwarePaginator;


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

    public function search(String $search, Request $request){
        $types = Type::all();
    
        $selectedTypesString = explode('-', $search);
    
        $selectedTypes = [];
    
        foreach($selectedTypesString as $typeString){
            $selectedTypes[] = intval($typeString);
        }
    
        $resturantsUnfiltered = Resturant::whereHas('types', function ($query) use ($selectedTypes) {
            $query->whereIn('type_id', $selectedTypes);
        })->with('types')->get();
    
        $resturantsUnpaginated = $resturantsUnfiltered->filter(function ($resturant) use ($selectedTypes) {
            return count(array_intersect($resturant->types->pluck('id')->toArray(), $selectedTypes)) === count($selectedTypes);
        });
    
        $perPage = 4;
        $page = $request->input('page', 1); // Get the current page from the request
    
        $resturants = new LengthAwarePaginator($resturantsUnpaginated->forPage($page, $perPage), count($resturantsUnpaginated), $perPage, $page);
    
        return response()->json([
            'success' => true,
            'response' => [
                'resturants' => $resturants,
                'types' => $types
            ]
        ]);
    }
}
