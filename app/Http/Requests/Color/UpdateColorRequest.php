<?php

namespace App\Http\Requests\Color;

use App\Models\Color;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateColorRequest extends FormRequest
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
        $table = (new Color())->getTable();
        return [
            'name'=> ['required',Rule::unique($table)->ignore(request()->segment('3'))],
            'code'=> ['required',Rule::unique($table)->ignore(request()->segment('3'))],
        ];
    }
}
