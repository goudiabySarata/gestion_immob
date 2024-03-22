<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProprietaireFormRequest extends FormRequest
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
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'email' => 'required|email|unique:proprietaires',
            'telephone' => 'required|unique:proprietaires|min:9',
            'date_naissance' => 'required|date',
            'password' => 'required',
        ];
    }
}
