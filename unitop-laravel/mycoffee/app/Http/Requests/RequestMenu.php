<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestMenu extends FormRequest
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
            'menu_name' => 'required|unique:menu,menu_name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'menu_name.required' => 'Bạn chưa điền thông tin ở đây !',
            'menu_name.unique'   => 'Tên Menu này đã tồn tại !',
        ];

    }
}
