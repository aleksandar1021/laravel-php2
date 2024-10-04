<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeTextRequest extends FormRequest
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
            'heading' => 'required|min:20|max:250',
            'text1' => 'required|min:20|max:250',
            'text2' => 'required|min:20|max:250',
            'image' => 'nullable|image|mimes:jpeg,png|max:5000'
        ];
    }
}
