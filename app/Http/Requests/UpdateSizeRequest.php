<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSizeRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên size không được trống!',
            'name.min'=>'Tên size tối thiểu 3 ký tự!',
            'name.max'=>'Tên size tối đa 50 ký tự!',
        ];
    }
}
