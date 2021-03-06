<?php

namespace App\Http\Requests\baiviet;

use Illuminate\Foundation\Http\FormRequest;

class InfoStudentRequest extends FormRequest
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
            'tt_title'=>'required | unique:uec_infostudent,infostudent_name',
            'tt_img'=>'required | mimes:jpeg,jpg,png|max:2000',
            'tt_content' => 'required'
        ];
    }
    public function messages() {
        return [
            'tt_title.unique'=>'Tên thông tin học sinh này đã tồn tại',
            'tt_title.required'=>'Tên thông tin sinh viên không được để trống',
            'tt_img.required'=>'Ảnh minh họa không được để trống',
            'tt_img.mines' => 'Ảnh không đúng định dạng, chọn lại',
            'tt_img.max' => 'Kích thước ảnh quá lớn',
            'tt_content.required' => 'Nội dung không được để trống'
        ];
    }
}
