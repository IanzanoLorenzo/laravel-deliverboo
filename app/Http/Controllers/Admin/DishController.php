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
        return redirect()->route('admin.dishes.show', compact('dish'))->with('message', 'Creazione avvenuta con successo');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        if (!$dish) {
            // Gestisci il caso in cui il piatto non esista
            return abort(404);
        }

        $resturant= Resturant::where('user_id', Auth::id())->get()->first();
        if ($dish->resturant_id != $resturant->id){
            // L'utente non è il proprietario del piatto, quindi non ha autorizzazione
            return redirect()->route('dashboard')->with('error', 'Non hai l\'autorizzazione per modificare questo piatto.');
        }

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
        if (!$dish) {
            // Gestisci il caso in cui il piatto non esista
            return abort(404);
        }

        $resturant= Resturant::where('user_id', Auth::id())->get()->first();
        if ($dish->resturant_id != $resturant->id){
            // L'utente non è il proprietario del piatto, quindi non ha autorizzazione
            return redirect()->route('dashboard')->with('error', 'Non hai l\'autorizzazione per modificare questo piatto.');
        }
        
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
        return redirect()->route('admin.dishes.show', compact('dish'))->with('message', 'Modifica avvenuta con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->orders()->detach();
        $dish->delete();
        return redirect()->route('admin.dishes.index')->with('error', 'Eliminazione avvenuta con successo');
    }
}
