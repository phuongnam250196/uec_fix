<?php

namespace App\Http\Requests\danhmuckhac;

use Illuminate\Foundation\Http\FormRequest;

class EditPositionRequest extends FormRequest
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
            'name'=>'unique:uec_position,position_name,'.$this->segment(5).',position_id',
            'name'=>'required',
            'describe'=>'required'
        ];
    }
    public function messages() {
        return [
            'name.unique'=>'Tên chức vụ đã tồn tại',
            'name.required'=>'Tên chức vụ không được để trống',
            'describe.required'=>'Miêu tả chức vụ không được để trống'
        ];
    }
}
