<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'description' => 'nullable',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB max
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'description' => 'Deskripsi',
            'cover' => 'Cover',
        ];
    }
}
