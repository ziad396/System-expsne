<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'  => ['sometimes', 'required', 'string', 'max:255'],
                'email' => [
                    'sometimes', 
                    'required', 
                    'string', 
                    'email', 
                    'max:255', 
                    'email'=>['required','email','string','max:255','sometimes','unique:users,email']
                   
                ],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }
}
