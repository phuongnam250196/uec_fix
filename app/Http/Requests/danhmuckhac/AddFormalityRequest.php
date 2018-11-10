<?php

namespace App\Http\Requests\danhmuckhac;

use Illuminate\Foundation\Http\FormRequest;

class AddFormalityRequest extends FormRequest
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
            'name'=>'required | unique:uec_formality,formality_name',
            'describe'=>'required'
        ];
    }
    public function messages() {
        return [
            'name.unique'=>'Tên hình thức đã tồn tại',
            'name.required'=>'Tên hình thức không được để trống',
            'describe.required'=>'Miêu tả hình thức không được để trống'
        ];
    }
}
