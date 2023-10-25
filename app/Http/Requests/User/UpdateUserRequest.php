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
            'email' => ['required', Rule::unique($table)->ignore(request()->segment('3'))],
            'phone' => ['required', Rule::unique($table)->ignore(request()->segment('3'))],
            'address' => ['required'],
            'role' => ['required'],
            'store_id' => ['nullable'],
            'password' => ['required', 'min:6'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trường tên là bắt buộc.',
            'email.required' => 'Trường email là bắt buộc.',
            'email.unique' => 'Email này đã tồn tại trong hệ thống.',
            'phone.required' => 'Trường số điện thoại là bắt buộc.',
            'phone.unique' => 'Số điện thoại này đã tồn tại trong hệ thống.',
            'address.required' => 'Trường địa chỉ là bắt buộc.',
            'role.required' => 'Trường vai trò là bắt buộc.',
            'password.required' => 'Trường mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }
}
