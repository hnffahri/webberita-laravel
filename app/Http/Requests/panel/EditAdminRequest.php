<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
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
            $adminId = $this->route('admin');
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    'unique:admin,email,' . $adminId, // Mengabaikan ID pengguna saat ini
                ],
                'username' => [
                    'required',
                    'string',
                    'min:4',
                    'max:255',
                    'regex:/^[a-z0-9_]+$/u',
                    'unique:admin,username,' . $adminId, // Mengabaikan ID pengguna saat ini
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
}
