<?php

namespace App\Http\Requests\nhatruong;

use Illuminate\Foundation\Http\FormRequest;

class AddSchoolInfoRequest extends FormRequest
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
            'nt_name'=>'unique:uec_school,school_code',
            'nt_logo'=>'image',
            'nt_phone'=>'min:3 | max:11',
            'nt_website'=>'url',
        ];
    }
    public function messages() {
        return [
            'nt_name.unique'=>'Mã trường đã tồn tại',
            'nt_logo.image'=>'Không phải file ảnh. Chọn lại!',
            'nt_phone.min'=>'Không phải số điện thoại. Nhập lại',
            'nt_phone.max'=>'Không phải số điện thoại. Nhập lại',
            'nt_website.url'=>'Không phải website. Nhập lại',
        ];
    }
}
