<?php

namespace App\Http\Requests\danhmuckhac;

use Illuminate\Foundation\Http\FormRequest;

class EditEducationRequest extends FormRequest
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
            'name'=>'unique:uec_education,education_name,'.$this->segment(5).',education_id',
            'name'=>'required',
            'describe'=>'required'
        ];
    }
    public function messages() {
        return [
            'name.unique'=>'Tên học vấn đã tồn tại',
            'name.required'=>'Tên học vấn không được để trống',
            'describe.required'=>'Miêu tả trình độ học vấn không được để trống'
        ];
    }
}
