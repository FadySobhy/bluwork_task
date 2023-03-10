<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', Rule::unique(User::class, 'email')],
            'user_name' => ['required', 'string', 'max:255', Rule::unique(User::class, 'user_name')],
            'phone_number' => ['required', 'string', 'regex:/(01)[0-9]{9}/'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }
}
