<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'pro_description' => 'required',
            'pro_avatar' => 'required',
            'pro_price' => 'required',
            'pro_description_seo' => 'required',
            'pro_category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required' => 'Bạn chưa nhập tên Sản Phẩm',
            'pro_name.unique' => 'Tên Sản Phẩm đã trùng',
            'pro_category_id.required' => 'Bạn chưa chọn Danh Mục',
            'pro_description.required' => 'Bạn chưa nhập Nội Dung Miêu Tả',
            'pro_avatar.required' => 'Bạn chưa chọn Hình Ảnh',
            'pro_price.required' => 'Bạn chưa nhập nhập Giá Sản Phẩm',
            'pro_description_seo.required' => 'Bạn chưa nhập Tiêu Đề Miêu Tả',
        ];
    }
}
