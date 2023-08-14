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
            'sku' => ['required','unique:products,sku'],
            'title' => ['required','unique:products,title'],
            'metatitle' => ['required'],
            'slug' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
            'price' => ['required'],
            'length' => ['required'],
            'width' => ['required'],
            'weight' => ['required'],
            'images.*' => ['required'],
            'store_id.*' => ['required'],
            'color.*' => ['required'],
            'size.*' => ['required'],
            'category.*' => ['required'],
        ];
    }
}
