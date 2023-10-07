<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionAddRequest extends FormRequest
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
            'module_table' => 'required|unique:permissions,name',
        ];
    }

    public function messages(){
        return [
            'module_table.required' => 'Bạn chưa chọn Module',
            'module_table.unique' => 'Đã tồn tại Permission cho Module này !'
        ];
    }
}
