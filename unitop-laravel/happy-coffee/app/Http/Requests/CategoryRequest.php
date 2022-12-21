<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'ca_name' => 'required|unique:categories,ca_name,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'ca_name.required' => 'Bạn chưa điền tên Danh mục',
        ];
    }
}
