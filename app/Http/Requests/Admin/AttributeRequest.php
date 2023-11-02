<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
            'name' => 'required|string',
            'value' => 'required|string',
            'slug' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên thuộc tính sản phẩm ',
<<<<<<< HEAD
            'value.required' => 'Vui lòng nhập phân loại thuộc tính sản phẩm',
            'slug.required' => 'Vui lòng nhập đường dẫn thuộc tính sản phẩm',
=======
            'value.required' => 'Vui lòng nhập phân loại sản phẩm',
            'slug.required' => 'Vui lòng nhập đường dẫn sản phẩm',
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        ];
    }

}
