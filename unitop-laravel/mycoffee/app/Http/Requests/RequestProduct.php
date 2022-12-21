<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
            'pro_name' => 'required|unique:products,pro_name,'.$this->id,
            'pro_category_id'=>'required',
            'pro_price' => 'required',
            'pro_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required' => 'Bạn chưa điền thông tin ở đây !',
            'pro_name.unique'   => 'Tên Sản Phẩm này đã tồn tại !',
            'pro_category_id.required' => 'Hãy chọn 1 tên Danh Mục !',
            'pro_price.required' => 'Bạn chưa nhập giá Sản Phẩm',
            'pro_description.required' => 'Bạn chưa điền mô tả Sản Phẩm',
        ];

    }
}
