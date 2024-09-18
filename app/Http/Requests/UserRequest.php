<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'bio' => 'nullable|string|max:300',
            'city' => 'nullable|string|max:30',
            'country' => 'required|string|max:40',
            'work' => 'nullable|string|max:150',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp'
        ];
    }
}
