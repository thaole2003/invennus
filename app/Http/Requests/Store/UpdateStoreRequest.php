<?php

namespace App\Http\Requests\Store;

use App\Models\Store;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStoreRequest extends FormRequest
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
        $table = (new Store())->getTable();
        return [
            'name'=> ['required'],
            'slug'=> ['required',Rule::unique($table)->ignore(request()->segment('3'))],
            'description'=> ['required'],
            'address'=> ['required',Rule::unique($table)->ignore(request()->segment('3'))],
            'phone'=> ['required'],
            'email'=> ['required'],
            'website'=> ['required'],
        ];
    }
}
