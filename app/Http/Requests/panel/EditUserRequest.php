<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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

        if ($this->input('form_type') == 'form_profile') {
            $userId = $this->route('user');
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'whatsapp' => [
                    'nullable',
                    'string',
                    'max:15',
                    'unique:users,whatsapp,' . $userId, // Mengabaikan ID pengguna saat ini
                ],
                'username' => [
                    'required',
                    'string',
                    'min:4',
                    'max:255',
                    'regex:/^[a-z0-9_]+$/u',
                    'unique:users,username,' . $userId, // Mengabaikan ID pengguna saat ini
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:users,email,' . $userId, // Mengabaikan ID pengguna saat ini
                ],
            ];
        }else{
            $rules = [
                'password' => ['required', 'string', 'min:6'],
                'password_baru' => ['required', 'string', 'min:6', 'different:password'],
                'password_konfirmasi' => ['required', 'string', 'min:6', 'same:password_baru'],
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'whatsapp.string' => 'Whatsapp harus berupa teks/angka.',
            'whatsapp.max' => 'Whatsapp tidak boleh lebih dari 15 karakter.',
            'email.required' => 'Email harus diisi.',
            'email.string' => 'Email harus berupa teks.',
            'email.email' => 'Email harus berupa format email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'email.unique' => 'Email sudah digunakan.',
            
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
            
            'username' => [
                'required' => 'Username wajib diisi.',
                'string' => 'Username harus berupa teks.',
                'max' => 'Username tidak boleh lebih dari 255 karakter.',
                'min' => 'Username minimal 4 karakter.',
                'unique' => 'Username telah digunakan, pilih username lain.',
                'regex' => 'Username hanya boleh berisi huruf kecil, angka, dan garis bawah (_).',
            ],
        ];
    }
}
