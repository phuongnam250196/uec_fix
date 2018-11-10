<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name'=>'required|min:6|max:20',
            'user_password'=>'required|min:6|max:20'
        ];
    }

    public function messages()
    {
        return [
            'user_name.required'=>"Tài khoản không được để trống",
            'user_name.min'=>'Tài khoản phải lớn hơn 6 ký tự',
            'user_name.max'=>'Tài khoản phải nhỏ hơn 20 ký tự',
            'user_password.required'=>'Mật khẩu không được để trống',
            'user_password.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
            'user_password.max'=>'Mật khẩu phải nhỏ hơn 20 ký tự'
        ];
    }
}
