<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'date' => ['required', 'date'],
            'name' =>['required', 'regex:/^[a-zA-Z\s]+$/'],
            'age' => ['required', 'numeric'],
            'phone' =>['required', 'numeric',  'digits_between:10,12'],
            'email' => ['required', 'email'],
            'place' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'house' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'medicalHistory' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'doctor_id' => ['required', 'numeric'],
            
        ];
    }
}
