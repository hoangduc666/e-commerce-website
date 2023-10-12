<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdateRequest extends FormRequest
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
            'name' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('admins', 'email')->ignore($this->route('id')),
            ],
            'password' => 'nullable|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            "en" => [
                "name.required" => "Please enter the administrator name",
                "name.string" => "Administrator name should not contain special characters",
                "name.unique" => "Administrator name already exists",
                "name.regex" => "Administrator name should only contain letters and spaces",
                "email.required" => "Please enter the email",
                "email.unique" => "Administrator email already exists",
                "password.min" => "Password should be at least 6 characters"
            ],
            "vi" => [
                "name.required" => "Vui lòng nhập tên quản trị viên",
                "name.string" => "Nhập tên quản trị viên không chứa ký tự đặc biệt",
                "name.unique" => "Tên quản trị viên đã tồn tại",
                "name.regex" => "Tên quản trị viên chỉ nên chứa chữ và khoảng trắng",
                "email.required" => "Vui lòng nhập thông tin email",
                "email.unique" => "Email quản trị viên đã tồn tại",
                "password.min" => "Mật khẩu tối thiểu 6 ký tự"
            ]
        ];
    }
}
