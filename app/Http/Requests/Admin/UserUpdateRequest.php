<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
                Rule::unique('users', 'email')->ignore($this->route('id')),
            ],
            'password' => 'nullable|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            "en" => [
                "name.required" => "Please enter the user name",
                "name.string" => "User name should not contain special characters",
                "name.unique" => "User name already exists",
                "name.regex" => "User name should only contain letters and spaces",
                "email.required" => "Please enter the email",
                "email.unique" => "User email already exists",
                "password.min" => "Password should be at least 6 characters"
            ],
            "vi" => [
                "name.required" => "Vui lòng nhập tên người dùng",
                "name.string" => "Nhập tên người dùng không chứa ký tự đặc biệt",
                "name.unique" => "Tên người dùng đã tồn tại",
                "name.regex" => "Tên người dùng chỉ nên chứa chữ và khoảng trắng",
                "email.required" => "Vui lòng nhập thông tin email",
                "email.unique" => "Email người dùng đã tồn tại",
                "password.min" => "Mật khẩu tối thiểu 6 ký tự"
            ]
        ];
    }
}
