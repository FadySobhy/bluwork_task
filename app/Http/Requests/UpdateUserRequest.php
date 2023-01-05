<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users,email,'.$this->user->id],
            'user_name' => ['required', 'string', 'max:255', 'unique:users,user_name,'.$this->user->id],
            'phone_number' => ['required', 'string', 'regex:/(01)[0-9]{9}/'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ];
    }
}
