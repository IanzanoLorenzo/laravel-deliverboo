<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resturant;
use App\Models\User;
use App\Models\Type;
use App\Http\Requests\StoreResturantRequest;
use App\Http\Requests\UpdateResturantRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        
        return view('admin.resturants.index', compact('user', 'resturant'));
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
    public function edit()
    {
        $id = Auth::id();
        $resturant = Resturant::where('user_id', $id)->get()->first();

        $types = Type::all();
        return view('admin.resturants.edit', compact('resturant','types'));

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
        $form_data = $request->all();
        if($request->hasFile('cover_image')){
            if($resturant->cover_image !== null){
                Storage::delete($resturant->cover_image);
            }
            $path = Storage::put('cover_images', $request['cover_image']);
            $form_data['cover_image'] = $path;
        }
        $form_data['slug'] = Str::slug($form_data['name']);
        $resturant->update($form_data);

        if($request->has('type_name')){
            $resturant->types()->sync($request->type_name);
        }else{
            $resturant->types()->detach();
        }

        return redirect()->route('admin.resturants');
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
