<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'employeeName' => 'required|string|max:255',
            'email' => 'email|nullable|unique:users,email|max:255',
            'password' => 'required|string',
            'roleId' => 'required|array',
            'roleId.*' => 'integer|exists:roles,id', // Đảm bảo mỗi role_id là số nguyên và tồn tại trong bảng roles
        ];
    }

    public function messages()
    {
        return [
            'employeeName.required' => 'Tên nhân viên là bắt buộc.',
            'employeeName.string' => 'Tên nhân viên phải là một chuỗi ký tự.',
            'employeeName.max' => 'Tên nhân viên không được vượt quá 255 ký tự.',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.unique' => 'Email này đã được sử dụng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'roleId.required' => 'Ít nhất một vai trò là bắt buộc.',
            'roleId.array' => 'Trường vai trò phải là một mảng.',
            'roleId.*.integer' => 'Mỗi ID vai trò phải là một số nguyên.',
            'roleId.*.exists' => 'Mỗi vai trò được chọn phải tồn tại trong bảng vai trò.',
        ];
    }
}
