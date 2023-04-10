<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:5',
            'price' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được trùng',
            'name.max' => 'Tên không được quá 255 kí tự',
            'name.min' => 'Tên không được ít hơn 5 kí tự',
            'price.required' => 'Giá không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'category_id.required' => 'Danh Mục không được để trống',
        ];
    }
}
