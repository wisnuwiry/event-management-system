<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        // Get the current user's ID
        $userId = $this->route('id') ?? $this->user()->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId), // Ignore the current user's email
            ],
            'password' => ['nullable', Password::defaults()], // Password is optional
            'nik' => [
                'required',
                'digits:16',
                'numeric',
                'regex:/^\d{16}$/',
                Rule::unique('users', 'nik')->ignore($userId), // Ignore the current user's NIK
            ],
            'phone' => [
                'required',
                'regex:/^62[0-9]{8,13}$/',
                'numeric',
                Rule::unique('users', 'phone')->ignore($userId), // Ignore the current user's phone
            ],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
        ];
    }
}
