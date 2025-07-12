<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ReceptionistRequest extends FormRequest
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
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],

            'email' => ['required', 'email'],

            'place' => ['required', 'regex:/^[a-zA-Z\s]+$/'],

            'phone' => ['required', 'numeric',  'digits_between:10,12'],
            
            'password' => ['required', password::min(8)->letters()->numbers()],
        ];
    }
}
