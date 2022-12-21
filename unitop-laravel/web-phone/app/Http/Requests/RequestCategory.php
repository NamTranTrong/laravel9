<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
            'name'=> 'required|unique:categories,c_name,'.$this->id, //required = bắt buộc
            'icon' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Dòng này không được để trống',
            'name.unique' => 'Tên này đã tồn tại',
            'icon.required' => 'Dòng này không được để trống'
        ];
    }
}
