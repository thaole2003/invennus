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
            'name' => ['required', 'unique:stores,name'],
            'slug' => ['unique:stores,slug'],
            'address' => ['required', 'unique:stores,slug', 'min:5'],
            'phone' => ['required', 'unique:users,phone', 'regex:/^[0-9]{10}$/u'],
            'email' => ['required', 'unique:users,email', 'email'],
        ];
    }
    public function messages()
    {
        return [

            'name.required' => 'Trường tên cửa hàng là bắt buộc.',
            'name.unique' => 'Tên cửa hàng này đã tồn tại trong hệ thống.',
            'slug.unique' => 'Slug này đã tồn tại trong hệ thống.',
            'address.required' => 'Trường địa chỉ cửa hàng là bắt buộc.',
            'address.unique' => 'Địa chỉ cửa hàng này đã tồn tại trong hệ thống.',
            'address.min' => 'Trường địa chỉ cửa hàng phải có ít nhất 5 ký tự.',
            'phone.required' => 'Trường số điện thoại là bắt buộc.',
            'phone.unique' => 'Số điện thoại này đã tồn tại trong hệ thống.',
            'phone.regex' => 'Số điện thoại phải có 10 chữ số và không có ký tự đặc biệt.',
            'email.required' => 'Trường email là bắt buộc.',
            'email.unique' => 'Email này đã tồn tại trong hệ thống.',
            'email.email' => 'Email phải có định dạng hợp lệ.',
        ];
    }
}
