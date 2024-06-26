<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditKontenRequest extends FormRequest
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
        $id = $this->route('konten');
        $rules = [
            'type' => 'required',
            'status' => 'required',
            'kategori_id' => 'required',
            'judul' => [
                'required',
                Rule::unique('konten')->ignore($id),
            ],
            'ringkas' => 'required',
            'isi' => 'required',
            'keyword' => 'required',
            'img' => 'image|file|mimes:jpeg,jpg,png',
            'vidio' => 'file|mimetypes:video/mp4',
        ];

        return $rules;
    }
}
