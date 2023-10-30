<?php

namespace App\Http\Requests\Size;

use App\Models\Size;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSizeRequest extends FormRequest
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
        $table = (new Size())->getTable();
        return [
            'name'=>['required',Rule::unique($table)->ignore(request()->segment('3'))],
            'description'=>['nullable']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên kích thước là bắt buộc.',
        ];
    }
}
