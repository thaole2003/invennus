<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
    $table = (new Product())->getTable();
    return [
        'sku' => ['required', Rule::unique($table)->ignore(request()->segment('3'))],
        'title' => ['required', Rule::unique($table)->ignore(request()->segment('3'))],
        'metatitle' => ['required'],
        'slug' => ['required'],
        'description' => ['required'],
        'newimage' => ['nullable'],
        'price' => ['required'],
        'length' => ['required'],
        'width' => ['required'],
        'weight' => ['required'],
        'images.*' => ['required'],
    ];
}

public function messages()
{
    return [
        'sku.required' => 'Trường SKU là bắt buộc.',
        'sku.unique' => 'SKU này đã tồn tại trong hệ thống.',
        'title.required' => 'Trường tiêu đề là bắt buộc.',
        'title.unique' => 'Tiêu đề này đã tồn tại trong hệ thống.',
        'metatitle.required' => 'Trường metatitle là bắt buộc.',
        'slug.required' => 'Trường slug là bắt buộc.',
        'description.required' => 'Trường mô tả là bắt buộc.',
        'newimage.nullable' => 'Trường hình ảnh mới có thể để trống.',
        'price.required' => 'Trường giá là bắt buộc.',
        'length.required' => 'Trường chiều dài là bắt buộc.',
        'width.required' => 'Trường chiều rộng là bắt buộc.',
        'weight.required' => 'Trường trọng lượng là bắt buộc.',
        'images.*.required' => 'Trường hình ảnh là bắt buộc.',
    ];
}

}
