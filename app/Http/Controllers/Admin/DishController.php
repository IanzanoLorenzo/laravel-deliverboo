<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Models\Resturant;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user_id = Auth::id();
        $resturant = Resturant::where('user_id', $user_id)->with('dishes')->get()->first();
        return view('admin.dishes.index', compact('resturant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
        $form_data = $request->all();
        $user_id = Auth::id();
        $resturant = Resturant::where('user_id', $user_id)->with('dishes')->get('id')->first();
        $form_data['resturant_id'] = $resturant->id;
        $dish = new Dish();
        $dish->fill($form_data);
        $dish->save();
        return redirect()->route('admin.dishes.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $form_data = $request->all();
        $user_id = Auth::id();
        $resturant = Resturant::where('user_id', $user_id)->with('dishes')->get('id')->first();
        $form_data['resturant_id'] = $resturant->id;
        $dish->update($form_data);
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
