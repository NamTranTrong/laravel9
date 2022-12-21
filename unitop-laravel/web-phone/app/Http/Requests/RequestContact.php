<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContact extends FormRequest
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
            'con_name'=>'required',
            'con_email'=>'required',
            'con_content'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'con_name.required' => 'Bạn chưa điền thông tin !',
            'con_email.required' => 'Bạn chưa điền thông tin !',
            'con_content.required' => 'Bạn chưa điền thông tin !',
        ];
    }
}
