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
            'judul' => 'required|unique:konten',
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
}
