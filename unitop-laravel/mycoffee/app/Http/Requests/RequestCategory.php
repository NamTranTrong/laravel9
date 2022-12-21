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
            'c_name' => 'required|unique:categories,c_name,'.$this->id,
            'ca_menu_id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'c_name.required' => 'Bạn chưa điền thông tin ở đây !',
            'c_name.unique'   => 'Tên Menu này đã tồn tại !',
            'ca_menu_id.required' => 'Hãy chọn 1 tên Menu !',
        ];

    }
}
