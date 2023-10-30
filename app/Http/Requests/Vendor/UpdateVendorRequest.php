<?php

namespace App\Http\Requests\Vendor;

use App\Models\Vendor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVendorRequest extends FormRequest
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
        $table = (new Vendor())->getTable();
        return [
            //
            'name'=>['required'],
            'phone'=>['required',Rule::unique($table)->ignore(request()->segment('3'))],
            'email'=>['required',Rule::unique($table)->ignore(request()->segment('3'))],
            'address'=>['required'],
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Trường Tên không được bỏ trống.',
        'phone.required' => 'Trường Số điện thoại không được bỏ trống.',
        'email.required' => 'Trường Email không được bỏ trống.',
        'address.required' => 'Trường Địa chỉ không được bỏ trống.',
    ];
}

}
