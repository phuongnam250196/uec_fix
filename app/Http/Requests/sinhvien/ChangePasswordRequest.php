<?php

namespace App\Http\Requests\sinhvien;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password'=>'required | min:6 | max:15',
            'new_pass'=>'required | min:6 | max:15',
            'new_pass_2'=>'required | min:6 | max:15 | same:new_pass',
        ];
    }
    public function messages() {
        return [
            'password.required'=>'Mật khẩu cũ không được để trống',
            'new_pass.required'=>'Mật khẩu cũ không được để trống',
            'new_pass_2.required'=>'Mật khẩu cũ không được để trống',
            'password.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
            'password.max'=>'Mật khẩu phải nhở hơn 16 ký tự',
            'new_pass.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
            'new_pass.max'=>'Mật khẩu phải nhở hơn 16 ký tự',
            'new_pass_2.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
            'new_pass_2.max'=>'Mật khẩu phải nhở hơn 16 ký tự',
            'new_pass_2.same'=>'Mật khẩu mới không khớp'
        ];
    }
}
