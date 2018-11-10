<?php

namespace App\Http\Requests\danhmuckhac;

use Illuminate\Foundation\Http\FormRequest;

class EditSkillRequest extends FormRequest
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
            'name'=>'unique:uec_skill,skill_name,'.$this->segment(5).',skill_id',
            'name'=>'required',
            'describe'=>'required'
        ];
    }
    public function messages() {
        return [
            'name.unique'=>'Tên kĩ năng đã tồn tại',
            'name.required'=>'Tên kĩ năng không được để trống',
            'describe.required'=>'Miêu tả trình độ kĩ năng không được để trống'
        ];
    }
}
