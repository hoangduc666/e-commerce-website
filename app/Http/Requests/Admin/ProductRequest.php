<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        if(is_null(request('id'))){
            return [
                'category_id'=>'required',
                'parent_id'=>'nullable',
                'name' =>[
                    'required',
                    'string',
                    'regex:/^[a-zA-Z0-9\s%]+/',
                ] ,
                'price' => 'required|regex:/^\d{1,6}(?:,\d{3})*(?:\.\d{2})?$/|min:0',
                'description' => 'nullable',
                'quantity' => 'required|numeric|min:0',
                'slug' => 'required|string',
                'discount' => 'nullable',
                'expiration_date' => 'nullable',
//                Rule::unique('products_attributes', 'attributes')
//                    ->where('name', request('name'))
//                    ->ignore($this->route('id')),
            ];
        }
        return [
            'category_id'=>'required',
            'parent_id'=>'nullable',
            'name' =>[
                'required',
                'string',
                'regex:/^[a-zA-Z0-9\s%]+/',
            ] ,
            'price' => 'required|regex:/^\d{1,6}(?:,\d{3})*(?:\.\d{2})?$/|min:0',
            'description' => 'nullable',
            'quantity' => 'required|numeric|min:0',
            'slug' => 'required|string',
            'discount' => 'nullable',
            'expiration_date' => 'nullable',
            'attributes' => [
                'required',
//                Rule::unique('products_attributes', 'attribute_id')->ignore($this->route('id'))
            ],
        ];

    }

    public function messages(): array
    {
        return [
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'parent_id.required' => 'Vui lòng chọn danh mục cha cho sản phẩm.',
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'name.string' => 'Tên sản phẩm phải là chuỗi.',
            'name.regex' => 'Tên sản phẩm chỉ được chứa chữ cái, số và khoảng trắng.',
            'price.required' => 'Vui lòng nhập giá sản phẩm.',
            'price.regex' => 'Giá sản phẩm phải ở định dạng số.',
            'price.min' => 'Giá sản phẩm phải lớn hơn hoặc bằng 1.',
            'description.required' => 'Vui lòng nhập mô tả sản phẩm.',
            'quantity.required' => 'Vui lòng nhập số lượng sản phẩm.',
            'quantity.numeric' => 'Số lượng sản phẩm phải là số.',
            'quantity.min' => 'Số lượng sản phẩm phải lớn hơn hoặc bằng 1.',
            'slug.required' => 'Trường Slug là bắt buộc.',
            'slug.string' => 'Trường Slug phải là một chuỗi.',
            'attributes.required' => 'Vui lòng nhập các thuộc tính của sản phẩm.',
            'attributes.unique' => 'Kết hợp :attribute đã tồn tại trong sản phẩm khác.',

        ];
    }

}
