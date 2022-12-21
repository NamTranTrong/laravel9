<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
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
            'a_name'=> 'required|unique:articles,a_name,'.$this->id,
            "a_content"=> "required",
            "a_description"=> "required"
        ];
    }

    public function messages(){
        return[
            'a_name.required'=>'Không được để trống',
            'a_name.unique'=>'Tên sản phẩm này đã tồn tại',
            'a_content.required' => 'Không được để trống', 
            'a_description.required' => 'Không được để trống', 
        ];
    }
}
