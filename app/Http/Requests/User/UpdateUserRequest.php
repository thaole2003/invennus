<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        $table = (new User())->getTable();
        return [
            'name' => ['required'],
            'avt' => ['nullable'],
            'email' => ['required',Rule::unique($table)->ignore(request()->segment('3'))],
            'phone' => ['required'],
            'address' => ['required'],
            'role' => ['required'],
            'store_id' => ['nullable'],
            'password' => ['required','min:6'],
        ];
    }
}
