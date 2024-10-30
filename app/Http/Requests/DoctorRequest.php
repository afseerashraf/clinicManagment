<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class DoctorRequest extends FormRequest
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
        
            'name' =>['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email'],
            'phone' =>['required', 'numeric',  'digits_between:10,12'],
            'specialized' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'password' => ['required',password::min(8)->letters()->numbers()],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ];
    }
}
