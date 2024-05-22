<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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
            'roleName' => 'required|string|max:255',
            'roleDisplayName' => 'nullable|string|max:255',
            'permission_id' => 'required|array',
            'permission_id.*' => 'integer|exists:permissions,id', // Ensure each permission_id is an integer and exists in the permissions table
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'roleName.required' => 'Tên vai trò là bắt buộc.',
            'roleName.string' => 'Tên vai trò phải là một chuỗi ký tự.',
            'roleName.max' => 'Tên vai trò không được vượt quá 255 ký tự.',
            'roleDisplayName.string' => 'Tên hiển thị vai trò phải là một chuỗi ký tự.',
            'roleDisplayName.max' => 'Tên hiển thị vai trò không được vượt quá 255 ký tự.',
            'permission_id.required' => 'Ít nhất một quyền là bắt buộc.',
            'permission_id.array' => 'Trường quyền phải là một mảng.',
            'permission_id.*.integer' => 'Mỗi ID quyền phải là một số nguyên.',
            'permission_id.*.exists' => 'Mỗi quyền được chọn phải tồn tại trong bảng quyền.',
        ];
    }
}
