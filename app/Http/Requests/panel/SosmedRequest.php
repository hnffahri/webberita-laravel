<?php

namespace App\Http\Requests\panel;

use Illuminate\Foundation\Http\FormRequest;

class SosmedRequest extends FormRequest
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
            'facebook' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'twitter' => 'required|string|max:255',
            'tiktok' => 'required|string|max:255',
            'youtube' => 'required|string|max:255',
        ];
    }
}
