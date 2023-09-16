<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateResturantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required' , 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cover_image' => ['image']
        ];
    }

    public function messages(){
        return [
            'resturant_name.required' => 'Il campo nome ristorante è obbligatorio',
            'resturant_name.string' => 'Il campo nome ristorante deve essere una stringa',
            'resturant_name.max' => 'Il campo nome ristorante può avere al massimo :max caratteri',
        
            'address.required' => 'Il campo indirizzo è obbligatorio',
            'address.string' => 'Il campo indirizzo deve essere una stringa',
            'address.max' => 'Il campo indirizzo può avere al massimo :max caratteri',
        
            'cover_image.image' => 'La copertina deve essere un file immagine'
        ];
    }
}
