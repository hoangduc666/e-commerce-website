<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'percent_off' => 'required|numeric|min:1',
            'coupon_code' => 'nullable|string',
<<<<<<< HEAD
//            'valid_until' => 'nullable|date_format:m/d/Y|after_or_equal:' . now()->format('m/d/Y'),
=======
            'valid_until' => 'nullable|date_format:Y-m-d\TH:i',
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        ];
    }

    public function messages(): array
    {
        return [
            'name.nullable' => 'Tên có thể để trống hoặc là một chuỗi có độ dài tối đa là 255 ký tự.',
            'percent_off.required' => 'Phần trăm giảm giá là bắt buộc.',
            'percent_off.numeric' => 'Phần trăm giảm giá phải là một số.',
            'percent_off.min' => 'Phần trăm giảm giá phải lớn hơn hoặc bằng 1.',
            'coupon_code.nullable' => 'Mã giảm giá có thể để trống hoặc là một chuỗi có độ dài tối đa là 10 ký tự.',
<<<<<<< HEAD
//            'valid_until.date_format' => 'Định dạng ngày không hợp lệ. Sử dụng định dạng m/d/Y.',
//            'valid_until.after_or_equal' => 'Ngày phải sau hoặc bằng ngày hiện tại.',
=======
            'valid_until.date_format' => 'Thời gian hết hạn không phù hợp với định dạng ngày tháng.',
>>>>>>> dece221f309a6888873a1349df77751a0356c316
        ];
    }
}
