<?php

namespace App\Http\Requests\Permission;

use Illuminate\Foundation\Http\FormRequest;

class CreatePermissionRequest extends FormRequest
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
            "name" => "required|string|max:255|unique:permissions"
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên quyền là trường bắt buộc',
            'name.string' => 'Tên quyền phải là một chuỗi.',
            'name.max' => 'Tên quyền không được vượt quá :max ký tự.',
            'name.unique' => 'Tên quyền đã tồn tại trong hệ thống.',
        ];
    }
}
