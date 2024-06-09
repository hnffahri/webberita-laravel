<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class GoogleAnalitycsRequest extends FormRequest
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
            'google_analitycs' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'google_analitycs.required' => 'Google analitycs wajib diisi',
        ];
    }
}
