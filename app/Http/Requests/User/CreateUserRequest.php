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
            'email' => ['required', 'unique:users,email', 'email'],
            'phone' => ['required', 'unique:users,phone', 'regex:/^[0-9]{10}$/u'],
            'address' => ['required'],
            'role' => ['required'],
            'store_id' => ['nullable'],
            'password' => ['required', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng là bắt buộc.',
            'email.required' => 'Trường email là bắt buộc.',
            'email.unique' => 'Email này đã tồn tại trong hệ thống.',
            'email.email' => 'Email phải có định dạng hợp lệ.',
            'phone.required' => 'Trường số điện thoại là bắt buộc.',
            'phone.unique' => 'Số điện thoại này đã tồn tại trong hệ thống.',
            'phone.regex' => 'Số điện thoại phải có 10 chữ số và không có ký tự đặc biệt.',
            'address.required' => 'Trường địa chỉ là bắt buộc.',
            'role.required' => 'Trường vai trò là bắt buộc.',
            'password.required' => 'Trường mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }

}
