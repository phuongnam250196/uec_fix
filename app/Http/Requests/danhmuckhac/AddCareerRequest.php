<?php

namespace App\Http\Requests\danhmuckhac;

use Illuminate\Foundation\Http\FormRequest;

class AddCareerRequest extends FormRequest
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
            'name'=>'required | unique:uec_career,career_name',
            'describe'=>'required'
        ];
    }
    public function messages() {
        return [
            'name.unique'=>'Tên nghề nghiệp đã tồn tại',
            'name.required'=>'Tên nghề nghiệp không được để trống',
            'describe.required'=>'Miêu tả nghề nghiệp không được để trống'
        ];
    }
}
