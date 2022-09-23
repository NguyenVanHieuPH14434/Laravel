<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
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
            'name.required'=>'Tên trạng thái không được trống!',
            'name.min'=>'Tên trạng thái tối thiểu 3 ký tự!',
            'name.max'=>'Tên trạng thái tối đa 50 ký tự!',
        ];
    }
}
