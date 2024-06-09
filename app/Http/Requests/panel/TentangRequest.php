<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class TentangRequest extends FormRequest
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
            'logo' => 'image|file|mimes:jpeg,jpg,png',
            'tentang_kami' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'logo.mimes' => 'Logo hanya boleh berekstensi jpg, jpeg, png dan gif',
            'logo.image' => 'Logo hanya boleh upload gambar',
            'logo.file' => 'Logo hanya boleh upload file',
            'tentang_kami.required' => 'Tentang kami wajib diisi',
        ];
    }
}
