<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resturant;
use App\Http\Requests\StoreResturantRequest;
use App\Http\Requests\UpdateResturantRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //RECUPERO L'ID DELL'UTENTE ATTUALMENTE LOGGATO
        $id = Auth::id();
        //METODO PER RECUPERARE UN RECORD DA UNA TABELLA TRAMITE L'ID
        $user = User::find($id);

        $resturant = Resturant::where('user_id', '=', $id)->with('types')->get()->first();

        return view('admin.resturant.index', compact('user', 'resturant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResturantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResturantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function edit(Resturant $resturant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResturantRequest  $request
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResturantRequest $request, Resturant $resturant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resturant $resturant)
    {
        //
    }
}
