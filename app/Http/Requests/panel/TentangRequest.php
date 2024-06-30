<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class TentangRequest extends FormRequest
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
            'logo' => 'image|file|mimes:jpeg,jpg,png|max:1048',
            'img' => 'image|file|mimes:jpeg,jpg,png|max:1048',
            'imgvisi' => 'image|file|mimes:jpeg,jpg,png|max:1048',
            'imgmisi' => 'image|file|mimes:jpeg,jpg,png|max:1048',
            'judul' => 'required|string',
            'tentang_kami' => 'required|string',
            'alamat' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'gmap' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string',
        ];
    }
}
