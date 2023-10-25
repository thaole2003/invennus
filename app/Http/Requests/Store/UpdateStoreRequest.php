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
             'name' => ['required'],
             'slug' => [Rule::unique($table)->ignore(request()->segment('3'))],
             'address' => ['required', Rule::unique($table)->ignore(request()->segment('3'))],
             'phone' => ['required', 'regex:/^[0-9]{10}$/u'],
             'email' => ['required', 'email'],
         ];
     }

     public function messages()
     {
         return [
             'name.required' => 'Tên cửa hàng là bắt buộc.',
             'slug.unique' => 'Slug này đã tồn tại trong hệ thống.',
             'address.required' => 'Trường địa chỉ cửa hàng là bắt buộc.',
             'address.unique' => 'Địa chỉ cửa hàng này đã tồn tại trong hệ thống.',
             'phone.required' => 'Trường số điện thoại là bắt buộc.',
             'phone.regex' => 'Số điện thoại phải có 10 chữ số và không có ký tự đặc biệt.',
             'email.required' => 'Trường email là bắt buộc.',
             'email.email' => 'Email phải có định dạng hợp lệ.',
         ];
     }

}
