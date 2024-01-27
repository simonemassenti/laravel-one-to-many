<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePortfolioRequest extends FormRequest
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
            'title' => ['required', 'min: 5', 'max: 200', Rule::unique('portfolios')],
            'description' => ['nullable', 'max: 500'],
            'type_id' => ['nullable', 'exists:types,id'],
            'cover_image' => ['nullable', 'image', 'max:1024'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Il titolo è da inserire obbligatoriamente",
            'title.min' => "Il titolo deve contenere minimo 5 caratteri",
            'title.unique' => "Il titolo inserito è già in uso. Inserisci un titolo differente",
            'title.max' => "Il titolo deve contenere massimo 200 caratteri",
            'description.max' => "La descrizione deve contenere al massimo 500 caratteri",
            'type_id.exists' => "La tipologia scelta non esiste",
            'cover_image.image' => "Il file deve essere un'immagine",
            'cover_image.max' => "Il file è troppo pesante",
        ];
    }
}
