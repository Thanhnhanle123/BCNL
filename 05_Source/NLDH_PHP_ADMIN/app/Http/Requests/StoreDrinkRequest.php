<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDrinkRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Xác định xem người dùng có được phép thực hiện yêu cầu này hay không (ở đây là luôn trả về true, nhưng bạn có thể điều chỉnh theo nhu cầu của bạn)
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'size' => 'nullable|string',
            'price' => 'required|numeric',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là một số.'
        ];
    }
}
