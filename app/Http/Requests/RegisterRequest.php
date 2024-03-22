<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'prenom' => ['required', 'string'],
            'nom' => ['required', 'string'],
            'adresse' => 'required',
            'date_nais' => 'required|date',
            'telephone' => ['required', 'min:9'],
            'email' => ['required', 'email'],
            'type_client' => 'required|in:locataire,acheteur,proprietaire',
            'password' => 'required|min:6',
        ];

    }
}
