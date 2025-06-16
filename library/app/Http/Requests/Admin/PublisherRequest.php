<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
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
                'max:255',
                'min:3',
            ],
            'address' => [
                'nullable',
                'string',
                'max:500',
            ],
            'email' => [
                'nullable',
                'email',
                'max:255',
                'string'
            ],
            'phone' => [
                'nullable',
                'string',
                'max:15',
            ],
            'logo' => [
                'nullable',
                'mimes:jpg,jpeg,png,webp',
                'max:2048', // 2MB max
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'address' => 'Alamat',
            'email' => 'Email',
            'phone' => 'Nomor Handphone',
            'logo' => 'Logo',
        ];
    }
}
