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
            'a_name' => 'required|unique:articles,a_name,'.$this->id,
            'a_avatar' => 'required',
            'a_content' => 'required',
            'a_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'a_name.required' => 'Bạn chưa điền thông tin ở đây !',
            'a_name.unique'   => 'Tên Bài Viết này đã tồn tại !',
            'a_content.required' => 'Bạn chưa điền nội dung Bài Viết',
            'a_description.required' => 'Bạn chưa điền mô tả Bài Viết',
            'a_avatar.required' => 'Bạn chưa chọn ảnh Bài Viết',
        ];

    }
}
