<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'regex:/^[A-Z][a-zA-Z]{2,19}/'
            ],
            'lastname' => [
                'required',
                'string',
                'regex:/^[A-Z][a-zA-Z]{2,19}/'
            ],
            'email' => 'required|email|unique:our_users,email',
            'password' => 'required|string|min:8|max:100|confirmed'
        ];
    }
}
