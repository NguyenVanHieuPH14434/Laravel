<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required|min:3|max:32',
            'email'=>'required|min:3|max:70|email',
            'password'=>'required|min:3|max:20',
            'confirm'=>'required|min:3|max:20|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên không được trống!',
            'name.min'=>'Tên tối thiểu 3 ký tự!',
            'name.max'=>'Tên tối đa 32 ký tự!',
            'email.required'=>'Email không được trống!',
            'email.min'=>'Email tối thiểu 3 ký tự!',
            'email.max'=>'Email tối đa 70 ký tự!',
            'email.email'=>'Email không đúng định dạng!',
            'password.required'=>'Mật khẩu không được trống!',
            'password.min'=>'Mật khẩu tối thiểu 3 ký tự!',
            'password.max'=>'Mật khẩu tối đa 20 ký tự!',
            'confirm.required'=>'Xác nhận mật khẩu không được trống!',
            'confirm.min'=>'Xác nhận mật khẩu tối thiểu 3 ký tự!',
            'confirm.max'=>'Xác nhận mật khẩu tối đa 20 ký tự!',
            'confirm.same'=>'Xác nhận mật khẩu không đúng!',
        ];
    }
}
