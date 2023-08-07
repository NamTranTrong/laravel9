<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Product;
class ProductEditRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $productId = $this->route('id');
        $name = $this->input('name');
        $isNameChanged = Product::where('id', $productId)->where('name', $name)->exists();

        return [
            Rule::unique('products')->ignore($productId),
            'name' => [
                'required',
                $isNameChanged ?  Rule::unique('products')->ignore($productId) :'unique:products,name',
                'max:255', 
                'min:5',
            ],
            'price' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Bạn chưa nhập tên',
            'name.unique' => 'Tên này đã tồn tại',
            'name.max' => 'Tên không được quá 255 kí tự',
            'name.min' => 'Tên không được ít hơn 5 kí tự',
            'price.required' => 'Bạn chưa nhập giá',
            'content.required' => 'Bạn chưa nhập mô tả sản phẩm',
            'category_id.required' => 'Bạn chưa chọn danh mục',
        ];
    }
}
