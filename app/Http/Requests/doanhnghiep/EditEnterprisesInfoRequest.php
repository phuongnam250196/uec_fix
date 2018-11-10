<?php

namespace App\Http\Requests\doanhnghiep;

use Illuminate\Foundation\Http\FormRequest;

class EditEnterprisesInfoRequest extends FormRequest
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
            'dn_name'=>'unique:uec_enterprises,enterprise_full_name,'.$this->segment(5).',id',
            'dn_name'=>'required',
            'dn_logo'=>'image',
            'dn_phone'=>'required | min:3 | max:11',
            'dn_website'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'dn_name.unique'=>"Thông tin doanh nghiệp đã tồn tại",
            'dn_name.required'=>"Tên doanh nghiệp không được để trống",
            'dn_logo.image'=>'File đang chọn không đúng định dạng ảnh',
            'dn_phone.min'=>'Làm ơn nhập đúng số điện thoại',
            'dn_phone.max'=>'Làm ơn nhập đúng số điện thoại',
            'dn_website.url'=>'Không đúng định dạng website',
        ];
    }
}
