<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
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
            'email'=>'required|unique:users,email,'.$this->id,
            'password'=>'required|min:8|max:18',
            'name'=>'required',
            'phone' =>'required',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Ít nhất 8 kí tự',
            'password.max' => 'Nhiều nhất 18 kí tự',
            'name.required' => 'Bạn chưa nhập tên',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
        ];
    }
}
