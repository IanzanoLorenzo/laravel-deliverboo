<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resturant;
use App\Models\Type;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //MESSAGGI DI ERRORE
        $messages = [
            'name.required' => 'Il campo nome è obbligatorio',
            'name.string' => 'Il campo nome deve essere una stringa',
            'name.max' => 'Il campo nome può avere al massimo :max caratteri',
        
            'surname.required' => 'Il campo cognome è obbligatorio',
            'surname.string' => 'Il campo cognome deve essere una stringa',
            'surname.max' => 'Il campo cognome può avere al massimo :max caratteri',
        
            'email.required' => 'Il campo email è obbligatorio',
            'email.string' => 'Il campo email deve essere una stringa',
            'email.email' => 'Inserisci un indirizzo email valido',
            'email.max' => 'L\'indirizzo email non può superare :max caratteri',
            'email.unique' => 'Questo indirizzo email è già in uso',
        
            'vat_number.required' => 'Il campo partita IVA è obbligatorio',
            'vat_number.string' => 'Il campo partita IVA deve essere una stringa',
            'vat_number.max' => 'La partita IVA deve essere esattamente di :max caratteri',
            'vat_number.min' => 'La partita IVA deve essere esattamente di :min caratteri',
            'vat_number.unique' => 'Questa partita IVA è già in uso',
        
            'password.required' => 'Il campo password è obbligatorio',
            'password.confirmed' => 'La conferma password non corrisponde',
            'password.min' => 'La password deve contenere almeno :min caratteri',
        
            'resturant_name.required' => 'Il campo nome ristorante è obbligatorio',
            'resturant_name.string' => 'Il campo nome ristorante deve essere una stringa',
            'resturant_name.max' => 'Il campo nome ristorante può avere al massimo :max caratteri',
        
            'address.required' => 'Il campo indirizzo è obbligatorio',
            'address.string' => 'Il campo indirizzo deve essere una stringa',
            'address.max' => 'Il campo indirizzo può avere al massimo :max caratteri',
        
            'cover_image.image' => 'La copertina deve essere un file immagine',
        ];

        //VALIDAZIONE
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'vat_number' => ['required', 'string', 'max:11', 'min:11', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'resturant_name' => ['required' , 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cover_image' => ['image'],
            'type_name' => ['required', 'array', Rule::exists('types', 'id')->whereIn('id', $request->input('type_name'))]
        ], $messages);


        //SALVATAGGIO USER
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'vat_number' => 'IT'.$request->vat_number,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        /* RECUPERA L'ID DELL'UTENTE ATTUALMENTE VERIFICATO */
        $id = Auth::id();
        
        /* DICHIARAZIONE VARIIABILE PATH */
        $path;

        if($request->hasFile('cover_image')){
        $path = Storage::put('cover_images', $request->cover_image);
        }else{
            $path = null;
        }

        /* SALVATAGGIO RISTORANTE */
        $resturant = Resturant::create([
            'user_id' => $id,
            'name' => $request->resturant_name,
            'slug' => Str::slug($request->resturant_name),
            'address' => $request->address,
            'cover_image' => $path
        ]); 

        event(new Registered($resturant));


        //SALVATAGGIO RELAZIONI TYPE USER
        if($request->has('type_name')){
            $resturant->types()->attach($request->type_name);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
