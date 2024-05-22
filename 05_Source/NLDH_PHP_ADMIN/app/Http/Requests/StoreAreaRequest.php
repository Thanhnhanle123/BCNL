<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAreaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Xác định xem người dùng có được phép thực hiện yêu cầu này hay không
        return true; // Đây chỉ là ví dụ, bạn cần thay đổi logic ở đây nếu cần thiết
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nameArea' => 'required|string|max:255',
            'descriptionArea' => 'nullable|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'nameArea.required' => 'Tên khu vực là bắt buộc.',
            'nameArea.string' => 'Tên khu vực phải là một chuỗi.',
            'nameArea.max' => 'Tên khu vực không được vượt quá :max ký tự.',
            'descriptionArea.string' => 'Mô tả khu vực phải là một chuỗi.',
        ];
    }
}
