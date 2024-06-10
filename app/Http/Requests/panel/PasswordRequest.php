<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => ['required', 'string', 'min:6'],
            'password_baru' => ['required', 'string', 'min:6', 'different:password'],
            'password_konfirmasi' => ['required', 'string', 'min:6', 'same:password_baru'],
        ];
    }
}
