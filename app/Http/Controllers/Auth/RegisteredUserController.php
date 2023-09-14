<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Resturant;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'vat_number' => ['required', 'string', 'max:13', 'min:13', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'resturant_name' => ['required' , 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cover_image' => ['image']
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'vat_number' => $request->vat_number,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $id = Auth::id();
        
        $path;

        if($request->hasFile('cover_image')){
        $path = Storage::put('cover_images', $request->cover_image);
        }

        $resturant = Resturant::create([
            'user_id' => $id,
            'name' => $request->resturant_name,
            'slug' => Str::slug($request->resturant_name),
            'address' => $request->address,
            'cover_image' => $path
        ]); 

        event(new Registered($resturant));



        return redirect(RouteServiceProvider::HOME);
    }
}
