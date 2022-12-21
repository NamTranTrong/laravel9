<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class RequestLogin extends FormRequest
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
    // public function rules()
    // {
    //     return [
    //         'email' => 'required|dropUnique:users,email',
    //         'password' =>'required|dropUnique:users,password',
    //     ];
    // }

    // public function massages(){
    //     return [
    //         'email.required' =>'Bạn chưa nhập Email',
    //         'email.dropUnique' =>'Không tồn tại Email',
    //         'password' =>'required',
    //     ];
    // }
}
