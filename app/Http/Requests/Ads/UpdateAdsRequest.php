<?php

namespace App\Http\Requests\Ads;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdsRequest extends FormRequest
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
            'title' => ['required','min:5','max:20'],
            'description' => ['required','min:20','max:200'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Bắt buộc nhập tiêu đề.',
            'title.min' => 'Tiêu đề ít nhất 5 kí tự.',
            'title.max' => 'Tiêu đề nhiều nhất 20 kí tự.',
            'description.required' => 'Bắt buộc nhập mô tả.',
            'description.min' => 'Tiêu đề ít nhất 20 kí tự.',
            'description.max' => 'Tiêu đề nhiều nhất 60 kí tự.',
        ];
    }

}
