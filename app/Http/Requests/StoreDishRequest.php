<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'ingredients' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'visibility' => ['required', 'boolean']
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'name.string' => 'Il campo nome deve essere una stringa',

            'ingredients.required' => 'Il campo ingredienti è obbligatorio',
            'ingredients.string' => 'Il campo ingredienti deve essere una stringa',

            'price.required' => 'Il campo prezzo è obbligatorio',
            'price.numeric' => 'Il campo prezzo deve essere un numero',

            'visibility.required' => 'Il campo visibilità è obbligatorio',
            'visibility.boolean' => 'Il campo visibilità deve essere un valore booleano',
        ];
    }
}
