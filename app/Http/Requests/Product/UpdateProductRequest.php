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

               'sku' => ['required',Rule::unique($table)->ignore(request()->segment('3'))],
               'title' => ['required',Rule::unique($table)->ignore(request()->segment('3'))],
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
}
