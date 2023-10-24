<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerRequest extends FormRequest
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
            'meta_title' => ['required'],
            'title' => ['required'],
            'description' => ['required', 'min:10', 'max:100'],
            'image' => ['nullable'],
            'links' => ['url'],

        ];
    }
    public function messages()
    {
        return [
            'meta_title.required' => 'Bắt buộc nhập tiêu đề.',
            'title.required' => 'Bắt buộc nhập tiêu đề.',
            'description.required' => 'Bắt buộc nhập mô tả có ít nhất 10 ký tự và tối đa 100 ký tự.',
            'description.min' => 'Mô tả phải có ít nhất 10 ký tự.',
            'description.max' => 'Mô tả không được vượt quá 100 ký tự.',
            'links.url' => 'Liên kết không hợp lệ. Vui lòng nhập một URL hợp lệ.'
        ];
    }

}
