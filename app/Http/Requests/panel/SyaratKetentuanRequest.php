<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class SyaratKetentuanRequest extends FormRequest
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
            'syarat_ketentuan' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'syarat_ketentuan.required' => 'Syarat ketentuan wajib diisi',
        ];
    }
}
