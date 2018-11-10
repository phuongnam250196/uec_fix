<?php

namespace App\Http\Requests\sinhvien;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'pass_2'=>'required | min:6 | max:15 | same:password',
        ];
    }
    public function messages() {
        return [
            'user_name.required'=>'Tài khoản không được để trống',
            'user_name.unique'=>'Tài khoản đã tồn tại',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
            'password.max'=>'Mật khẩu phải nhở hơn 16 ký tự',
            'pass_2.required'=>'Mật khẩu xác nhận không được để trống',
            'pass_2.min'=>'Mật khẩu xác nhận phải từ 6 ký tự trở lên',
            'pass_2.max'=>'Mật khẩu xác nhận phải nhở hơn 16 ký tự',
            'pass_2.same'=>'Mật khẩu mới không khớp'
        ];
    }
}
