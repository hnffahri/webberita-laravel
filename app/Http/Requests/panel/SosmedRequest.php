<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class SosmedRequest extends FormRequest
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
            'facebook' => 'required',
            'twitter' => 'required',
            'tiktok' => 'required',
            'instagram' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'facebook.required' => 'Facebook kategori wajib diisi',
            'twitter.required' => 'Twitter kategori wajib diisi',
            'tiktok.required' => 'Tiktok kategori wajib diisi',
            'instagram.required' => 'Instagram kategori wajib diisi',
        ];
    }
}
