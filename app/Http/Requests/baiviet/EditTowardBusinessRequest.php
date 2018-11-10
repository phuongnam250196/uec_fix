<?php

namespace App\Http\Requests\baiviet;

use Illuminate\Foundation\Http\FormRequest;

class EditTowardBusinessRequest extends FormRequest
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
            'tt_title'=>'unique:uec_towardbusiness,towardbusiness_name,'.$this->segment(5).',id',
            'tt_img'=>'mimes:jpeg,jpg,png|max:2000',
            'tt_content' => 'required'
        ];
    }
    public function messages() {
        return [
            'tt_title.unique'=>'Hướng doanh nghiệp này đã tồn tại',
            'tt_title.required'=>'Hướng doanh nghiệp không được để trống',
            'tt_img.mines' => 'Ảnh không đúng định dạng, chọn lại',
            'tt_img.max' => 'Kích thước ảnh quá lớn',
            'tt_content.required' => 'Nội dung không được để trống'
        ];
    }
}
