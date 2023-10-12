<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ];
    }

    public function messages()
    {
        return [

            'email.required' => 'Vui lòng nhập địa chỉ email',
            'email.confirmed'=> 'Email không đúng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'password.confirmed' => 'Mật khẩu không đúng',
        ];
    }
}
