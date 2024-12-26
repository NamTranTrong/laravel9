<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:products|',
            'price' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'feature_image_path' => 'required',
            'image_path' => 'required',
            'tags' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Bạn chưa nhập tên Sản Phẩm',
            'name.unique' => 'Đã tồn tại Sản Phẩm này',
            'price.required' => 'Bạn chưa nhập giá Sản Phẩm',
            'content.required' => 'Bạn chưa nhập nội dung Sản Phẩm',
            'category_id.required' => 'Bạn chưa chọn danh mục cha',
            'feature_image_path.required' => 'Hãy chọn ảnh Sản Phẩm',
            'image_path.required' => 'Hãy chọn ảnh chi tiết Sản Phẩm',
            'tags.required' => 'Nhập ít nhất một tag cho Sản Phẩm',
        ];
    }
}
