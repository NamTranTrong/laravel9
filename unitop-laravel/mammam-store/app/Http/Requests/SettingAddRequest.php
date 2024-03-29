<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'required|unique:settings|max:255',
            'config_value' => 'required',
        ];
    }

    public function messages(){
        return [
            'config_key.required' => 'Config Key không được để trống',
            'config_key.unique' => 'Config Key không được trùng',
            'config_key.max' => 'Config Key không được quá 255 kí tự',
            'config_value.required' => 'Config Value không được để trống',
        ];
    }
}
