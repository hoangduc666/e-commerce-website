<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        if (empty(request('id'))) {
            return [
                'order' => 'required|numeric',
                'alt_text' => 'nullable|string|max:255',
                'image_path' => 'required|mimetypes:image/jpeg,image/png,image/webp,image/jfif,image/jpg',
            ];
        }
        return [
            'order' => 'required|numeric',
            'alt_text' => 'nullable|string|max:255',
            'image_path' => 'nullable|mimetypes:image/jpeg,image/png,image/webp,image/jfif,image/jpg',
        ];

    }

    public function messages(): array
    {
        return [
            'order.required' => 'Trường thứ tự là bắt buộc.',
            'order.numeric' => 'Trường thứ tự phải là một số.',
            'image_path.required' => 'Trường đường dẫn hình ảnh là bắt buộc.',
            'image_path.mimetypes' => 'Trường đường dẫn hình ảnh không đúng định dạng.',
            'order.unique' => 'Giá trị thứ tự này đã tồn tại trong cơ sở dữ liệu.',
            'alt_text.string' => 'Trường alt_text phải là chuỗi ký tự.',
            'alt_text.max' => 'Trường alt_text không được vượt quá :max ký tự.',
        ];
    }
}
