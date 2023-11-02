<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'parent_id' => 'nullable',
            'name' => ['required', 'string',
<<<<<<< HEAD
//                Rule::unique('categories', 'name')->ignore($this->route('id')),
                ],
            'slug' => 'required|string',
=======
            Rule::unique('categories', 'name')->ignore($this->route('id')),],
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục .',
            'name.string' => 'Trường tên chỉ nên chứa các ký tự chữ cái.',
<<<<<<< HEAD
//            'name.unique' => 'Tên danh mục đã tồn tại'
            'slug.required' => 'Vui lòng nhập đường dẫn danh mục',
=======
            'name.unique' => 'Tên danh mục đã tồn tại'
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        ];
    }
}
