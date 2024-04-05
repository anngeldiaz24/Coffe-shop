<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//Para poder utilizar el request se debe de colocar el true 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required","string","min:5"],
            "email" => ["required","email","unique:users,email"],
            "password" => [
                "required",
                "confirmed",
                PasswordRules::min(8)->letters()->symbols()->numbers()
            ]
        ];

    }

    /* public function messages()
    {
        return [
            atributo.validacion
            'name.required' => 'El nombre es obligatorio.',
            'email.email' => 'El email no es válido.',
        ];
    } */
}