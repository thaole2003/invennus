<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'sku' => ['required', 'unique:products,sku'],
            'title' => ['required', 'unique:products,title'],
            'slug' => ['unique:products,slug'],
            'description' => ['required'],
            'image' => ['required'],
            'price' => ['required'],
            'images.*' => ['required'],
            'store_id.*' => ['required'],
            'color.*' => ['required'],
            'size.*' => ['required'],
            'category.*' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'sku.required' => 'Bắt buộc nhập mã sản phẩm.',
            'sku.unique' => 'Mã sản phẩm này đã tồn tại trong hệ thống.',
            'title.required' => 'Tiêu đề là bắt buộc nhập.',
            'title.unique' => 'Tiêu đề này đã tồn tại trong hệ thống.',
            'slug.unique' => 'Slug này đã tồn tại trong hệ thống.',
            'description.required' => 'Mô tả bắt buộc nhập.',
            'image.required' => 'Ảnh chính bắt buộc nhập.',
            'price.required' => 'Giá là bắt buộc.',
            'images.*.required' => 'Hình ảnh bắt buộc nhập (chọn nhiều ảnh).',
            'store_id.*.required' => 'Chọn ít nhất 1 cửa hàng.',
            'color.*.required' => 'Chọn màu sắc cho sản phẩm.',
            'size.*.required' => 'Chọn kích cỡ cho sản phẩm.',
            'category.*.required' => 'Chọn danh mục.',
        ];
    }

}
