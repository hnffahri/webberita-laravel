<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'biografi' => ['required', 'string'],
            'provinsi' => ['required', 'string', 'max:100'],
            'kota' => ['required', 'string', 'max:100'],
            'alamat' => ['required', 'string', 'max:500'],
            'avatar' => 'image|file|mimes:jpeg,jpg,png',
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'xtwitter' => 'required|string|max:255',
            'youtube' => 'required|string|max:255',
        ];
    }
}
