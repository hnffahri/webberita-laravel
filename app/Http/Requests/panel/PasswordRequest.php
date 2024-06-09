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
    
    public function messages(): array
    {
        return [
            'password.required' => 'Password lama harus diisi',
            'password.string' => 'Password lama harus berupa string',
            'password.min' => 'Password lama harus memiliki minimal :min karakter',
            'password_baru.required' => 'Password baru harus diisi',
            'password_baru.string' => 'Password baru harus berupa string',
            'password_baru.min' => 'Password baru harus memiliki minimal :min karakter',
            'password_baru.different' => 'Password baru harus berbeda dengan password lama',
            'password_konfirmasi.required' => 'Konfirmasi password harus diisi',
            'password_konfirmasi.string' => 'Konfirmasi password harus berupa string',
            'password_konfirmasi.min' => 'Konfirmasi password harus memiliki minimal :min karakter',
            'password_konfirmasi.same' => 'Konfirmasi password salah',
        ];
    }
}
