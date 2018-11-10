<?php

namespace App\Http\Requests\nhatruong;

use Illuminate\Foundation\Http\FormRequest;

class AdminTaikhoanRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'user_name'=>'unique:uec_user,user_name',
            'user_name'=>'required',
            'password'=>'required | min:6 | max:15',
            'password_2'=>'required | same:password',
        ];
    }
    public function messages() {
        return [
            'user_name.unique'=>'Tài khoản đã tồn tại',
            'user_name.required'=>'Tài khoản không được để trống',
            'password.required'=>'Mật khẩu không được để trống',
            'password_2.required'=>'Mật khẩu nhập lại không được để trống',
            'password.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
            'password.max'=>'Mật khẩu phải nhở hơn 16 ký tự',
            'password_2.same'=>'Mật khẩu xác nhận không khớp'
        ];
    }
}
