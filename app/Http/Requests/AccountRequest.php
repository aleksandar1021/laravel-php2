<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
        $idUSer = $this->route('id');
        return [
            'name' => 'required|string|min:2|max:100',
            'lastname' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:our_users,email,'.$idUSer,
            'password' => 'nullable|min:8|max:100|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png|max:3000',
        ];
    }
}
