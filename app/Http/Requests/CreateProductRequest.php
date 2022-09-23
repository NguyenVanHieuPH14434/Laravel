<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name'=>"required|min:5",
            'price'=>'required|numeric',
            'image'=>'required',
            'status'=>'required',
            'kho'=>'required',
            'short_desc'=>'required',
            'desc'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên sản phẩm không được trống!',
            'name.min'=>'Tên sản phẩm tối thiểu 5 ký tự!',
            'price.required'=>'Giá sản phẩm không được trống!',
            'price.numeric'=>'Giá sản phẩm phải là số!',
            'image.required'=>'Ảnh sản phẩm không được trống!',
            'status.required'=>'Trạng thái sản phẩm không được trống!',
            'kho.required'=>'Số lượng nhập sản phẩm không được trống!',
            'short_desc.required'=>'Mô tả ngắn sản phẩm không được trống!',
            'desc.required'=>'Mô tả chi tiết sản phẩm không được trống!',
        ];
    }
}
