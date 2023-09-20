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
            'cover_image' => ['image'],
            'type_name' => ['required', 'array', 'exists:types,id']
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Il campo nome ristorante è obbligatorio',
            'name.string' => 'Il campo nome ristorante deve essere una stringa',
            'name.max' => 'Il campo nome ristorante può avere al massimo :max caratteri',
        
            'address.required' => 'Il campo indirizzo è obbligatorio',
            'address.string' => 'Il campo indirizzo deve essere una stringa',
            'address.max' => 'Il campo indirizzo può avere al massimo :max caratteri',
        
            'cover_image.image' => 'La copertina deve essere un file immagine',

            'type_name.required' => 'Scegliere almeno una tipologia',
            'type_name.array' => 'Il campo tipo dev\'essere un array',
            'type_name.exists' => 'Il tipo scelto non esiste',
        ];
    }
}
