<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreRequest extends FormRequest
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
            'name'=> ['required'],
            'slug'=> ['required','unique:stores,slug'],
            'description'=> ['required'],
            'address'=> ['required','unique:stores,slug'],
            'phone'=> ['required'],
            'email'=> ['required'],
            'website'=> ['required'],
        ];
    }
}
