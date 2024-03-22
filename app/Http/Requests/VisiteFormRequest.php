<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisiteFormRequest extends FormRequest
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
            'date_visite' => ['required', 'date'],
            'heure_visite' => ['required'],
            'bien_id' => ['required','exists:biens,id'],
            'client_id' => ['required','exists:clients,id'],
            'proprietaire_id' => ['required','exists:proprietaires,id']
        ];
    }
}
