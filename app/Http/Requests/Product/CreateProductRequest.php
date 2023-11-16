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
            'sku' => ['required', 'unique:products,sku','max:10'],
            'title' => ['required', 'unique:products,title','min:5','max:40'],
            'metatitle' => ['required', 'unique:products,metatitle','min:5','max:20'],
            'slug' => ['unique:products,slug'],
            'description' => ['required'],
            'image' => ['required'],
            'price' => ['required'],
            'images.*' => ['required'],
            'store_id' => ['required'],
            'color.*' => ['required'],
            'size.*' => ['required'],
            'category' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'sku.required' => 'Bắt buộc nhập mã sản phẩm.',
            'sku.unique' => 'Mã sản phẩm này đã tồn tại trong hệ thống.',
            'sku.max' => 'Mã sản phẩm nhiều nhất 10 kí tự.',
            'title.required' => 'Tiêu đề là bắt buộc nhập.',
            'metatitle.required' => 'Tiêu đề ngắn là bắt buộc nhập.',
            'title.unique' => 'Tiêu đề này đã tồn tại trong hệ thống.',
            'title.min' => 'Tiêu đề ít nhất 5 kí tự.',
            'title.max' => 'Tiêu đề nhiều nhất 40 kí tự.',
            'metatitle.min' => 'Tiêu đề ít nhất 5 kí tự.',
            'metatitle.max' => 'Tiêu đề nhiều nhất 20 kí tự.',
            'slug.unique' => 'Slug này đã tồn tại trong hệ thống.',
            'description.required' => 'Mô tả bắt buộc nhập.',
            'image.required' => 'Ảnh chính bắt buộc nhập.',
            'price.required' => 'Giá là bắt buộc.',
            'images.*.required' => 'Hình ảnh bắt buộc nhập (chọn nhiều ảnh).',
            'store_id.required' => 'Chọn ít nhất 1 cửa hàng.',
            'color.*.required' => 'Thêm màu sắc cho sản phẩm.',
            'size.*.required' => 'Thêm kích cỡ cho sản phẩm.',
            'category.required' => 'Chọn danh mục cho sản phẩm.',
        ];
    }

}
