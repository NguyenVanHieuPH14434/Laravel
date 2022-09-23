<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name'=>'required|min:3|max:50',
            'image'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không được trống!',
            'name.min'=>'Tên danh mục tối thiểu 3 ký tự!',
            'name.max'=>'Tên danh mục tối đa 50 ký tự!',
            'image.required'=>'Ảnh danh mục không được trống!',
        ];
    }
}
