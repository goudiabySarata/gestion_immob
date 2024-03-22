<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BienImmobilierFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'type_bien' => 'required',
            'adresse' => 'required',
            'ville' => 'required',
            'nombre_pieces' => 'numeric',
            'statut' => 'required',
            'superficie' => 'numeric',
            'option' => ['array', 'required', 'exists:options,id'],
            'images.*' => ['image', 'required', 'mimes:jpeg,png,jpg,gif', 'max:5120'],
            'proprietaire_id' => 'required|exists:proprietaires,id',
        ];
    }
}
