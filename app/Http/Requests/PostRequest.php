<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        'title' => 'required|string|max:60',
        'description'=> 'required|string|max:600',
        'image' => 'nullable|mimes:png,jpg,jpeg,webp',
        'category_id' => 'required',
        'subcategory_id' => 'required',
        'tags' => 'required|array|max:3'
        ];
    }
}
