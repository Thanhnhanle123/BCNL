<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
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
            'permissionName' => 'required|string|max:255',
            'permissionDescription' => 'nullable|string',
            'permissionKeyCode' => 'required|string|unique:permissions,key_code',
            'permissionGroupId' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'permissionName.required' => 'Tên là bắt buộc.',
            'permissionKeyCode.required' => 'keyCode là bắt buộc.',
            'permissionKeyCode.unique' => 'keyCode đã tồn tại',
        ];
    }
}
