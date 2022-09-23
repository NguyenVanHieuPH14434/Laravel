<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>'required|min:2',
            'email'=>'required|min:3|email',
            'message'=>'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên không được trống!',
            'name.min'=>'Tên tối thiểu 2 ký tự!',
            'email.required'=>'Email không được trống!',
            'email.min'=>'Email tối thiểu 3 ký tự!',
            'email.email'=>'Email không đúng định dạng!',
            'message.required'=>'Nội dung không được trống!',
            'message.max'=>'Nội dung tối đa 255 ký tự!',
        ];
    }
}
