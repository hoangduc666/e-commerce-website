<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' =>'required|string|alpha|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return [
                "name.required" => "Vui lòng nhập tên người dùng",
                "name.string" => "Nhập tên người dùng không chứa ký tự đặc biệt",
                "name.unique" => "Tên người dùng đã tồn tại",
                "name.alpha" => "Tên người dùng chỉ nên chứa chữ và khoảng trắng",
                "email.required" => "Vui lòng nhập thông tin email",
                "email.unique" => "Email người dùng đã tồn tại",
                "password.required" => "Vui lòng nhập mật khẩu",
                "password.min" => "Mật khẩu tối thiểu 6 ký tự"
        ];
    }

}
