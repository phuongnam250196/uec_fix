<?php

namespace App\Http\Requests\danhmuckhac;

use Illuminate\Foundation\Http\FormRequest;

class AddYearofexpRequest extends FormRequest
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
            'name'=>'required | unique:uec_yearofexp,yearofexp_name',
            'describe'=>'required'
        ];
    }
    public function messages() {
        return [
            'name.unique'=>'Tên năm kinh nghiệm đã tồn tại',
            'name.required'=>'Tên năm kinh nghiệm không được để trống',
            'describe.required'=>'Miêu tả năm kinh nghiệm không được để trống'
        ];
    }
}
