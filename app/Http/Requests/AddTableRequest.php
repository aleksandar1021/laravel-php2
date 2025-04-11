<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTableRequest extends FormRequest
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
            'tableName' => 'required|min:2|max:100|unique:tables,name',
            'description' => 'required|min:3|max:100',
            'premium' => 'required|numeric|not_in:-1,0',
            'number' => 'required|numeric|not_in:-1,0',
            'image' => 'required|image|mimes:jpeg,png|max:3000',
        ];
    }
}
