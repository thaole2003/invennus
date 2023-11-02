<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class CreateVendorRequest extends FormRequest
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
            'name'=>['required'],
            'phone'=>['required','unique:vendors,phone','regex:/^[0-9]{10}$/u'],
            'email'=>['required','unique:vendors,email','email'],
            'address'=>['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Trường Tên không được bỏ trống.',
            'phone.required' => 'Trường Số điện thoại không được bỏ trống.',
            'phone.unique' => 'Số điện thoại đã tồn tại trong cơ sở dữ liệu.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'email.required' => 'Trường Email không được bỏ trống.',
            'email.unique' => 'Email đã tồn tại trong cơ sở dữ liệu.',
            'email.email' => 'Email không hợp lệ.',
            'address.required' => 'Trường Địa chỉ không được bỏ trống.',
        ];
    }

}
