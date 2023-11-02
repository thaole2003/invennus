<?php

namespace App\Http\Requests\Size;

use Illuminate\Foundation\Http\FormRequest;

class CreateSizeRequest extends FormRequest
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
            'name'=>['required','unique:sizes,name'],
            'description'=>['nullable']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên kích thước là bắt buộc.',
            'name.unique' => 'Kích thước này đã tồn tại trong hệ thống, vui lòng chọn một tên khác.',
        ];
    }
}
