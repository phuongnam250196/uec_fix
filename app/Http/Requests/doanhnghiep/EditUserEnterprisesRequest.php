<?php

namespace App\Http\Requests\doanhnghiep;

use Illuminate\Foundation\Http\FormRequest;

class EditUserEnterprisesRequest extends FormRequest
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
            'dn_user_name'=>'unique:uec_user,user_name,'.$this->segment(5).',id',
            'dn_user_pass'=>'min:6 | max:15',
            'dn_user_pass_2'=>'same:dn_user_pass',
        ];
    }
    public function messages() {
        return [
            'dn_user_name.unique'=>'Tài khoản đã tồn tại',
            'dn_user_pass.min'=>'Mật khẩu phải từ 6 ký tự trở lên',
            'dn_user_pass.max'=>'Mật khẩu phải nhở hơn 16 ký tự',
            'dn_user_pass_2.same'=>'Mật khẩu xác nhận không khớp'
        ];
    }
}
