<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class KontenRequest extends FormRequest
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
        $rules = [
            'type' => 'required',
            'status' => 'required',
            'kategori_id' => 'required',
            'judul' => 'required',
            'ringkas' => 'required',
            'isi' => 'required',
            'keyword' => 'required',
            'img' => 'required|image|file|mimes:jpeg,jpg,png',
            'vidio' => 'file|mimetypes:video/mp4',
        ];

        if ($this->input('type') == 2) {
            $rules['vidio'] = 'required|file|mimetypes:video/mp4';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul wajib diisi',
            'kategori_id.numeric' => 'kategori wajib diisi dengan angka',
            'kategori_id.required' => 'kategori wajib diisi',
            'status.numeric' => 'Status wajib diisi dengan angka',
            'status.required' => 'Status wajib diisi',
            'type.numeric' => 'Type wajib diisi dengan angka',
            'type.required' => 'Type wajib diisi',
            'ringkas.required' => 'Isi ringkas wajib diisi',
            'isi.required' => 'Isi Lengkap wajib diisi',
            'keyword.required' => 'Keyword wajib diisi',
            'img.required' => 'Foto wajib diisi',
            'img.mimes' => 'Foto hanya boleh berekstensi jpg, jpeg, png',
            'vidio.required' => 'Vidio wajib diisi',
            'vidio.mimes' => 'Vidio hanya boleh berekstensi mp4'
        ];
    }
}
