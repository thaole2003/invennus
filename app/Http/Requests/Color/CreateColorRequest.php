<?php

namespace App\Http\Requests\Color;

use Illuminate\Foundation\Http\FormRequest;

class CreateColorRequest extends FormRequest
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
            'name'=> ['required','unique:colors,name'],
            'code'=> ['required','unique:colors,code'],
        ];
    }
}
