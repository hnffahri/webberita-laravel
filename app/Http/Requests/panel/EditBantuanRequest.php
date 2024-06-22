<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditBantuanRequest extends FormRequest
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
        $id = $this->route('bantuan');
        $rules = [
            'status' => 'required',
            'judul' => [
                'required',
                Rule::unique('bantuan')->ignore($id),
            ],
            'ringkas' => 'required',
            'isi' => 'required',
            'keyword' => 'required',
            'img' => 'image|file|mimes:jpeg,jpg,png',
        ];

        return $rules;
    }
}
