<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required','unique:users,email','email'],
            'phone' => ['required','unique:users,phone', 'regex:/^[0-9]{10}$/u'],
            'address' => ['required'],
            'role' => ['required'],
            'store_id' => ['nullable'],
            'password' => ['required','min:6'],
        ];
    }
}
